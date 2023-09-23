<?php


class Fasad{


    public static function __callStatic($name, $arguments)
    {
        $person= ServicesContainer::make("person");
     return  $person->$name(...$arguments);
    }
}
