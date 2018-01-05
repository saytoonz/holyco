<div id="child_all">


<div id="ledger_right">
	<?php
		$outCome="";
		$heading="";
		$query1 = mysql_query("SELECT * FROM report_fee_payment WHERE cleared='no' ORDER BY id DESC");
		if (mysql_num_rows($query1)===0) {
			$outCome2 = "<span style=\"color: #ff0000; font-family: Lucida Fax;\">
						You have no report yet.
						</span>
					";
			$heading='';

		}else{
			while ($fetch = mysql_fetch_assoc($query1)) {
				$amount =$fetch['amount'];
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

	$outCome.= "
			<tr style=\"font-size: 14px; border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"font-size: 14px; text-align: center; width: 50px;\">GH&#8373; $amount</td>
				<td style=\"font-size: 14px; text-align: center; width: 62px; border-left: 1px solid #000;\">School Fee</td>
				<td style=\"font-size: 14px; text-align: center; width: 62px; border-left: 1px solid #000;\"> $dated</td>
				<td style=\"font-size: 14px; text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
			";

	$heading = "
			<tr style=\"border-bottom: 2px solid #039b9b; height: 30px; margin-top: 5px; margin-bottom: 8px; background: #ccc; font-weight: bolder;\">
						<th style=\"text-align: center; width: 62px;\">Amount</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Received<br />As</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Date</th>
						<th style=\"text-align: center; width: 62px; border-left: 1px solid #000;\">Received<br />By</th>
			</tr>
			";
		}
	}

		echo"
		<table style=\"width: 100%;\">
			$heading
			$outCome
		</table>";	
	?>
</div>








<div id="ledger_left">
	<?php
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
			<tr style=\"font-size: 14px; border-bottom: 1px solid #000; height: 25px; margin-top: 3px;\">
				<td style=\"font-size: 14px; text-align: center; width: 50px;\">GH&#8373; $amount</td>
				<td style=\"font-size: 14px; text-align: center; width: 62px; border-left: 1px solid #000;\">$paid_towards</td>
				<td style=\"font-size: 14px; text-align: center; width: 62px; border-left: 1px solid #000;\"> $dated</td>
				<td style=\"font-size: 14px; text-align: center; width: 62px; border-left: 1px solid #000;\" title=\"$staff_id\">$staff_name</td>
			";
			}
		}

echo"
		<table style=\"width: 100%;\">
			$heading
			$outCome
		</table>";	
	?>
</div>	
</div>