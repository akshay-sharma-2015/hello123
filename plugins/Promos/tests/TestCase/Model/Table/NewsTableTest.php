<?php
namespace Promos\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Promos\Model\Table\PromosTable;

/**
 * Promos\Model\Table\PromosTable Test Case
 */
class PromosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Promos\Model\Table\PromosTable
     */
    public $Promos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.news.news',
        'plugin.news.masters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Promos') ? [] : ['className' => 'Promos\Model\Table\PromosTable'];
        $this->Promos = TableRegistry::get('Promos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Promos);

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
