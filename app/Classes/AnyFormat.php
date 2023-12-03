<?php

namespace App\Classes;

class AnyFormat {

    public static function textFormat(String $text = '', $pattern = '', $ex = ''): string
    {
        $cid = ($text == '') ? '0000000000000' : $text;
        $pattern = ($pattern == '') ? '_-____-_____-__-_' : $pattern;
        $p = explode('-', $pattern);
        $ex = ($ex == '') ? '-' : $ex;
        $first = 0;
        $last = 0;
        for ($i = 0; $i <= count($p) - 1; $i++) {
            $first = $first + $last;
            $last = strlen($p[$i]);
            $returnText[$i] = substr($cid, $first, $last);
        }

        return implode($ex, $returnText);
    }

    public static function moneyText(float $number): String
    {
        $number = number_format($number, 2, '.', '');
        $numberx = $number;
        $txtnum1 = ['ศูนย์', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า', 'สิบ'];
        $txtnum2 = ['', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน'];
        $number = str_replace(",", "", $number);
        $number = str_replace(" ", "", $number);
        $number = str_replace("บาท", "", $number);
        $number = explode(".", $number);
        if (sizeof($number) > 2) {
            return 'ทศนิยมหลายตัวนะจ๊ะ';
        }
        $strlen = strlen($number[0]);
        $convert = '';
        for ($i = 0; $i < $strlen; $i++) {
            $n = substr($number[0], $i, 1);
            if ($n != 0) {
                if ($i == ($strlen - 1) and $n == 1) {
                    $convert .= 'เอ็ด';
                } elseif ($i == ($strlen - 2) and $n == 2) {
                    $convert .= 'ยี่';
                } elseif ($i == ($strlen - 2) and $n == 1) {
                    $convert .= '';
                } else {
                    $convert .= $txtnum1[$n];
                }
                $convert .= $txtnum2[$strlen - $i - 1];
            }
        }

        $convert .= 'บาท';
        if ($number[1] == '0' or $number[1] == '00' or
            $number[1] == '') {
            $convert .= 'ถ้วน';
        } else {
            $strlen = strlen($number[1]);
            for ($i = 0; $i < $strlen; $i++) {
                $n = substr($number[1], $i, 1);
                if ($n != 0) {
                    if ($i == ($strlen - 1) and $n == 1) {
                        $convert
                            .= 'เอ็ด';
                    } elseif ($i == ($strlen - 2) and
                        $n == 2) {
                        $convert .= 'ยี่';
                    } elseif ($i == ($strlen - 2) and
                        $n == 1) {
                        $convert .= '';
                    } else {
                        $convert .= $txtnum1[$n];
                    }
                    $convert .= $txtnum2[$strlen - $i - 1];
                }
            }
            $convert .= 'สตางค์';
        }
        //แก้ต่ำกว่า 1 บาท ให้แสดงคำว่าศูนย์ แก้ ศูนย์บาท
        if ($numberx < 1) {
            $convert = "ศูนย์" . $convert;
        }

        //แก้เอ็ดสตางค์
        $len = strlen($numberx);
        $lendot1 = $len - 2;
        $lendot2 = $len - 1;
        if (($numberx[$lendot1] == 0) && ($numberx[$lendot2] == 1)) {
            $convert = substr($convert, 0, -10);
            $convert = $convert . "หนึ่งสตางค์";
        }

        //แก้เอ็ดบาท สำหรับค่า 1-1.99
        if ($numberx >= 1) {
            if ($numberx < 2) {
                $convert = substr($convert, 4);
                $convert = "หนึ่ง" . $convert;
            }
        }

        return $convert;
    }
}
