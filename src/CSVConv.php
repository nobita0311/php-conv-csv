<?php

namespace nobita0311;

use nobita0311\CSVConv\Provider\HTML;

class CSVConv {

    private $to = 'html';
    private $csv;

    public function __construct($csv = null) {

        if ($csv) {
            $this->csv = $csv;
            return $this->toHTML();
        }
        return $this;
    }

    public function set_csv($csv) {
        if ($this->is_csv($csv)) {
            $this->csv = $csv;
        }
    }

    private function is_csv($csv) {
        $flg = false;

        $file = 'php://memory';
        //$file = 'php://temp/maxmemory:1048576';
        $obj = new \SplFileObject($file, 'w+');
        $obj->setFlags(\SplFileObject::READ_CSV);
        $obj->fwrite($csv);

        foreach ($obj as $line) {
            if (is_array($line) && isset($line[0])) {
                $flg = true;
                break;
            }
        }

        return $flg;
    }

    private function csv() {
        $file = 'php://memory';
        $obj = new \SplFileObject($file, 'w+');
        $obj->fwrite($this->csv);
        $obj->setFlags(\SplFileObject::READ_CSV);

        $array = array();
        foreach ($obj as $line) {
            $array[] = $line;
        }
        return $array;
    }

    public function toHTML() {

        $array = $this->csv($this->csv);

        $html = new HTML($array);

        return $html->conv($array);
    }

}
