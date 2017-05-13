<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TextSettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TextSettingsTable Test Case
 */
class TextSettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TextSettingsTable
     */
    public $TextSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.text_settings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TextSettings') ? [] : ['className' => 'App\Model\Table\TextSettingsTable'];
        $this->TextSettings = TableRegistry::get('TextSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TextSettings);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
