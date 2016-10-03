<?php
include_once("model/Model.php");

class Controller {
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();

    } 
	
	public function invoke()
	{

		if (!isset($_GET['product']))
		{
		    if(!isset($_GET['page'])){
                // no special book is requested, we'll show a list of all available books
                $products = $this->model->getProductList();
                include 'view/productpage.php';

            }
			else {
			    switch($_GET['page']) {
                    Default;
                        include("index.php");
                        Break;
                    case ("news");
                        include("view/newspage.php");
                        Break;

                }
            }




        }
		else {
            $product = $this->model->getProduct($_GET['product']);
            include 'view/viewproduct.php';
        }


    }
}

?>