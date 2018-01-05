<div id="child_all">
<?php 

$bar=$_GET['utab'];
if (strpos($bar, "adminitstratorsysNsromapaadmin_bankmanagementmanage_bank")!==false) {


	$delete_firm="";
		$edit="";
	$bank_informations="";
	$query = mysql_query("SELECT * FROM admin_bank WHERE active='yes'");
	if (mysql_num_rows($query)===0) {
		$bank_informations="";
		$delete_firm="";
		$edit="";

	}else{
		while ($fetch = mysql_fetch_assoc($query)) {
			$id = $fetch['id'];
			$bank_name = $fetch['bank_name'];
			$branch = $fetch['branch'];
			$account_number = $fetch['account_number'];
			$account_name = $fetch['account_name'];
			$current_amount = $fetch['current_amount'];

	$bank_informations.="
		<div id=\"heading\">		
			<div style=\"font-weight: bolder; font-size: 22px; font-family: Lucida Fax; float: left; margin: 0px; height: 30px; text-decoration: underline;\">
				<img src=\"images/bank.png\" style=\"height: 110%; margin-top: 2px;\">
				Bank Accounts Details
			</div>
		</div>
			<div id=\"bank_infos\">
				<table style=\"width: 100%;\">
					<tr>
						<th>Bank Name</th>
						<td>
							$bank_name
						</td>
					</tr>
					<tr>
						<th>Branch</th>
						<td>
							$branch
						</td>
					</tr>
					<tr>
						<th>Account Number</th>
						<td>
							$account_number
						</td>
					</tr>
					<tr>
						<th>Account Name</th>
						<td>
							$account_name
						</td>
					</tr>
					<tr>
						<th>Current Balance</th>
						<td>
							GH&#8373; $current_amount
						</td>
					</tr>
				</table>
				

				<table style=\"width: 70%; margin-top: 25px; float: right;\">
				<tr style=\"border: none;\">
					<td>
							<input type=\"submit\" value=\"Edit\" onclick=\"document.getElementById('edit$id').style.display='block'\" />
							<input type=\"submit\" value=\"Delete\" onclick=\"document.getElementById('delete$id').style.display='block'\" />

					</td>
				</tr>
			</table>

		</div>
	<br /><br />";
$delete_firm.= "<div class=\"modal\" id=\"delete$id\">
	<span class=\"product-div-overlay-close\" onclick=\"document.getElementById('delete$id').style.display='none'\">x</span>
<div id=\"deposit\">
<table style=\"width: 100%\">
	<form method=\"post\" action=\"\">
	
				<div style=\"height: 170px;\">

				<br /><br />

				<span style=\"color:#ff0000; text-shadow: 1px 1px rgba(0,0,0,0.8);\">
					Do You really want to DELETE this Bank Account?
				</span>

				<br /><br /><br /><br /><br />

					<input type=\"submit\" value=\"Delete\" name=\"delYes$id\"/>
					<input type=\"submit\" value=\"Cancel\" onclick=\"document.getElementById('delete$id').style.display='none'\"/>
				</div>
		</form>
	</table>
</div>
</div>
";

$edit.= "<div class=\"modal\" id=\"edit$id\">
<div id=\"deposit\">
			<div id=\"bank_infos\" style=\"height: 305px;\">
			<form action=\"#\" method=\"post\">
				<table style=\"width: 100%;\">
					<tr>
						<th>Bank Name</th>
						<td>
							<input type=\"text\" value=\"$bank_name\" name=\"b_name2\"></input>
							
						</td>
					</tr>
					<tr>
						<th>Branch</th>
						<td>
							<input type=\"text\" value=\"$branch\" name=\"B_branch2\"></input>
							
						</td>
					</tr>
					<tr>
						<th>Account Number</th>
						<td>
							<input type=\"text\" value=\"$account_number\" name=\"b_ac_no2\"></input>
							
						</td>
					</tr>
					<tr>
						<th>Account Name</th>
						<td>
							<input type=\"text\" value=\"$account_name\" name=\"b_ac_name2\"></input>
							
						</td>
					</tr>
					<tr>
						<th>Current Amount</th>
						<td>
							<input type=\"text\" value=\"$current_amount\" name=\"b_current_amount2\"></input>
						</td>
					</tr>
				</table>
				<br />
				<br />
				<br />
						<input type=\"submit\" value=\"Update\" name=\"editYES$id\"/>

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<input type=\"submit\" value=\"Cancel\" onclick=\"document.getElementById('edit$id').style.display='none'\"/>

		</form>
		</div>
</div>
</div>
";

if (isset($_POST["editYES$id"])) {
	$b_name2 = $_POST['b_name2'];
	$B_branch2 = $_POST['B_branch2'];
	$b_ac_no2 = $_POST['b_ac_no2'];
	$b_ac_name2 = $_POST['b_ac_name2'];
	$b_current_amount2 = $_POST['b_current_amount2'];

if ($b_name2 !="" AND $B_branch2 !="" AND $b_ac_no2 !="" AND $b_ac_name2 !="" AND $b_current_amount2 !="") {

	mysql_query("UPDATE admin_bank SET bank_name='$b_name2', branch='$B_branch2', account_number='$b_ac_no2', account_name='$b_ac_name2', current_amount = '$b_current_amount2' WHERE id='$id' AND active='yes'");
	?>
	<script type="text/javascript">
			location.replace("home.php?utab=adminitstratorsysNsromapaadmin_bankmanagementmanage_bank");
		</script>
	<?php
}else{
	echo "No area could be empty.";
}
}

if (isset($_POST["delYes$id"])) {
	mysql_query("UPDATE admin_bank SET active='no' WHERE id='$id'");
	?>
		<script type="text/javascript">
			location.replace("home.php?utab=adminitstratorsysNsromapaadmin_bankmanagementmanage_bank");
		</script>
	<?php
}
}

	echo "$bank_informations";
	echo "$delete_firm";
	echo "$edit";
}
}
elseif (strpos($bar, "adminitstratorsysNsromapaadmin_bankmanagementadd_bank")!==false) {
	echo "<div id=\"heading\">		
			<div style=\"font-weight: bolder; font-size: 22px; font-family: Lucida Fax; float: left; margin: 0px; height: 30px; text-decoration: underline;\">
				<img src=\"images/bank.png\" style=\"height: 110%; margin-top: 2px;\">
				Bank Accounts Details
			</div><br>
		</div>
			<div id=\"bank_infos\" style=\"height: 305px;\">
			<form action=\"#\" method=\"post\">
				<table style=\"width: 100%;\">
					<tr>
						<th>Bank Name</th>
						<td>
							<input type=\"text\" name=\"b_name\"></input>
							
						</td>
					</tr>
					<tr>
						<th>Branch</th>
						<td>
							<input type=\"text\" name=\"B_branch\"></input>
							
						</td>
					</tr>
					<tr>
						<th>Account Number</th>
						<td>
							<input type=\"text\" name=\"b_ac_no\"></input>
							
						</td>
					</tr>
					<tr>
						<th>Account Name</th>
						<td>
							<input type=\"text\" name=\"b_ac_name\"></input>
							
						</td>
					</tr>
					<tr>
						<th>Current Amount</th>
						<td>
							<input type=\"text\" name=\"b_current_amount\"></input>
						</td>
					</tr>
				</table>
				

				<table style=\"width: 25%; height: 150px; margin-top: 25px; float: right;\">
				<tr style=\"border: none;\">
					<td>
							<input type=\"submit\" value=\"Add Account\" name=\"add_account\" style=\"width: 120px; height: 40px; border-radius: 3px;\"/>
					</td>
				</tr>
			</table>
		</form>
		</div>";
		if ($bar=="adminitstratorsysNsromapaadmin_bankmanagementadd_banke1") {
			echo "<span style=\"color:#ff0000; text-shadow: 1px 1px rgba(0,0,0,0.8);\">
			Please make sure all areas Correctly filled.
			</span>";
		}elseif ($bar=="adminitstratorsysNsromapaadmin_bankmanagementadd_banke2") {
			echo "<span style=\"color:#ff0000; text-shadow: 1px 1px rgba(0,0,0,0.8);\">
				Account Already exist.
				</span>";
		}

		if (isset($_POST['add_account'])) {
			$b_name = $_POST['b_name'];
			$B_branch = $_POST['B_branch'];
			$b_ac_no = $_POST['b_ac_no'];
			$b_ac_name = $_POST['b_ac_name'];
			$b_current_amount = $_POST['b_current_amount'];

			$query = mysql_query("SELECT * FROM admin_bank WHERE bank_name='$b_name' AND account_number='$b_ac_no' AND active='yes'");
			if (mysql_num_rows($query)===0) {
				
				if ($b_name !="" AND $B_branch!="" AND $b_ac_no !="" AND $b_ac_name!="" AND $b_current_amount !="") {
					mysql_query("INSERT admin_bank VALUES ('','$b_name','$B_branch','$b_ac_no','$b_ac_name','$b_current_amount','yes')");
					?>
				<script type="text/javascript">
					location.replace("home.php?utab=adminitstratorsysNsromapaadmin_bankmanagementadd_banke2");
				</script>
					<?php
				}else{
						?>
				<script type="text/javascript">
					location.replace("home.php?utab=adminitstratorsysNsromapaadmin_bankmanagementadd_banke1");
				</script>
					<?php
				}
			}else{
					?>
				<script type="text/javascript">
					location.replace("home.php?utab=adminitstratorsysNsromapaadmin_bankmanagementadd_bankerror2");
				</script>
					<?php
			}
		}
}
else{
echo "<div id=\"child_all\">
		<div style=\"padding-top: 5%;\"> 
			<center>
		<div id=\"select_class_search_adnimno\">
		<br><br><br><br /><br />
			<a href=\"home.php?utab=adminitstratorsysNsromapaadmin_bankmanagementadd_bank\" style=\"color:#03cb9b; text-decoration: none; font-size: 25px; font-family: Lucida Fax; background-color: #fff; width: 190%; padding: 7%; padding-top:7%;  border-radius: 7px;\">
				<img src=\"images/add_report.png\" />
				Add Bank
			</a>
			<br /><br /><br /><br />
			<a href=\"home.php?utab=adminitstratorsysNsromapaadmin_bankmanagementmanage_bank\" style=\"color:#03cb9b; text-decoration: none; font-size: 20px; font-family: Lucida Fax; background-color: #fff; width: 190%; padding: 4%; padding-top:7%; border-radius: 7px;\">
			<img src=\"images/open_report.png\" />
				Manage Banks
			</a>
		</div>
			</center>
		</div>
	</div>";

}
?>
</div>