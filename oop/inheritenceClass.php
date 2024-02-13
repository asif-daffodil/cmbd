<?php
class myGrandpa
{
    public $grandpaName = "Grandpa";
}

class myFather extends myGrandpa
{
    public $fatherName = "Father";

    public function myGurdience()
    {
        return $this->grandpaName . " " . $this->fatherName;
    }
}

$obj = new myFather;
echo $obj->myGurdience();
