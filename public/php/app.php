<?php

include __DIR__ .'/autoload.php';
use A\Person;


    $person =new   Person();
    $person->setName("Mohammad");
    ServicesContainer::blind('person',$person);
   echo Fasad::getName();
?>
