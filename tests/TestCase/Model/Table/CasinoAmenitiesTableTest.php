<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CasinoAmenitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CasinoAmenitiesTable Test Case
 */
class CasinoAmenitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CasinoAmenitiesTable
     */
    public $CasinoAmenities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.casino_amenities',
        'app.casinos',
        'app.casino_amenity',
        'app.casino_gambling_option',
        'app.masters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CasinoAmenities') ? [] : ['className' => 'App\Model\Table\CasinoAmenitiesTable'];
        $this->CasinoAmenities = TableRegistry::get('CasinoAmenities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CasinoAmenities);

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
