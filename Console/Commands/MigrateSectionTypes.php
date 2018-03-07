<?php

namespace App\Console\Commands;

use App\Services\CommandHelpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class MigrateSectionTypes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:section-types {oldDb}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Section Types add website ID';

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
		$this->info('Start Migrating Section Types');

		// get old DB passed from user entered command line
		$oldDb = $this->argument('oldDb');

		// set primary key starting point
		$section_type_id_pk = $this->helper->getLastInsertIdTable('section_type_id', 'section_types');

		// get the website primary key 
		$websiteId = $this->helper->getWebsitePrimaryKey($oldDb);

		// get SectionTypes from Old database
		$sectionTypes = DB::connection($oldDb)->select('select * from SectionTypes');

		$bar = $this->output->createProgressBar(count($sectionTypes));
		foreach ($sectionTypes as $sectionType) {
			// We are skipping anything declared for is isAdminType
			// this was used for routing in the old system
			if ($sectionType->isAdminType) {
				continue;
			}
			
			## TODO: ADD CHECK if section_type already exists don't add again
			## website to section types is now a many to many relationship
			DB::connection('mysql')->table('section_types')->insert([
				'section_type_id' => $section_type_id_pk,
				'old_section_type_id' => $sectionType->id,
				'section_type' => $sectionType->sectionType,
				'class' => $sectionType->class,
				'type_description' => $sectionType->typeDescription,
				'created_at' => new \DateTime(),
			]);
			
			DB::connection('mysql')->table('website_section_type_pivot')->insert([
				'website_id' => $websiteId,
				'section_type_id' => $section_type_id_pk++,
			]);
			$bar->advance();
		}
		
		$bar->finish();
		$this->info('END Migrating Section Types'); 
    }
}
