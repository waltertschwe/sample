<?php

namespace App\Console\Commands;

use App\Services\CommandHelpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class MigrateNotificationGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:notification-groups {oldDb}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrates Notification Groups';

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
		$this->info('Start - Notification Groups Migration');
		
		// get old DB passed from user entered command line
		$oldDb = $this->argument('oldDb');
		
		// set primary key starting point
		$notification_group_id_pk = $this->helper->getLastInsertIdTable(
			'notification_group_id', 
			'notification_groups'
		);

		// get the website primary key 
		$websiteId = $this->helper->getWebsitePrimaryKey($oldDb);
		
		// connect to old schema with old data
		$groups = DB::connection($oldDb)->select('SELECT * FROM NotificationGroups');
		
		// enable progress bar
		$bar = $this->output->createProgressBar(count($groups));
		foreach($groups as $group) {
			DB::connection('mysql')->table('notification_groups')->insert([
				'notification_group_id' => $notification_group_id_pk,
				'website_id' => $websiteId,
				'old_notification_group_id' => $group->id,
				'name' => $group->name,
				'description' => $group->description,
				'alert_type' => $group->alertType,
				'sort_order' => $group->sortOrder,
				'must_have_product_id' => $group->mustHaveProductId,
				'must_not_have_product_id' => $group->mustNotHaveProductId,
				'email_default' => $group->emailDefault,
				'line_type' => $group->lineType,
				'field_name' => $group->fieldName,
				'created_at' => new \DateTime(),
			]);
			
			// Map Notifcation Group To Sections
			$oldMapping = DB::connection($oldDb)
				->select('SELECT sectionId FROM NotificationSections
						 WHERE notificationGroupId = ' . $group->id
				);
			
			// returns array of object only should be one result
			foreach ($oldMapping as $item) {
				$newSectionId = DB::connection('mysql')
					->table('sections')
					->where('old_section_id', $item->sectionId)
					->pluck('section_id');
				
				// pluck returns a single result as an array get that value
				$newSectionId = $newSectionId[0];
				
				DB::connection('mysql')->table('section_notification_group')->insert([
					'section_id' => $newSectionId,
					'n_group_id' => $notification_group_id_pk,
				]);
			}
			
			$notification_group_id_pk++;
			$bar->advance();
		}
		
		$bar->finish();
		$this->info('END - Migrate Group Notifications');
		
    }
}
