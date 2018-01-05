
	<?
	if (isset($_REQUEST['verify'])) {
		$admissionNumber = $_POST['admissionNumber'];

		$amount = $_POST['amount'];
		$amount_in_words = $_POST['amount_in_words'];

		//$amount =  is_numeric("$amount");

		$select = mysql_query("SELECT * FROM students WHERE admissionNumber = '$admissionNumber'");
		$row = mysql_num_rows($select);
			if ($row == 0) {
				echo "<center style=\"padding-top: 100px;\">
						<div id=\"pay_fees\">
							<form method=\"post\" action=\"#\">
								<input type=\"text\" name=\"admissionNumber\" placeholder=\"Admission Number\" style=\"width: 50%; float: left; margin-left: 10px;\" /><br />
								<input type=\"text\" name=\"amount\" placeholder=\"Amount Paying\" /><br />
								<input type=\"text\" name=\"amount_in_words\" placeholder=\"Amount in Words\" /><br />
								<input type=\"submit\" name=\"verify\" value=\"VERIFY\">
							</form>
							<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\">No students found with this Admission Number</span>
						</div>
					</center>";	
			}else{
				if ($amount != "" AND $amount_in_words  != "") {
				$fetch = mysql_fetch_assoc($select);
				$first_name = $fetch['first_name'];
				$last_name = $fetch['last_name'];
				$middle_name = $fetch['middle_name'];
				$preferred_name = $fetch['preferred_name'];
				$admissionNumber = $fetch['admissionNumber'];
				$fee = $fetch['fee'];
				$class = $fetch['class'];
				$passport = $fetch['passport'];

				header("Location:home.php?utab=fee_prosesing$admissionNumber,$amount,$amount_in_words");


				////////////    Calculations    \\\\\\\\\\\\\\

						$balance = $fee - $amount;

				echo "	<center style=\"padding-top: 100px;\">
						<div id=\"pay_fees\">
							<form method=\"post\" action=\"#\">

					
							</form>
					</center>";
				
				 }else{echo "<center style=\"padding-top: 100px;\">
						<div id=\"pay_fees\">
							<form method=\"post\" action=\"#\">
								<input type=\"text\" name=\"admissionNumber\" placeholder=\"Admission Number\" style=\"width: 50%; float: left; margin-left: 10px;\" /><br />
								<input type=\"text\" name=\"amount\" placeholder=\"Amount Paying\" /><br />
								<input type=\"text\" name=\"amount_in_words\" placeholder=\"Amount in Words\" /><br />
								<input type=\"submit\" name=\"verify\" value=\"VERIFY\">
							</form>
							<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\">Fill  all fields Please</span>
						</div>
					</center>";	}
			}

		
	
	}elseif (isset($_REQUEST['pay'])) {
		
		echo "$amount_in_words";



	}
	else{
			echo "
				<center style=\"padding-top: 100px;\">
					<div id=\"pay_fees\">
						<form method=\"post\" action=\"#\">
							<input type=\"text\" name=\"admissionNumber\" placeholder=\"Admission Number\" style=\"width: 50%; float: left; margin-left: 10px;\" /><br />
							<input type=\"text\" name=\"amount\" placeholder=\"Amount Paying\" /><br />
							<input type=\"text\" name=\"amount_in_words\" placeholder=\"Amount in Words\" /><br />
							<input type=\"submit\" name=\"verify\" value=\"VERIFY\">
						</form>
					</div>
				</center>";	
		}																									
?>


<!--<?php
//if (isset($_POST['say'])) {
//	$amount = is_numeric($_POST['amount']);
//	echo "$amount";
//}
//echo "
//<form action='' method='post'>
//	<input type='text' name='amount' />
//<input type='submit' name='say' />
//</form>
//";
?>
-->



echo"<div id=\"varify_r_pass\"><img src=\"student_data/$passport\" height=\"100%\" width=\"100%\"></div>
										<ul class=\"varify_r_info\">
											<li style=\"font-size:18px; color: #fff; font-weight: bolder; background: rgba(0,0,0,.7);\">
												$first_name  $middle_name $last_name($preferred_name)

											</li>
											<li style=\"color: #e9e9e9; font-size: 14px;\">
												Admin No: $admissionNumber Class: $class
											</li>
											<li style=\"color: #e9e9e9;\">
												Amount owing: &#8373; $fee
											</li>
											<li style=\"color: #e9e9e9;\">
												Amount Paying: &#8373;$amount
											</li>
											<li style=\"color: #e9e9e9;\">
												Balance: &#8373;$balance
											</li>
										</ul>

									<input type=\"submit\" name=\"pay\" value=\"PAY\">";