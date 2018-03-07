<?php

namespace App\Console\Commands;

use App\Services\CommandHelpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class MigrateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:users {oldDb}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Users to single schema';

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
		$this->info('Start - Migrate Users');
		
		// set primary key starting point
		$user_id_pk = $this->helper->getLastInsertIdTable('user_id', 'users');
		
		// get old DB passed from user entered command line
		$oldDb = $this->argument('oldDb');
		
		// get the Website primary key from new schema
		$websiteId = $this->helper->getWebsitePrimaryKey($oldDb);
		
		// connect to old schema with data to be migrated
		$users = DB::connection($oldDb)->select('SELECT * FROM Users');
		
		// enable progress bar
		$bar = $this->output->createProgressBar(count($users));
		foreach($users as $user) {
			// insert into new schema
			DB::connection('mysql')->table('users')->insert([
				'user_id' => $user_id_pk++,
				'website_id' => $websiteId,
				'old_user_id' => $user->id,
				'firstname' => $user->firstname,
				'lastname' => $user->lastname,
				'email' => $user->email,
				'alt_email' => $user->altemail,
				'password' => $user->password,
				'chat_handle' => $user->chathandle,
				'avatar' => $user->avatar,
				'public_info' => $user->publicInfo,
				'phone' => $user->phone,
				'cell_number' => $user->cellnumber,
				'user_level' => $user->userLevel,
				'notes' => $user->notes,
				'heard_about' => $user->heardabout,
				'no_contact' => $user->nocontact,
				'old_cc_last_four' => $user->old_cc_lastfour,
				'trading_room_options' => $user->tradingRoomOptions,
				'refer_user_id' => $user->referUserId,
				'is_duplicate' => $user->isDuplicate,
				'accepted_disclaimer' => $user->acceptedDisclaimer,
				'bio' => $user->bio,
				'business' => $user->business,
				'geo_ip' => $user->geoip,
				'avatar_aws_bucket' => $user->avatarAwsBucket,
				'created_at' => new \DateTime(),
			]);
			
			$bar->advance();
		}
		
		$bar->finish();
		$this->info('END - Migrate Users');
	}
}
