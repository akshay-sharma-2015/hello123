<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessageDeletesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessageDeletesTable Test Case
 */
class MessageDeletesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MessageDeletesTable
     */
    public $MessageDeletes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.message_deletes',
        'app.messages',
        'app.senders',
        'app.user_followers',
        'app.users',
        'app.followers',
        'app.receivers',
        'app.message_reads'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MessageDeletes') ? [] : ['className' => 'App\Model\Table\MessageDeletesTable'];
        $this->MessageDeletes = TableRegistry::get('MessageDeletes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MessageDeletes);

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
