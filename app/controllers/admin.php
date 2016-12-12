<?php
    class admin extends controller {


        function index(){
            if(common::isAdminLoggedIn()){

               admin::home();

            }
            else{
                if(url::post("username") && url::post("password")){
                    $admins = new admins_login();
                    $user = $admins->auth(url::post("username"),url::post("password"));

                    if(is_array($user)){
                        session::set("admin_id",$user["admin_id"]);
                        session::set("name",$user["name"]);
                        admin::home();
                    }
                    else{
                        message::error("incorrect username");
                        load::view("admin::login");

                    }
                }
                else {
                    load::view("admin::login");
                }
            }
            admin::invoke();

        }
        private function invoke(){
            $edit = new edit();
            if(isset($_POST["logout"])){
                common::doAdminLogout();
                url::redir("index");
            }

            if(isset($_POST["btn_insert_new"])){

               $edit->newProduct();
            }
            if(isset($_POST['delete_news'])){

                $edit->delete_news(url::post("Page_ID"));
            }
            if(isset($_POST["insert_news"])){

                $edit->addNews();
            }
            if(isset($_POST["btn_update"])){

                $edit->company_desc();
            }
            if(isset($_POST["btn-contact-update"])){

                $edit->contact_update();
            }
            if(isset($_POST["update_news"])){

                $edit->updating_news();
            }

            if(isset($_POST["update_news"])){

                $edit->updateProduct();
            }

            if(isset($_POST["btn_delete"])){
                $edit->deleteProduct();
            }

        }



        private function permission(){
            if(!common::isAdminLoggedIn()){
                url::redir("admin");
            }
        }

        private function home(){
            $main = new main_model();
            $data["items"] = $main->allProducts();
            load::view("admin::index",$data);
            admin::invoke();
            admin::permission();
        }
        function contacts(){
            $posts = new main_model();
            $data["contacts"] = $posts->contacts();
            load::view("admin::partial::panel");
            load::view("admin::partial::contacts",$data);
            admin::invoke();
            admin::permission();

        }
        function description(){
            $posts = new main_model();
            $data["description"] = $posts->description();
            load::view("admin::partial::panel");
            load::view("admin::partial::description",$data);
            admin::invoke();
            admin::permission();


        }
        function newsfeed(){
            $posts = new main_model();
            $data["news"] = $posts->posts(0);
            load::view("admin::partial::panel");
            load::view("admin::partial::newsfeed",$data);
            admin::invoke();
            admin::permission();


        }
        function product(){
            if(url::get("p")){
                $posts = new main_model();
                $data["products"] = $posts->productId(url::get("p"));
                load::view("admin::partial::panel");
                load::view("admin::partial::products",$data);
                admin::invoke();
                admin::permission();


            }

        }
        function add_new(){
            load::view("admin::partial::panel");
            load::view("admin::partial::add");
            admin::invoke();
            admin::permission();

        }


    }