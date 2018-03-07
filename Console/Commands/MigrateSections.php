<?php

namespace App\Console\Commands;

use App\Services\CommandHelpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class MigrateSections extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:sections {oldDb}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Sections';

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
		$this->info('Start Mapping Sections');
		
		// get old DB passed from user entered command line
		$oldDb = $this->argument('oldDb');
		
		// set primary key starting point
		$section_id_pk = $this->helper->getLastInsertIdTable('section_id', 'sections');
		
		// get the website primary key 
		$websiteId = $this->helper->getWebsitePrimaryKey($oldDb);
		
		// get all the old sections
		$sections = DB::connection($oldDb)->select('select * from Sections');

		$bar = $this->output->createProgressBar(count($sections));
		foreach($sections as $section) {
			// if section is marked as admin skip
			// this is now controlled by laravel routes
			if ($section->isAdminSection) {
				continue;
			}

			$oldSectionId = $section->typeId;

			$newSectionTypeArr = DB::connection('mysql')->select(
				'SELECT section_type_id
				 FROM section_types
				 WHERE old_section_type_id = ' . $oldSectionId
			);
			
			// There should be only one result 
			// but the raw query returns an array of objects
			foreach ( $newSectionTypeArr as $sectionType ) {
				$sectionTypeId = $sectionType->section_type_id;
			}

			if($sectionTypeId) {
				DB::connection('mysql')->table('sections')->insert([
					'section_id' => $section_id_pk++,
					'website_id' => $websiteId,
					'section_type_id' =>  $sectionTypeId, // TODO: map to new section type
					'old_section_id' => $section->id,
					'name' => $section->name,
					'room_name' => $section->shortName,
					'display_order' => $section->displayOrder,
					// 'content_table' => $section->contentTable, DEPRECATED
					'is_trading_room_section' => $section->isTradingRoomSection,
					'url_path' => $section->urlPath,
					//'description' => $section->descripton,
					'email_description' => $section->emailDescription,
					// 'notification_page_name' => '', DEPRECATED
					// 'notification_description' => '', DEPRECATED
					// 'comtex_footer' => $section->comtexFooter, DEPRECATED
					'is_email_notify' => $section->emailNotifications,
					'is_email_notify_default' => 0, // TODO: map fields that aren't coming from section object
					'is_hide_notify_checkboxes' => 0,
					'is_hide_user_editable' => $section->userEditable,
					'is_integrate_trading_room' => 0,
					// 'is_publish_advice_trade' => 0, DEPRECATED
					// 'is_publish_newsfeed' => 0, DEPRECATED
					'is_publish_comtex' => 0,
					'is_referenced' => $section->canNotBeReferenced,
					'is_hide_trading_options_list' => 0,
					'is_watch_videos' => 0,
					// 'is_institutional' => $section->isInstitutional, DEPRECATED
					'is_active' => $section->isActive,
					'new_entry_file' => $section->newEntryFile,
					'edit_entry_file' => $section->editEntryFile,
					'room_fields_file' => $section->roomFieldsFile,
					'content_table' => $section->contentTable,
					'html_add_comments' => $section->htmlFile,
					'alt_room_category' => $section->altTradroomCategory,
					'alt_room_header' => $section->altTradingroomHeader,
					'example_email' => $section->exampleEmail,
					'example_sms' => $section->exampleSms,
					'created_at' => new \DateTime(),
				]);

			} else {
				$this->error("Section Type ID Not Found. Old Section ID = " . $section->id );
			}
			 
			$bar->advance();
		}
		
		$bar->finish();
		$this->info('END - Migrate Sections');
    }
}
