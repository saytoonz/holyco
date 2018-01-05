<?php
$bar = $_GET['utab'];



if (strpos($bar, "billing_systemprint_Bill")!==false) {
	echo "
	<div id=\"pdfform\">
		<object width=\"100%\" height=\"99%\" data=\"objects/AdmissionBill.pdf\">
		</object>
	</div>";

}else{

	echo "<center>
	<div id=\"big\">
		<div id=\"bill_all\">
		<form method=\"post\" action=\"#\">";

		if (strpos($bar, "billing_systemverify") !== false ) {
						$array = substr($bar, 20);
						$explode = explode("/,", $array);
						$count = count($explode);
						$credit_debit = current($explode);
						$admissionNo = next($explode);
						$amount = next($explode);

					$select = mysql_query("SELECT * FROM students WHERE admissionNumber = '$admissionNo'");
										$fetch = mysql_fetch_assoc($select);
										$first_name = $fetch['first_name'];
										$last_name = $fetch['last_name'];
										$middle_name = $fetch['middle_name'];
										$preferred_name = $fetch['preferred_name'];
										$admissionNumber = $fetch['admissionNumber'];
										$fee = $fetch['fee'];
										$class = $fetch['class'];
										$passport = $fetch['passport'];
										$date = date("F j, Y");

										if ($credit_debit == "Credit") {
											$balance = $fee - $amount;
										}elseif ($credit_debit =="Debit") {
											$balance = $fee + $amount;
										}

										echo"<div id=\"varify_r_pass\"><img src=\"student_data/$passport\" height=\"100%\" width=\"100%\"></div>
										<ul class=\"varify_r_info\">
											<li style=\"font-size:18px; color: #fff; font-weight: bolder; background: rgba(0,0,0,.7);\">
												$first_name  $middle_name $last_name ($preferred_name)

											</li>
											<li style=\"color: #e9e9e9; font-size: 14px;\">
												Admin No: $admissionNumber &nbsp; Class: $class
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Amount owed: &#8373; $fee
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Amount $credit_debit: &#8373;$amount
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Balance: &#8373;$balance
											</li>
										</ul>

									<input type=\"submit\" name=\"act\" value=\"$credit_debit\">";
				


													if (isset($_POST['act'])) {
														mysql_query("UPDATE students SET fee ='$balance' WHERE admissionNumber = '$admissionNumber'");
														$date = date("jS F, Y");

														mysql_query("INSERT INTO report_billed_or_crediting VALUES ('','$first_name  $middle_name $last_name','$admissionNumber','$credit_debit','$amount','$balance','$Login_staff','$date','no')");
														?>
													<script type="text/javascript">
														location.replace('home.php?utab=billing_system<?php echo$credit_debit;?>');
													</script>
														<?php
													}





	}elseif (strpos($bar, "billing_systemclassvry") !== false ) {
						$array = substr($bar, 22);
						$explode = explode("/,", $array);
						$count = count($explode);
						$credit_debit = current($explode);
						$class_2 = next($explode);
						$amount = next($explode);
							$fee="";
						$select = mysql_query("SELECT * FROM students WHERE class = '$class_2'");
						$num_row = mysql_num_rows($select);
							while ( $fetch = mysql_fetch_assoc($select)) {
										$fee += $fetch['fee'];
										$date = date("F j, Y");
										$fee1= $fetch['fee'];


										$balance ="";
										$balanceone ="";
										$total_amount_due = $num_row * $amount;
										if ($credit_debit == "Credit") {
											$balance= $fee - $total_amount_due;
										
										}elseif ($credit_debit =="Debit") {
											$balance= $fee + $total_amount_due;
										
										}
										
									}


						if (isset($_POST['act2'])) {


						$array = substr($bar, 22);
						$explode = explode("/,", $array);
						$count = count($explode);
						$credit_debit = current($explode);
						$class_2 = next($explode);
						$amount = next($explode);
							$fee="";
						$select = mysql_query("SELECT * FROM students WHERE class = '$class_2'");
						$num_row = mysql_num_rows($select);
							while ( $fetch = mysql_fetch_assoc($select)) {
										$id = $fetch['id'];
										$fee += $fetch['fee'];
										$date = date("F j, Y");
										$fee1= $fetch['fee'];

								

								//foreach ($id as $key => $value) {
										if ($credit_debit == "Credit") {
											$balanceone=  $fee1 - $amount;
											mysql_query("UPDATE students SET fee = '$balanceone' WHERE  class = '$class_2' AND id='$id'");

										}elseif ($credit_debit =="Debit") {
											$balanceone=  $fee1 + $amount;
											mysql_query("UPDATE students SET fee = '$balanceone' WHERE  class = '$class_2' AND id='$id'");

										}							



										 	

											$date = date("jS F, Y");

														mysql_query("INSERT INTO report_billed_or_crediting VALUES ('','$class_2','$class_2','$credit_debit','$amount','$balance','$Login_staff','$date','no')");

											//	}
												}
											?>
										<script type="text/javascript">
											location.replace('home.php?utab=billing_system<?php echo$credit_debit;?>');
										</script>
											<?php
											}
											

									if ($class_2 == "Creche") {
										$class_pic = "creche.png";
									}
									elseif ($class_2 == "Nursery 1") {
										$class_pic = "nursery1.png";
									}
									elseif ($class_2 == "Nursery 2") {
										$class_pic = "nursery2.png";
									}
									elseif ($class_2 == "KG 1") {
										$class_pic = "kg1.png";
									}
									elseif ($class_2 == "KG 2") {
										$class_pic = "kg2.png";
									}
									elseif ($class_2 == "Grade 1") {
										$class_pic = "g1.png";
									}
									elseif ($class_2 == "Grade 2") {
										$class_pic = "g2.png";
									}
										echo"<div id=\"varify_r_pass\"><img src=\"class_data/$class_pic\" height=\"100%\" width=\"100%\"></div>
										<ul class=\"varify_r_info\">
											<li style=\"font-size:18px; color: #fff; font-weight: bolder; background: rgba(0,0,0,.7);\">
												Individual Amount to be ".$credit_debit."ed: &#8373;$amount
											</li>
											
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Total Amount Due: $total_amount_due
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Total Amount owed: &#8373; $fee
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Total Balance: &#8373;$balance
											</li>
										</ul>

									<input type=\"submit\" name=\"act2\" value=\"$credit_debit\">";
				

	}elseif ($bar == "billing_systemCredit" OR $bar == "billing_systemDebit") {
					$credit_debit = substr($bar, 14);

					echo "<div style=\"margin-top: 18%; margin-bottom: 18%;\">
								<span style=\"font-size: 22spx; font-family: Lucida Calligraphy; font-weight:bolder;\">
									Student has been ".$credit_debit."ed
								</span>
									<br /><br />
								<span style=\"font-size: 40px; font-weight:bold; color: #fff; text-shadow: -2px 1.8px #000; \">
									Successfully!
								</span>
							</div>
								<a href=\"home.php?utab=billing_system\">
									<img src=\"images/backarror.png\" height=\"25%\" width=\"33%\" />
								</a>
							
						 

					";
				}else{		

	echo"<div id=\"wholeclass\">
			<select name=\"class_2\" title=\"Select Class\" >
				<option value=\"Creche\">Creche</option>
				<option value=\"Nursery 1\">Nursery 1</option>
				<option value=\"Nursery 2\">Nursery 2</option>
				
				<option value=\"KG 1\">KG 1</option>
				<option value=\"KG 2\">KG 2</option>
			
				<option value=\"Grade 1\">Grade 1</option>
				<option value=\"Grade 2\">Grade 2</option>
			</select>
			<select name=\"status_2\">
				<option value=\"Debit\">Debit</option>
				<option value=\"Credit\">Credit</option>
			</select>
		
			<input type=\"password\" name=\"password_2\" placeholder=\"Password\" />
			<input type=\"text\" name=\"amount_2\" placeholder=\"Amount\" />
			<input type=\"submit\" name=\"workOnClass\" value=\"Apply\"><br /><br /><br /><br /><br /><br />
		</div>


		<div id=\"one_student\" style=\"display: none;\">
			<select name=\"status\">
				<option value=\"Debit\">Debit</option>
				<option value=\"Credit\">Credit</option>
			</select>
			<input type=\"text\" name=\"student_admin_no\" placeholder=\"Admission Number\" />
			<input type=\"password\" name=\"password\" placeholder=\"Password\" />
			<input type=\"text\" name=\"amount\" placeholder=\"Amount\" />
			<input type=\"submit\" name=\"workOnOne\" value=\"Apply\"><br /><br /><br /><br /><br /><br />			
		</div>
		<span style=\"color: #fff;\">
				<input type=\"radio\" name=\"bill_class\" id=\"bill_1\" />Bill A Student &nbsp;&nbsp;&nbsp;&nbsp;
				<input type=\"radio\" name=\"bill_class\" id=\"bill_class\" checked=\"checked\" />Bill A Class
			</span>
			";
							if ($bar == "billing_systemerror1") {
							echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
									Pleace make sure all feilds are filled.
								</span>";
							}elseif ($bar == "billing_systemerror2") {
							echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
									Wrong Admission Number.
								</span>";
							}elseif ($bar == "billing_systemerror3") {
							echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
									Class Does Not Exist.
								</span>";
							}


		}
		

	echo"	</form>
		<form action=\"#\" method=\"post\">
			<input type=\"submit\" name=\"print_Bill\" value=\"Print Bill\" style=\"width:50px\"><br />
		</form>

		</div>
	</div>
</center>
";
?>
		<!------Check Number Hide Or Display Code Jquery-------->
					<script type="text/javascript">
							$(document).ready(function() {
						   $('input[type="radio"]').click(function() {
						       if($(this).attr('id') == 'bill_class') {
						            $('#wholeclass').fadeIn();           
						            $('#one_student').hide();           
						       }

						       else {
						            $('#wholeclass').hide();           
						            $('#one_student').fadeIn();   
						       }
						   });
						});
				</script>

<?php


if (isset($_POST['print_Bill'])) {
?>
<script type="text/javascript">
	location.replace("home.php?utab=billing_systemprint_Bill");
</script>
	<?php
}

if (isset($_POST['workOnOne'])) {
	$status = $_POST['status'];
	$student_admin_no =$_POST['student_admin_no'];
	$amount = $_POST['amount'];
	$staff_password =$_POST['password'];

	//Delete Spaces and Symbols From The Amount
	$amount= str_replace(" ", "", $amount);
	$amount= str_replace("-", "", $amount);
	$amount= str_replace("_", "", $amount);
	$amount= str_replace(".", "", $amount);
	$amount= str_replace(",", "", $amount);
	$amount= str_replace("", "", $amount);
	$amount= str_replace(";", "", $amount);
	$amount= str_replace("'", "", $amount);
	$amount= str_replace("/", "", $amount);
	$amount= str_replace("+", "", $amount);
	$amount= str_replace("*", "", $amount);
	$amount= str_replace(")", "", $amount);
	$amount= str_replace("(", "", $amount);
	$amount= str_replace("&", "", $amount);
	$amount= str_replace("`", "", $amount);
	$amount= str_replace("!", "", $amount);
	$amount= str_replace("@", "", $amount);
	$amount= str_replace("#", "", $amount);
	$amount= str_replace("$", "", $amount);
	$amount= str_replace("%", "", $amount);
	$amount= str_replace("^", "", $amount);
	$amount= str_replace("=", "", $amount);
	$amount= str_replace("[", "", $amount);
	$amount= str_replace("]", "", $amount);
	$amount= str_replace("{", "", $amount);
	$amount= str_replace("}", "", $amount);
	$amount= str_replace("~", "", $amount);
			


			$md5_pass = md5($staff_password);


	if ($student_admin_no !="" OR $amount !="" OR $staff_password !="") {

		//////Pass Word Check\\\\\\\else
	$select = mysql_query("SELECT * FROM students WHERE admissionNumber = '$student_admin_no'");
		$row = mysql_num_rows($select);	
		if ($row == 0) {
			header("Location:home.php?utab=billing_systemerror2");
		}else{
			$fetch = mysql_fetch_assoc($select);
			$first_name = $fetch['first_name'];
			$last_name = $fetch['last_name'];
			$middle_name = $fetch['middle_name'];
			$preferred_name = $fetch['preferred_name'];
			$admissionNumber = $fetch['admissionNumber'];
			$fee = $fetch['fee'];
			$class = $fetch['class'];
			$passport = $fetch['passport'];
			$balance = $fee - $amount;

			?>
		<script type="text/javascript">
			location.replace('home.php?utab=billing_systemverify<?php echo"$status/,$student_admin_no/,$amount/,$md5_pass";?>');
		</script>
			<?php
}
	}else{
		?>
	<script type="text/javascript">
		location.replace('home.php?utab=billing_systemerror1');
	</script>
		<?php
	}
}
		}											





													if (isset($_POST['workOnClass'])) {
														$class_2 = $_POST['class_2'];
														$status_2 = $_POST['status_2'];
														$password_2 = $_POST['password_2'];
														$amount_2 = $_POST['amount_2'];

														//Delete Spaces and Symbols From The amount_2
														$amount_2= str_replace(" ", "", $amount_2);
														$amount_2= str_replace("-", "", $amount_2);
														$amount_2= str_replace("_", "", $amount_2);
														$amount_2= str_replace(".", "", $amount_2);
														$amount_2= str_replace(",", "", $amount_2);
														$amount_2= str_replace("", "", $amount_2);
														$amount_2= str_replace(";", "", $amount_2);
														$amount_2= str_replace("'", "", $amount_2);
														$amount_2= str_replace("/", "", $amount_2);
														$amount_2= str_replace("+", "", $amount_2);
														$amount_2= str_replace("*", "", $amount_2);
														$amount_2= str_replace(")", "", $amount_2);
														$amount_2= str_replace("(", "", $amount_2);
														$amount_2= str_replace("&", "", $amount_2);
														$amount_2= str_replace("`", "", $amount_2);
														$amount_2= str_replace("!", "", $amount_2);
														$amount_2= str_replace("@", "", $amount_2);
														$amount_2= str_replace("#", "", $amount_2);
														$amount_2= str_replace("$", "", $amount_2);
														$amount_2= str_replace("%", "", $amount_2);
														$amount_2= str_replace("^", "", $amount_2);
														$amount_2= str_replace("=", "", $amount_2);
														$amount_2= str_replace("[", "", $amount_2);
														$amount_2= str_replace("]", "", $amount_2);
														$amount_2= str_replace("{", "", $amount_2);
														$amount_2= str_replace("}", "", $amount_2);
														$amount_2= str_replace("~", "", $amount_2);


														$md5_password_2 = md5($password_2);
														if ($amount_2 !="" OR $password_2 != "") {
															//////Pass Word Check\\\\\\\else


															$select = mysql_query("SELECT * FROM students WHERE class = '$class_2'");
															$row = mysql_num_rows($select);	
															if ($row == 0) {
																?>
															<script type="text/javascript">
																location.replace("home.php?utab=billing_systemerror3");
															</script>
																<?php
															}else{

																?>
															<script type="text/javascript">
																location.replace('home.php?utab=billing_systemclassvry<?php echo"$status_2/,$class_2/,$amount_2/,$md5_password_2";?>')
															</script>
																<?php

															}
														}else{
															?>
														<script type="text/javascript">
															location.replace('home.php?utab=billing_systemerror1');
														</script>
															<?php
														}
													}
?>
