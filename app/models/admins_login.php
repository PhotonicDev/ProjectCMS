<?php
class admins_login extends model{
    function auth($username, $password){
        $this->model->query('SELECT * FROM `admin` WHERE `name`=?',
            array($username)
        );
        if($row = $this->model->fetch_assoc()){
            if(password_verify($password,$row['password'])){
                return "logged in!";
            }
            else {
                return "Incorrect password";
            }

        }else{
            return false;
        }
    }
    function user_auth($username,$password){
        $this->model->query("SELECT * FROM `customers` WHERE `name`=? LIMIT 1",array($username));
        if($row = $this->model->fetch_assoc()){
            if(password_verify($password,$row['password'])){
                if(session::check("cart")){
                    $cart = session::get("cart");
                    if(!empty($row["basket"])){
                        if($row["basket"]){

                        }
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
                message::note("You are logged in!");
            }
            else {
                message::error("Incorrect password, please try again!");
            }
            }
        else{
            message::error("User does not exist!");
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
            array($username,$email));

        if($this->model->num_rows > 0){
            $row = $this->model->fetch_assoc();
            if(!empty($row["name"])){
                return "Name is already used by someone else";
            }
            else {
                return "Email is already used by someone else";
            }
        }
        else{
            $iterations = ['cost' => 10]; // encrypting password - hashing it 10 times
            $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
        $this->model->query('INSERT INTO `customers` (`name`,`password`,`email`) VALUES (?,?,?)',
            array($username,$hashed_password,$email));
        return "Welcome to polyDuck ".$username."!";
        }


    }
    function updateProfile($firstName,$lastName,$address,$birthDay){
        if(common::isUserLoggedIn()){
            $user = session::get("user_id");
            $msg = $this->model->query("UPDATE `customers` SET `firstName`=? ,`lastName`=?, `Address`=?, `birth`=? WHERE `customer_id`=?"
                        ,array($firstName,$lastName,$address,$birthDay,$user));
            if($msg == false){
                return "Server internal error";
            }
            else {
                return "Success!";

            }
        }
        else{
            url::redir("/ProjectCMS/main/index");
            return "you must be logged in to update your profile";

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
                    $this->model->query("UPDATE `customers` SET `password`=? WHERE `customer_id`=?",
                        array($new,$user));
                    return "You've updated your password!";
                }
                else {
                    return "You've entered wrong password!";
                }
            }
            else{
                return "Passwords doesn't match!";
            }

        }
        else {
            url::redir("/ProjectCMS/main/index");
            return "you must be logged in to update your password";

        }
    }
}
?>