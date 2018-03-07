<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Model\Section;
use App\Services\SectionService as SectionService;

class SectionServiceTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();
		$this->service = new SectionService();
	}
	
	public function testCheckBoxGroup()
	{
		$result = $this->service->checkBoxGroup();
		
		$this->assertArrayHasKey('is_email_notify', $result);
		$this->assertArrayHasKey('is_email_notify_default', $result);
		$this->assertArrayHasKey('is_hide_notify_checkboxes', $result);
		$this->assertArrayHasKey('is_hide_user_editable', $result);
		$this->assertArrayHasKey('is_integrate_trading_room', $result);
		$this->assertArrayHasKey('is_publish_comtex', $result);
		$this->assertArrayHasKey('is_referenced', $result);
		$this->assertArrayHasKey('is_hide_trading_options_list', $result);
		$this->assertArrayHasKey('is_watch_videos', $result);
		$this->assertArrayHasKey('is_active', $result);
	}
}