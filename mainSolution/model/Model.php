<?php

include_once("model/Construct.php");
include_once ("model/Database.php");

 class Model {

     function Connect(){

         $db = require('model/conn.php');
         $connection = new Database($db);
         return $connection;
     }
	public function getProductList()
	{
        $proData = $this->Connect()->getData("SELECT * FROM products");


        return array(
                $proData['name'] => new Product(
                    $proData['name'],
                    $proData['price'],
                    $proData['description'],
                    $proData['color'],
                    $proData['size'],
                    $proData['category'],
                    $proData['images'],
                    $proData['stock'],
                    $proData['tags'],
                    $proData['manufacture']

                    )
                );


        }
     public function openNews(){

         $postData = $this->Connect()->getData("SELECT * FROM products");


         return array(
             $postData['Header'] => new Post(
                 $postData['Header'],
                 $postData['Image'],
                 $postData['Description'],
                 $postData['DATE']
             )
         );

    }

	public function getProduct($name)
	{
		// we use the previous function to get all the books and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allProducts = $this->getProductList();
		return $allProducts[$name];
	}

	
}
?>