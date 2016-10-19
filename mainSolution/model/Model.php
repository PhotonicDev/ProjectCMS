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
        public function Login($username,$password){

        $check = $this->Connect()->getQuery("SELECT `customer_id`, `name`, `password` FROM `customers` WHERE `name` = '{$username}' LIMIT 1");

            if (mysqli_num_rows($check) == 1) {
                // username/password authenticated
                // and only 1 match
                $found_user = mysqli_fetch_array($check);
                if(password_verify($password, $found_user['password'])){
                    $_SESSION['user_id'] = $found_user['customer_id'];
                    $_SESSION['username'] = $found_user['name'];
                    $products = $this->getProductList();
                    include_once "view/productpage.php";
                   // header("Refresh:0; url=bussiness%20logic%20cms/mainSolution/index.php");
                   // header("Location: /bussiness%20logic%20cms/mainSolution/index.php");
                } else {
                    // username/password combo was not found in the database
                    $message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
                    echo $message;
                }}
                 else { // Form has not been submitted.
            if (isset($_GET['logout']) && $_GET['logout'] == 1) {
                    $message = "You are now logged out.";
 }
}

if (isset($connection)){mysqli_close($connection);}
        }
        public function Register($username,$password,$email) {
            $check = $this->Connect()->getQuery("SELECT * FROM `customers` WHERE `name` = '$username' AND `email` = '$email'");

            $rowResult = mysqli_num_rows($check);

            $regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";

            if(preg_match($regexp, $_POST['email'])){

                if($rowResult > 0) {
                    echo "This user already exists";
                } else {

                    $iterations = ['cost' => 10]; // encrypting password - hashing it 10 times
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
                    //insert results from the form input
                    $check = $this->Connect()->getNothing("INSERT INTO `customers`( `name`, `password` , `email`) VALUES ('$username', '$hashed_password', '$email')");

                    echo "New user successfully created!";

                }

            }

            else{

                echo "Your ". "<b> " .$_POST['email'] . "</b> " . " "."email is not correct";

            }

        }
        public function openNews() {

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

	    public function loginAdmin($adminName,$adminPassword)
        {

            $check = $this->Connect()->getQuery("SELECT `admin_id`, `name`, `password` FROM `admin` WHERE `name` = '{$adminName}' LIMIT 1");

            if (mysqli_num_rows($check) == 1) {
                // username/password authenticated
                // and only 1 match
                $found_user = mysqli_fetch_array($check);
                if ($adminPassword == $found_user['password']) {
                    $_SESSION['admin_id'] = $found_user['admin_id'];
                    $_SESSION['admin_name'] = $found_user['name'];
                    include_once "view/content.php";
                } else {
                    // username/password combo was not found in the database
                    $message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
                    echo $message;
                }
            } else { // Form has not been submitted.
                if (isset($_GET['logout']) && $_GET['logout'] == 1) {
                    $message = "You are now logged out.";
                }
            }
        }



        // ADMIN PANEL

     public function getAdminProductList(){

         $proData = $this->Connect()->getData("SELECT * FROM products");


         return array(
             $proData['name'] => new Product_admin(
                 $proData['Product_ID'],
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
}
