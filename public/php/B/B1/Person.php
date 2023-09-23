<?php

namespace B\B1;

class Person{
    use \Info\Info;
    public $name;
    protected $gender;
    private $age;
    public static $country;
    const Femail="f";
    const Male = "m";


    public function __construct()
    {

    }



    public static function setCountry($coun){
        $kok = self::Male;;

        self::$country=$coun;

    }

}
