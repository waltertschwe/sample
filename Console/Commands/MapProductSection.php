<?php

namespace App\Console\Commands;

use App\Services\CommandHelpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class MapProductSection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:product-section {oldDb}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Maps Products to Sections that are activated for the
    						  respective product.';

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
		$this->info('Start Mapping Products to Sections');
		
		$oldDb = $this->argument('oldDb');
		
		// get the website primary key 
		$websiteId = $this->helper->getWebsitePrimaryKey($oldDb);

		$oldRelations = DB::connection($oldDb)
			->select('SELECT productId, sectionId from ProductSections');
		
		// enable progress bar
		$bar = $this->output->createProgressBar(count($oldRelations));
		
		foreach ($oldRelations as $oldRelation) {
			$oldProductId = $oldRelation->productId;
			$oldSectionId = $oldRelation->sectionId;
			
			if ($oldProductId && $oldSectionId) {
				$query = "SELECT p.product_id, s.section_id
						  FROM products p, sections s
						  WHERE p.old_product_id = " . $oldProductId . 
						  " AND s.old_section_id = " . $oldSectionId . 
						  " AND p.website_id = " . $websiteId . 
						  " AND s.website_id = " . $websiteId;
				$newMapping = DB::connection('mysql')
					->select($query);
				
				// There should be only one result 
				// but the raw query returns an array of objects
				foreach ($newMapping as $newRow) {
					$newProductId = $newRow->product_id;
					$newSectionId = $newRow->section_id;
					
					if ($newProductId && $newSectionId) {
						DB::connection('mysql')->table('product_section')->insert([
							'product_id' => $newProductId,
							'section_id' => $newSectionId,
						]);
					} else {
						$this->error("either new product id = " . $oldProductId . 
							" or new section id = " . $oldSectionId . 
							" are null");
					}
					
				}
				
			} else {
				$this->error("either old product id = " . $oldProductId . 
							" or old section id = " . $oldSectionId . 
							" are null");
			}
			$bar->advance();
		}
		$bar->finish();
		$this->info('END Mapping Products to Sections');
	}
}
