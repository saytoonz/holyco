.<div style="overflow: auto; max-height: 99%">
<?php
		
		$fee_tab = $_GET['utab'];


		if (strpos($tab, 'fee_prosesing') !==false  OR strpos($tab, 'fee_paying') !==false) {
			echo "<center style=\"padding-top: 7%;\">
					<div id=\"pay_fees\">
						<form method=\"post\" action=\"#\">
						";
					if (strpos($tab, 'fee_paying') !== false) {

						$fee_tab_info = substr($fee_tab, 10);
						$array = array($fee_tab_info);
						$explode = explode("/,", $fee_tab_info);
						$count = count($explode);
						$admission_number_real= current($explode);
						$amount_real          = next($explode);
						$amount_in_words_real = next($explode);

						$select = mysql_query("SELECT * FROM students WHERE admissionNumber = '$admission_number_real'");

						$fetch = mysql_fetch_assoc($select);
						$first_name = $fetch['first_name'];
						$last_name = $fetch['last_name'];
						$middle_name = $fetch['middle_name'];
						$preferred_name = $fetch['preferred_name'];
						$admissionNumber = $fetch['admissionNumber'];
						$fee = $fetch['fee'];
						$class = $fetch['class'];
						$passport = $fetch['passport'];
						$balance = $fee - $amount_real;

						
								echo"<div id=\"varify_r_pass\"><img src=\"student_data/$passport\" height=\"100%\" width=\"100%\"></div>
										<ul class=\"varify_r_info\">
											<li style=\"font-size:18px; color: #fff; font-weight: bolder; background: rgba(0,0,0,.7);\">
												$first_name  $middle_name $last_name ($preferred_name)

											</li>
											<li style=\"color: #e9e9e9; font-size: 14px;\">
												Admin No: $admission_number_real Class: $class
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Amount owing: &#8373; $fee
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Amount Paying: &#8373;$amount_real
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Amount in words: $amount_in_words_real
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Balance: &#8373;$balance
											</li>
										</ul>

									<input type=\"submit\" name=\"pay\" value=\"PAY\">";
					}else{
						echo"
							<input type=\"radio\" name=\"method\" id=\"cash\" value=\"Cash\" checked=\"checked\" />Cash
							<input type=\"radio\" name=\"method\" id=\"check\" value=\"Check\" />Check       <br />
							<input type=\"text\" id=\"check_no\" name=\"check_no\" placeholder=\"Check Number\" style=\"width: 50%; float: right; margin-right: 15px; margin-bottom: 25px; display: none;\" /><br />

						<input type=\"text\" id=\"paid_by\" name=\"paid_by\" placeholder=\"Paid By\" style=\"display: block; float: right; margin-right: 15px; margin-bottom: 25px;\" /><br />
							
							<input type=\"text\" name=\"admissionNumber1\" placeholder=\"Admission Number\" style=\"width: 50%; float: left; margin-left: 15px;\" /><br />
							<input type=\"text\" name=\"amount1\" placeholder=\"Amount Paying\" /><br />
							<input type=\"text\" name=\"amount_in_words1\" placeholder=\"Amount in Words\" /><br />
							<input type=\"submit\" name=\"verify1\" value=\"VERIFY\">
							";
					}

					?>

				<!------Check Number Hide Or Display Code Jquery-------->
					<script type="text/javascript">
							$(document).ready(function() {
						   $('input[type="radio"]').click(function() {
						       if($(this).attr('id') == 'check') {
						            $('#check_no').fadeIn();           
						       }

						       else {
						            $('#check_no').hide();   
						       }
						   });
						});
				</script>

					<!------Paid By Hide Or Display Code Jquery-------->
					<script type="text/javascript">
							$(document).ready(function() {
						   $('input[type="radio"]').click(function() {
						       if($(this).attr('id') == 'cash') {
						            $('#paid_by').fadeIn();           
						       }

						       else {
						            $('#paid_by').hide();   
						       }
						   });
						});
				</script>
					<?php

		if($fee_tab == "fee_prosesingerror1"){
		 			 echo"
		 			 <span style=\"color: #ff0000; text-shadow: 1px 1px #000;\">No students found with this Admission Number</span>
		 			 ";
		}elseif($fee_tab == "fee_prosesingerror2"){
		  echo"
		  <span style=\"color: #ff0000; text-shadow: 1px 1px #000;\">Fill  all fields Please</span>
		  ";
		} 
						echo"</form>
					</div>
				</center>
				";
										if (isset($_REQUEST['verify1'])) {
											$admissionNumber = $_POST['admissionNumber1'];
											$method = $_POST['method'];
											$check_no = $_POST['check_no'];
											$amount = str_replace(",", "", $_POST['amount1']);
											$amount_in_words= str_replace(",", "", $_POST['amount_in_words1']);
											$paid_by = str_replace(",", "", $_POST['paid_by']);
											//$amount =  is_numeric("$amount");

											if ($amount != "" AND $amount_in_words  != "") {
											$select = mysql_query("SELECT * FROM students WHERE admissionNumber = '$admissionNumber'");
											$row = mysql_num_rows($select);
												if ($row == 0) {
													?>
													<script type="text/javascript">
														location.replace("home.php?utab=fee_prosesingerror1");
													</script>
													<?php
												}else{
												
													$fetch = mysql_fetch_assoc($select);
													$admissionNumber = $fetch['admissionNumber'];
													if ($check_no == "") {

														?>
													<script type="text/javascript">
														location.replace("home.php?utab=fee_paying<?php echo $admissionNumber;?>/,<?php echo $amount;?>/,<?php echo $amount_in_words;?>/,<?php echo $method;?>/,<?php  echo $paid_by ?>");
													</script>
													<?php

													}else{

													?>
													<script type="text/javascript">
														location.replace('home.php?utab=fee_paying<?php echo "$admissionNumber/,$amount/,$amount_in_words/,$method/,$check_no";?>');
													</script>
													<?php
												}
	
												}
													}else{
													?>
													<script type="text/javascript">
														location.replace("home.php?utab=fee_prosesingerror2");
													</script>
													<?php
												}
												}
}

elseif (strpos($tab, "fee_receipts") !== false) {
		$adminNo = substr($tab, 12);
	$query = mysql_query("SELECT * FROM receipts WHERE admission_number = '$adminNo' ORDER BY id DESC");
	$check = mysql_num_rows($query);
	if ($check =="") {
		echo "student has No receipt for now!";
	}else{
		while ($grab = mysql_fetch_assoc($query)) {
			$id = $grab['id'];
			$student_name = $grab['student_name'];
			$admission_number = $grab['admission_number'];
			$class = $grab['class'];
			$amount_owing = $grab['amount_owing'];
			$amount_paying = $grab['amount_paying'];
			$amount_in_words = $grab['amount_in_words'];
			$balance = $grab['balance'];
			$method = $grab['payment_method'];
			$check_no_paid_by = $grab['check_no_paid_by'];
			$staff_loggedi_n = $grab['staff_loggedi_n'];
			$date = $grab['date'];

			$date_printed = date("d-m-Y");

			if ($id <= 9) {
				$receipt_no = "000$id";
			}elseif ($id <=99) {
				$receipt_no = "00$id";
			}elseif ($id <=999) {
				$receipt_no = "0$id";
			}elseif ($id <=9999) {
				$receipt_no = "$id";
			}

			echo "<div id=\"content$id\">
			
			
			  <div class=\"invoice-box\">
        <table cellpadding=\"0\" cellspacing=\"0\">
            <tr class=\"top\">
                <td colspan=\"2\">
                    <table>
                        <tr>
                            <td class=\"title\">
                                <img src=\"images/crest2.png\" style=\"width:120%; max-width:120px; margin-bottom: 0px;\">
                            </td>
                            
                            <td>
                                Receipt No: $receipt_no<br>
                                Created: $date_printed<br>
                                Due: ........................
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class=\"information\">
                <td colspan=\"2\">
                    <table>
                        <tr>
                            <td>
                                <span style=\"font-size:18px; font-family:Lucida Fax; font-weight:bolder;\">
                              	  Godslove For Humanity Sch.
                                </span><br>
                                P. O. Box 113,<br>
                                Goaso, Lorge-mu
                            </td>
                            
                            <td>
                                Admin. No: $admission_number<br>
                                Class :   $class<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            ";

            if ($method == "Check") {
	            	echo "
	            	<tr class=\"heading\">
	                <td>
	                    Payment Method
	                </td>
	                
	                <td>
	                    Check Number
	                </td>
	            </tr>
	            ";
            }else{
            	echo "<tr class=\"heading\">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Paid By
                </td>
            </tr>";
            }

            echo"
            
            <tr class=\"details\">
                <td>
                    $method
                </td>
                
                <td>
                    $check_no_paid_by
                </td>
            </tr>
            
            <tr class=\"heading\">
                <td>
                    Student
                </td>
                
                <td>
                	$student_name
                </td>
            </tr>
            
            <tr class=\"item\">
                <td>
                    Amount Owed
                </td>
                
                <td>
                    &#8373;$amount_owing
                </td>
            </tr>
            
            <tr class=\"item\">
                <td>
                    Amount Paying
                </td>
                
                <td>
                    &#8373;$amount_paying
                </td>
            </tr>
            
            <tr class=\"item last\">
                <td>
                    Amount in words
                </td>
                
                <td>
                    $amount_in_words
                </td>
            </tr>
            
            <tr class=\"total\">
                <td></td>
                
                <td>
                   Balance: &#8373;$balance
                </td>
            </tr>
            <tr>
            	<td><b style=\"font-weight:bolder;\">Signature:..............................................</b></td>
            	<td></td>
            </tr>
        </table>
    </div>

			</div>
			<div id=\"editor$id\"></div>
				<button onclick=\"printDiv(content$id)\" class=\"preint_rcpt\" id=\"cd$id\">Print</button>
			
			<br /><br /><br /><br /><br /><br />
			
			";

			?>



			<script type="text/javascript">
				function printDiv(content<?php echo"$id";?>) {
     var printContents = document.getElementById("content<?php echo"$id";?>").innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
			</script>







							<!--------------------------------This The HTML to
							 PFD file Code and ir is 
							 not used Here For the receipt 
							 Printing------------------------------------>

			<script type="text/javascript" src="js/jquery3.2.1.min.js"></script>
			<script type="text/javascript" src="js/jspdf.min.js"></script>.

			<script type="text/javascript">
				var doc = new jsPDF();
				var specialElementHandlers = {
				    '#editor<?php echo"$id";?>': function (element, renderer) {
				        return true;
				    }
				};

				$('#cmd<?php echo"$id";?>').click(function () {
				    doc.fromHTML($('#content<?php echo"$id";?>').html(), 15, 15, {
				        'width': 170,
				            'elementHandlers': specialElementHandlers
				    });
				    doc.save('<?php echo"$admission_number";?>\'s receipt.pdf');
				});  
				</script><!-- Coment Ends Here -->

			<?php

		}
	}

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////

									if (isset($_POST['pay'])) {

										$fee_tab_info = substr($fee_tab, 10);
										$array = array($fee_tab_info);
										$explode = explode("/,", $fee_tab_info);
										$count = count($explode);
										$admission_number_real= current($explode);
										$amount_real          = next($explode);
										$amount_in_words_real = next($explode);
										$method = next($explode);
										$check_no = next($explode);
										
								$select = mysql_query("SELECT * FROM students WHERE admissionNumber = '$admission_number_real'");
										$fetch = mysql_fetch_assoc($select);
										$first_name = $fetch['first_name'];
										$last_name = $fetch['last_name'];
										$middle_name = $fetch['middle_name'];
										$admissionNumber = $fetch['admissionNumber'];
										$fee = $fetch['fee'];
										$class = $fetch['class'];
										$passport = $fetch['passport'];
										$balance = $fee - $amount_real;
										$date = date("jS F, Y");

								mysql_query("INSERT INTO receipts VALUES('','$first_name $middle_name $last_name','$admissionNumber','$class','$fee','$amount_real','$amount_in_words_real','$balance', '$method','	$check_no','','$date')");
								mysql_query("UPDATE students SET fee = '$balance' WHERE admissionNumber ='$admissionNumber'");



								$query2 = mysql_query("SELECT * FROM  daily_collection WHERE dated ='$date'");
								if (mysql_num_rows($query2)===0) {
									mysql_query("INSERT INTO daily_collection VALUES ('','$amount_real','$date')");
								}else{
									$fetch = mysql_fetch_assoc($query2);
										$amount = $fetch['amount'];
										$new_amount = $amount + $amount_real;
									mysql_query("UPDATE daily_collection SET amount ='$new_amount' WHERE dated='$date'");
								}




								mysql_query("INSERT INTO report_fee_payment VALUES('','$first_name $middle_name $last_name','$admissionNumber','$class','$amount_real','$date','$Login_staff','no')");

								?>
										<script type="text/javascript">
										location.replace("home.php?utab=fee_receipts<?php echo $admissionNumber;?>");
										</script>
										<?php
									
									}






		
	
?>
</div>