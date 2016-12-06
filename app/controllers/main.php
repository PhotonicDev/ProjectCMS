<?php
class main extends controller {

    function index(){

        $posts = new main_model();
        $news = $posts->posts(3);
        $data["news"] = $news;
        $name = main::recommend();
        $data["name"] = $name["name"];
        $data["daily"] = $name["daily"];
        main::prod();
        main::head();
        load::view("main::index",$data);
        main::foot();
    }
    private function ajax(){
        if(isset($_POST["add_to_cart"])){
             $data = session::get("LOC");
             $cart = session::get("cart");
            if(session::check("cart")){
                array_push($cart, $data);
            }
            else {
                $cart = array();
                array_push($cart, $data);
            }
            session::set("cart",$cart);
        }
        if(isset($_POST["up_vote"])){
            if(common::isUserLoggedIn()){
                $id = session::get("LOC");
                $vote = session::get("up");
                if(empty($vote)) {
                    $vote = array();
                    array_push($vote,$id);
                }
                else {
                    array_push($vote,$id);
                }
                $posts = new main_model();
                $posts->upVote($id);
                session::set("up",$vote);
            }
        }
    }
    private function head(){
        $posts = new main_model();
        $main = new admins_login();
        main::ajax();
        if(isset($_POST["login"])) {

            $main->user_auth(url::post("username"),url::post("password"));
        }
        if(isset($_POST["login"])) {

            $main->user_auth(url::post("username"),url::post("password"));
        }
        if(isset($_POST["submit_comment"])){
            $mess = $posts->postComment(session::get("username"),url::get("p"), url::post("postName"),url::post("comment"));
            echo $mess;
        }
        load::view("partial::nav");

    }
    function logout(){
        common::doUserLogout();
        url::redir("/ProjectCMS/main/index");
    }
    function product(){
        $posts = new main_model();
        if(url::get("p")){
            $data["products"] = $posts->productId(url::get("p"));
            $data["comments"] = $posts->comments(url::get("p"));
            main::head();
            load::view("main::viewProduct",$data);
            main::foot();
        }
        else{
            url::redir("/ProjectCMS/main/index");
        }

    }
    private function foot(){
        load::view("partial::foot");
    }

    function news(){
        $posts = new main_model();
        $data["news"] = $posts->posts(0);
        $name = main::recommend();
        $data["name"] = $name["name"];
        $data["daily"] = $name["daily"];
        main::head();
        load::view("main::news",$data);
        main::foot();
    }
    function register(){
        main::head();

        load::view("main::register");
        main::foot();

        if(isset($_POST["register"])) {
            $posts = new admins_login();
           $mess = $posts->register(url::post("username"),url::post("password"),url::post("email"));
            echo $mess;
            url::redir("/ProjectCMS/main/index");
        }
    }
    function info(){
        $posts = new main_model();
        $data["description"] = $posts->description();
        $data["contacts"] = $posts->contacts();
        main::head();
        load::view("main::contact",$data);
        main::foot();
    }

    private function recommend(){
        $ran = rand(0,2);
        $model = new main_model();

        switch ($ran) {
            default;
                $data["daily"] = "";
                $data["name"] = "";
                return $data;
                break;
            case 0;
                $data["daily"] = $model->most_viewed();
                $data["name"] = 'Most viewed on shop!';
                return $data;

                break;
            case 1;
                $data["daily"] = $model->Daily();
                $data["name"] = 'Daily special pick!';
                return $data;

                break;
            case 2;
                $data["daily"] = $model->most_liked();
                $data["name"] = 'Everyone love these ones!';
                return $data;
                break;
        }
    }
    function basket(){
        $data = session::get("cart");
        $main = new main_model();
        $data["basket"]= $main->basket($data);

        main::head();
        load::view("main::basket",$data);
        main::foot();
    }
    private static function prod(){
        $products = new main_model();
        $items = $products->allProducts();
        if(file_exists("data.json")){
            $delete = file_get_contents("data.json");

        }
        else {
            fopen('data.json', 'w/');
        }
        $jso = json_encode($items);
        file_put_contents("data.json",$jso);
    }
    function profile(){
        $main = new admins_login();

        if(common::isUserLoggedIn()){
            $data["profile"] = $main->profile(session::get("username"),session::get("user_id"));
            if($data["profile"] != false){
                main::head();
                load::view("main::profile",$data);
                main::foot();
            }
            else {
                url::redir("/ProjectCMS/main/index");
            }
        }
        else{
            url::redir("/ProjectCMS/main/index");
        }
        if(isset($_POST["update_profile"])){
            $msg = $main->updateProfile(url::post("firstName"),url::post("lastName"),url::post("Address"),url::post("birthDay"));

        }
        if(isset($_POST["update_password"])){
            $msg = $main->updatePassword(url::post("current_pass"),url::post("new_pass"),url::post("renew_pass"));
        }
    }
}