<?php

namespace App\Console\Commands;

use App\Services\CommandHelpers;


use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class MigratePromotions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:promotions {oldDb}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Promotion Data';

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
		$this->info('Start - Migrate Promotions');
		
		// set primary key starting point
		$promotion_id_pk = $this->helper->getLastInsertIdTable('promotion_id', 'promotions');
		
		// get old DB passed from user entered command line
		$oldDb = $this->argument('oldDb');
		
		// get the Website primary key from new schema
		$websiteId = $this->helper->getWebsitePrimaryKey($oldDb);
		
		// connect to old schema with data to be migrated
		$promotions = DB::connection($oldDb)->select('SELECT * FROM Promotions');
		
		// enable progress bar
		$bar = $this->output->createProgressBar(count($promotions));
		foreach($promotions as $promotion) {
			// insert into new schema
			DB::connection('mysql')->table('promotions')->insert([
				'promotion_id' => $promotion_id_pk++,
				'website_id' => $websiteId,
				'old_promotion_id' => $promotion->id,
				'name' => $promotion->name,
				'description' => $promotion->description,
				'is_active' => ($promotion->deleted) ? 0 : 1,
				'created_at' => new \DateTime(),
			]);

			$bar->advance();
		}

		$bar->finish();
		$this->info('END - Migrate Promotions');
		
	}
}
