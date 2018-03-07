<?php

namespace App\Console\Commands;

use App\Services\CommandHelpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class MigrateBilling extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:billing {oldDb}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Billing';

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
		$this->info('Start - Migrate Billing Plans');
		
		// set primary key starting point
		$billing_plan_id_pk = $this->helper->getLastInsertIdTable('billing_plan_id', 'billing_plans');
		
		// get old DB passed from user entered command line
		$oldDb = $this->argument('oldDb');
		echo $oldDb;
		exit();
		
		// get the Website primary key from new schema
		$websiteId = $this->helper->getWebsitePrimaryKey($oldDb);
		
		// connect to old schema with data to be migrated
		$plans = DB::connection($oldDb)->select('SELECT * FROM BillingPlan');
		
		// enable progress bar
		$bar = $this->output->createProgressBar(count($plans));
		
		foreach($plans as $plan) {
			$oldProductId = $plan->productId;
			$oldPromotionId = $plan->promotionId;
			
			$newProductIdArr = DB::connection('mysql')
				->table('products')
				->where('old_product_id', $oldProductId)
				->pluck('product_id');
			
			$newPromotionIdArr = DB::connection('mysql')
				->table('promotions')
				->where('old_promotion_id', $oldPromotionId)
				->pluck('promotion_id');
			
			// insert into new schema
			DB::connection('mysql')->table('billing_plans')->insert([
				'billing_plan_id' => $billing_plan_id_pk++,
				'name' => $plan->name,
				'price' => $plan->price,
				'first_month_price' => $plan->firstMonthPrice,
				'description' => $plan->description,
				'product_id' => (isset($newProductIdArr[0])) ? $newProductIdArr[0] : null,
				'promotion_id' => (isset($newPromotionIdArr[0])) ? $newPromotionIdArr[0] : null,
				'free_trial_days' => $plan->freeTrialDays,
				'periodicity' => $plan->periodicity,
				'extend_free_trial_days' => $plan->extendFreeTrialDays,
				'created_at' => new \DateTime(),
			]);
			
			$bar->advance();
		}
		
		$bar->finish();
		$this->info('END - Migrate Billing Plans');
		
	}
}
