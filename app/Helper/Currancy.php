<?php

namespace App\Helper;

use NumberFormatter;
class Currancy
{


    public static function format($amount,$currency=null){

        $formatter=new NumberFormatter(config("app.local"),NumberFormatter::CURRENCY);
        if ($currency===null){
            $currency=config("app.currancy","USD");
        }
        return $formatter->formatCurrency($amount,$currency);
}
}
