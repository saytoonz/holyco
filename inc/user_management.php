<div id="child_all">

<?php

	$out_come ="";
	$query = mysql_query("SELECT * FROM staffs WHERE active='yes'");
	if (mysql_num_rows($query)===0) {
		$out_come = "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
									No Staff is allowed to Log In.
								</span>";
	}else{
		while ( $grab = mysql_fetch_assoc($query)) {
			$id = $grab['id'];
			$staff_id = $grab['staff_id'];
			$password = $grab['password'];
			$logged_in = $grab['logged_in'];
			$last_entry = $grab['last_entry'];
			
			$query1 = mysql_query("SELECT * FROM teachers WHERE staff_id='$staff_id'");
			$fetch = mysql_fetch_assoc($query1);
				$passport = $fetch['passport'];
				$full_name = $fetch['full_name'];
				$position = $fetch['position'];

				if ($logged_in=="no") {
					$logged_outtime = "Logged Out Time : $last_entry";
				}else{
					$logged_outtime ="";
				}

		$out_come.= "<a  onclick=\"document.getElementById('manage_login_staff_back$id').style.display='block'\" id=\"class_pipuls\" style=\"cursor: pointer;\">
			<div id=\"search_r_pass\"><img src=\"staff_data/passport/$passport\" height=\"100%\" width=\"100%\"></div>
			<ul class=\"class_pipuls\">
				<li>$full_name </li>
				<li id=\"down\">Staff ID: $staff_id    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 		Position : $position  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Logged in: $logged_in  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							$logged_outtime
				</li>
			</ul>
		</a>
		";

echo "
<div class=\"manage_login_staff_back\" id=\"manage_login_staff_back$id\">
	<form action=\"#\" method=\"post\">
	<center>
		<div id=\"manage_login_staff\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('manage_login_staff_back$id').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					User Manager
				</div>
			</div>
			<div id=\"record_holder\">
				<div>
					<img src=\"images/manage.png\" height=\"40\" style=\"float: left; margin-left: 30px;\">
					<span style=\"float: left; font-size: 14px; font-family: Arial;\">Manage the staff Log in Informations</span>
				</div><br /><br /><br />
				<div style=\"text-align: left;\">
					<img src=\"images/file.png\" style=\"float: left; height: 100px; margin-left: 35px; margin-top: 0px; \">
					<span style=\"float: right; margin-right: 120px; font-size: 14px; font-family: Arial; max-width: 45%;\">
						Name    :  	 $full_name<br />
						Staff ID:	 $staff_id<br />
						Last LogIn: $last_entry
					</span>
				</div>
				<br /><br /><br /><br /><br />
				<div style=\"width: 46%; margin-top: 10px; float: right;\">
					<input type=\"submit\" value=\"Reset\" name=\"reset$id\" style=\"width: 90px; height: 26px;\"></input>
					<input type=\"submit\" value=\"Delete\" name=\"deletestaff$id\" style=\"width: 90px; height: 26px;\"></input>
				</div>
			</div>
		</div>
	</center>
	</form>
</div>";


if (isset($_POST["deletestaff$id"])) {
	mysql_query("UPDATE staffs SET active='no' WHERE id='$id' AND staff_id='$staff_id'");
	?>
<script type="text/javascript">
	alert('User Deleted!');
	location.replace('home.php?utab=adminitstratorsysNsromapauser_management');
</script>
	<?php
}

if (isset($_POST["reset$id"])) {

	$password = md5($staff_id);

	mysql_query("UPDATE staffs SET staff_name ='$staff_id', password='$password' WHERE id='$id' AND staff_id='$staff_id' AND active='yes'");
		?>
<script type="text/javascript">
	alert('<?php echo "$full_name info Reseted<br>Login Name : $staff_id<br> Password : $staff_id";?>');
	location.replace('home.php?utab=adminitstratorsysNsromapauser_management');
</script>
	<?php
}


	$print_but = "<input type=\"submit\" onclick=\"document.getElementById('add_new_login_staff_back').style.display='block'\" id=\"prnt_class\"  value=\"Add Staff\" style=\"margin-bottom: 0px;\"/>";


		}
		echo "$print_but";
if (isset($_POST['AddStaff'])) {
	$staffId = $_POST['staffId'];
	$LoginName = $_POST['LoginName'];

	if ($staffId != "" AND $LoginName != "") {
		$query2 = mysql_query("SELECT * FROM staffs WHERE staff_id='$staffId' AND active='yes'");
			if (mysql_num_rows($query2)===0) {
				$query3 = mysql_query("SELECT * FROM teachers WHERE staff_id='$staffId' AND active ='yes'");
					if (mysql_num_rows($query3)===0) {
						echo "
						<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\">
							Staff ID is not given to any Staff yet.
						</span><br /><br />
						";
					}else{
						$query4 = mysql_query("SELECT * FROM staffs WHERE staff_name='$LoginName'");
						if (mysql_num_rows($query4)===0) {

							$LoginNamepass= md5($LoginName);

							mysql_query("INSERT INTO staffs VALUES('','$staffId','$LoginName','$LoginNamepass','yes','no','')");
							?>
						<script type="text/javascript">
							alert("Staff Add to Users Successfull!");
							location.replace('home.php?utab=adminitstratorsysNsromapauser_management');
						</script>
							<?php
						}else{
							echo "
						<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\">
							Login Name Exist.
						</span><br /><br />
						";
						}
					}
			}else{
				echo "
		<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\">
			Staff ID is already in use.
		</span><br /><br />
		";
			}
	}else{
		echo "
		<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\">
			Please fill all areas
		</span><br /><br />
		";
	}

}


		echo "$out_come ";
	}

echo "
<div id=\"add_new_login_staff_back\">
	<center>
		<div id=\"add_login_staff_all\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('add_new_login_staff_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Add Staff to Login Users
				</div>
			</div>
			<div id=\"record_holder\">
				<form method=\"post\" action=\"#\">
					<input type=\"text\" placeholder=\"Staff ID\"  name=\"staffId\" style=\"width: 350px; color:#000; margin-top: 50px;\" />
					<input type=\"text\" placeholder=\"Login Name\"  name=\"LoginName\" style=\"width: 350px; color:#000; margin-top: 25px;\" />
					<input type=\"submit\" name=\"AddStaff\" value=\"Add Staff\" style=\"width: 100px; height: 30px; margin-left: 0px; margin-top: 25px;\" />
				</form>
			</div>
		</div>
	</center>
</div>
";


?>

</div>