<?php include "session.php";?>
<?php include "config.php";?>
<?php
if ($Login_staff) {
}else{
	die("<center>
			Please Login First!
			<br /><br />
			<a href=\"index.php\">Go to Login Screen</a>
		</center>");
}
?>

<html>
<head>
	<link rel="icon" type="image/png" href="images/icon.png">
	<title>Nsromapa School Management</title>

	<link type="text/css" rel="stylesheet" href="css/header.css" />
	<link type="text/css" rel="stylesheet" href="css/home.css" />
	<link type="text/css" rel="stylesheet" href="css/footer.css" />
	<link type="text/css" rel="stylesheet" href="css/new_account.css" />
	<link type="text/css" rel="stylesheet" href="css/child_info.css" />
	<link type="text/css" rel="stylesheet" href="css/reset.css" />
	<link type="text/css" rel="stylesheet" href="css/fee_processing.css" />
	<link type="text/css" rel="stylesheet" href="css/billing_system.css" />
	<link type="text/css" rel="stylesheet" href="css/report.css" />
	<link type="text/css" rel="stylesheet" href="css/new_staff.css" />
	<link type="text/css" rel="stylesheet" href="css/staff_info.css" />
	<link type="text/css" rel="stylesheet" href="css/staff_payment.css" />
	<link type="text/css" rel="stylesheet" href="css/notes.css" />
	<link type="text/css" rel="stylesheet" href="css/bank_account.css" />
	<link type="text/css" rel="stylesheet" href="css/ledger.css" />
	<link type="text/css" rel="stylesheet" href="css/user_management.css" />
	<link type="text/css" rel="stylesheet" href="css/staff_management.css" />
	<link type="text/css" rel="stylesheet" href="css/reportstudents.css" />
	<link type="text/css" rel="stylesheet" href="css/reportstaffs.css" />
	<link type="text/css" rel="stylesheet" href="css/reportaccounts.css" />
	<link type="text/css" rel="stylesheet" href="css/changepass.css" />
	<script src="../js/modernizr.custom.js"></script>
		<meta name="description" content="Blueprint: Tooltip Menu" />
		<meta name="keywords" content="Tooltip Menu, navigation, tooltip, menu, css, web development, template" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="../js/modernizr.custom.js"></script>
 		<script src="../js/jquery3.2.1.min.js"></script>
		<script type="text/javascript" src="../js/jspdf.min.js"></script>

</head>
<body>

<?php 
$q = mysql_query("SELECT * FROM teachers WHERE staff_id = '$Login_staff' AND active = 'yes'");
	if (mysql_num_rows($q)===0) {
		$full_name="";
		$passport="";
		$title="";
	}else{
		$f = mysql_fetch_assoc($q);
		$full_name=$f['full_name'];
		$passport=$f['passport'];
		$title=$f['title'];	
	}
?>

<center>
<div id="headerall">
	<div id="date">
		<p>
			System Date: <?php $hour = date("g");
		$hour = $hour - 2;
		$time = date(":i A");
		$dated =  date("jS F, Y   -  "); 

		if ($hour=="-1") {
			$hour ="11";
		}elseif ($hour=="0") {
			$hour ="12";
		}else{
			$hour = "$hour";
		}
		echo "$dated $hour$time"; ?>
		 </p>
	 </div>
	<div id="welkies">
		<i id="welcome">Welcome </i>
		<span>
			<?php echo "$title $full_name"; ?> 
		</span>
		<img src="staff_data/passport/<?php echo $passport; ?>" id="mr" alt="img"/>
	</div>
</div>
</center>
