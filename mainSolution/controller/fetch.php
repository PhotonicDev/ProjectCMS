<?php
if (isset($_GET['search'])) {
    $q = $_GET['search'];
    $connect = mysqli_connect("localhost", "root", "db_cms" /* "lpokji12" */, "dovydas");
    $output = '';
    $sql = "SELECT * FROM products WHERE name LIKE '%".$_GET["search"]."%'";
    $result = mysqli_query($connect, $sql);
    include_once "../view/results.php";
}
