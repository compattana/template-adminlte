<?php

namespace App\Classes;

use Carbon\Carbon;

class DateTimeFormat {
    public static $time;
    public const year_plus = 543;

    public const thai_day_arr = ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์"];
    public const eng_day_arr = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

    public const thai_month_arr = [
        "0" => "",
        "1" => "มกราคม",
        "2" => "กุมภาพันธ์",
        "3" => "มีนาคม",
        "4" => "เมษายน",
        "5" => "พฤษภาคม",
        "6" => "มิถุนายน",
        "7" => "กรกฎาคม",
        "8" => "สิงหาคม",
        "9" => "กันยายน",
        "10" => "ตุลาคม",
        "11" => "พฤศจิกายน",
        "12" => "ธันวาคม",
    ];

    public const eng_month_arr = [
        "0" => "",
        "1" => "January",
        "2" => "Febuary",
        "3" => "March",
        "4" => "April",
        "5" => "May",
        "6" => "June",
        "7" => "July",
        "8" => "August",
        "9" => "September",
        "10" => "October",
        "11" => "November",
        "12" => "December",
    ];

    public function __construct($time = null)
    {
        if($time == null){
            self::$time = time();
        }else{
            self::$time = is_numeric($time) ? $time : strtotime($time);
        }
    }

    public static function make($time = null,$lang = 'th'): array
    {
        if($time == null){
            self::$time = time();
        }else{
            self::$time = is_numeric($time) ? $time : strtotime($time);
        }

        $data = [
            'date' => self::date(self::$time,$lang),
            'dateFull' => self::dateFull(self::$time,$lang),
            'dateTimeFull' => self::dateTimeFull(self::$time,$lang),
            'month' => self::month(self::$time,$lang),
            'monthYear' => self::monthYear(self::$time,$lang),
            'dateShort' => self::dateShort(self::$time,$lang),
            'dateTimeShort' => self::dateTimeShort(self::$time,$lang),
            'default' => Carbon::parse(self::$time)->format('Y-m-d H:i:s'),
            'timestamp' => self::$time
        ];

        return $data;
    }

    public static function date($time = null,$lang = 'th'): String
    {
        if($time == null){
            self::$time = time();
        }else{
            self::$time = is_numeric($time) ? $time : strtotime($time);
        }

        $date = date("j", self::$time);
        $date .= " " . ($lang == 'th' ? self::thai_month_arr[date("n", self::$time)] : self::eng_month_arr[date("n", self::$time)]);
        $date .= " " . (date("Y", self::$time) + ($lang == 'th' ? self::year_plus : 0));

        return $date;
    }

    public static function dateFull($time = null,$lang = 'th'): String
    {
        if($time == null){
            self::$time = time();
        }else{
            self::$time = is_numeric($time) ? $time : strtotime($time);
        }

        $date = ($lang == 'th' ? self::thai_day_arr[date("w", self::$time)] : self::eng_day_arr[date("w", self::$time)]);
        $date .= ($lang == 'th' ? " ที่ " : " ") . date("j", self::$time);
        $date .= " " . ($lang == 'th' ? self::thai_month_arr[date("n", self::$time)] : self::eng_month_arr[date("n", self::$time)]);
        $date .= ($lang == 'th' ? " พ.ศ. " : " ") . (date("Y", self::$time) + ($lang == 'th' ? self::year_plus : 0));

        return $date;
    }

    public static function dateTimeFull($time = null,$lang = 'th'): String
    {
        if($time == null){
            self::$time = time();
        }else{
            self::$time = is_numeric($time) ? $time : strtotime($time);
        }

        $date = ($lang == 'th' ? self::thai_day_arr[date("w", self::$time)] : self::eng_day_arr[date("w", self::$time)]);
        $date .= ($lang == 'th' ? " ที่ " : " ") . date("j", self::$time);
        $date .= " " . ($lang == 'th' ? self::thai_month_arr[date("n", self::$time)] : self::eng_month_arr[date("n", self::$time)]);
        $date .= ($lang == 'th' ? " พ.ศ. " : " ") . (date("Y", self::$time) + ($lang == 'th' ? self::year_plus : 0));
        $date .= ($lang == 'th' ? " เวลา " : " ") . (date("H", self::$time)) . ":";
        $date .= date("i", self::$time);

        return $date;
    }

    public static function dateShort($time = null,$lang = 'th'): String
    {
        if($time == null){
            self::$time = time();
        }else{
            self::$time = is_numeric($time) ? $time : strtotime($time);
        }

        $date = " " . date("j", self::$time);
        $date .= "/" . date("n", self::$time);
        $date .= "/" . (date("Y", self::$time) + ($lang == 'th' ? self::year_plus : 0));

        return $date;
    }

    public static function dateTimeShort($time = null,$lang = 'th'): String
    {
        if($time == null){
            self::$time = time();
        }else{
            self::$time = is_numeric($time) ? $time : strtotime($time);
        }

        $date = " " . date("j", self::$time);
        $date .= "/" . date("n", self::$time);
        $date .= "/" . (date("Y", self::$time) + ($lang == 'th' ? self::year_plus : 0));
        $date .= " " . (date("H", self::$time)) . ":";
        $date .= date("i", self::$time);

        return $date;
    }

    public static function time($time = null): String
    {
        if($time == null){
            self::$time = time();
        }else{
            self::$time = is_numeric($time) ? $time : strtotime($time);
        }

        return (date("H", self::$time)) . ":" . date("i", self::$time);
    }

    public static function month($time = null,$lang = 'th'): String
    {
        if($time == null){
            self::$time = time();
        }else{
            self::$time = is_numeric($time) ? $time : strtotime($time);
        }

        $date = ($lang == 'th' ? self::thai_month_arr[date("n", self::$time)] : self::eng_month_arr[date("n", self::$time)]);

        return $date;
    }

    public static function monthYear($time = null,$lang = 'th'): String
    {
        if($time == null){
            self::$time = time();
        }else{
            self::$time = is_numeric($time) ? $time : strtotime($time);
        }

        $date = ($lang == 'th' ? self::thai_month_arr[date("n", self::$time)] : self::eng_month_arr[date("n", self::$time)]);
        $date .= " " . (date("Y", self::$time) + ($lang == 'th' ? self::year_plus : 0));

        return $date;
    }

    public function getDayName($d,$lang = 'th'): String
    {
        return ($lang == 'th' ? self::thai_day_arr[$d] : self::eng_day_arr[$d]);
    }

    public function getMonthName($m,$lang = 'th'): String
    {
        return ($lang == 'th' ? self::thai_month_arr[$m] : self::eng_month_arr[$m]);
    }

    public static function fullYear($time = null,$lang = 'th'): String
    {
        if($time == null){
            self::$time = time();
        }else{
            self::$time = is_numeric($time) ? $time : strtotime($time);
        }

        $date = date("Y", self::$time);

        return $date;
    }

}
