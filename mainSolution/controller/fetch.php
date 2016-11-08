<?php
if (isset($_GET['search'])) {
    $q = $_GET['search'];
    $connect = mysqli_connect("localhost", "root", "lpokji12" /* "lpokji12" */, "db_cms");
    $output = '';
    $sql = "SELECT * FROM products WHERE name LIKE '%".$_GET["search"]."%'";
    $result = mysqli_query($connect, $sql);
    include_once "../view/results.php";
}
