<?php

namespace nobita0311\CSVConv\Provider;

class HTML {

    private $csv;
    private $setting;
    private $use_header = true;

//    private $template;

    function __construct($setting) {
        $this->setting = $setting;
    }

    function conv($csv) {
        $this->csv = $csv;

        $html = '<table>';
        $count = count($this->csv);
        foreach ($this->csv as $key => $line) {
            if ($this->use_header && !$key) {
                $html .= '<thead>';
                $html .= '<tr>';
                foreach ($line as $value) {
                    $html .= "<th>{$value}</th>";
                }
                $html .= '</tr>';
                $html .= '</thead>';
            } else {
                if ($key == 1) {
                    $html .= '<tbody>';
                }
                $html .= '<tr>';
                foreach ($line as $value) {
                    $html .= "<td>{$value}</td>";
                }
                $html .= '</tr>';
                if ($key == $count - 1) {
                    $html .= '</tbody>';
                }
            }
        }
        $html .= '</table>';

        return $html;
    }

}
