<?php

/**
 * Created by PhpStorm.
 * User: stude
 * Date: 16-09-2016
 * Time: 02:40
 */
class Database
{
    protected $conn;


    public function __construct(mysqli $conn){
        $this->conn = $conn;
    }

    public function getConnection(){
    return $this->conn;
    }
    public function getData($query){
        $getData = $this->getConnection()->query($query);
        $getArray = $getData->fetch_array();
        return $getArray;
    }
    public function getQuery($query){
        $getData = $this->getConnection()->query($query);
        return $getData;
    }
    public function getNothing($query) {
        $this->getConnection()->query($query);
        return "succesfull";
    }
   /* function fetchProducts(){
        $getProducts = $this->getConnection()->query("SELECT * FROM products");

        $assocPro = $getProducts->fetch_array();
        return $assocPro;
    }
    function fetchNews() {
        $getNews = $this->getConnection()->query("SELECT * FROM news");

        $objectNews = $getNews->fetch_array();
        return $objectNews;
    }*/

}
