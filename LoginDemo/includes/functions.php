<?php
	function redirect_to($location) {
			header("Location: {$location}");
			exit;
	}

	function mysql_prep ($value){

	    global $conn;
        $value = mysqli_real_escape_string($conn, htmlspecialchars(trim($value)));
        return $value;
    }
?>