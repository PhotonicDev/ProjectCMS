<?php
include_once("model/Model.php");
include_once("view/error_view/note.php");

class Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function invoke()
    {


        if (!empty($_POST)) {
            switch ($_POST) {
                default:
                    $this->homePage();
                    break;
                case isset($_POST['login']);
                    $this->model->Login($_POST['username'], $_POST['password']);

                    break;
                case isset($_POST['register']);
                    $this->model->Register($_POST['username'], $_POST['password'], $_POST['email']);
                    break;
                case isset($_POST['submit_comment']);
                    if(!empty($_POST['postName']) && !empty($_POST['comment'])) {
                        $this->model->postComment($_POST['postName'], $_POST['comment']);
                        $productSelected = $this->model->getProductById($_SESSION['LOC'][1]);
                        include 'view/viewproduct.php';
                    }
                    break;
                case isset($_POST['clear_all']);
                    $_SESSION['cart'] = array();
                    $_GET['page'] = 'basket';
                    break;
            }
        }
        elseif (!empty($_GET)) {
            switch ($_GET) {
                default:
                    $this->homePage();
                    break;
                case isset($_GET['register']);
                    include "view/register.php";
                    break;
                case isset($_GET['product']);
                    $productSelected = $this->model->getProduct($_GET['product']);
                    include 'view/viewproduct.php';
                    break;
                case isset($_GET['logout']);
                    include "controller/logout.php";
                    break;

                case isset($_GET['page']);
                    switch ($_GET['page']) {
                        default:
                            $this->homePage();
                            break;
                        case "news";
                            $news = $this->model->openNews();
                            include "view/newspage.php";
                            break;
                        case "contacts";
                            $contact = $this->model->contactPage();
                            $des = $this->model->description();
                            include "view/contactform.php";
                            break;
                        case 'profile';
                            if(isset($_SESSION['user_id'])){
                                $profile = $this->model->userProfile();
                                include('view/profile.php');
                            }
                            else {
                                note("you are not logged in!");
                                $this->homePage();
                            }
                            break;
                        case 'basket';
                            include 'view/basket.php';
                            break;
                    }
                    break;
            }
        }
        else {
            $this->homePage();
        }

        if(isset($_POST['update_profile']) && isset($_SESSION['user_id'])) {
            $this->model->updateUserProfile($_POST['firstName'],
                                           $_POST['lastName'],
                                           $_POST['Address'],
                                           $_POST['birthDay']
            );
            note('Updated your profile!');
        }
        if(isset($_POST['update_password']) && isset($_SESSION['user_id'])) {

            $new = $_POST['new_pass'];
            $renew = $_POST['new_pass_re'];
            $current = $_POST['current_pass'];
                if(!empty($new) && !empty($renew)){

                $this->model->changePass($current, $new , $renew);
            }
            else{
                error('Please insert new/repeat password');
            }

        }

    }
    public function listProducts(){
        $products = $this->model->getProductList();
        include 'view/save_products.php';
    }


    public function homePage()
    {
        $news = $this->model->Carousel();
        include 'view/productpage.php';

    }
    public function recommend(){
        $ran = rand(0,2);
        //daily items
        $name = '';
        switch ($ran) {
            case 0;
                $daily = $this->model->most_viewed();
                $name = 'Most viewed on shop!';
                break;
            case 1;
                $daily = $this->model->Daily();
                $name = 'Daily special pick!';
                break;
            case 2;
                $daily = $this->model->most_liked();
                $name = 'Everyone love these ones!';
                break;
        }

        include_once 'view/partials/daily.php';
    }

    public function panel()
    {

        if (isset($_POST['administrate'])) {
            $this->model->loginAdmin($_POST['username'], $_POST['password']);
        }

        if (isset($_SESSION['admin_id'])) {

            if (isset($_POST['btn_insert_new'])) {



                if($_FILES['uploadimage']['size'] > 0 &&
                    (($_FILES["uploadimage"]["type"] == "image/gif") ||
                        ($_FILES["uploadimage"]["type"] == "image/jpeg")||
                        ($_FILES["uploadimage"]["type"] == "image/pjpeg") ||
                        ($_FILES["uploadimage"]["type"] == "image/png") &&
                        ($_FILES["uploadimage"]["size"] < 2097152))){ // LESS THEN - 2 MB

                    $filepath = 'user_images/'.$_FILES["uploadimage"]["name"];
                    move_uploaded_file($_FILES["uploadimage"]["tmp_name"],$filepath);


                    if ($_FILES["uploadimage"]["error"] > 0){
                        echo "Return Code: " . $_FILES["imgproduct"]["error"] . "<br />";
                    }



                $this->model->Add_products($_POST['product_name'],$_POST['product_price'],$_POST['product_description'],$_POST['product_manufacture'], $_POST['product_color'],$_POST['product_size'],$_POST['product_category'],$_POST['product_stock'],$_POST['product_tags'],$filepath);
                }
            }


            if (isset($_POST['btn_save_updates'])) {

                if(file_exists($_FILES["uploadimage"]["tmp_name"]) || is_uploaded_file($_FILES["uploadimage"]["tmp_name"])){



                    if ($_FILES['uploadimage']['size'] > 0 &&
                        (($_FILES["uploadimage"]["type"] == "image/gif") ||
                            ($_FILES["uploadimage"]["type"] == "image/jpeg") ||
                            ($_FILES["uploadimage"]["type"] == "image/pjpeg") ||
                            ($_FILES["uploadimage"]["type"] == "image/png") &&
                            ($_FILES["uploadimage"]["size"] < 2097152))
                    ) {

                        $filepath = 'user_images/' . $_FILES["uploadimage"]["name"];
                        move_uploaded_file($_FILES["uploadimage"]["tmp_name"], $filepath);

                    }
                    if ($_FILES["uploadimage"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["uploadimage"]["error"] . "<br />";
                    }

                    $this->model->Update_products($_POST['Product_ID'], $_POST['product_name'], $_POST['product_price'], $_POST['product_description'], $_POST['product_manufacture'], $_POST['product_color'], $_POST['product_size'], $_POST['product_category'], $_POST['product_stock'], $_POST['product_tags'], $filepath);
                    $productsAdmin = $this->model->getProductList();
                    include_once "view/admin_views/content.php";
                    include_once "view/admin_views/list_admin_products.php";

               }

               else{

                    $this->model->Update_products_noimage($_POST['Product_ID'], $_POST['product_name'], $_POST['product_price'], $_POST['product_description'], $_POST['product_manufacture'], $_POST['product_color'], $_POST['product_size'], $_POST['product_category'], $_POST['product_stock'], $_POST['product_tags']);

                }



            }

            if(isset($_POST['btn-contact-update'])){

                $this->model->contact_update($_POST['cont_street'], $_POST['cont_text'], $_POST['cont_email'], $_POST['cont_city'], $_POST['cont_country'], $_POST['cont_phone'], $_POST['cont_code'], $_POST['cont_monday'], $_POST['cont_tuesday'], $_POST['cont_wednesday'], $_POST['cont_thursday'],$_POST['cont_friday'],$_POST['cont_saturday'],$_POST['cont_sunday']);


            }

            if(isset($_POST['btn_update'])){

                if(file_exists($_FILES["uploadimage"]["tmp_name"]) || is_uploaded_file($_FILES["uploadimage"]["tmp_name"])) {


                    if ($_FILES['uploadimage']['size'] > 0 &&
                        (($_FILES["uploadimage"]["type"] == "image/gif") ||
                            ($_FILES["uploadimage"]["type"] == "image/jpeg") ||
                            ($_FILES["uploadimage"]["type"] == "image/pjpeg") ||
                            ($_FILES["uploadimage"]["type"] == "image/png") &&
                            ($_FILES["uploadimage"]["size"] < 2097152))
                    ) {

                        $filepath = 'user_images/' . $_FILES["uploadimage"]["name"];
                        move_uploaded_file($_FILES["uploadimage"]["tmp_name"], $filepath);
                    }

                    if ($_FILES["uploadimage"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["uploadimage"]["error"] . "<br />";
                    }

                    $this->model->company_desc($_POST['desc_title'], $_POST['desc_text'], $filepath);

                }

                 else{
                     $this->model->company_desc_noimage($_POST['desc_title'], $_POST['desc_text']);

                 }
            }

            if (isset($_POST['btn_delete'])) {

                $this->model->Delete_products($_POST['Product_ID']);

            }

            if(isset($_POST['delete_comment'])){

                $this->model->delete_comments($_POST['comment_id']);
            }


             // ADD NEWS
             if(isset($_POST['insert_news'])) {

                 if (file_exists($_FILES["uploadimage"]["tmp_name"]) || is_uploaded_file($_FILES["uploadimage"]["tmp_name"])) {


                     if ($_FILES['uploadimage']['size'] > 0 &&
                         (($_FILES["uploadimage"]["type"] == "image/gif") ||
                             ($_FILES["uploadimage"]["type"] == "image/jpeg") ||
                             ($_FILES["uploadimage"]["type"] == "image/pjpeg") ||
                             ($_FILES["uploadimage"]["type"] == "image/png") &&
                             ($_FILES["uploadimage"]["size"] < 5097152))
                     ) {

                         $filepath =  $_FILES["uploadimage"]["name"];
                         move_uploaded_file($_FILES["uploadimage"]["tmp_name"], $filepath);
                     }

                     if ($_FILES["uploadimage"]["error"] > 0) {
                         echo "Return Code: " . $_FILES["uploadimage"]["error"] . "<br />";
                     }

                     $this->model->post_news($filepath, $_POST['add_news_text'], $_POST['add_news_header']);


                 }
             }
            // END OF NEWS


            // UPDATE NEWS

            if(isset($_POST['update_news'])){

                if(file_exists($_FILES["uploadimage"]["tmp_name"]) || is_uploaded_file($_FILES["uploadimage"]["tmp_name"])) {


                    if ($_FILES['uploadimage']['size'] > 0 &&
                        (($_FILES["uploadimage"]["type"] == "image/gif") ||
                            ($_FILES["uploadimage"]["type"] == "image/jpeg") ||
                            ($_FILES["uploadimage"]["type"] == "image/pjpeg") ||
                            ($_FILES["uploadimage"]["type"] == "image/png") &&
                            ($_FILES["uploadimage"]["size"] < 2097152))
                    ) {

                        $filepath =  $_FILES["uploadimage"]["name"];
                        move_uploaded_file($_FILES["uploadimage"]["tmp_name"], $filepath);
                    }

                    if ($_FILES["uploadimage"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["uploadimage"]["error"] . "<br />";
                    }

                    $this->model->update_news($filepath,$_POST['update_news_text'], $_POST['update_news_header'],$_POST['Page_ID']);

                }

                else{
                    $this->model->update_news_noimage($_POST['update_news_text'], $_POST['update_news_header'],$_POST['Page_ID']);

                }
            }






            //DELETE NEWS PAGE

           if(isset($_POST['delete_news'])){

               $this->model->delete_news($_POST['Page_ID']);
           }





            switch ($_GET) {
                default:
                    include_once "view/admin_views/content.php";
                    break;

                case isset($_GET['page']);

                    $productsAdmin = $this->model->getProductList();
                    include_once "view/admin_views/content.php";
                    include_once "view/admin_views/list_admin_products.php";
                    break;
                case isset($_GET['news']);
                    $news = $this->model->openNews();
                    include_once "view/admin_views/content.php";
                    include_once "view/admin_views/admin_newsfeed.php";
                    break;
                case isset($_GET['product']);
                    $productAdmin = $this->model->getProduct($_GET['product']);
                    include 'view/admin_views/view_admin_product.php';
                    break;
                case isset($_GET['description']);
                    $description = $this->model->company_description();
                    include_once "view/admin_views/content.php";
                    include "view/admin_views/description.php";
                    break;
                case isset($_GET['contacts']);
                    $contacts = $this->model->get_contacts();
                    include_once "view/admin_views/content.php";
                    include "view/admin_views/contacts.php";
                    break;
                case isset($_GET['btn-insert']);
                    include_once 'view/admin_views/admin_add_product.php';
                    break;
            }
        } else {
            include_once "view/admin_views/admin_login.php";
        }



    }
}
