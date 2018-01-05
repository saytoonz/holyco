<div id="child_all">
	
<?php

$bar = $_GET['utab'];

		$out_come4 = "";
if(strpos($bar, "adminitstratorsysNsromapaadmin_staffmanagementdelstaff")!==false){
	$query4 = mysql_query("SELECT * FROM teachers WHERE active='no' OR active='not'");
	if ($row = mysql_num_rows($query4)===0) {
		$out_come4 = "";
	}else{
		while ($geget = mysql_fetch_assoc($query4)) {
		$id = $geget['id'];
		$passport = $geget['passport'];
		$staff_id = $geget['staff_id'];
		$staff_name = $geget['full_name'];
		$position = $geget['position'];
		$active = $geget['active'];
		if ($active=="not") {
			$active = "Pending";
		}else{
			$active = "$active";
		}

		$out_come4.= "<a  onclick=\"document.getElementById('manage_login_staff_back$id').style.display='block'\" id=\"class_pipuls\" style=\"cursor: pointer;\">
			<div id=\"search_r_pass\"><img src=\"staff_data/passport/$passport\" height=\"100%\" width=\"100%\"></div>
		<ul class=\"class_pipuls\">
			<li>$staff_name </li>
			<li id=\"down\">Staff ID: $staff_id    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 		Position : $position  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	
					Active : $active		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
					Delete Staff
				</div>
			</div>
			<div id=\"record_holder\">
				<div>
					<img src=\"images/delete_bin.png\" height=\"40\" style=\"float: left; margin-left: 30px;\">
					<span style=\"float: left; font-size: 14px; font-family: Arial;\">Are you sure you want to delete staff?</span>
				</div><br /><br /><br />
				<div style=\"text-align: left;\">
					<img src=\"staff_data/passport/$passport\" style=\"float: left; height: 110px; margin-left: 40px; margin-top: 0px; \">
					<span style=\"float: right; margin-right: 120px; font-size: 14px; font-family: Arial\">
						Name    :  	 $staff_name<br />
						Staff ID:	 $staff_id<br />
						Position:	 $position<br />
						Active: $active
					</span>
				</div>
				<br /><br /><br /><br /><br />
				<div style=\"width: 46%; margin-top: 10px; float: right;\">
					<input type=\"submit\" value=\"Yes\" name=\"yes$id\" style=\"width: 90px; height: 26px;\"></input>
					<input type=\"button\" value=\"No\" onclick=\"document.getElementById('manage_login_staff_back$id').style.display='none'\" style=\"width: 90px; height: 26px;\"></input>
				</div>
			</div>
		</div>
	</center>
	</form>
</div>";

	if (isset($_POST["yes$id"])) {
		if ($active=="Pending") {
			mysql_query("DELETE FROM teachers WHERE staff_id='$staff_id' AND id='$id' AND active='not'");
				?>
			<script type="text/javascript">
				location.replace('home.php?utab=adminitstratorsysNsromapaadmin_staffmanagementdelstaff');
			</script>
				<?php

		}elseif ($active=="no") {
			mysql_query("UPDATE admin_center_teachers SET active='no' WHERE staff_id='$staff_id'");

			mysql_query("UPDATE teachers SET active='' WHERE staff_id='$staff_id' AND active='no'");

				?>
			<script type="text/javascript">
				location.replace('home.php?utab=adminitstratorsysNsromapaadmin_staffmanagementdelstaff');
			</script>
				<?php

		}

	}

		}
	}
	echo "$out_come4";

}elseif (strpos($bar, "adminitstratorsysNsromapaadmin_staffmanagementpaymentinfo")!==false) {
	

	$out_come3="";
	$query1 = mysql_query("SELECT * FROM admin_center_teachers WHERE paid='0' AND (active = 'yes' OR active = 'no')");
	if (mysql_num_rows($query1)===0) {
		$out_come3="<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
				The School Owe no Staff.
			</span>";
	}else{
		while ($get = mysql_fetch_assoc($query1)) {
				$id = $get['id'];
				$staff_id = $get['staff_id'];
				$staff_name = $get['staff_name'];
				$staff_month = $get['month'];

			if ($staff_month =="1") {$staff_monthname ="January";}elseif ($staff_month =="2") {$staff_monthname ="February";}elseif ($staff_month =="3") {$staff_monthname ="March";}elseif ($staff_month =="4") {$staff_monthname ="April";}elseif ($staff_month =="5") {$staff_monthname ="May";}elseif ($staff_month =="6") {$staff_monthname ="June";}elseif ($staff_month =="7") {$staff_monthname ="July";}elseif ($staff_month =="8") {$staff_monthname ="August";}elseif ($staff_month =="9") {$staff_monthname ="September";}elseif ($staff_month =="10") {$staff_monthname ="October";}elseif ($staff_month =="11") {$staff_monthname ="November";}elseif ($staff_month =="12") {$staff_monthname ="December";}
		
		$qq1 = mysql_query("SELECT * FROM admin_staff_pay WHERE staff_id = '$staff_id'");
				if (mysql_num_rows($qq1)===0) {
					$amount = "No amount assigned Yet";
				}else{
					$grab = mysql_fetch_assoc($qq1);
						$cash = $grab['amount'];
					$amount ="Amount Recieve : &#8373; $cash";
				}


		$query4 = mysql_query("SELECT * FROM teachers WHERE staff_id='$staff_id'");
		$geget = mysql_fetch_assoc($query4);
		$passport = $geget['passport'];

			$out_come3.= "<a  onclick=\"document.getElementById('manage_login_staff_back$id').style.display='block'\" id=\"class_pipuls\" style=\"cursor: pointer;\">
			<div id=\"search_r_pass\"><img src=\"staff_data/passport/$passport\" height=\"100%\" width=\"100%\"></div>
		<ul class=\"class_pipuls\">
			<li>$staff_name </li>
			<li id=\"down\">Staff ID: $staff_id    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 		Position : $staff_monthname  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	$amount		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
					Staff Payment info 
				</div>
			</div>
			<div id=\"record_holder\">
				<div>
					<img src=\"images/owed.png\" height=\"40\" style=\"float: left; margin-left: 30px;\">
					<span style=\"float: left; font-size: 14px; font-family: Arial;\">Manage $staff_monthname Payment</span>
				</div><br /><br /><br />
				<div style=\"text-align: left;\">
					<img src=\"images/file.png\" style=\"float: left; height: 110px; margin-left: 40px; margin-top: 0px; \">
					<span style=\"float: right; margin-right: 120px; font-size: 14px; font-family: Arial\">
						Name    :  	 $staff_name<br />
						Staff ID:	 $staff_id<br />
						Month Owed:	 $staff_monthname<br />
						Amount: $amount
					</span>
				</div>
				<br /><br /><br /><br /><br />
				<div style=\"width: 46%; margin-top: 10px; float: right;\">
					<input type=\"submit\" value=\"Set to Paid\" name=\"setPaid$id\" style=\"width: 90px; height: 26px;\"></input>
					<input type=\"button\" value=\"Pay\" onclick=\"document.getElementById('add_new_login_staff_back$id').style.display='block'\" style=\"width: 90px; height: 26px;\"></input>
				</div>
			</div>
		</div>
	</center>
	</form>
</div>";

echo "
<div class=\"add_new_login_staff_back\" id=\"add_new_login_staff_back$id\" style=\"display: none;\">
	<center>
		<div id=\"add_login_staff_all\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('add_new_login_staff_back$id').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Add Staff to Login Users
				</div>
			</div>
			<div id=\"record_holder\">
				<form method=\"post\" action=\"#\">
					<input type=\"password\" placeholder=\"Re-enter Your Password\"  name=\"staffpass\" style=\"width: 350px; color:#000; margin-top: 80px;\" />

					<input type=\"submit\" name=\"Verifypay$id\" value=\"Verify\" style=\"width: 100px; height: 30px; margin-left: 0px; margin-top: 60px;\" />
				</form>
			</div>
		</div>
	</center>
</div>
";

if (isset($_POST["Verifypay$id"])) {

	$password = $_POST['staffpass'];

	if ($password != "") {
						$password = md5($password);
			$query3 = mysql_query("SELECT * FROM staffs WHERE staff_id = '$Login_staff' AND password='$password'");

				if (mysql_num_rows($query3)===1) {
						?>
						<script type="text/javascript">
							location.replace('home.php?utab=staff_paymentverify<?php echo "$staff_id,/$staff_month" ?>');
						</script>
						<?php
				}else{
							echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
									Incorrect Login Password!
								</span>";
							}
			
			}else{
				echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
						Pleace make sure all feilds are filled.
					</span>";
		}

		}
	

		if (isset($_POST["setPaid$id"])) {
			mysql_query("UPDATE admin_center_teachers SET paid='1' WHERE paid='0' AND month='$staff_month' AND (active = 'yes' OR active = 'no')");
			?>
		<script type="text/javascript">
			location.replace('home.php?utab=adminitstratorsysNsromapaadmin_staffmanagementpaymentinfo');
		</script>
			<?php
		}

		}
	}

echo "$out_come3";


}elseif (strpos($bar, "adminitstratorsysNsromapaadmin_staffmanagementassignpay")!==false) {
	
	$out_come2="";

	$qq = mysql_query("SELECT * FROM teachers WHERE active='yes'");
		if (mysql_num_rows($qq)===0) {
			$out_come2="";
		}else{
			while ($file = mysql_fetch_assoc($qq)) {
				$id = $file['id'];
				$full_name = $file['full_name'];
				$staff_id = $file['staff_id'];
				$date_of_employment = $file['date_of_employment'];
				$position = $file['position'];
				$passport = $file['passport'];
			$qq1 = mysql_query("SELECT * FROM admin_staff_pay WHERE staff_id = '$staff_id'");
				if (mysql_num_rows($qq1)===0) {
					$amount = "No amount assigned Yet";
				}else{
					$grab = mysql_fetch_assoc($qq1);
						$cash = $grab['amount'];
					$amount ="Amount Recieve : &#8373; $cash";
				}


	$out_come2.= "<a  onclick=\"document.getElementById('manage_login_staff_back$id').style.display='block'\" id=\"class_pipuls\" style=\"cursor: pointer;\">
			<div id=\"search_r_pass\"><img src=\"staff_data/passport/$passport\" height=\"100%\" width=\"100%\"></div>
		<ul class=\"class_pipuls\">
			<li>$full_name </li>
			<li id=\"down\">Staff ID: $staff_id    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 		Position : $position  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 		    $amount		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
					$full_name
				</div>
			</div>
			<div id=\"record_holder\">
				<div>
					<img src=\"images/moneymat.png\" height=\"40\" style=\"float: left; margin-left: 30px;\">
					<span style=\"float: left; font-size: 14px; font-family: Arial;\">
						Assign Amount as monthly pay
					</span>
				</div><br /><br />


				<div style=\"text-align: left;\">
					<input type=\"text\" name=\"amount\" placeholder=\"Amount\" style=\"color: black; width: 80%; margin-left: 10%;\" /><br />
					<input type=\"text\" name=\"amount_in_words\" placeholder=\"Amount in Words\" style=\"color: black; width: 80%; margin-left: 10%;\" />
				</div>


				<div style=\"width: 46%; margin-top: 10px; float: right;\">
					<input type=\"submit\" value=\"Submit\" name=\"submit$id\" style=\"width: 90px; height: 26px;\"></input>
				</div>
			</div>
		</div>
	</center>
	</form>
</div>";

if (isset($_POST["submit$id"])) {
	$amount = $_POST['amount'];
	$amount_in_words = $_POST['amount_in_words'];

	$month = date("m");

	$qq2 = mysql_query("SELECT * FROM admin_staff_pay WHERE id='$id'");
	if (mysql_num_rows($qq2)===0) {
		mysql_query("INSERT INTO admin_staff_pay VALUES('','$staff_id','$full_name','$amount','$amount_in_words')");

		$qqqqqq = mysql_query("SELECT * FROM admin_center_teachers WHERE month='$month' AND staff_id='$staff_id' AND active='yes'");
			if (mysql_num_rows($qqqqqq)!==0) {
				# code...
			}else{
				mysql_query("INSERT INTO admin_center_teachers VALUES('','$staff_id','$full_name','$month','0','yes')");
			}

		?>
	<script type="text/javascript">
		alert("Done");
		location.replace('home.php?utab=adminitstratorsysNsromapaadmin_staffmanagementassignpay');
	</script>
		<?php
	}else{
		mysql_query("UPDATE admin_staff_pay SET amount = '$amount',amount_in_words = '$amount_in_words' WHERE staff_id = '$staff_id'");
		?>
	<script type="text/javascript">
		alert("Done");
		location.replace('home.php?utab=adminitstratorsysNsromapaadmin_staffmanagementassignpay');
	</script>
	<?php
	}
}
		}

}
		echo "$out_come2";
}elseif (strpos($bar, "adminitstratorsysNsromapaadmin_staffmanagementconfirmstaff")!==false) {
		

		$out_come="";
	$query = mysql_query("SELECT * FROM teachers WHERE active = 'not'");
		if (mysql_num_rows($query)===0) {
			$out_come="

			";
		}else{
			while ($file = mysql_fetch_assoc($query)) {
				$id = $file['id'];
				$full_name = $file['full_name'];
				$staff_id = $file['staff_id'];
				$date_of_employment = $file['date_of_employment'];
				$position = $file['position'];
				$passport = $file['passport'];


	$out_come.= "<a  onclick=\"document.getElementById('manage_login_staff_back$id').style.display='block'\" id=\"class_pipuls\" style=\"cursor: pointer;\">
			<div id=\"search_r_pass\"><img src=\"staff_data/passport/$passport\" height=\"100%\" width=\"100%\"></div>
		<ul class=\"class_pipuls\">
			<li>$full_name </li>
			<li id=\"down\">Staff ID: $staff_id    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 		Position : $position  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
					React to a New Staff 
				</div>
			</div>
			<div id=\"record_holder\">
				<div>
					<img src=\"images/react.png\" height=\"40\" style=\"float: left; margin-left: 30px;\">
					<span style=\"float: left; font-size: 14px; font-family: Arial;\">Manage the staff Log in Informations</span>
				</div><br /><br /><br />
				<div style=\"text-align: left;\">
					<img src=\"images/file.png\" style=\"float: left; height: 110px; margin-left: 40px; margin-top: 0px; \">
					<span style=\"float: right; margin-right: 120px; font-size: 14px; font-family: Arial\">
						Name    :  	 $full_name<br />
						Staff ID:	 $staff_id<br />
						Date of Employment: $date_of_employment
					</span>
				</div>
				<br /><br /><br /><br /><br />
				<div style=\"width: 46%; margin-top: 10px; float: right;\">
					<input type=\"submit\" value=\"Confirm\" name=\"confirm$id\" style=\"width: 90px; height: 26px;\"></input>
					<input type=\"submit\" value=\"Delete\" name=\"delete$id\" style=\"width: 90px; height: 26px;\"></input>
				</div>
			</div>
		</div>
	</center>
	</form>
</div>";

	if (isset($_POST["confirm$id"])) {
		mysql_query("UPDATE teachers SET active='yes' WHERE id='$id'");
		?>
	<script type="text/javascript">
		location.replace('home.php?utab=adminitstratorsysNsromapaadmin_staffmanagementconfirmstaff');
	</script>
		<?php

	}

	if (isset($_POST["delete$id"])) {
		mysql_query("DELETE FROM teachers WHERE id='$id' AND staff_id='$staff_id' AND active='not'");
			?>
	<script type="text/javascript">
		location.replace('home.php?utab=adminitstratorsysNsromapaadmin_staffmanagementconfirmstaff');
	</script>
		<?php
	}

			}

			echo "$out_come";
		}

}else{
$query1again = mysql_query("SELECT * FROM admin_center_teachers WHERE paid='0' AND (active = 'yes' OR active = 'no')");
	$row = mysql_num_rows($query1again);
	if ($row===0) {
echo "
	<div class=\"third_from_left_top\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	Payment Info<br />
	<span style=\"color: #ff0000; font-size: 13px; font-family: Times New Romans;\">
		No Staff is Owed by the School
	</sapn>
	</div>
	";
	}else{
echo "
	<a style=\"text-decoration: none;\" href=\"home.php?utab=adminitstratorsysNsromapaadmin_staffmanagementpaymentinfo\">
	<div class=\"third_from_left_top\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	Payment Info<br />
	<span style=\"color: #ff0000; font-size: 13px; font-family: Times New Romans;\">
		$row
	</sapn>
	</div>
	</a>";
}

$query = mysql_query("SELECT * FROM teachers WHERE active = 'not'");
	$row = mysql_num_rows($query);
if ($row===0) {
echo"<div class=\"first_from_left_top\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br />
	Confirm Staff<br />
	<span style=\"color: #ff0000; font-size: 13px; font-family: Times New Romans;\">
		No Staff to be confirmed
	</sapn>
</div>";
}
else
{
echo"<a style=\"text-decoration: none;\" href=\"home.php?utab=adminitstratorsysNsromapaadmin_staffmanagementconfirmstaff\">
<div class=\"first_from_left_top\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br />
	Confirm Staff<br />
	<span style=\"color: #ff0000; font-size: 13px; font-family: Times New Romans;\">
		$row
	</sapn>
</div>
</a>";
}


echo "
<a style=\"text-decoration: none;\" href=\"home.php?utab=adminitstratorsysNsromapaadmin_staffmanagementassignpay\">
<div class=\"second_from_left_top\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	Assign Payment Amount
</div>
</a>";


$query4 = mysql_query("SELECT * FROM teachers WHERE active='no' OR active='not'");
	$row =  mysql_num_rows($query4);
if ($row===0) {
	echo "
	<div class=\"last_div\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	Delete Staffs<br />
	<span style=\"color: #ff0000; font-size: 13px; font-family: Times New Romans;\">
		All Staffs are active.
	</sapn>
	</div>";
}else{
	echo "
	<a style=\"text-decoration: none;\" href=\"home.php?utab=adminitstratorsysNsromapaadmin_staffmanagementdelstaff\">
	<div class=\"last_div\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	Delete Staffs<br />
	<span style=\"color: #ff0000; font-size: 13px; font-family: Times New Romans;\">
		$row
	</sapn>
	</div>
	</a>
	";
}



}
?>


</div>