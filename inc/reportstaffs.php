<div id="child_all">
<?php
echo "

	<div class=\"allnewentry_staff\" onclick=\"document.getElementById('newentrystaff').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		New Entries<br />
	</div>

	<div class=\"allInactivate_de_staff\" onclick=\"document.getElementById('activated_de_staff').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		Activated / Deactivated<br />
	</div>


	<div class=\"allstaff_payment\" onclick=\"document.getElementById('staffPayment').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		Staffs' Payment<br />
	</div>

	<div class=\"allIn2infoupdate\" onclick=\"document.getElementById('updated').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		Info Upadates<br />
	</div>
";





echo "
<div class=\"add_new_login_staff_back\" id=\"staffPayment\">
	<center>
		<div id=\"add_login_staff_all\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('staffPayment').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Fee Payment Reports
				</div>
			</div>
			<div id=\"record_holder\">
				<form method=\"post\" action=\"#\">
					<br /><br /><br /><br /><br /><br />
					<select name=\"selectedday\" style=\"width:80% ;\">
						<option value=\"Today\">Today</option>
						<option value=\"All\">All</option>
					</select><br /><br /><br />
					<input type=\"submit\" name=\"staffPaymentreport\" value=\"Submit\" style=\"width: 100px; height: 30px; margin-left: 0px; margin-top: 25px;\" />
				</form>
			</div>
		</div>
	</center>
</div>";







	$heading5 = "";
			$updated = "";
$query3 = mysql_query("SELECT * FROM report_staff_student_info_update WHERE cleared='no' AND status='staff' ORDER BY id DESC");
	if (mysql_num_rows($query3)===0) {
		$heading5 = "";
		$updated = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
						You have no report yet.
					</span>";
	}else{
		while ($grab = mysql_fetch_assoc($query3)) {
			$full_name = $grab['full_name'];
			$dated = $grab['dated'];
			$AdmiNO_staffID = $grab['AdmiNO_staffID'];
			$staff_logged_in = $grab['staff_logged_in'];

			$qq= mysql_query("SELECT * FROM teachers WHERE staff_id = '$staff_logged_in'");
				$fetch = mysql_fetch_assoc($qq);
					
					$staff_name = $fetch['full_name'];
					$staff_id = $fetch['staff_id'];

			$heading5 = "
			<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"text-align: center; width: 62px;\">Name</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Staff ID</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Logged In Staff</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
			</tr>
			";
			$updated.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: left; width: 65px;\">$full_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$AdmiNO_staffID</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$dated</td>
			</tr>
			";
		}
	}

	echo"<div class=\"record_back\" id=\"updated\" style=\"display:;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:650px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('updated').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Students Updated Reports
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%;\">
					$heading5
					$updated
				</table>
			</div>
		</div>
	</div>";








			$heading3 = "";
			$activated_de_staff = "";
$query2 = mysql_query("SELECT * FROM report_activate_de_staff WHERE cleared='no' ORDER BY id DESC");
	if (mysql_num_rows($query2)===0) {
		$heading3 = "";
		$activated_de_staff = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
						You have no report yet.
						</span>";
	}else{
		while ($get = mysql_fetch_assoc($query2)) {
			$full_name = $get['staff_name'];
			$staff_id = $get['staff_id'];
			$positon = $get['positon'];
			$activate_deactivate = $get['activate_deactivate'];
			$dated = $get['dated'];
			$staff_logged_in = $get['staff_logged_in'];

			$qq= mysql_query("SELECT * FROM teachers WHERE staff_id = '$staff_logged_in'");
				$fetch = mysql_fetch_assoc($qq);
					
					$staff_name = $fetch['full_name'];
					$staff_id = $fetch['staff_id'];

					$datein = date("jS F, Y");
					if ($dated=="$datein") {
						$dated="Today";
					}else{
						$dated="$dated";
					}

			$heading3 = "
			<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"text-align: center; width: 62px;\">Name</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Staff ID</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Position</th>

						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Activated / Deactivated</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Logged In Staff</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
			</tr>
			";
			$activated_de_staff.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: left; width: 70px;\">$full_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$staff_id</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$positon</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$activate_deactivate</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$dated</td>
			</tr>
			";
		}
	}

echo"<div class=\"record_back\" id=\"activated_de_staff\" style=\"display:;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('activated_de_staff').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Activated and Deactivated Staffs
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%;\">
					$heading3
					$activated_de_staff
				</table>
			</div>
		</div>
</div>";





			$heading4 = "";
			$newentrystaff = "";
$query3 = mysql_query("SELECT * FROM report_new_staff_student WHERE cleared='no' AND status='staff' ORDER BY id DESC");
	if (mysql_num_rows($query3)===0) {
		$heading4 = "";
		$newentrystaff = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
						You have no report yet.
					</span>";
	}else{
		while ($grab = mysql_fetch_assoc($query3)) {
			$full_name = $grab['full_name'];
			$class = $grab['class'];
			$dated = $grab['dated'];
			$admission_number = $grab['admission_number'];
			$staff_logged_in = $grab['staff_logged_in'];

			$qq= mysql_query("SELECT * FROM teachers WHERE staff_id = '$staff_logged_in'");
				$fetch = mysql_fetch_assoc($qq);
					
					$staff_name = $fetch['full_name'];
					$staff_id = $fetch['staff_id'];

					$datein = date("jS F, Y");
					if ($dated=="$datein") {
						$dated="Today";
					}else{
						$dated="$dated";
					}

			$heading4 = "
			<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"text-align: center; width: 62px;\">Name</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Staff ID</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Position</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Logged In Staff</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
			</tr>
			";
			$newentrystaff.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: left; width: 70px;\">$full_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$admission_number</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$class</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$dated</td>
			</tr>
			";
		}
	}

	echo"<div class=\"record_back\" id=\"newentrystaff\" style=\"display:;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('newentrystaff').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					New Students
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%;\">
					$heading4
					$newentrystaff
				</table>
			</div>
		</div>
	</div>";





























if (isset($_POST['staffPaymentreport'])) {
	$selected = $_POST['selectedday'];
	if ($selected=="Today") {
		$datein = date("jS F, Y");

		$outCome="";
		$query = mysql_query("SELECT * FROM report_staff_payment WHERE dated='$datein' AND cleared='no' ORDER BY id DESC");
		if (mysql_num_rows($query)===0) {
			$outCome = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
					You have no report yet.
						</span>
					";
			$heading="";
		}else{
			while ($fetch = mysql_fetch_assoc($query)) {
				$id =$fetch['id']; 
				$full_name =$fetch['staff_name']; 
				$staff_id =$fetch['staff_id']; 
				$amount_received =$fetch['amount_received'];
				$payment_for_month =$fetch['payment_for_month'];
				$staff_logged_in =$fetch['staff_logged_in'];
			
			$qq= mysql_query("SELECT * FROM teachers WHERE staff_id = '$staff_logged_in'");
				$fetch = mysql_fetch_assoc($qq);
					
					$staff_name = $fetch['full_name'];
					$staff_id = $fetch['staff_id'];

					$datein = date("jS F, Y");
					if ($dated=="$datein") {
						$dated="Today";
					}else{
						$dated="$dated";
					}

			$heading = "
			<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"text-align: center; width: 62px;\">Name</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Staff ID.</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Amount Received</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Payment For</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Receipt Number</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Paid By</th>
			</tr>
			";
			$outCome.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: center; width: 50px;\">$full_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$staff_id</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">GH&#8373; $amount_received</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$payment_for_month</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$id</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
			</tr>
			";
			}
		}

echo"<div class=\"record_back\" id=\"record_back\" style=\"display: block;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 350px; width: 650px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('record_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Staff Payments Reports
				</div>
			</div>
			<div id=\"record_holder\">
				<table style=\"width: 99%;\"  style=\"overflow: auto;\">
					$heading
					$outCome
				</table>
			</div>
		</div>
</div>
";	}

	elseif ($selected=="All") {
		$outCome2="";
		$heading2="";
		$query1 = mysql_query("SELECT * FROM report_staff_payment WHERE cleared='no' ORDER BY id DESC");
		if (mysql_num_rows($query1)===0) {
			$outCome2 = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
						You have no report yet.
						</span>
					";
			$heading2='';
		}else{
			while ($fetch = mysql_fetch_assoc($query1)) {
				$id =$fetch['id']; 
				$full_name =$fetch['staff_name']; 
				$staff_id =$fetch['staff_id']; 
				$amount_received =$fetch['amount_received'];
				$payment_for_month =$fetch['payment_for_month'];
				$dated =$fetch['dated'];
				$staff_logged_in =$fetch['staff_logged_in'];
			$qq= mysql_query("SELECT * FROM teachers WHERE staff_id = '$staff_logged_in'");
				$fetch = mysql_fetch_assoc($qq);
					
					$staff_name = $fetch['full_name'];
					$staff_id = $fetch['staff_id'];

					$datein = date("jS F, Y");
					if ($dated=="$datein") {
						$dated="Today";
					}else{
						$dated="$dated";
					}
					
			$heading2 = "
			<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"text-align: center; width: 62px;\">Name</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Staff ID</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Amount Received</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Payment For</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Receipt Number</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Paid By</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
			</tr>
			";
			$outCome2.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: center; width: 50px;\">$full_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$staff_id</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\"> GH&#8373; $amount_received</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$payment_for_month</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$id</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$dated</td>
			</tr>
			";
			}
		}

echo"<div class=\"record_back\" id=\"record_back\" style=\"display: block;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:750px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('record_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Staff Payments Reports
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%;\">
					$heading2
					$outCome2
				</table>
			</div>
		</div>
</div>";
			}
		}

?>
</div>