<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BW9zdF9wb3B1bGFyX2Nhc2lub3MFixture
 *
 */
class BW9zdF9wb3B1bGFyX2Nhc2lub3MFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'b_w9zd_f9wb3_b1b_g_fy_x2_nhc2lub3_m';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'aWQ=' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Y2FzaW5vX2lk' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dGV4dA==' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'aW1hZ2U=' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'dXJs' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['aWQ='], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'aWQ=' => 1,
            'Y2FzaW5vX2lk' => 1,
            'dGV4dA==' => 'Lorem ipsum dolor sit amet',
            'aW1hZ2U=' => 'Lorem ipsum dolor sit amet',
            'dXJs' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
