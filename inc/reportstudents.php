<div id="child_all">

<?php
echo "

	<div class=\"allInnewentry\" onclick=\"document.getElementById('newentry').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		New Entries<br />
	</div>


	<div class=\"allInactivate_de\" onclick=\"document.getElementById('activated_de').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		Activated / Deactivated<br />
	</div>


	<div class=\"allInfee_payment\" onclick=\"document.getElementById('feePayment').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		Fee Payment<br />
	</div>
	
		<div class=\"allIn2feeowing\" onclick=\"document.getElementById('add_new_login_staff_back').style.display='block'\">
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
			Fee Owing List<br />
		</div>


	<div class=\"allIn2billings\" onclick=\"document.getElementById('billing').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		Billings<br />
	</div>

	<div class=\"allIn2infoupdate\" onclick=\"document.getElementById('updated').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		Info Upadates<br />
	</div>
";


echo "
<div id=\"add_new_login_staff_back\">
	<center>
		<div id=\"add_login_staff_all\">
			<form action=\"#\" method=\"post\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('add_new_login_staff_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Add Staff to Login Users
				</div>
			</div>
			<div id=\"record_holder\">

			<select name=\"class\" style=\"width: 350px; border: 0px; color:#000; margin-top: 50px;\">
				<option value=\"Creche\">Creche</option>
				<option value=\"Nursery 1\">Nursery 1</option>
				<option value=\"Nursery 2\">Nursery 2</option>
				
				<option value=\"KG 1\">KG 1</option>
				<option value=\"KG 2\">KG 2</option>
			
				<option value=\"Grade 1\">Grade 1</option>
				<option value=\"Grade 2\">Grade 2</option>
			</select>

					<input type=\"text\" placeholder=\"Lowest Amount\"  name=\"Lowestamount\" style=\"width: 350px; color:#000; margin-top: 25px;\" />
					<input type=\"submit\" name=\"fetch\" value=\"Fetch\" style=\"width: 100px; height: 30px; margin-left: 0px; margin-top: 25px;\" />
				</form>
			</div>
		</div>
	</center>
</div>
";
if (isset($_POST['fetch'])) {
	$class = $_POST['class'];
	$Lowestamount = $_POST['Lowestamount'];
	if ($class !="" AND $Lowestamount !="") {
		?>
	<script type="text/javascript">
		location.replace("runners/topdfstudentsowing.php?class=<?php echo "$class,$Lowestamount"; ?>");
	</script>
		<?php
	}else{
		echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\">
			Please Enter Least Amount to be searched!
		</span>";
	}
}


echo "
<div class=\"add_new_login_staff_back\" id=\"billing\">
	<center>
		<div id=\"add_login_staff_all\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('billing').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Billing Reports
				</div>
			</div>
			<div id=\"record_holder\">
				<form method=\"post\" action=\"#\">
					<br /><br /><br /><br /><br /><br />
					<select name=\"selectday\" style=\"width:80% ;\">
						<option value=\"Today\">Today</option>
						<option value=\"All\">All</option>
					</select><br /><br /><br />
					<input type=\"submit\" name=\"billingreport\" value=\"Submit\" style=\"width: 100px; height: 30px; margin-left: 0px; margin-top: 25px;\" />
				</form>
			</div>
		</div>
	</center>
</div>";



if (isset($_POST['billingreport'])) {
	$selected = $_POST['selectday'];
	if ($selected=="Today") {
		$datein = date("jS F, Y");
		$total="";
		$outCome="";
		$query = mysql_query("SELECT * FROM report_billed_or_crediting WHERE dated='$datein' AND cleared='no' ORDER BY id DESC");
		if (mysql_num_rows($query)===0) {
			$outCome = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
					You have no report yet.
						</span>
					";
			$heading = "";
			$total="";
					
		}else{
			while ($fetch = mysql_fetch_assoc($query)) {
				$Name = $fetch['Name']; 
				$class = $fetch['class'];
				$credit_or_debit =$fetch['credit_or_debit'];
				$billed_or_credited_with =  $fetch['billed_or_credited_with'];
				$total_amount_owed = $fetch['total_amount_owed'];
				$total +=$fetch['total_amount_owed'];
				$staff_logged_in = $fetch['staff_logged_in'];
				$dated = $fetch['dated'];
				$ed="";
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
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Admission No.</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Debited / Credited.</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Amount Billed</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Amount Owed</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Logged In Staff</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
			</tr>
			";
			$ed="ed";
			$outCome.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: center; width: 50px;\">$Name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$class</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\"> $credit_or_debit$ed</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\"> GH&#8373; $billed_or_credited_with</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">GH&#8373; $total_amount_owed</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$dated</td>
			</tr>
			";
			}
		}

echo"<div class=\"record_back\" id=\"record_back\" style=\"display: block;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 350px; width: 800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('record_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Total Amount recieved : GH&#8373; $total
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
		$total="";
		$query22 = mysql_query("SELECT * FROM report_billed_or_crediting WHERE cleared='no' ORDER BY id DESC");
		if (mysql_num_rows($query22)===0) {
			$outCome2 = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
						You have no report yet.
						</span>
					";
			$heading2='';
			$outCome2='';
			$total="";
		}else{
			while ($fetch = mysql_fetch_assoc($query22)) {
				$Name = $fetch['Name']; 
				$class = $fetch['class'];
				$credit_or_debit =$fetch['credit_or_debit'];
				$billed_or_credited_with =  $fetch['billed_or_credited_with'];
				$total_amount_owed = $fetch['total_amount_owed'];
				$total += $fetch['total_amount_owed'];
				$staff_logged_in = $fetch['staff_logged_in'];
				$dated = $fetch['dated'];

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
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Admission No.</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Debited / Credited.</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Amount Billed</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Amount Owed</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Logged In Staff</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
			</tr>
			";
			$ed = "ed";
			$outCome2.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: center; width: 50px;\">$Name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$class</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\"> $credit_or_debit$ed</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\"> GH&#8373; $billed_or_credited_with</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">GH&#8373; $total_amount_owed</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$dated</td>
			</tr>";
			}
		}

echo"<div class=\"record_back\" id=\"record_back\" style=\"display: block;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('record_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Total Amount recieved : GH&#8373; $total
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











			$heading5 = "";
			$updated = "";
$query3 = mysql_query("SELECT * FROM report_staff_student_info_update WHERE cleared='no' AND status='student' ORDER BY id DESC");
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

					$datein = date("jS F, Y");
					if ($dated=="$datein") {
						$dated="Today";
					}else{
						$dated="$dated";
					}
					

			$heading5 = "
			<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"text-align: center; width: 62px;\">Name</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Admission No.</th>
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






			$heading4 = "";
			$newentry = "";
$query3 = mysql_query("SELECT * FROM report_new_staff_student WHERE cleared='no' AND status='student' ORDER BY id DESC");
	if (mysql_num_rows($query3)===0) {
		$heading4 = "";
		$newentry = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
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
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Admission No.</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Class</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Logged In Staff</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
			</tr>
			";
			$newentry.= "
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

	echo"<div class=\"record_back\" id=\"newentry\" style=\"display:;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('newentry').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					New Students
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%;\">
					$heading4
					$newentry
				</table>
			</div>
		</div>
	</div>";









			$heading3 = "";
			$activated_de = "";
$query2 = mysql_query("SELECT * FROM report_activate_deactivate_students WHERE cleared='no' ORDER BY id DESC");
	if (mysql_num_rows($query2)===0) {
		$heading3 = "";
		$activated_de = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
						You have no report yet.
						</span>";
	}else{
		while ($get = mysql_fetch_assoc($query2)) {
			$full_name = $get['full_name'];
			$class = $get['class'];
			$admission_number = $get['admission_number'];
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
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Admission No.</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Class</th>

						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Activated / Deactivated</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Logged In Staff</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
			</tr>
			";
			$activated_de.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: left; width: 70px;\">$full_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$admission_number</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$class</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$activate_deactivate</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$dated</td>
			</tr>
			";
		}
	}

echo"<div class=\"record_back\" id=\"activated_de\" style=\"display:;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('activated_de').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Activated and Deactivated Students
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%;\">
					$heading3
					$activated_de
				</table>
			</div>
		</div>
</div>";

echo "
<div class=\"add_new_login_staff_back\" id=\"feePayment\">
	<center>
		<div id=\"add_login_staff_all\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('feePayment').style.display='none'\">
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
					<input type=\"submit\" name=\"feePaymentreport\" value=\"Submit\" style=\"width: 100px; height: 30px; margin-left: 0px; margin-top: 25px;\" />
				</form>
			</div>
		</div>
	</center>
</div>";

if (isset($_POST['feePaymentreport'])) {
	$selected = $_POST['selectedday'];
	if ($selected=="Today") {
		$datein = date("jS F, Y");

		$total = "";
		$outCome="";
		$query = mysql_query("SELECT * FROM report_fee_payment WHERE dated='$datein' AND cleared='no' ORDER BY id DESC");
		if (mysql_num_rows($query)===0) {
			$outCome = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
					You have no report yet.
						</span>
					";
			$heading = "";
			$total = "";
					
		}else{
			while ($fetch = mysql_fetch_assoc($query)) {
				$full_name =$fetch['full_name']; 
				$admission_number =$fetch['admission_number']; 
				$class =$fetch['class'];
				$amount =$fetch['amount'];
				$staff_logged_in =$fetch['staff_logged_in'];
				$total +=$fetch['amount'];
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
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Admission No.</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Class</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Amount Paid</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Logged In Staff</th>
			</tr>
			";
			$outCome.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: center; width: 50px;\">$full_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$admission_number</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$class</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">GH&#8373; $amount</td>
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
					Total Amount recieved : GH&#8373; $total
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
			$total2='';
		$heading2="";
		$query1 = mysql_query("SELECT * FROM report_fee_payment WHERE cleared='no' ORDER BY id DESC");
		if (mysql_num_rows($query1)===0) {
			$outCome2 = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
						You have no report yet.
						</span>
					";
			$heading2='';
			$total2='';
		}else{
			while ($fetch = mysql_fetch_assoc($query1)) {
				$full_name =$fetch['full_name']; 
				$admission_number =$fetch['admission_number']; 
				$class =$fetch['class'];
				$amount =$fetch['amount'];
				$dated =$fetch['dated'];
				$staff_logged_in =$fetch['staff_logged_in'];
				$total2 +=$fetch['amount'];
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
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Admission No.</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Class</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Amount Paid</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Logged In Staff</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
			</tr>
			";
			$outCome2.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: center; width: 50px;\">$full_name</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$admission_number</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$class</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$amount</td>
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
					Total Amount recieved : GH&#8373; $total2
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