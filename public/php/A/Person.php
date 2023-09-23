<?php
namespace A;

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
        echo __CLASS__;

    }


    public function setName($name){
        return $this->name=$name;
    }



    public static function setCountry($coun){
        $kok = self::Male;;

        self::$country=$coun;

    }
    public  function  getName(){
        return $this->name;
    }

}
