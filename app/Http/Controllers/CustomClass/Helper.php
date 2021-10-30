<?php
namespace App\Http\Controllers\CustomClass;

use Illuminate\Http\Request;


class Helper
{
    public static $domain = 'https://demo.aggademo.me/MAC/public/index.php/api';
    public static $BASE_URL = 'https://demo.aggademo.me/MAC/public';
    // public static $domain="http://localhost:8000/api";


    public function en2mmNumber($number)
    {
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $my = ['၀','၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];

        return str_replace($en, $my, $number);
    }   
}