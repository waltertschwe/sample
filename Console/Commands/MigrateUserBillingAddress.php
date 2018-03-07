<?php

namespace App\Console\Commands;

use App\Services\CommandHelpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class MigrateUserBillingAddress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:users-address {oldDb}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Users Billing Address to single schema';

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
		$this->info('Start - Migrate Users Billing Address');
		
		// set primary key starting point
		$user_bill_address_id_pk = $this->helper->getLastInsertIdTable('user_bill_address_id', 'user_billing_address');
		
		// get old DB passed from user entered command line
		$oldDb = $this->argument('oldDb');
		
		// get the Website primary key from new schema
		$websiteId = $this->helper->getWebsitePrimaryKey($oldDb);
		
		// connect to old schema with data to be migrated
		$billings = DB::connection($oldDb)->select('SELECT * FROM UsersBillingAddress');
		
		// enable progress bar
		$bar = $this->output->createProgressBar(count($billings));
		foreach($billings as $billing) {
			
			$oldUserId = $billing->userId;
			
			$newUserIdArr = DB::connection('mysql')
				->table('users')
				->where('old_user_id', $oldUserId)
				->where('website_id', $websiteId)
				->pluck('user_id');
			
			if(isset($newUserIdArr[0])) {
				$newUserId = $newUserIdArr[0];
			} else {
				// We could not map a billing address to a user
				// skip the record
				$this->error('Could not find User ID for old User Id = ' . $oldUserId);
				continue;
			}

			// insert into new schema
			DB::connection('mysql')->table('user_billing_address')->insert([
				'user_bill_address_id' => $user_bill_address_id_pk++,
				'user_id' => $newUserId,
				'old_user_billing_id' => $billing->id,
				'is_active' => $billing->active,
				'address' => $billing->address,
				'address_2' => $billing->address2,
				'city' => $billing->city,
				'state' => $billing->state,
				'zip' => $billing->zip,
				'country' => $billing->country,
				'cc_last_four' => $billing->cc_lastfour,
				'geo_ip' => $billing->geoip,
				'created_at' => new \DateTime(),
			]);
			
			$bar->advance();
		}
		
		$bar->finish();
		$this->info('End - Migrate Users Billing Address');
		
	}
}
