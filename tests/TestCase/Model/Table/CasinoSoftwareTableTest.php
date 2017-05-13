<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CasinoSoftwareTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CasinoSoftwareTable Test Case
 */
class CasinoSoftwareTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CasinoSoftwareTable
     */
    public $CasinoSoftware;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.casino_software',
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
        'app.casino_sum',
        'app.casino',
        'app.reviews',
        'app.users',
        'app.user_followers',
        'app.followers',
        'app.he_follow_m_e',
        'app.user_preference',
        'app.review_likes',
        'app.review_comments',
        'app.single_review',
        'app.promotions',
        'app.casino_visits',
        'app.casino_likes',
        'app.casino_sum_name_translation',
        'app.casino_sum_description_translation',
        'app.country_name_translation',
        'app.country_description_translation',
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
        $config = TableRegistry::exists('CasinoSoftware') ? [] : ['className' => 'App\Model\Table\CasinoSoftwareTable'];
        $this->CasinoSoftware = TableRegistry::get('CasinoSoftware', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CasinoSoftware);

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
