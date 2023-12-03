<?php

namespace App\Classes;

use App\Models\District;
use App\Models\Province;
use App\Models\SubDistrict;

class GenerateData {

    public static function provinceCode(): string
    {
        $code = (Int) Province::orderByDesc('code')->withTrashed()->first()->code + 1;
        // $seller_code_str_str = str_pad($seller_code_str, 6, '0', STR_PAD_LEFT);

        return $code;
    }

    public static function districtCode($province_id): string
    {
        $code = (Int) District::where('province_id',$province_id)->orderByDesc('code')->withTrashed()->first()->code + 1;
        // $seller_code_str_str = str_pad($seller_code_str, 6, '0', STR_PAD_LEFT);

        return $code;
    }

    public static function subDistrictCode($district_id): string
    {
        $code = (Int) SubDistrict::where('district_id',$district_id)->orderByDesc('code')->withTrashed()->first()->code + 1;
        // $seller_code_str_str = str_pad($seller_code_str, 6, '0', STR_PAD_LEFT);

        return $code;
    }

    public static function rgb(): String
    {
        $r = mt_rand(0, 255);
        $g = mt_rand(0, 255);
        $b = mt_rand(0, 255);
        return "rgba($r,$g,$b)";
    }

    public static function rgba(): String
    {
        $r = mt_rand(0, 255);
        $g = mt_rand(0, 255);
        $b = mt_rand(0, 255);
        $a = mt_rand(0, 1);
        return "rgba($r,$g,$b,$a)";
    }

}
