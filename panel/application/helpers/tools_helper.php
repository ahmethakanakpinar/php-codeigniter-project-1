<?php 
    function CharConvert($string) {
        $search = array('ç', 'Ç', 'ğ', 'Ğ', 'ı', 'İ', 'ö', 'Ö', 'ş', 'Ş', 'ü', 'Ü');
        $replace = array('c', 'C', 'g', 'G', 'i', 'I', 'o', 'O', 's', 'S', 'u', 'U');
        $string = str_replace($search, $replace, $string);
        $string = preg_replace('/[^a-zA-Z0-9]/', '-', $string);
        return  strtolower($string);
    }
    function get_readable_date($date)
    {
        $turkish_date = date('d F Y', strtotime($date));
        return $turkish_date;
    }