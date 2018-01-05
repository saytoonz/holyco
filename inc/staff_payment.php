<div id="child_info">.
<div style="overflow: auto; max-height: 535px">


<?php 
$in_bar = $_GET['utab'];
if (strpos($in_bar, "staff_paymentreceiptsPay_") !==false) {
	$staff_id = substr($in_bar, 25);

	$query = mysql_query("SELECT * FROM staff_receipts WHERE staff_id = '$staff_id' ORDER BY id DESC");
	if (mysql_num_rows($query)!==0) {
		while ($get = mysql_fetch_assoc($query)) {
			$id = $get['id'];
			$staff_id = $get['staff_id'];
			$name = $get['name'];
			$month = $get['month'];
			$amount = $get['amount'];
			$amount_in_words = $get['amount_in_words'];
			$staff_logged_in = $get['staff_logged_in'];
			$date = $get['date'];

	$query0 = mysql_query("SELECT * FROM teachers WHERE staff_id = '$staff_logged_in' AND active='yes' OR active='no'");
		$grab = mysql_fetch_assoc($query0);
		$staff_logged_in = $grab['full_name'];


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
			  	<center>
			  		<span style=\"font-family: Lucida Fax; font-weight: bolder; font-size:20px;\">  
			  			STAFFS PAYMENT RECEIPT
			 		</span>
			 	</center>
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
                                Created: $date<br>
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
                                Staff ID: $staff_id<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            
            <tr class=\"heading\">
                <td>
                    Staff Name
                </td>
                
                <td>
                	$name
                </td>
            </tr>
            
            <tr class=\"item\">
                <td>
                    Amount Received
                </td>
                
                <td>
                    &#8373;$amount
                </td>
            </tr>
            
            <tr class=\"item\">
                <td>
                    Amount in Word
                </td>
                
                <td>
                    $amount_in_words
                </td>
            </tr>
            
            <tr class=\"item\">
                <td>
                    Payment For The Month
                </td>
                
                <td>
                    $month
                </td>
            </tr>
            
            <tr class=\"item last\">
                <td>Received From</td>
                
                <td>
                   $staff_logged_in
                </td>
            </tr>
            <tr>
            	<td><br /><br />
            	<b style=\"font-weight:bolder;\">Signature and Stamp:.........................................................</b></td>
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

			<?php
		}
	}else{
		echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
				No Receipts For this Staff Yet.
			</span>";
	}

}else{
		echo "<center>
			<div id=\"big\">
				<div id=\"bill_all\">
				<form method=\"post\" action=\"#\">";

				$month = date("m");

				$priv_month = $month - 1;


				if ($month=="1") {
					$priv_month = "12";
				}else{
					$priv_month = "$priv_month";
				}
				

				$query = mysql_query("SELECT * FROM admin_center_teachers  WHERE (paid = '0' OR paid = '1') AND month='$month' AND active ='yes'");
				if (mysql_num_rows($query)===0) {
					mysql_query("UPDATE admin_center_teachers SET paid ='0', month ='$month' WHERE month='$priv_month'  AND paid ='1' AND active='yes'");

				}else{}

				





				$mysql = mysql_query("SELECT *  FROM admin_center_teachers WHERE paid='0' AND month='$priv_month' AND active='yes'");
				if (mysql_num_rows($mysql) !==0 ) {
					while ($fetch = mysql_fetch_assoc($mysql)) {
						$staff_id =  $fetch['staff_id'];
						$staff_name = $fetch['staff_name'];
						$month = $fetch['month'];
						$paid = $fetch['paid'];
						$date = date("m");

							$gte = mysql_query("SELECT * FROM admin_center_teachers WHERE (paid = '0' OR paid = '1') AND month='$date' AND active='yes' AND staff_id ='$staff_id'");
							if (mysql_num_rows($gte) === 0) {

								mysql_query("INSERT INTO admin_center_teachers VALUES ('','$staff_id','$staff_name','$date','$paid','yes')");
							}

					}
				}else{
					/////////Do nothing
				}



				$no ="";
				$teachers = mysql_query("SELECT * FROM admin_center_teachers WHERE paid ='0' AND month ='$month' AND (active = 'yes' OR active = 'no')");
				if(mysql_num_rows($teachers)===0){
					$teacher = mysql_query("SELECT * FROM admin_center_teachers WHERE paid ='0' AND (active = 'yes' OR active = 'no')");	
					if (mysql_num_rows($teacher)!==0) {
					while ($reap = mysql_fetch_assoc($teacher)) {

						$staff_name = $reap['staff_name'];	
						$month = $reap['month'];	

						if ($month =="1") {
							$monthname ="January";

						}elseif ($month =="2") {
							$monthname ="February";

						}elseif ($month =="3") {
							$monthname ="March";

						}elseif ($month =="4") {
							$monthname ="April";

						}elseif ($month =="5") {
							$monthname ="May";

						}elseif ($month =="6") {
							$monthname ="June";

						}elseif ($month =="7") {
							$monthname ="July";

						}elseif ($month =="8") {
							$monthname ="August";

						}elseif ($month =="9") {
							$monthname ="September";

						}elseif ($month =="10") {
							$monthname ="October";

						}elseif ($month =="11") {
							$monthname ="November";

						}elseif ($month =="12") {
							$monthname ="December";
						}

						$no ="<option value=\"$staff_name\">$staff_name   &nbsp;&nbsp;&nbsp;  For: $monthname</option>";
						$no2="";
						$no3 = "All Staffs has been Paid for this Month!";
					}
				}else{
					$no2 = "disabled";
					$no ="<option value=\"You Owe No Staff\">You Owe No Staff</option>";
					$no3 = "All Staffs has been Paid for this Month!";
				}
			}else{
					while ($reap = mysql_fetch_assoc($teachers)) {
						$staff_name = $reap['staff_name'];
						$staff_month = $reap['month'];


			if ($staff_month =="1") {$staff_monthname ="January";}elseif ($staff_month =="2") {$staff_monthname ="February";}elseif ($staff_month =="3") {$staff_monthname ="March";}elseif ($staff_month =="4") {$staff_monthname ="April";}elseif ($staff_month =="5") {$staff_monthname ="May";}elseif ($staff_month =="6") {$staff_monthname ="June";}elseif ($staff_month =="7") {$staff_monthname ="July";}elseif ($staff_month =="8") {$staff_monthname ="August";}elseif ($staff_month =="9") {$staff_monthname ="September";}elseif ($staff_month =="10") {$staff_monthname ="October";}elseif ($staff_month =="11") {$staff_monthname ="November";}elseif ($staff_month =="12") {$staff_monthname ="December";}


					
					$no.= "<option value=\"$staff_name\">$staff_name &nbsp; &nbsp; For: $staff_monthname</option>";
					$no2 = "";
					$no3 = "";

				}
			}
		if (strpos($in_bar, "staff_paymentverify") !== false) {
			$staff_info = substr($in_bar, 19);
			$explode = explode(",/", $staff_info);
			$staff_id = current($explode);
			$staff_month = next($explode);

			if ($staff_month =="1") {$staff_monthname ="January";}elseif ($staff_month =="2") {$staff_monthname ="February";}elseif ($staff_month =="3") {$staff_monthname ="March";}elseif ($staff_month =="4") {$staff_monthname ="April";}elseif ($staff_month =="5") {$staff_monthname ="May";}elseif ($staff_month =="6") {$staff_monthname ="June";}elseif ($staff_month =="7") {$staff_monthname ="July";}elseif ($staff_month =="8") {$staff_monthname ="August";}elseif ($staff_month =="9") {$staff_monthname ="September";}elseif ($staff_month =="10") {$staff_monthname ="October";}elseif ($staff_month =="11") {$staff_monthname ="November";}elseif ($staff_month =="12") {$staff_monthname ="December";}



			$query1 = mysql_query("SELECT * FROM teachers WHERE staff_id ='$staff_id' AND active='yes' OR active='no'");
				$fetch = mysql_fetch_assoc($query1);
					$passport = $fetch['passport'];
					$full_name = $fetch['full_name'];
					$title = $fetch['title'];

			$query2 = mysql_query("SELECT * FROM admin_staff_pay WHERE full_name = '$full_name' AND staff_id ='$staff_id'");
				$fetch1 = mysql_fetch_assoc($query2);
					$amount_in_words = $fetch1['amount_in_words'];
					$amount = $fetch1['amount'];

					echo "<div id=\"varify_r_pass\">
							<img src=\"staff_data/passport/$passport\" height=\"100%\" width=\"100%\">
						</div>
										<ul class=\"varify_r_info\">
											<li style=\"font-size:18px; color: #fff; font-weight: bolder; background: rgba(0,0,0,.7);\">
												$title $full_name

											</li>
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Staff ID: $staff_id
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px;\">
												Month: $staff_monthname
												
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px; padding-bottom: 5px;\">
												Amount : &#8373;$amount
											</li>
											<li style=\"color: #e9e9e9; font-size: 15px; padding-bottom: 5px;\">
												Amount in Words: $amount_in_words
											</li>
										</ul>

									<input type=\"submit\" name=\"pay\" value=\"PAY\">
									";

									



									if (isset($_POST['pay'])) {
										$date = date("jS F, Y.");

										mysql_query("UPDATE admin_center_teachers SET paid='1' WHERE staff_id='$staff_id' AND month = '$staff_month'");
										mysql_query("INSERT INTO staff_receipts VALUES('','$staff_id','$full_name','$staff_monthname','$amount','$amount_in_words','$Login_staff','$date')");

										$dated = date("jS F, Y");
										mysql_query("INSERT INTO report_staff_payment VALUES('','$staff_id','$full_name','$amount','$staff_monthname','$Login_staff','$dated','no')");

										?>
									<script type="text/javascript">
										location.replace('home.php?utab=staff_paymentreceiptsPay_<?php echo "$staff_id";?>');
									</script>
										<?php
									}

		}else{

			echo "<div id=\"wholeclass\"><br />
				$no3
					<select name=\"spectee\" title=\"Select Staff\" $no2 >
						$no
					</select>
				
					<input type=\"text\" name=\"staff_id\" placeholder=\"Staff ID\"  $no2 />
					<input type=\"password\" name=\"password\" placeholder=\"Log in Password\" $no2 />

					<input type=\"submit\" name=\"Verify\" value=\"Verify\"><br /><br /><br /><br /><br /><br />
				</div>


				";
									if ($in_bar == "staff_paymenterror1") {
									echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
											Pleace make sure all feilds are filled.
										</span>";
									}elseif ($in_bar == "staff_paymenterror2") {
									echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
											Staff ID does not match staff selected.
										</span>";
									}elseif ($in_bar == "staff_paymenterror3") {
									echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
											Incorrect Login Password!
										</span>";
									}

					}
				
				//<input type=\"submit\" name=\"workOnClass\" value=\"Receipts\">

			echo"

				</form>
				</div>

			</div>
		</center>
		";

		if (isset($_REQUEST['Verify'])) {
			$spectee = $_POST['spectee'];
			$staff_id = mb_strtoupper(strip_tags(addslashes($_POST['staff_id'])));
			$password = $_POST['password'];


			//Delete Spaces and Symbols From The Staff ID
			$staff_id= str_replace(" ", "", $staff_id);
			$staff_id= str_replace("-", "", $staff_id);
			$staff_id= str_replace("_", "", $staff_id);
			$staff_id= str_replace(".", "", $staff_id);
			$staff_id= str_replace(",", "", $staff_id);
			$staff_id= str_replace("", "", $staff_id);
			$staff_id= str_replace(";", "", $staff_id);
			$staff_id= str_replace("'", "", $staff_id);
			$staff_id= str_replace("/", "", $staff_id);
			$staff_id= str_replace("+", "", $staff_id);
			$staff_id= str_replace("*", "", $staff_id);
			$staff_id= str_replace(")", "", $staff_id);
			$staff_id= str_replace("(", "", $staff_id);
			$staff_id= str_replace("&", "", $staff_id);
			$staff_id= str_replace("`", "", $staff_id);
			$staff_id= str_replace("!", "", $staff_id);
			$staff_id= str_replace("@", "", $staff_id);
			$staff_id= str_replace("#", "", $staff_id);
			$staff_id= str_replace("$", "", $staff_id);
			$staff_id= str_replace("%", "", $staff_id);
			$staff_id= str_replace("^", "", $staff_id);
			$staff_id= str_replace("=", "", $staff_id);
			$staff_id= str_replace("[", "", $staff_id);
			$staff_id= str_replace("]", "", $staff_id);
			$staff_id= str_replace("{", "", $staff_id);
			$staff_id= str_replace("}", "", $staff_id);
			$staff_id= str_replace("~", "", $staff_id);


		if ($staff_id != "" AND $password != "") {
			$query = mysql_query("SELECT * FROM admin_center_teachers WHERE staff_name ='$spectee' AND staff_id = '$staff_id' ");
					if (mysql_num_rows($query) !== 0) {

						$password = md5($password);
						$query3 = mysql_query("SELECT * FROM staffs WHERE staff_id = '$Login_staff' AND password='$password'");

						if (mysql_num_rows($query3)===1) {
						?>
						<script type="text/javascript">
							location.replace('home.php?utab=staff_paymentverify<?php echo "$staff_id,/$month" ?>');
						</script>
						<?php
							}else{
								?>
								<script type="text/javascript">
									location.replace('home.php?utab=staff_paymenterror3');
								</script>
								<?php
							}


					}else{

						?>
						<script type="text/javascript">
							location.replace('home.php?utab=staff_paymenterror2');
						</script>
						<?php
					}
			
			}else{
				?>
				<script type="text/javascript">
					location.replace('home.php?utab=staff_paymenterror1');
				</script>
				<?php
		}

		}
	
}
?>


</div>
</div>