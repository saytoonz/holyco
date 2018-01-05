 <!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en"> <!--<![endif]-->
<head>
		<title>Godslove For Humanity</title>
		<link type="text/css" rel="stylesheet" href="css/index.css" />
</head>
<body>
	<center>
		<div id="all">	
			<div id="login">
				<span id="logo" title="055 968 5442 / 054 815 7455">
						<img src="images/logo.png" />
				</span>
				<form method="post" action="runners/login.php">
					<input type="text" name="username" placeholder="Login Name">
						<br />
					<input type="password" name="userpassword" placeholder="Password">
						<br />
					<input type="submit" name="loginside" value="Log In">
					<p class="forgetPwd">
						<a href="index.html">
						<?php
						 if(isset($_REQUEST["error1"])){
							  echo"<i>Incorrect User Name or Password</i>";
							}elseif(isset($_REQUEST["error2"])){
							  echo"<i>Please fill both LogIn name and Password</i>";
							}else{
								echo"Forgot password? ";
								}   ?>
						</a>
						<?php
						   ?>
						</a>
					</p>
				</form>
			</div>
		</div>
		<section class="nsromapa">
			 <p class="about-author">

			 	<?php 

			 		$star_year = "2017";
			 		$year = date("Y");

			 		if ($star_year < $year) {
			 			$copyright = "$star_year - $year";
			 		}else{
			 			$copyright = "$star_year";
			 		}
			 	?>

				&copy; <?php echo "$copyright"; ?> <a href="mailto://saytoonz05@gmail.com" target="_blank">Our School Environment</a> -
				<a href="http://www.facebook.com.nsromapa" target="_blank">Nsromapa</a><br>
				Developed by Nsromapa <a href="#" target="_blank"></a>
			</p>
		</section>
	</center>
</body>
</html>