<?php
class admins_login extends model{
    function auth($username, $password){
        $this->model->query('SELECT * FROM `admin` WHERE `name`=? LIMIT 1',
            array($username)
        );

       $row = $this->model->fetch_assoc();

        if($this->model->num_rows != 0){
            if(password_verify($password,$row['password'])){
                return $row;
            }
            else {
                url::reload(1);
            }

        }else{
            url::reload(2);
        }
    }

    function user_auth($username,$password){
        $this->model->query("SELECT * FROM `customers` WHERE `name`=? LIMIT 1",array(common::clean($username)));
        if($row = $this->model->fetch_assoc()){
            if(password_verify($password,$row['password'])){
                if(session::check("cart")){
                    $cart = session::get("cart");
                    if(!empty($row["basket"])){
                        $user_cart = explode(" ",$row["basket"]);
                        $super_cart = array_merge($cart,$user_cart);

                    }
                    else{
                        $super_cart = $cart;
                    }

                }
                elseif(empty($cart) && !empty($row["basket"])) {
                    $super_cart = explode(" ",$row["basket"]);
                }
                else {
                    $super_cart = array();
                }
                session::set("cart",$super_cart);
                if(!empty($row["up_votes"])){
                    $user_up = explode(" ",$row["up_votes"]);
                    session::set("up",$user_up);

                }
                session::set("username",$username);
                session::set("user_id",$row['customer_id']);
                message::note("You are logged in! Welcome back " . $username . "!");
            }
            else {
                url::reload(1);
            }
            }
        else{
            url::reload(2);
        }
    }
    function profile($username,$id){
        $this->model->query('SELECT * FROM `customers` WHERE `name`=? AND `customer_id`=?',
            array($username,$id)
        );
        if($row = $this->model->fetch_assoc()){
            return $row;
        }
        else {
            return false;
        }
    }
    function register($username,$password,$email){
        $this->model->query("SELECT `name`,`email` FROM `customers` WHERE `name`=? OR `email`=? ",
            array( common::clean($username), common::clean($email)));

        if($this->model->num_rows > 0){
            $row = $this->model->fetch_assoc();
            if(!empty($row["name"])){
                url::reload(4);
            }
            else {
                url::reload(5);
            }
        }
        else{
            $iterations = ['cost' => 10]; // encrypting password - hashing it 10 times
            $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
            $this->model->query('INSERT INTO `customers` (`name`,`password`,`email`) VALUES (?,?,?)',
            array( common::clean($username),$hashed_password, common::clean($email)));
            message::note("Welcome to polyDuck" . $username . "!");
        }


    }
    function updateProfile($firstName,$lastName,$address,$birthDay){
        if(common::isUserLoggedIn()){
            $user = session::get("user_id");
            $msg = $this->model->query("UPDATE `customers` SET `firstName`=? ,`lastName`=?, `Address`=?, `birth`=? WHERE `customer_id`=?"
                        ,array(common::clean($firstName),common::clean($lastName),common::clean($address),common::clean($birthDay),common::clean($user)));
            if($msg == false){
                message::note("Your profile information has been updated!");

            }
            else {
                url::reload(6);
            }
        }
        else{
            url::redir("/ProjectCMS/main/index",7);

        }
    }
    function updatePassword($current,$new,$renew){
        if(common::isUserLoggedIn()) {
            $user = session::get("user_id");
            if($new == $renew){
                $this->model->query("SELECT `password` FROM `customers` WHERE `customer_id`=?",
                    array($user));
                $row = $this->model->fetch_assoc();
                if(password_verify($current,$row['password'])){
                    $iterations = ['cost' => 10]; // encrypting password - hashing it 10 times
                    $hashed_password = password_hash($new, PASSWORD_BCRYPT, $iterations);
                    $this->model->query("UPDATE `customers` SET `password`=? WHERE `customer_id`=?",
                        array($hashed_password,$user));
                    message::note("You have updated your password!");
                }
                else {
                    url::reload(9);
                }
            }
            else{
                url::reload(8);
            }

        }
        else {
            url::redir("/ProjectCMS/main/index",7);

        }
    }
}
?>