<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReviewLikesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReviewLikesTable Test Case
 */
class ReviewLikesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReviewLikesTable
     */
    public $ReviewLikes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.review_likes',
        'app.reviews',
        'app.users',
        'app.city',
        'app.casinos',
        'app.casino_amenities',
        'app.child_masters',
        'app.parent_masters',
        'app.child_masters_name_translation',
        'app.i18n',
        'app.casino_amenities_name_translation',
        'app.casino_gambling_options',
        'app.masters',
        'app.masters_name_translation',
        'app.casino_gambling_options_name_translation',
        'app.country',
        'app.country_name_translation',
        'app.country_description_translation',
        'app.single_review'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReviewLikes') ? [] : ['className' => 'App\Model\Table\ReviewLikesTable'];
        $this->ReviewLikes = TableRegistry::get('ReviewLikes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReviewLikes);

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
