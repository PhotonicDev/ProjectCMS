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
                            $contact = $this->model->Contacts();
                            include "view/contactform.php";
                            break;
                    }
                    break;
                // case $_POST['news']:
                //$news = $this->model->getNews();
                //  include 'view/newspage.php';
            }
        }
        else {
            $this->homePage();
        }


    }

    public function homePage()
    {
        $products = $this->model->getProductList();
        include 'view/productpage.php';
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
                }

                    if ($_FILES["uploadimage"]["error"] > 0){
                        echo "Return Code: " . $_FILES["imgproduct"]["error"] . "<br />";
                    }



                $this->model->Add_products($_POST['product_name'],$_POST['product_price'],$_POST['product_description'],$_POST['product_manufacture'], $_POST['product_color'],$_POST['product_size'],$_POST['product_category'],$_POST['product_stock'],$_POST['product_tags'],$filepath);

            }


            if (isset($_POST['btn_save_updates'])) {

                if($_FILES['uploadimage']['size'] > 0 &&
                    (($_FILES["uploadimage"]["type"] == "image/gif") ||
                        ($_FILES["uploadimage"]["type"] == "image/jpeg")||
                        ($_FILES["uploadimage"]["type"] == "image/pjpeg") ||
                        ($_FILES["uploadimage"]["type"] == "image/png") &&
                        ($_FILES["uploadimage"]["size"] < 2097152))){

                    $filepath = 'user_images/'.$_FILES["uploadimage"]["name"];
                    move_uploaded_file($_FILES["uploadimage"]["tmp_name"],$filepath);
                }

                if ($_FILES["uploadimage"]["error"] > 0){
                    echo "Return Code: " . $_FILES["imgproduct"]["error"] . "<br />";
                }

                $this->model->Update_products($_POST['Product_ID'],$_POST['product_name'],$_POST['product_price'],$_POST['product_description'],$_POST['product_manufacture'], $_POST['product_color'],$_POST['product_size'],$_POST['product_category'],$_POST['product_stock'],$_POST['product_tags'],$filepath);

            }

            if (isset($_POST['btn_delete'])) {

                $this->model->Delete_products($_POST['Product_ID']);

            }
             if(isset($_POST['btn-insert'])){
                 include_once 'view/admin_add_product.php';
             }



            switch ($_GET) {
                default:
                    include_once "view/content.php";
                    break;

                case isset($_GET['page']);

                    $productsAdmin = $this->model->getProductList();
                    include_once "view/content.php";
                    include_once "view/list_admin_products.php";
                    break;
                case isset($_GET['news']);

                    include_once "view/content.php";
                    include_once "view/admin_newsfeed.php";
                    break;
                case isset($_GET['product']);
                    $productAdmin = $this->model->getProduct($_GET['product']);
                    include 'view/view_admin_product.php';
                    break;


            }
        } else {
            include_once "view/admin_login.php";
        }



    }
}
