<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserFollowersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserFollowersTable Test Case
 */
class UserFollowersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserFollowersTable
     */
    public $UserFollowers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_followers',
        'app.users',
        'app.followers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserFollowers') ? [] : ['className' => 'App\Model\Table\UserFollowersTable'];
        $this->UserFollowers = TableRegistry::get('UserFollowers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserFollowers);

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
