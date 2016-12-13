<?php
    class common {
        static function isAdminLoggedIn(){
            $check = array("admin_id","name");
            return (session::check($check)) ? true : false;
        }
        static function isUserLoggedIn(){
            $check = array("user_id","username");
            return (session::check($check)) ? true : false;
        }
        static function doAdminLogout(){
            session::endSession();
          return common::isAdminLoggedIn();
        }
        static function doUserLogout(){
            session::endSession();
            return common::isUserLoggedIn();
        }
        static function clean($var){
            $new = htmlspecialchars($var);
            return $new;
        }
    }