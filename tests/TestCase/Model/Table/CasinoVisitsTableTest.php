<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CasinoVisitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CasinoVisitsTable Test Case
 */
class CasinoVisitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CasinoVisitsTable
     */
    public $CasinoVisits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.casino_visits',
        'app.users',
        'app.user_followers',
        'app.followers',
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
        'app.city',
        'app.country',
        'app.reviews',
        'app.review_likes',
        'app.review_comments',
        'app.country_name_translation',
        'app.country_description_translation',
        'app.casino',
        'app.single_review',
        'app.promotions',
        'app.city_name_translation',
        'app.city_description_translation'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CasinoVisits') ? [] : ['className' => 'App\Model\Table\CasinoVisitsTable'];
        $this->CasinoVisits = TableRegistry::get('CasinoVisits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CasinoVisits);

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
