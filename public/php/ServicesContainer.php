<?php



class ServicesContainer{
    protected static $container=[];

    public static function  blind($name,$instance){

        self::$container[$name]=$instance;
}

    public static function make($name){
            return self::$container[$name];
    }

}
