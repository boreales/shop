<?php

class Product{
    private $name;
    private $description;
    private $price;
    private $stock;

    public function __construct(){}

    public function setName($name){
        $this->name = $name;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getStock(){
        return $this->stock;
    }
}
