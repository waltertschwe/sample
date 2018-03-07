<?php

namespace App\Console\Commands;

use App\Services\CommandHelpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class MigrateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:products {oldDb}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate old products to new schema';

    /**
     * Create a new command instance.
     *
     * @return void
     */
	public function __construct(CommandHelpers $helper)
	{
		parent::__construct();
		$this->helper = $helper;
	}

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	$this->info('Start - Migrate Products');
		
		// set primary key starting point
		$product_id_pk = $this->helper->getLastInsertIdTable('product_id', 'products');
		
		// get old DB passed from user entered command line
		$oldDb = $this->argument('oldDb');
		
		// get the Website primary key from new schema
		$websiteId = $this->helper->getWebsitePrimaryKey($oldDb);
		
		// connect to old schema with data to be migrated
		$products = DB::connection($oldDb)->select('SELECT * FROM Products');
		
		// enable progress bar
		$bar = $this->output->createProgressBar(count($products));
		foreach($products as $product) {
			// insert into new schema
			DB::connection('mysql')->table('products')->insert([
				'product_id' => $product_id_pk++,
				'old_product_id' => $product->id,
				'website_id' => $websiteId,
				'name' => $product->name,
				'room_name' => $product->roomName,
				'credit_card_code' => $product->creditCardCode,
				'is_active' => ($product->disabled) ? 0 : 1,
				'is_alert_recommended' => $product->isAlertRecommended,
				'is_pm_access' => $product->pmAccess,
				'is_institutional' => $product->isInstitutional,
				'display_order' => $product->displayOrder,
				'description' => $product->description,
				'short_description' => $product->shortDescription,
				'prod_email_description' => $product->prodEmailDesc,
				'default_post_section' => $product->defaultPostSection,
				'no_sub_header' => $product->nosubHeader,
				'no_sub_description' => $product->nosubDescription,
				'created_at' => new \DateTime(),
			]);

			$bar->advance();
		}

		$bar->finish();
		$this->info('END - Migrate Products');
	}
}
