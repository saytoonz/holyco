<?php
session_start();
if (!isset($_SESSION['staff_id'])) {
	$Login_staff = "";
}else{
	$Login_staff = $_SESSION['staff_id'];
}


?>