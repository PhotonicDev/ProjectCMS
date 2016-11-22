<?php

include_once("model/Construct.php");
include_once ("model/Database.php");
include_once("view/error_view/note.php");


 class Model {
     public function Daily(){
         $daily = $this->Connect()->getQuery("SELECT *   
                                    FROM products AS p, daily_product AS d 
                                    WHERE p.Product_ID = d.Product_ID LIMIT 5");
         return $daily;
     }
     public function most_viewed(){
         $viewed = $this->Connect()->getQuery("SELECT * FROM products ORDER BY views DESC LIMIT 5");
         return $viewed;
     }
     public function most_liked(){
         $liked = $this->Connect()->getQuery("SELECT * FROM products ORDER BY upVote DESC LIMIT 5");
         return $liked;
     }
     public function updateUserProfile($first,$last,$address, $birth){
     $userID = $_SESSION['user_id'];
         $this->Connect()->getNothing("UPDATE `customers` 
                                                SET `firstName` ='" . $first . "',
                                                `lastName` ='" . $last . "',
                                                `Address` = '" . $address . "',
                                                `birth` ='" . $birth . "'
                                                WHERE `customer_id` = " . $userID);
         return;
     }
     public function changePass($current, $new) {
        $result = $this->Connect()->getQuery("SELECT `customer_id`, `name`, `password` FROM `customers` WHERE customer_id = '{$_SESSION['user_id']}' AND name = '{$_SESSION['username']}' LIMIT 1");
         if(mysqli_num_rows($result) == 1) {
             $pass = mysqli_fetch_array($result);
             if(password_verify($current, $pass['password'])){
                 $iterations = ['cost' => 10]; // encrypting password - hashing it 10 times
                 $hashed = password_hash($new, PASSWORD_BCRYPT, $iterations);
                 //insert results from the form input
                 $this->Connect()->getNothing("UPDATE `customers` SET `password` = '" . $hashed . "' WHERE `customer_id` = ". $_SESSION['user_id']);
                    note("Password changed!");
             }
             else {
                 error('password doesint match!');
             }

         }

     }
     public function Carousel() {
         $post = $this->Connect()->getQuery("SELECT * FROM `newspage` LIMIT 5 ");
         return $post;
     }
     public function postComment($user,$comment){
         $cUser = htmlspecialchars($user);
         $cComment = htmlspecialchars($comment);
         $_SESSION['username'] = $cUser;

         $userCheck = $this->Connect()->getQuery("SELECT `customer_id`, `name`, `password` FROM `customers` WHERE `name` = '{$cUser}' LIMIT 1");
         if (mysqli_num_rows($userCheck) == 1) {
             error("Someone has already used this name ,please user other name");
         }
         else {

             $userLocation = $_SESSION["LOC"][1];
             $check = $this->Connect()->getNothing("INSERT INTO `social_pages`( `Product_ID`, `Likes` , `Comments`, `views`,`name`) VALUES ('$userLocation', 0 ,' $cComment ', 0 ,'$cUser')");
             //reload
             note("success!!!");
         }

         return "bla";
     }

     public function post_news($filepath,$text,$header){

         $query = "INSERT INTO `newspage` (`Page_ID`, `Image`, `Description`, `DATE`, `Header`) VALUES (NULL, '$filepath', '$text', NOW(), '$header')";

         $this->Connect()->getNothing($query);
         note("New post created !");
     }

     public function update_news($filepath,$update_desc,$update_header,$Page_ID){

         $query ="UPDATE `newspage` SET `Image` = '$filepath', `Description` = '$update_desc', `DATE` = NOW(), `Header` = '$update_header' WHERE `newspage`.`Page_ID` = '$Page_ID'";

         $this->Connect()->getQuery($query);
         note("Post updated !");
     }

     public function update_news_noimage($update_desc,$update_header,$Page_ID){

         $query ="UPDATE `newspage` SET `Description` = '$update_desc', `DATE` = NOW(), `Header` = '$update_header' WHERE `newspage`.`Page_ID` = '$Page_ID'";

         $this->Connect()->getQuery($query);
         note("Post updated !");

     }


     public function delete_news ($Page_ID){

         $query = "DELETE FROM `newspage` WHERE `Page_ID` = '$Page_ID'";

         $this->Connect()->getNothing($query);
         note("Post Deleted !");

     }

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
        $proData = $this->Connect()->getQuery("SELECT * FROM products LIMIT 16");

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
                    note("Logged in");
                    include "view/after.php";
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
     public function getProductById($id)
     {
         $allProducts = $this->getProductList();
         if (mysqli_num_rows($allProducts) > 0) {
             $proData = $this->Connect()->getQuery("SELECT * FROM products WHERE `Product_ID`  = '{$id}' LIMIT 1");
             return $proData;
         }
     }

     public function userProfile() {
         $user = $_SESSION['user_id'];
        $userData = $this->Connect()->getQuery("SELECT `customer_id`, `name`, `email`, `firstName`, `lastName`, `Address`, `birth` FROM `customers` WHERE `customer_id` = '{$user}' LIMIT 1");
         return $userData;
     }
     public function Register($username,$password,$email) {

            $check = $this->Connect()->getQuery("SELECT `password` FROM `customers` WHERE `name` = '$username' AND `email` = '$email'");

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

        public function contactPage(){
           $contact = $this->Connect()->getQuery('SELECT * FROM contact_info LIMIT 1');
            return $contact;
        }
        public function description(){
            $des = $this->Connect()->getQuery("SELECT * FROM company_desc LIMIT 1");
            return $des;
        }


        public function openNews() {

            $postData = $this->Connect()->getQuery("SELECT * FROM newspage");
            return $postData;

    }

	    public function getProduct($id)
	{
		// we use the previous function to get all the books and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allProducts = $this->getProductList();
         if (mysqli_num_rows($allProducts) > 0) {
             $pro = $this->Connect()->getQuery("SELECT `views` FROM products WHERE `Product_ID`  = '{$id}' LIMIT 1");
            $view = mysqli_fetch_array($pro);
            $viewValue =  $view['views'] + 1;
               $this->Connect()->getQuery("UPDATE `products` SET `views` ='{$viewValue}' WHERE `Product_ID` ='{$id}'");

             $proData = $this->Connect()->getQuery("SELECT `name`,`price`,`description`,`color`,`size`,`material`,`images`,`stock`,`tags`,`manufacture`,`views`,`upVote`,`Product_ID` FROM products WHERE `Product_ID`  = '{$id}' LIMIT 1");

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
                    include_once "view/admin_views/content.php";
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

     //READ
     public function company_description(){

         $proDesc = $this->Connect()->getQuery("SELECT * FROM company_desc");

         return $proDesc;

     }

     public function get_contacts() {

         $proCont = $this->Connect()->getQuery("SELECT * FROM contact_info");

         return $proCont;



     }

     // INSERT PRODUCTS





     public function Add_products($name,$price,$description,$manufacture,$color,$size,$material,$stock,$tags,$filepath){





             $query = "INSERT INTO `products`(name, price, description, manufacture, color, size, material ,stock, tags, images,views,upVote)
                                  VALUES ('$name', '$price', '$description', '$manufacture', '$color', '$size', '$material','$stock', '$tags','$filepath','0','0')";

         if($this->Connect() == false){

             echo "<div class=\"alert alert-danger\" role=\"alert\">
  <a href=\"#\" class=\"alert-link\">Failed to insert data or did not connected to database</a>
</div>";
         }
         else{
             echo"<div  class=\"alert alert-success\">
  <strong>Success!</strong> New data has been added/created !.
</div>";
         }

         $this->Connect()->getNothing($query);





     }

       // UPDATE COMPANY DESCRIPTION
     public function company_desc($title,$description,$filepath){

         $query_company = "UPDATE `company_desc` SET `title` ='" . $title. "', `Description`='" .$description. "', `pictures`='" .$filepath. "'  WHERE `id` = 1" ;

         $this->Connect()->getNothing($query_company);
     }

     public function company_desc_noimage($title,$description){

         $query_company = "UPDATE `company_desc` SET `title` ='" . $title. "', `Description`='" .$description. "'  WHERE `id` = 1" ;

         $this->Connect()->getNothing($query_company);
     }
     // UPDATE contact info
     public function contact_update($Street,$description,$email,$city,$country,$Phone,$zipcode,$monday,$tuesday,$wednesday,$thursday,$friday,$saturday,$sunday)
     {

         $query_contact = "UPDATE `contact_info` 
      SET `Street` ='" . $Street . "',
      `description`='" . $description . "',
      `email`='" . $email . "',
      `city`='" . $city . "',
      `country`='" . $country . "',
      `Phone`='" . $Phone . "',
      `zipcode`='" . $zipcode . "',
      `monday`='" . $monday . "',
      `tuesday`='" . $tuesday . "',
      `wednesday`='" . $wednesday . "',
      `thursday`='" . $thursday . "',
      `friday`='" . $friday . "',
      `saturday`='" . $saturday . "',
      `sunday`='" . $sunday . "'
        WHERE `id` = 1 ";

         $this->Connect()->getNothing($query_contact);
             }


       // UPDATE PRODUCTS
        public function Update_products($Product_ID,$name,$price,$description,$manufacture,$color,$size,$material,$stock,$tags,$filepath){

            if($this->Connect() == false){

                echo "<div class=\"alert alert-danger\" role=\"alert\">
  <a href=\"#\" class=\"alert-link\">Failed to update or  connect to database</a>
</div>";
            }
            else{
                echo"<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been updated.
</div>";
            }

            $query = "UPDATE `products` SET `Product_ID` ='" . $Product_ID . "', `name` ='".$name. "', `price` = '".$price."', `description` ='".$description."', `manufacture` ='" . $manufacture . "', `color` = '" .$color. "', `size` ='" .$size. "', `material` ='".$material."', `stock` ='".$stock."', `tags` ='".$tags."', `images` ='".$filepath."' WHERE `Product_ID` =".$Product_ID;


        // $this->Connect()->getNothing("UPDATE `products` SET `Product_ID` =' . $Product_ID . ', `name` ='.$name.', `price` = '.$price.', `description` ='.$description.', `manifacture` ='.$manufacture.', `color` = '.$color.', `size` ='.$size.', `material` ='.$material.', `stock` ='.$stock.', `tags` ='.$tags.' WHERE `Product_ID` ='.$Product_ID.'")";

            $this->Connect()->getNothing($query);





     }

     public function Update_products_noimage($Product_ID,$name,$price,$description,$manufacture,$color,$size,$material,$stock,$tags){

         if($this->Connect() == false){

             echo "<div class=\"alert alert-danger\" role=\"alert\">
  <a href=\"#\" class=\"alert-link\">Failed to update or  connect to database</a>
</div>";
         }
         else{
             echo"<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been updated.
</div>";
         }

         $query = "UPDATE `products` SET `Product_ID` ='" . $Product_ID . "', `name` ='".$name. "', `price` = '".$price."', `description` ='".$description."', `manufacture` ='" . $manufacture . "', `color` = '" .$color. "', `size` ='" .$size. "', `material` ='".$material."', `stock` ='".$stock."', `tags` ='".$tags."' WHERE `Product_ID` =".$Product_ID;



         $this->Connect()->getNothing($query);





     }

     // DELETE PRODUCTS

     public function Delete_products($Product_ID){

         if($this->Connect() == false){

             echo" '<div class='alert alert-danger' role='alert'>
  <a href='#' class='alert-link'>Error , could not delete</a>
</div>";
         }
         else{
             echo"<div class='alert alert-success'>
  <strong>Success!</strong> Product has been deleted.
</div>";
         }

         $query = "DELETE FROM products WHERE `Product_ID` =".$Product_ID;
         $this->Connect()->getNothing($query);
         echo"<div class='alert alert-success'>
  <strong>Success!</strong> Product has been deleted.
</div>";
     }


     public function delete_comments($comment_id){



         $query = "DELETE FROM `social_pages` WHERE `social_pages`.`comment_id` = $comment_id";
         $this->Connect()->getNothing($query);

     }


}

