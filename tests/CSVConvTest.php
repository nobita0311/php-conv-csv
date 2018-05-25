<?php

namespace nobita0311\CSVConvTest;

use nobita0311\CSVConv\CSVConv;

/**
 * Class CollectionTest
 * @package CollectionTest
 */
class CSVConvTest extends \PHPUnit_Framework_TestCase {

    function __construct($name = null, array $data = array(), $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->CSVConv = new CSVConv();
    }

    /**
     * @test
     */
    public function test_dummy() {
//        $this->assertInstanceOf("nobita0311\CSVConv\CSVConv", $this->CSVConv);
    }

}
