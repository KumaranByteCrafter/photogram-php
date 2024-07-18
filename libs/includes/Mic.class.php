<?php

class Mic
{
    private $brand;
    public $color;
    public $usb_port;
    public $model;
    private $light;
    public $price;
    public static $test;
    public function __call($name,$arguments){
        print("\nCalling : $name<br>");
        print_r($arguments);
        print("<br>");
    }
    public static function testfunction(){
        print("this is a static function  this can be run without object initialization");
    }
    public function __construct($brand)
    {
        printf("constructing object..");
        $this->brand=ucwords($brand);
        Mic::testfunction();
    }
    public function setLight($light){
        $this->light = $light;
    }
    public function getBrand(){
        return $this->brand;
    }
    private function getModel(){
        return $this->model;
        
    }
    public function setModel($model){
        $this->model = ucwords($model);
    }
    public function getModelproxy(){
        return $this->getModel();
    }
    public function __destruct()//when the file or execution end then only it destruct work
    {
        print("destruct object..");
    }
}
