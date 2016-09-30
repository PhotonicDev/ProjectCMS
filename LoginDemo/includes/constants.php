<?php

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "lpokji12");
define("DB_NAMEE", "db_cms");

// Create connection
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAMEE);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}