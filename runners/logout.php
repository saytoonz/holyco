<!--this is for the connection-->
  <?php// include_once("includes/function.php");   ?>
  <?php include_once("../inc/config.php");   ?>
  <?php include_once("../inc/session.php");   ?>
<?php

$hour = date("g");
$hour = $hour - 2;
$time = date(":i");
$dated =  date("jS F, Y - ");
$am_pm = date("A");
if ($hour=="-1") {
			$hour ="11";
			if ($am_pm =="AM" ){
				$am_pm ="PM";
			}elseif ($am_pm=="PM") {
				$am_pm = "AM";
			}
		}elseif ($hour=="0") {
			$hour ="12";
			if ($am_pm =="AM" ) {
				$am_pm ="PM";
			}elseif ($am_pm=="PM") {
				$am_pm = "AM";
			}
		}else{
			$hour = "$hour";
		}

mysql_query("UPDATE staffs SET logged_in='no', last_entry ='$dated $hour$time $am_pm' WHERE staff_id='$Login_staff' AND active='yes'");

	$_SESSION = array();

	if(isset($_COOKIE[session_name()])) {

		setcookie(session_name(), ' ',time()-4200, '/');

	}


	session_destroy();
	?>
			<script>
				location.replace("../index.php");
			</script>
		<?php
  
?>