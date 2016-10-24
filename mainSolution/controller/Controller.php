<?php
include_once("model/Model.php");

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
                    //   header("Refresh:0; url=bussiness%20logic%20cms/mainSolution/index.php");
                    break;
                case isset($_POST['register']);
                    $this->model->Register($_POST['username'], $_POST['password'], $_POST['email']);
            }
        } elseif (!empty($_GET)) {
            switch ($_GET) {
                default:
                    $this->homePage();
                    break;
                case isset($_GET['register']);
                    include "view/register.php";
                    break;
                case isset($_GET['product']);
                    $product = $this->model->getProduct($_GET['product']);
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
        } else {
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



                switch ($_GET) {
                    default:
                        include_once "view/admin_login.php";
                        break;

                    case isset($_GET['page']);

                                $admin_products = $this->model->getAdminProductList();
                                include_once "view/list_admin_products.php";
                                break;



                }
            }



        else{
                include_once "view/admin_login.php";
            }




    }
}
