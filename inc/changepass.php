<div id="child_all">
<?php

$tab = $_GET['utab'];

$staffID = substr($tab, 10);
	$query = mysql_query("SELECT * FROM staffs WHERE staff_id = '$staffID' AND active = 'yes' AND logged_in ='yes' LIMIT 1");
	if (mysql_num_rows($query)===0) {
			$staff_name = "";
			$password = "";
		?>
	<script type="text/javascript">
		location.replace('runners/logout.php');
	</script>
		<?php
	}else{

echo "<center>
		<div id=\"big\">
			<div id=\"bill_all\">
				<form method=\"post\" action=\"#\">
				<br /><br /><br />
			<input type=\"text\" name=\"password\" placeholder=\"Password\" />
			<input type=\"password\" name=\"newpass\" placeholder=\"New Password\" />
			<input type=\"password\" name=\"rep_newpass\" placeholder=\"Repeat New Password\" />
			<input type=\"submit\" name=\"change\" value=\"Chenge\"><br /><br /><br /><br /><br /><br />
				</form>
			</div>
		</div>
</center>
";

	if (isset($_POST['change'])) {
		$get = mysql_fetch_assoc($query);
		$staff_name = $get['staff_name'];
		$password = $get['password'];

		$old_password = $_POST['password'];
		$newpass = $_POST['newpass'];
		$rep_newpass = $_POST['rep_newpass'];

		if ($old_password !="" OR $newpass !="" OR $rep_newpass !="") {
			$old_password = md5($old_password);
			if ($old_password == "$password") {

					if ($newpass == "$rep_newpass") {
						$newpass = md5($newpass);

						mysql_query("UPDATE staffs SET password = '$newpass' WHERE staff_id = '$staffID' AND active = 'yes' AND logged_in = 'yes'");

						?>
							<script type="text/javascript">
								alert('Password changed Sucessfully!');
								location.replace("home.php?utab=1");
							</script>
							<?php


					}else{
							?>
							<script type="text/javascript">
						alert('New Passwords does not match!');
							</script>
							<?php
					}

			}else{
				?>
				<script type="text/javascript">
			alert('Old Password does not match!');
				</script>
				<?php
			}
		}else{
			?>
				<script type="text/javascript">
			alert('Please all areas must be filled!');
				</script>
			<?php
		}


	}
}
?>


</div>