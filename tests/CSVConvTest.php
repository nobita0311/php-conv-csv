<?php

namespace nobita0311\CSVConvTest;

use nobita0311\CSVConv;

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

        $this->assertInstanceOf("nobita0311\CSVConv", $this->CSVConv);
    }

    public function test_csv_to_html() {
        $csv = "1,2,3\n";
        $csv .= "a,b,c\n";
        $csv .= "4,5,6";
        $this->CSVConv->set_csv($csv);
        $html = $this->CSVConv->toHTML();

        $eq = '<table>'
                . '<thead><tr><th>1</th><th>2</th><th>3</th></tr></thead>'
                . '<tbody>'
                . '<tr><td>a</td><td>b</td><td>c</td></tr>'
                . '<tr><td>4</td><td>5</td><td>6</td></tr>'
                . '</tbody>'
                . '</table>'
        ;
        $this->assertEquals($html, $eq);
        $html = $this->CSVConv->toHTML(array("use_header" => false));

        $eq = '<table>'
                . '<tbody>'
                . '<tr><td>1</td><td>2</td><td>3</td></tr>'
                . '<tr><td>a</td><td>b</td><td>c</td></tr>'
                . '<tr><td>4</td><td>5</td><td>6</td></tr>'
                . '</tbody>'
                . '</table>'
        ;
        $this->assertEquals($html, $eq);
    }

}
