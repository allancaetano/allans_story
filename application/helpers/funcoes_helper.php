<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function limpar($string) {
    $string = preg_replace('/[´^~\'"]/', NULL, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
    $string = strtolower($string);
    $string = str_replace(" ", "-", $string);
    $string = str_replace("---", "-", $string);
    return $string;
}

function reais($decimal) {
    return "R$ " .  number_format($decimal, 2, ",", ".");
}

function dataBr_to_dataMySQL($data) {
    if ($data == "") {
        return "";
    } else {
        $campos = explode("/", $data);
        return date("Y-m-d", strtotime($campos[2] . "-" . $campos[1] . "-" . $campos[0]));
    }
}

function dataMySQL_to_dataBr($data) {
    if ($data == "0000-00-00") {
        return "";
    } else{
        return date("d/m/Y", strtotime($data));
    }
}

