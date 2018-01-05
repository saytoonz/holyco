<div id="child_all">

<?php

	$bank_informations="";
	$withdra="";
	$depo="";
	$report="";
	$query = mysql_query("SELECT * FROM admin_bank WHERE active='yes'");
	if (mysql_num_rows($query)===0) {
		$bank_informations="";
		$depo="";
		$withdra="";
		$report="";

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
				

				<table style=\"width: 100%; margin-top: 25px;\">
				<tr style=\"border: none;\">
					<td>
							<input type=\"submit\" value=\"Deposit\" onclick=\"document.getElementById('modal$id').style.display='block'\" />
							<input type=\"submit\" value=\"Withdraw\" onclick=\"document.getElementById('modalwith$id').style.display='block'\" />
							<input type=\"submit\" value=\"Records\" onclick=\"document.getElementById('record_back$id').style.display='block'\" name=\"records\" />
					</td>
				</tr>
			</table>

		</div>
	<br /><br />";


$depo.= "<div class=\"modal\" id=\"modal$id\">
	<span class=\"product-div-overlay-close\" onclick=\"document.getElementById('modal$id').style.display='none'\">x</span>
<div id=\"deposit\">
<table style=\"width: 100%\">
	<form method=\"post\" action=\"\">
			<tr>
				<th>Date</th>
				<td>
					<input type=\"date\" name=\"depo_date\"> 
				</td>
				<th>Amount</th>
				<td>
					<input type=\"text\" name=\"depo_amount\"> 
				</td>
			</tr>
			<tr>
				<th>Payment Mood</th>
				<td>
					<select name=\"depo_paymenthod\">
						<option value=\"Cash\">Cash</option>
						<option value=\"Cheque\">Cheque</option>
					</select>
				</td>
				<th>Cheque Date</th>
				<td>
					<input type=\"date\" name=\"cheque_date\"> 
				</td>
			</tr>
			<tr>
				<th>Remarks</th>
				<td>
					<input type=\"text\" name=\"remarks\"> 
				</td>
				<th>Cheque Number</th>
				<td>
					<input type=\"text\" name=\"cheque_number\"> 
				</td>
			</tr>
			<tr>
				<th></th><td></td>
				<th></th>
				<td>
					<input type=\"submit\" value=\"Deposit\" name=\"depositin$id\"/>
				</td>
			</tr>
		</form>
	</table>
</div>
</div>";

$withdra.= "<div class=\"modal\" id=\"modalwith$id\">
	<span class=\"product-div-overlay-close\" onclick=\"document.getElementById('modalwith$id').style.display='none'\">x</span>
<div id=\"deposit\">
<table style=\"width: 100%\">
	<form method=\"post\" action=\"#\">
			<tr>
				<th>Date</th>
				<td>
					<input type=\"date\" name=\"withdraw_date\"> 
				</td>
				<th>Amount</th>
				<td>
					<input type=\"text\" name=\"withdraw_amount\"> 
				</td>
			</tr>
			<tr>
				<th>Payment Mood</th>
				<td>
					<select name=\"withdraw_paymenthod\">
						<option value=\"Cash\">Cash</option>
						<option value=\"Cheque\">Cheque</option>
					</select>
				</td>
				<th>Cheque Date</th>
				<td>
					<input type=\"date\" name=\"cheque_date\"> 
				</td>
			</tr>
			<tr>
				<th>Remarks</th>
				<td>
					<input type=\"text\" name=\"remarks\"> 
				</td>
				<th>Cheque Number</th>
				<td>
					<input type=\"text\" name=\"cheque_number\"> 
				</td>
			</tr>
			<tr>
				<th></th><td></td>
				<th></th>
				<td>
					<input type=\"submit\" value=\"Withdraw\" name=\"withdraw$id\"/>
				</td>
			</tr>
		</form>
	</table>
</div>
</div>
";
	$infos="";
	$info_head = "";
$query1 = mysql_query("SELECT * FROM bank_depo_cheque WHERE bank_name ='$bank_name' AND account_number='$account_number'");
	if (mysql_num_rows($query1)===0) {
		$infos = "<span style=\"color:#ff0000; text-shadow: 1px 1px rgba(0,0,0,0.8);\">
				No record for Deposits yet!
			</span>";
		$info_head = "";
	}else{
		while ($get_all = mysql_fetch_assoc($query1)) {
			$dated = $get_all['dated'];
			$amount = $get_all['amount'];
			$total_amount = $get_all['total_amount'];
			$remarks = $get_all['remarks'];
			$cheque_number = $get_all['cheque_number'];
			$cheque_date = $get_all['cheque_date'];
			$loggedin_staff = $get_all['loggedin_staff'];

			if ($cheque_number=="") {
				$method ="Cash";
			}else{
				$method ="
<span title=\"Cheque Number: $cheque_number
Cheque Date: $cheque_date\">Cheque</span>";
			}

		$query2 = mysql_query("SELECT * FROM teachers WHERE staff_id='$Login_staff'");
		$fetch2 = mysql_fetch_assoc($query2);
			$full_name = $fetch2['full_name'];

			$info_head = "
				<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"width: 50px;\">Date</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Method</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Amount</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Total</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Paid By</th>
						<th style=\"width: 80px; border-left: 1px solid #000;\">Remarks</th>
					</tr>
			";
			$infos.="
					<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
						<td style=\"width: 50px;\">$dated</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">$method</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">$amount</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">$total_amount</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\" title=\"$full_name\">$loggedin_staff</td>
						<td style=\"width: 80px;border-left: 1px solid #000;\">$remarks</td>
					</tr>
				"; 

		}
	}


		$info_head2 = "";
		$infos2 = "";
	$query1again = mysql_query("SELECT * FROM bank_withdraw_cheque WHERE bank_name ='$bank_name' AND account_number='$account_number'");
	if (mysql_num_rows($query1again)===0) {
		$infos2 = "<span style=\"color:#ff0000; text-shadow: 1px 1px rgba(0,0,0,0.8);\">
				No record for Withdrawals yet!
			</span>";
		$info_head2 = "";
	}else{
		while ($get_all_again = mysql_fetch_assoc($query1again)) {
			$dated2 = $get_all_again['dated'];
			$amount2 = $get_all_again['amount'];
			$total_amount2 = $get_all_again['total_amount'];
			$remarks2 = $get_all_again['remarks'];
			$cheque_number2 = $get_all_again['cheque_number'];
			$cheque_date2 = $get_all_again['cheque_date'];
			$loggedin_staff2 = $get_all_again['loggedin_staff'];

			if ($cheque_number2=="") {
				$method2 ="Cash";
			}else{
				$method2 ="
<span title=\"Cheque Number: $cheque_number2
Cheque Date: $cheque_date2\">Cheque</span>";
			}

		$query2again = mysql_query("SELECT * FROM teachers WHERE staff_id='$Login_staff'");
		$fetch2 = mysql_fetch_assoc($query2again);
			$full_name2 = $fetch2['full_name'];

			$info_head2 = "
				<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"width: 50px;\">Date</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Method</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Amount</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Total</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Withdraw By</th>
						<th style=\"width: 80px; border-left: 1px solid #000;\">Remarks</th>
					</tr>
			";
			$infos2.="
					<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
						<td style=\"width: 50px;\">$dated2</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">$method2</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">$amount2</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">$total_amount2</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\" title=\"$full_name2\">$loggedin_staff2</td>
						<td style=\"width: 80px;border-left: 1px solid #000;\">$remarks2</td>
					</tr>
				"; 

		}
	}

$report.="
<div class=\"record_back\" id=\"record_back$id\">
<div id=\"close_all\" title=\"Close All\" onclick=\"document.getElementById('record_back$id').style.display='none'\">
					Close All
				</div>
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 200px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('records_all1').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Deposits to $bank_name
				</div>
			</div>
			<div id=\"record_holder\">
				<table style=\"width: 100%;\">
					$info_head 
					$infos
				</table>
			</div>
		</div>
		<div id=\"records_all2\" class=\"records_all\" style=\"margin-left: 200px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('records_all2').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Withdrawals From $bank_name
				</div>
			</div>
			<div id=\"record_holder\">
				<table style=\"width: 100%;\">
					$info_head2 
					$infos2
				</table>
			</div>
		</div>
</div>
";

if (isset($_POST["depositin$id"])) {
	$depo_date = $_POST['depo_date'];
	$depo_amount = $_POST['depo_amount'];
	$depo_paymenthod = $_POST['depo_paymenthod'];
	$cheque_date = $_POST['cheque_date'];
	$remarks = $_POST['remarks'];
	$cheque_number = $_POST['cheque_number'];

	$get = mysql_query("SELECT * FROM admin_bank WHERE bank_name ='$bank_name' AND account_number='$account_number' AND branch='$branch'");
	$grab = mysql_fetch_assoc($get);
	$amount_in = $grab['current_amount'];
	
	$amount_all = $amount_in + $depo_amount; 

	if ($depo_date !="" AND $depo_amount !="" AND $depo_paymenthod =="Cash" AND $cheque_date=="" AND $cheque_number=="") {
		mysql_query("UPDATE admin_bank SET current_amount='$amount_all' WHERE bank_name ='$bank_name' AND account_number='$account_number' AND branch='$branch'");
		mysql_query("INSERT INTO bank_depo_cheque VALUES('','$bank_name','$account_name','$account_number','$depo_date','','','$depo_amount','$amount_in','$amount_all','$remarks','$Login_staff')");
		?>
<script type="text/javascript">
	alert("Amount Deposited Successfully");
	location.replace("home.php?utab=accountsBanking");
</script>
		<?php
	}

	elseif ($depo_date !="" AND $depo_amount !="" AND $cheque_date !="" AND $cheque_number !="" AND $depo_paymenthod =="Cheque") {
		mysql_query("UPDATE admin_bank SET current_amount='$amount_all' WHERE bank_name ='$bank_name' AND account_number='$account_number' AND branch='$branch'");
		mysql_query("INSERT INTO bank_depo_cheque VALUES('','$bank_name','$account_name','$account_number','$depo_date','$cheque_number','$cheque_date','$depo_amount','$amount_in','$amount_all','$remarks')");
			?>
<script type="text/javascript">
	alert("Amount Deposited Successfully");
	location.replace("home.php?utab=accountsBanking");
</script>
		<?php
		
	}else{
		echo "<span style=\"color:#ff0000; text-shadow: 1px 1px rgba(0,0,0,0.8);\">
			Please make sure Payment Mood matched the filled areas Correctly
			</span>";
	}

}elseif (isset($_POST["withdraw$id"])) {
	$withdraw_date = $_POST['withdraw_date'];
	$withdraw_amount = $_POST['withdraw_amount'];
	$withdraw_paymenthod = $_POST['withdraw_paymenthod'];
	$cheque_date = $_POST['cheque_date'];
	$remarks = $_POST['remarks'];
	$cheque_number = $_POST['cheque_number'];

	$get = mysql_query("SELECT * FROM admin_bank WHERE bank_name ='$bank_name' AND account_number='$account_number' AND branch='$branch'");
	$grab = mysql_fetch_assoc($get);
	$amount_in = $grab['current_amount'];
	
	$amount_all = $amount_in - $withdraw_amount; 

	if ($withdraw_date !="" AND $withdraw_amount !="" AND $withdraw_paymenthod =="Cash" AND $cheque_date=="" AND $cheque_number=="") {
		mysql_query("UPDATE admin_bank SET current_amount='$amount_all' WHERE bank_name ='$bank_name' AND account_number='$account_number' AND branch='$branch'");
		
		mysql_query("INSERT INTO bank_withdraw_cheque VALUES('','$bank_name','$account_name','$account_number','$withdraw_date','','','$withdraw_amount','$amount_in','$amount_all','$remarks','$Login_staff')");
		?>
<script type="text/javascript">
	alert("Amount withdrawed Successfully");
	location.replace("home.php?utab=accountsBanking");
</script>
		<?php
	}

	elseif ($withdraw_date !="" AND $withdraw_amount !="" AND $cheque_date !="" AND $cheque_number !="" AND $withdraw_paymenthod =="Cheque") {
		mysql_query("UPDATE admin_bank SET current_amount='$amount_all' WHERE bank_name ='$bank_name' AND account_number='$account_number' AND branch='$branch'");
		mysql_query("INSERT INTO bank_withdraw_cheque VALUES('','$bank_name','$account_name','$account_number','$withdraw_date','$cheque_number','$cheque_date','$withdraw_amount','$amount_in','$amount_all','$remarks','$Login_staff')");
			?>
<script type="text/javascript">
	alert("Amount withdrawed Successfully");
	location.replace("home.php?utab=accountsBanking");
</script>
		<?php
		
	}else{
		echo "<span style=\"color:#ff0000; text-shadow: 1px 1px rgba(0,0,0,0.8);\">
			Please make sure Payment Mood matched the filled areas Correctly
			</span>";
	}

}





		}
	}

echo "$bank_informations";
echo "$withdra";
echo "$depo";
echo "$report";

?>
<script type="text/javascript">
	
</script>
</div>
