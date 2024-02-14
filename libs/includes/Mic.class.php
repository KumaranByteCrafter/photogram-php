<?php

use phpDocumentor\Reflection\Types\This;

class Mic
{
    public $brand;
    public $color;
    public $usb_port;
    public $model;
    private $light;
    public $price;
    public function setLight($light){
        $this->light = $light;
        print($this->light .  "\n");
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
}
