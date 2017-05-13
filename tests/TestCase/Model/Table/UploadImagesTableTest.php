<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UploadImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UploadImagesTable Test Case
 */
class UploadImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UploadImagesTable
     */
    public $UploadImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.upload_images',
        'app.users',
        'app.user_followers',
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
        $config = TableRegistry::exists('UploadImages') ? [] : ['className' => 'App\Model\Table\UploadImagesTable'];
        $this->UploadImages = TableRegistry::get('UploadImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UploadImages);

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
