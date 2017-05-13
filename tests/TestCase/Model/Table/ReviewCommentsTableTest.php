<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReviewCommentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReviewCommentsTable Test Case
 */
class ReviewCommentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReviewCommentsTable
     */
    public $ReviewComments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.review_comments',
        'app.reviews',
        'app.users',
        'app.city',
        'app.country',
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
        'app.single_review',
        'app.review_likes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReviewComments') ? [] : ['className' => 'App\Model\Table\ReviewCommentsTable'];
        $this->ReviewComments = TableRegistry::get('ReviewComments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReviewComments);

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
