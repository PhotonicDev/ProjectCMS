<?php
	session_start();

	function logged_in() {
        return isset($_SESSION['user_id']);
    }




	function confirm_logged_in() {
        if (!logged_in()) {
            header("Location: /bussiness%20logic%20cms/mainSolution/index.php");
        }
    }
