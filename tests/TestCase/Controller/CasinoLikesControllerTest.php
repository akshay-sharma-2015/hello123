<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CasinoLikesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CasinoLikesController Test Case
 */
class CasinoLikesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.casino_likes',
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
        'app.casino_visits',
        'app.city_name_translation',
        'app.city_description_translation'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
