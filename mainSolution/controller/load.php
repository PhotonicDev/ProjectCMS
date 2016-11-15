<?php


function load($user){
    $result = Connect()->getQuery("SELECT `basket`, `up_votes` FROM `customers` WHERE customer_id ='{$user}' LIMIT 1");
    $data = mysqli_fetch_array($result);
    if(!empty($data['basket'])){
        $bas =  $data['basket'];
        $_SESSION['cart'] = explode(' ',$bas);
    }
    if(!empty($data['up_votes'])) {
        $up = $data['up_votes'];
        $_SESSION['up'] = explode(' ',$up);
    }

}
function load_temp($temp) {
    $sqlLoad = Connect()->getQuery("SELECT `basket`, `up_votes` FROM `temp_user` WHERE user_id ='{$temp}' LIMIT 1");
    $temp_data = mysqli_fetch_array($sqlLoad);
    if(!empty($temp_data['basket'])){
    $temp_bas =  $temp_data['basket'];
    $_SESSION['cart'] = explode(' ',$temp_bas);
    }
    if(!empty($temp_data['up_votes'])) {
        $temp_up = $temp_data['up_votes'];
        $_SESSION['up'] = explode(' ', $temp_up);
    }
}
function create_new(){
    $userRan = uniqid();
    setcookie('temp', $userRan,time()+3600*24*30, '/');
    $_SESSION['temp_id'] = $userRan;
}