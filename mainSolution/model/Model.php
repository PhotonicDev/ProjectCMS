<?php

include_once("model/Construct.php");
include_once ("model/Database.php");
include_once("view/error_view/note.php");


 class Model {
        public function searchProducts($search) {

         $result = $this->Connect()->getQuery("SELECT * FROM products WHERE name LIKE '%" . $search . "%'");
             return $result;
     }
        function Connect(){

         $db = require('model/conn.php');
         $connection = new Database($db);
         return $connection;
     }
	    public function getProductList()
	{
        $proData = $this->Connect()->getQuery("SELECT * FROM products");

            return $proData;

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
                    note("Logged in");
                   // header("Refresh:0; url=bussiness%20logic%20cms/mainSolution/index.php");
                   // header("Location: /bussiness%20logic%20cms/mainSolution/index.php");
                } else {
                    // username/password combo was not found in the database
                    error("Username/password combination incorrect.
					Please make sure your caps lock key is off and try again.");
                }}
                 else { // Form has not been submitted.
            if (isset($_GET['logout']) && $_GET['logout'] == 1) {
                    note("You are now logged out.");
 }
}

if (isset($connection)){mysqli_close($connection);}
        }
        public function getComments($id){
                $comments = $this->Connect()->getQuery("SELECT * FROM social_pages WHERE `Product_ID` = '{$id}' LIMIT 50");
                return $comments;
        }
        public function Register($username,$password,$email) {

            $check = $this->Connect()->getQuery("SELECT * FROM `customers` WHERE `name` = '$username' AND `email` = '$email'");

            $rowResult = mysqli_num_rows($check);

            $regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";

            if(preg_match($regexp, $_POST['email'])){

                if($rowResult > 0) {
                    error("This user already exists");
                } else {

                    $iterations = ['cost' => 10]; // encrypting password - hashing it 10 times
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
                    //insert results from the form input
                    $check = $this->Connect()->getNothing("INSERT INTO `customers`( `name`, `password` , `email`) VALUES ('$username', '$hashed_password', '$email')");

                    note("New user successfully created!");

                }

            }

            else{

                error("Your " .$_POST['email'] . "email is not correct");

            }

        }
        public function openNews() {

         $postData = $this->Connect()->getData("SELECT * FROM newspage");


         return array(
             $postData['Header'] => new Post(
                 $postData['Header'],
                 $postData['Image'],
                 $postData['Description'],
                 $postData['DATE']
             )
         );

    }
        public function Contacts() {

         $postData = $this->Connect()->getData("SELECT * FROM contact_info");


         return array(
             $postData['Address'] => new Post(
                 $postData['Address'],
                 $postData['description'],
                 $postData['email'],
                 $postData['Phone']
             )
         );

     }
	    public function getProduct($name)
	{
		// we use the previous function to get all the books and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allProducts = $this->getProductList();
         if (mysqli_num_rows($allProducts) > 0) {
             $proData = $this->Connect()->getQuery("SELECT * FROM products WHERE `name`  = '{$name}' LIMIT 1");
             return $proData;

         }
	}
	    public function loginAdmin($adminName,$adminPassword)
        {

            $check = $this->Connect()->getQuery("SELECT `admin_id`, `name`, `password` FROM `admin` WHERE `name` = '{$adminName}' LIMIT 1");

            if (mysqli_num_rows($check) == 1) {
                // username/password authenticated
                // and only 1 match
                $found_user = mysqli_fetch_array($check);

                if (password_verify($adminPassword,$found_user['password'])) {
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

       // UPDATE PRODUCTS
        public function Update_products($Product_ID,$name,$price,$description,$manufacture,$color,$size,$category,$stock,$tags){

            $query = "UPDATE `products` SET `Product_ID` ='" . $Product_ID . "', `name` ='".$name. "', `price` = '".$price."', `description` ='".$description."', `manufacture` ='" . $manufacture . "', `color` = '" .$color. "', `size` ='" .$size. "', `category` ='".$category."', `stock` ='".$stock."', `tags` ='".$tags."' WHERE `Product_ID` =".$Product_ID;


        // $this->Connect()->getNothing("UPDATE `products` SET `Product_ID` =' . $Product_ID . ', `name` ='.$name.', `price` = '.$price.', `description` ='.$description.', `manifacture` ='.$manufacture.', `color` = '.$color.', `size` ='.$size.', `category` ='.$category.', `stock` ='.$stock.', `tags` ='.$tags.' WHERE `Product_ID` ='.$Product_ID.'")";

            $this->Connect()->getNothing($query);

             echo "<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been updated.
</div>";



     }

     // DELETE PRODUCTS

     public function Delete_products($Product_ID){

         $query = "DELETE FROM products WHERE `Product_ID` =".$Product_ID;
         $this->Connect()->getNothing($query);
         
     }


}

