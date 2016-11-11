<?php
include_once ('model/Database.php');


function Connect(){
    $conn = include 'model/conn.php';
    $db = new Database($conn);
    return $db;
}
function load($user){
    $query = Connect()->getQuery("SELECT `basket`, `up_votes` FROM `customers` WHERE customer_id ='{$user}' LIMIT 1");
    $data = mysqli_fetch_array($query);
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
    $temp_query = Connect()->getQuery("SELECT basket, up_votes FROM customers WHERE customer_id =" . $temp . " LIMIT 1");
    $temp_data = mysqli_fetch_array($temp_query);
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
    setcookie('user', $userRan,time()+3600*24*30, '/');
    $_SESSION['user_id'] = $userRan;
}