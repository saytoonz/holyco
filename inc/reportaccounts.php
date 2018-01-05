<div id="child_all">

<?php

	echo "
		<div class=\"allInnewentry\" onclick=\"document.getElementById('Withdraw').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		Withdrawals<br />
	</div>

	<div class=\"allInactivate_de\" onclick=\"document.getElementById('deposites').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		Deposites<br />
	</div>


	<div class=\"allInfee_payment\" onclick=\"document.getElementById('expenses').style.display='block'\">
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		Expenses<br />
	</div>";


	$today = date("jS F, Y");
$query11 = mysql_query("SELECT * FROM daily_collection WHERE dated='$today' ORDER BY id DESC");
	if (mysql_num_rows($query11)===0) {
		$sika = "No amount recieved Today";
	}else{
		$get_sica = mysql_fetch_assoc($query11);
		$sika = $get_sica['amount'];
		if (strpos($sika, ".")) {
			$sika = "$sika";
		}else{
			$sika = "$sika.00";
		}
	}
echo"<div id=\"daily_colletion_report\" title=\"Net Total\">
		<div id=\"in\">
			<div id=\"amountHolder\">

				<div id=\"cedis\">
					GH&#8373;
				</div>
				<div id=\"amount\">
				$sika
				</div>

				<div id=\"date\">
				$today
				</div>

			</div>
			<div id=\"allbut\">
				<input type=\"submit\" value=\"All\" title=\"All Reports\" onclick=\"document.getElementById('all_reports').style.display='block'\"></input>
			</div>
		</div>
	</div>
	";

$allrep="";
$heading="";
$query33 = mysql_query("SELECT * FROM daily_collection ORDER BY id DESC");
if (mysql_num_rows($query33)===0) {
	$sika="";
	$allrep="";
}else{
	while ($fetch_all=mysql_fetch_assoc($query33)) {
		$sika = $fetch_all['amount'];
		$dated = $fetch_all['dated']; 

	$heading = "
			<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"text-align: center; width: 62px;\">Date</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Net Total</th>
			</tr>
			";

	$allrep.="
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: center; width: 50px;\"> $dated</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">GH&#8373;$sika</td>
				</tr>
				";
		}
}

echo "
<div class=\"record_back\" id=\"all_reports\">
		<div id=\"records_all1\" class=\"records_all\" style=\" margin-left: 500px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('all_reports').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Report on Expenses
				</div>
			</div>
			<div id=\"record_holder\">
				<table style=\"width: 100%;\">
					$heading 
					$allrep
				</table>
			</div>
		</div>
</div>
";



echo "
<div class=\"add_new_login_staff_back\" id=\"expenses\">
	<center>
		<div id=\"add_login_staff_all\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('expenses').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Expenses Report
				</div>
			</div>
			<div id=\"record_holder\">
				<form method=\"post\" action=\"#\">
					<br /><br /><br /><br /><br /><br />
					<select name=\"selectday\" style=\"width:80% ;\">
						<option value=\"Today\">Today</option>
						<option value=\"All\">All</option>
					</select><br /><br /><br />
					<input type=\"submit\" name=\"expensesses\" value=\"Submit\" style=\"width: 100px; height: 30px; margin-left: 0px; margin-top: 25px;\" />
				</form>
			</div>
		</div>
	</center>
</div>";



if (isset($_POST['expensesses'])) {
	$selected = $_POST['selectday'];
	if ($selected=="Today") {
		$datein = date("jS F, Y");

		$outCome="";
		$amount_all="";
		$query = mysql_query("SELECT * FROM expenses WHERE dated='$datein' ORDER BY id DESC");
		if (mysql_num_rows($query)===0) {
			$outCome = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
					You have no report yet.
						</span>
					";
			$heading = "";
			$amount_all="";
					
		}else{
			while ($fetch = mysql_fetch_assoc($query)) {
				$amount = $fetch['amount']; 
				$amount_all += $fetch['amount'];
				$paid_towards =$fetch['paid_towards'];
				$dated =  $fetch['dated'];
				$staff_logged_in = $fetch['staff_logged_in'];

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
						<th style=\"text-align: center; width: 62px;\">Amount</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Paid Towards</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Paid By</th>
			</tr>
			";

			$outCome.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: center; width: 50px;\">GH&#8373; $amount</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$paid_towards</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\"> $dated</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
				</tr>
			";
			}
		}


echo"<div class=\"record_back\" id=\"record_back\" style=\"display: block;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('record_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Total Amount used Today : GH&#8373; $amount_all
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%;\">
					$heading
					$outCome
				</table>
			</div>
		</div>
</div>";
	}

	elseif ($selected=="All") {
		$outCome="";
		$heading="";
		$amount_all="";
		$query22 = mysql_query("SELECT * FROM expenses ORDER BY id DESC");
		if (mysql_num_rows($query22)===0) {
			$outCome = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
						You have no report yet.
						</span>
					";
			$heading='';
			$outCome='';
			$amount_all="";
		}else{while ($fetch = mysql_fetch_assoc($query22)) {
				$amount = $fetch['amount']; 
				$amount_all += $fetch['amount'];
				$paid_towards =$fetch['paid_towards'];
				$dated =  $fetch['dated'];
				$staff_logged_in = $fetch['staff_logged_in'];

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
						<th style=\"text-align: center; width: 62px;\">Amount</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Paid Towards</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Paid By</th>
			</tr>
			";

			$outCome.= "
			<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"text-align: center; width: 50px;\">GH&#8373; $amount</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">$paid_towards</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\"> $dated</td>
				<td style=\"text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
			";
			}
		}

echo"<div class=\"record_back\" id=\"record_back\" style=\"display: block;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('record_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Total Amount recieved : GH&#8373; $amount_all
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%;\">
					$heading
					$outCome
				</table>
			</div>
		</div>
</div>";
			}
		}











































echo "
<div class=\"add_new_login_staff_back\" id=\"deposites\">
	<center>
		<div id=\"add_login_staff_all\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('deposites').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Bank Deposites Report
				</div>
			</div>
			<div id=\"record_holder\">
				<form method=\"post\" action=\"#\">
					<br /><br /><br /><br /><br /><br />
					<select name=\"selectday\" style=\"width:80% ;\">
						<option value=\"Today\">Today</option>
						<option value=\"All\">All</option>
					</select><br /><br /><br />
					<input type=\"submit\" name=\"depositessub\" value=\"Submit\" style=\"width: 100px; height: 30px; margin-left: 0px; margin-top: 25px;\" />
				</form>
			</div>
		</div>
	</center>
</div>";




if (isset($_POST['depositessub'])) {
	$selected = $_POST['selectday'];
	if ($selected=="Today") {
		$datein = date("Y-m-d");

		$infos="";
		$query = mysql_query("SELECT * FROM bank_depo_cheque WHERE dated='$datein' ORDER BY id DESC");
		if (mysql_num_rows($query)===0) {
			$infos = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
					You have no report yet.
						</span>
					";
			$info_head = "";
					
		}else{
			while ($fetch = mysql_fetch_assoc($query)) {
				$bank_name = $fetch['bank_name']; 
				$account_number =$fetch['account_number'];
				$dated =  $fetch['dated'];
				$cheque_number =  $fetch['cheque_number'];
				$cheque_date =  $fetch['cheque_date'];
				$amount =  $fetch['amount'];
				$amount_already_in =  $fetch['amount_already_in'];
				$total_amount =  $fetch['total_amount'];
				$remarks =  $fetch['remarks'];
				$loggedin_staff = $fetch['loggedin_staff'];

				if ($cheque_number=="") {
				$method ="Cash";
			}else{
				$method ="
<span title=\"Cheque Number: $cheque_number
Cheque Date: $cheque_date\">Cheque</span>";
			}


			$qq= mysql_query("SELECT * FROM teachers WHERE staff_id = '$loggedin_staff'");
				$fetch = mysql_fetch_assoc($qq);
					
					$full_name = $fetch['full_name'];
					$staff_id = $fetch['staff_id'];

					$datein = date("jS F, Y");
					if ($dated=="$datein") {
						$dated="Today";
					}else{
						$dated="$dated";
					}

		$info_head = "
				<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"width: 50px;\">Method</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Amount</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">New Total</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Deposited By</th>
						<th style=\"width: 80px; border-left: 1px solid #000;\">Remarks</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Date</th>
					</tr>
			";
			$infos.="
					<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
						<td style=\"width: 50px;\">$method</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">GH&#8373; $amount</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">GH&#8373; $total_amount</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\" title=\"$loggedin_staff\">$full_name</td>
						<td style=\"width: 80px;border-left: 1px solid #000;\">$remarks</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">$dated</td>
					</tr>
				"; 

		}


echo"<div class=\"record_back\" id=\"record_back\" style=\"display: block;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('record_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Deposites Report
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%;\">
					$info_head
					$infos
				</table>
			</div>
		</div>
</div>";
	}
}
	elseif ($selected=="All") {
		$infos="";
		$info_head="";
		$query22 = mysql_query("SELECT * FROM bank_depo_cheque ORDER BY id DESC");
		if (mysql_num_rows($query22)===0) {
			$infos = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
						You have no report yet.
						</span>
					";
			$info_head='';
		}else{
			while ($fetch = mysql_fetch_assoc($query22)) {
				$bank_name = $fetch['bank_name']; 
				$account_number =$fetch['account_number'];
				$dated =  $fetch['dated'];
				$cheque_number =  $fetch['cheque_number'];
				$cheque_date =  $fetch['cheque_date'];
				$amount =  $fetch['amount'];
				$amount_already_in =  $fetch['amount_already_in'];
				$total_amount =  $fetch['total_amount'];
				$remarks =  $fetch['remarks'];
				$loggedin_staff = $fetch['loggedin_staff'];

				if ($cheque_number=="") {
				$method ="Cash";
			}else{
				$method ="
<span title=\"Cheque Number: $cheque_number
Cheque Date: $cheque_date\">Cheque</span>";
			}


			$qq= mysql_query("SELECT * FROM teachers WHERE staff_id = '$loggedin_staff'");
				$fetch = mysql_fetch_assoc($qq);
					
					$full_name = $fetch['full_name'];
					$staff_id = $fetch['staff_id'];

					$datein = date("jS F, Y");
					if ($dated=="$datein") {
						$dated="Today";
					}else{
						$dated="$dated";
					}

				$info_head = "
				<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"width: 50px;\">Method</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Amount</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">New Total</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Deposited By</th>
						<th style=\"width: 80px; border-left: 1px solid #000;\">Remarks</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Date</th>
					</tr>
			";
			$infos.="
					<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
						<td style=\"width: 50px;\">$method</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">GH&#8373; $amount</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">GH&#8373; $total_amount</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\" title=\"$loggedin_staff\">$full_name</td>
						<td style=\"width: 80px;border-left: 1px solid #000;\">$remarks</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">$dated</td>
					</tr>
				"; 

			}
		}

echo"<div class=\"record_back\" id=\"record_back\" style=\"display: block;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('record_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					All Reports on Debites
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%; text-align: center;\">
					$info_head
					$infos
				</table>
			</div>
		</div>
</div>";
			}
		}





























echo "
<div class=\"add_new_login_staff_back\" id=\"Withdraw\">
	<center>
		<div id=\"add_login_staff_all\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('Withdraw').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Bank Withdraw Report
				</div>
			</div>
			<div id=\"record_holder\">
				<form method=\"post\" action=\"#\">
					<br /><br /><br /><br /><br /><br />
					<select name=\"selectday\" style=\"width:80% ;\">
						<option value=\"Today\">Today</option>
						<option value=\"All\">All</option>
					</select><br /><br /><br />
					<input type=\"submit\" name=\"Withdrawsub\" value=\"Submit\" style=\"width: 100px; height: 30px; margin-left: 0px; margin-top: 25px;\" />
				</form>
			</div>
		</div>
	</center>
</div>";




if (isset($_POST['Withdrawsub'])) {
	$selected = $_POST['selectday'];
	if ($selected=="Today") {
		$datein = date("Y-m-d");

		$infos="";
		$query = mysql_query("SELECT * FROM bank_withdraw_cheque WHERE dated='$datein' ORDER BY id DESC");
		if (mysql_num_rows($query)===0) {
			$infos = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
					You have no report yet.
						</span>
					";
			$info_head = "";
					
		}else{
			while ($fetch = mysql_fetch_assoc($query)) {
				$bank_name = $fetch['bank_name']; 
				$account_number =$fetch['account_number'];
				$dated =  $fetch['dated'];
				$cheque_number =  $fetch['cheque_number'];
				$cheque_date =  $fetch['cheque_date'];
				$amount =  $fetch['amount'];
				$amount_already_in =  $fetch['amount_already_in'];
				$total_amount =  $fetch['total_amount'];
				$remarks =  $fetch['remarks'];
				$loggedin_staff = $fetch['loggedin_staff'];

				if ($cheque_number=="") {
				$method ="Cash";
			}else{
				$method ="
<span title=\"Cheque Number: $cheque_number
Cheque Date: $cheque_date\">Cheque</span>";
			}


			$qq= mysql_query("SELECT * FROM teachers WHERE staff_id = '$loggedin_staff'");
				$fetch = mysql_fetch_assoc($qq);
					
					$full_name = $fetch['full_name'];
					$staff_id = $fetch['staff_id'];

					$datein = date("jS F, Y");
					if ($dated=="$datein") {
						$dated="Today";
					}else{
						$dated="$dated";
					}

		$info_head = "
				<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"width: 50px;\">Method</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Amount</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">New Total</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Deposited By</th>
						<th style=\"width: 80px; border-left: 1px solid #000;\">Remarks</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Date</th>
					</tr>
			";
			$infos.="
					<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
						<td style=\"width: 50px;\">$method</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">GH&#8373; $amount</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">GH&#8373; $total_amount</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\" title=\"$loggedin_staff\">$full_name</td>
						<td style=\"width: 80px;border-left: 1px solid #000;\">$remarks</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">$dated</td>
					</tr>
				"; 

		}


echo"<div class=\"record_back\" id=\"record_back\" style=\"display: block;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('record_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					Deposites Report
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%;\">
					$info_head
					$infos
				</table>
			</div>
		</div>
</div>";
	}
}
	elseif ($selected=="All") {
		$infos="";
		$info_head="";
		$query22 = mysql_query("SELECT * FROM bank_withdraw_cheque ORDER BY id DESC");
		if (mysql_num_rows($query22)===0) {
			$infos = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
						You have no report yet.
						</span>
					";
			$info_head='';
		}else{
			while ($fetch = mysql_fetch_assoc($query22)) {
				$bank_name = $fetch['bank_name']; 
				$account_number =$fetch['account_number'];
				$dated =  $fetch['dated'];
				$cheque_number =  $fetch['cheque_number'];
				$cheque_date =  $fetch['cheque_date'];
				$amount =  $fetch['amount'];
				$amount_already_in =  $fetch['amount_already_in'];
				$total_amount =  $fetch['total_amount'];
				$remarks =  $fetch['remarks'];
				$loggedin_staff = $fetch['loggedin_staff'];

				if ($cheque_number=="") {
				$method ="Cash";
			}else{
				$method ="
<span title=\"Cheque Number: $cheque_number
Cheque Date: $cheque_date\">Cheque</span>";
			}


			$qq= mysql_query("SELECT * FROM teachers WHERE staff_id = '$loggedin_staff'");
				$fetch = mysql_fetch_assoc($qq);
					
					$full_name = $fetch['full_name'];
					$staff_id = $fetch['staff_id'];

					$datein = date("jS F, Y");
					if ($dated=="$datein") {
						$dated="Today";
					}else{
						$dated="$dated";
					}

				$info_head = "
				<tr style=\"border-bottom: 2px solid #039b9b; height: 25px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"width: 50px;\">Method</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Amount</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">New Total</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Deposited By</th>
						<th style=\"width: 80px; border-left: 1px solid #000;\">Remarks</th>
						<th style=\"width: 50px; border-left: 1px solid #000;\">Date</th>
					</tr>
			";
			$infos.="
					<tr style=\"border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
						<td style=\"width: 50px;\">$method</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">GH&#8373; $amount</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">GH&#8373; $total_amount</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\" title=\"$loggedin_staff\">$full_name</td>
						<td style=\"width: 80px;border-left: 1px solid #000;\">$remarks</td>
						<td style=\"width: 50px; border-left: 1px solid #000;\">$dated</td>
					</tr>
				"; 

			}
		}

echo"<div class=\"record_back\" id=\"record_back\" style=\"display: block;\">
		<div id=\"records_all1\" class=\"records_all\" style=\"float: right; margin-right: 300px; width:800px;\">
			<div id=\"menu_bar\">
				<div id=\"close\" title=\"Close\" onclick=\"document.getElementById('record_back').style.display='none'\">
					x
				</div>
				<div id=\"title\">
					All Reports on Debites
				</div>
			</div>
			<div id=\"record_holder\" style=\"overflow: auto;\">
				<table style=\"width: 99%; text-align: center;\">
					$info_head
					$infos
				</table>
			</div>
		</div>
</div>";
			}
		}




?>

</div>