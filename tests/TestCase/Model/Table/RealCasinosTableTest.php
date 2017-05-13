<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RealCasinosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RealCasinosTable Test Case
 */
class RealCasinosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RealCasinosTable
     */
    public $RealCasinos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.real_casinos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RealCasinos') ? [] : ['className' => 'App\Model\Table\RealCasinosTable'];
        $this->RealCasinos = TableRegistry::get('RealCasinos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RealCasinos);

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
