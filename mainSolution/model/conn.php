<?php


 $host = "localhost";
 $user = "root";
 //$pass = "123";
 $pass = "lpokji12";
 $dbName = "db_cms";

return new Mysqli($host, $user, $pass, $dbName);

/*
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS);

if(!$conn) {
    die("Die now!");
}

$db_select = mysqli_select_db($conn, DB_NAME);

if (!$db_select) {
    die("DIE DIE DIE!" . mysqli_error($conn));
}*/