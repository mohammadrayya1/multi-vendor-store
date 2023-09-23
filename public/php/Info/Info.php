<?php
namespace Info;

trait Info{


    public function getAge(){
        return $this->age;
    }

    public function setAge($age){
        $this->age = $age;
        return $this;

    }

    public function  setGender($gender){
        $this->gender=$gender;
        return $this;
    }
}
