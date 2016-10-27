<?php


class Post
{
    public $Image;
    public $Description;
    public $DATE;
    public $Header;

    public function __construct($Image,$Description,$DATE, $Header)
    {
        $this->Image = $Image;
        $this->Description = $Description;
        $this->DATE = $DATE;
        $this->Header = $Header;
    }


}

class Contacts
{
    public $Address;
    public $description;
    public $email;
    public $Phone;

    public function __construct($Address,$description,$email, $Phone)
    {
        $this->Address = $Address;
        $this->description = $description;
        $this->email = $email;
        $this->Phone = $Phone;
    }


}

class Product {
    public $name;
    public $price;
    public $description;
    public $color;
    public $size;
    public $category;
    public $images;
    public $stock;
    public $tags;
    public $manufacture;

    public function __construct($name,$price,$description,$color,$size, $category, $images, $stock, $tags, $manufacture)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->color = $color;
        $this->size = $size;
        $this->category = $category;
        $this->images = $images;
        $this->stock = $stock;
        $this->tags = $tags;
        $this->manufacture = $manufacture;
    }
}

class Product_admin {
    public $Product_ID;
    public $name;
    public $price;
    public $description;
    public $manufacture;
    public $color;
    public $size;
    public $category;
    public $stock;
    public $tags;



    public function __construct($Product_ID, $name,$price,$description,$manufacture,$color,$size, $category, $stock, $tags)
    {
        $this->Product_ID = $Product_ID;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->manufacture = $manufacture;
        $this->color = $color;
        $this->size = $size;
        $this->category = $category;
        $this->stock = $stock;
        $this->tags = $tags;

    }
}