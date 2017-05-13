<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.groups',
        'app.aros',
        'app.acos',
        'app.permissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

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
     * Test validationAdminEditProfile method
     *
     * @return void
     */
    public function testValidationAdminEditProfile()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationUpdateProfile method
     *
     * @return void
     */
    public function testValidationUpdateProfile()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationContactUsForm method
     *
     * @return void
     */
    public function testValidationContactUsForm()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationSignUpForm method
     *
     * @return void
     */
    public function testValidationSignUpForm()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationUploadImageForm method
     *
     * @return void
     */
    public function testValidationUploadImageForm()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationForgotPasswordForm method
     *
     * @return void
     */
    public function testValidationForgotPasswordForm()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
