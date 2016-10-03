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