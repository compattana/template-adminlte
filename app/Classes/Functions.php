<?php

use App\Classes\AnyFormat;
use App\Classes\Breadcrumb;
use App\Classes\CodeCrypt;
use App\Classes\DateTimeFormat;
use App\Classes\GenerateData;
use App\Models\Setting;
use Carbon\Carbon;

if(!function_exists('textFormat')) {
    function textFormat(String $text = '', $pattern = '', $ex = '') {
        return AnyFormat::textFormat($text,$pattern,$ex);
    }
}

if(!function_exists('numberText')) {
    function numberText($amount) {
        return AnyFormat::moneyText($amount);
    }
}

if(!function_exists('formatDate')){
    function formatDate() {
        return new DateTimeFormat();
    }
}

if(!function_exists('generate')){
    function generate() {
        return new GenerateData();
    }
}

if(!function_exists('carbon')){
    function carbon() {
        return new Carbon();
    }
}

if(!function_exists('breadcrumbs')){
    function breadcrumbs(array $items = []){
        session()->forget('breadcrumbs');
        session()->put('breadcrumbs',$items);
    }
}



