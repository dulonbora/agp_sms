<?php

class DateSetter {
    
        public function date($dt) {
        $daaat = date('d-m-Y', $dt);
        $date = "";
        $category = "";
        $ddt = explode('-', $daaat);
        switch ($ddt[1]) {
            case 1: $category = "Jan";
                break;
            case 2: $category = "Feb";
                break;
            case 3: $category = "Mar";
                break;
            case 4: $category = "Apr";
                break;
            case 5: $category = "May";
                break;
            case 6: $category = "Jun";
                break;
            case 7: $category = "Jul";
                break;
            case 8: $category = "Aug";
                break;
            case 9: $category = "Sep";
                break;
            case 10: $category = "Oct";
                break;
            case 11: $category = "Nov";
                break;
            default : $category = "Dec";
        }
        $date = $category . " " . $ddt[0] . " " . $ddt[2];
        return $date;
    }

    public function dateFromat($dt) {
        $daaat = date('d-m-Y', $dt);
        $date = "";
        $category = "";
        $ddt = explode('-', $daaat);
        switch ($ddt[1]) {
            case 1: $category = 01;
                break;
            case 2: $category = 02;
                break;
            case 3: $category = 03;
                break;
            case 4: $category = 04;
                break;
            case 5: $category = 05;
                break;
            case 6: $category = 06;
                break;
            case 7: $category = 07;
                break;
            case 8: $category = 08;
                break;
            case 9: $category = 09;
                break;
            case 10: $category = 10;
                break;
            case 11: $category = 11;
                break;
            default : $category = 12;
        }
        $date = $ddt[0] . "/" . $category . "/" . $ddt[2];
        return $date;
    }
}
