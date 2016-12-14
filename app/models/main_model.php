<?php
class main_model extends model {
     function allProducts(){
             $this->model->query("SELECT * FROM products");
        if($row = $this->model->fetch_all_kv()){
            return $row;
        }
        else{
            return false;
        }
    }
    function saveSession($name){
         $cart = session::get("cart");
         $up = session::get("up");
         if(is_array($cart)){
             $cart = implode(" ",$cart);
         }
        if(is_array($up)){
            $up = implode(" ",$up);
        }
        $date = $this->model->query("UPDATE `customers` SET `basket`=?, `up_votes`=? WHERE `customer_id`=?",
            array($cart,$up,$name));
        message::note("Logged out! Have a nice day!");
    }
    function posts($limit){
         if($limit == 0) {
             $this->model->query("SELECT * FROM newspage");
             $data = $this->model->fetch_all_kv();
         }
         else {
             $this->model->query("SELECT * FROM newspage LIMIT " . $limit);
             $data = $this->model->fetch_all_kv();
         }
        return $data;
    }
    function most_viewed(){
        $this->model->query("SELECT * FROM products ORDER BY views DESC LIMIT 5");
        $data = $this->model->fetch_all_kv();
        return $data;
    }
    function Daily(){
        $this->model->query("SELECT *   
                                    FROM products AS p, daily_product AS d 
                                    WHERE p.Product_ID = d.Product_ID LIMIT 5");
        $data = $this->model->fetch_all_kv();
        return $data;
    }
    function most_liked(){
        $this->model->query("SELECT * FROM products ORDER BY upVote DESC LIMIT 5");
        $data =  $this->model->fetch_all_kv();
        return $data;
    }
    function description() {
        $this->model->query("SELECT * FROM company_desc");
        $data = $this->model->fetch_all_kv();
        return $data;
    }
    function contacts() {
        $this->model->query("SELECT * FROM contact_info");
        $data = $this->model->fetch_all_kv();
        return $data;
    }
    function productId($id){
        $this->model->query("UPDATE `products` SET `views` = `views` + 1
 WHERE `Product_ID`=?",
            array($id));
        $this->model->query("SELECT *
 FROM `products` WHERE `Product_ID`=? ",
            array($id));
        $data = $this->model->fetch_assoc();
        return $data;
    }
    function postComment($username, $id, $comment)
    {
        if(url::post('g-recaptcha-response')) {
            // site secret key
            $secret = '6LcGRQwUAAAAAEsku6qw-a-LUi2R55lzRGC5Jxp2';     // <-----  localhost
            // $secret = '6LcDRQwUAAAAAP9-tCmZGba0HxU-04k-XGudAM8o';  //  <-----  examserver38.dk

            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {

                $this->model->query("INSERT INTO `social_pages` (`name`,`Product_ID`,`Comments`,`Likes`) VALUES(?,?,?,'0')",
                    array( common::clean($username),  common::clean($id),  common::clean($comment)));
                message::note("success!");
                url::reload();
            }
        }
        else{
            url::reload(10);
        }

    }
    function upVote($id){
        $this->model->query("UPDATE `products` SET `upVote`= `upVote` + 1 WHERE `Product_ID`=? ",array($id));
        return "success!";
    }
    function comments($id){
        $this->model->query("SELECT * FROM social_pages WHERE `Product_ID`=? ORDER BY `comment_id` DESC",
            array($id));
        $data = $this->model->fetch_all_kv();
        if(!empty($data)){
            return $data;
        }
        else {
            return false;
        }
    }
    function basket($data){
        if(!empty($data)){
            $new = implode(",", $data);
            $this->model->query("SELECT * FROM `products` WHERE `Product_ID` IN($new)");
            $products = $this->model->fetch_all_kv();
            return $products;
        }
        else {
            return false;
        }
        }
}