<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CasinoGamblingOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CasinoGamblingOptionsTable Test Case
 */
class CasinoGamblingOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CasinoGamblingOptionsTable
     */
    public $CasinoGamblingOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.casino_gambling_options',
        'app.casinos',
        'app.casino_amenities',
        'app.masters',
        'app.casino_gambling_option'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CasinoGamblingOptions') ? [] : ['className' => 'App\Model\Table\CasinoGamblingOptionsTable'];
        $this->CasinoGamblingOptions = TableRegistry::get('CasinoGamblingOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CasinoGamblingOptions);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
