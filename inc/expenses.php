<div id="child_info">

<?php

$tab_inside = $_GET['utab'];
	
echo "<center>
		<div id=\"big\">
			<div id=\"bill_all\">
				<form method=\"post\" action=\"#\">";

				if (isset($_POST['submit'])) {
					$amountPerEeach = $_POST['amountPerEeach'];
					$itemName = $_POST['itemName'];
					$numberOfItems = $_POST['numberOfItems'];
					$ReceiptNumber = $_POST['ReceiptNumber'];

					if ($numberOfItems=="") {
						$numberOfItems=1;
					}else{
						$numberOfItems="$numberOfItems";
					}

						if ($numberOfItems==1) {
							$pieces = "piece";
						}else if ($numberOfItems>1) {
							$pieces = "pieces";
						}

						if ($ReceiptNumber != "") {
							$ReceiptNumber = "with receipt number $ReceiptNumber";
						}

					$amount = $amountPerEeach * $numberOfItems;
					$notes = "For $numberOfItems $pieces of $itemName $ReceiptNumber";
					$date = date("jS F, Y");


					if ($amount !="" AND $notes !="") {
						$query = mysql_query("SELECT * FROM teachers WHERE staff_id ='$Login_staff' AND active ='yes'");
						if (mysql_num_rows($query)===0) {
							?>
							<script type="text/javascript">
								location.replace("runners/logout.php");
							</script>
							<?php
						}else{
							mysql_query("INSERT INTO expenses VALUES('','$amount','$notes','$date','$Login_staff')");

							$query2 = mysql_query("SELECT * FROM  daily_collection WHERE dated ='$date'");
								if (mysql_num_rows($query2)===0) {
								$new_amount = 0 - $amount;
									mysql_query("INSERT INTO daily_collection VALUES ('','$new_amount','$date')");
								}else{
									$fetch = mysql_fetch_assoc($query2);
										$amount_out = $fetch['amount'];
										$new_amount = $amount_out - $amount;
									mysql_query("UPDATE daily_collection SET amount ='$new_amount' WHERE dated='$date'");
								}

		echo "
								<div style=\"margin-top: 18%; margin-bottom: 18%;\">
				<span style=\"font-size: 22spx; font-family: Lucida Calligraphy; font-weight:bolder;\">
					Expenses Added
				</span>
					<br /><br />
				<span style=\"font-size: 40px; font-weight:bold; color: #fff; text-shadow: -2px 1.8px #000; \">
					Successfully!
				</span>
			</div>
				<a href=\"home.php?utab=accountsExpenditure\" style=\"text-decoration: none;\">
					<img src=\"images/ok.png\" height=\"20%\" width=\"30%\" title=\"Okay\" />
				</a>

			";
						}
					}else{
						?>
						<script type="text/javascript">
							location.replace('home.php?utab=accountsExpenditure1');
						</script>
						<?php
					}
				}else{

				echo "<br /><br /><br />
					<input type=\"text\" name=\"amountPerEeach\" placeholder=\"Amount Per Each\" />
					<input type=\"text\" name=\"itemName\" placeholder=\"Item Name\" />
					<input type=\"text\" name=\"numberOfItems\" placeholder=\"Number of Pieces\" />
					<input type=\"text\" name=\"ReceiptNumber\" placeholder=\"Receipt Number\" />

					

					<input type=\"submit\" name=\"submit\" value=\"Submit\"><br /><br /><br /><br /><br />
					</form>
					";
					if ($tab_inside =="accountsExpenditure1") {
						echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
									Pleace make sure all feilds are filled.
								</span>";
					}
				}

echo"			

			</div>
		</div>
</center>
";	
?>

</div>