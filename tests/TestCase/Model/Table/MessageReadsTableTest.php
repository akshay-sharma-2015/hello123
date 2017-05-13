<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessageReadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessageReadsTable Test Case
 */
class MessageReadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MessageReadsTable
     */
    public $MessageReads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.message_reads',
        'app.messages',
        'app.senders',
        'app.user_followers',
        'app.users',
        'app.followers',
        'app.receivers',
        'app.message_deletes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MessageReads') ? [] : ['className' => 'App\Model\Table\MessageReadsTable'];
        $this->MessageReads = TableRegistry::get('MessageReads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MessageReads);

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
