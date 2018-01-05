
<?php include "inc/header.php"; ?>

 <script src="js/jquery3.2.1.min.js"></script>
<!-----------------Tab Onclick Location Changed------------>
<script>
$(document).ready(function(){
    $("#student_info").click(function(){
    	var url = "home.php?utab=student_info";    
		$(location).attr('href',url);
    });
});
</script><!--Student Info-->


<script>
$(document).ready(function(){
    $("#new_reg").click(function(){
    	var url = "home.php?utab=new_reg";    
		$(location).attr('href',url);
    });
});
</script><!--New Registration-->

<script>
$(document).ready(function(){
    $("#fee_prosesing").click(function(){
    	var url = "home.php?utab=fee_prosesing";    
		$(location).attr('href',url);
    });
});
</script><!--Fee Processing-->

<script>
$(document).ready(function(){
    $("#billing_system").click(function(){
    	var url = "home.php?utab=billing_system";    
		$(location).attr('href',url);
    });
});
</script><!--Billing System-->

<script>
$(document).ready(function(){
    $("#reports").click(function(){
    	var url = "home.php?utab=reports";    
		$(location).attr('href',url);
    });
});
</script><!--reports-->

<script>
$(document).ready(function(){
    $("#admission_form").click(function(){
    	var url = "home.php?utab=admission_form";    
		$(location).attr('href',url);
    });
});
</script><!--Admission Form-->








<script>
$(document).ready(function(){
    $("#staff_info").click(function(){
    	var url = "home.php?utab=staff_info";    
		$(location).attr('href',url);
    });
});
</script><!--staff_info-->

<script>
$(document).ready(function(){
    $("#add_staff").click(function(){
    	var url = "home.php?utab=add_staff";    
		$(location).attr('href',url);
    });
});
</script><!--add_staff-->

<script>
$(document).ready(function(){
    $("#staff_payment").click(function(){
    	var url = "home.php?utab=staff_payment";    
		$(location).attr('href',url);
    });
});
</script><!--staff_payment-->

<script>
$(document).ready(function(){
    $("#staff_qualification").click(function(){
    	var url = "home.php?utab=staff_qualification";    
		$(location).attr('href',url);
    });
});
</script><!--staff_qualification-->










<script>
$(document).ready(function(){
    $("#Expenditure").click(function(){
    	var url = "home.php?utab=accountsExpenditure";    
		$(location).attr('href',url);
    });
});
</script><!--Expenditure-->



<script>
$(document).ready(function(){
    $("#Banking").click(function(){
    	var url = "home.php?utab=accountsBanking";    
		$(location).attr('href',url);
    });
});
</script><!--Banking-->


<script>
$(document).ready(function(){
    $("#Ledger").click(function(){
    	var url = "home.php?utab=accountsLedger";    
		$(location).attr('href',url);
    });
});
</script><!--Ledger-->



<script>
$(document).ready(function(){
    $("#Notes").click(function(){
    	var url = "home.php?utab=accountsNotes";    
		$(location).attr('href',url);
    });
});
</script><!--Notes-->











<script>
$(document).ready(function(){
    $("#report_students").click(function(){
    	var url = "home.php?utab=NsromapareportStudents";    
		$(location).attr('href',url);
    });
});
</script><!--Reports From Students -->



<script>
$(document).ready(function(){
    $("#report_staff").click(function(){
    	var url = "home.php?utab=NsromapareportStaffs";    
		$(location).attr('href',url);
    });
});
</script><!--Reports From Staffs-->


<script>
$(document).ready(function(){
    $("#report_accounts").click(function(){
    	var url = "home.php?utab=NsromapareportAccounts";    
		$(location).attr('href',url);
    });
});
</script><!--Reports From Accounts-->







<script>
$(document).ready(function(){
    $("#admin_staff").click(function(){
    	var url = "home.php?utab=adminitstratorsysNsromapaadmin_staffmanagement";    
		$(location).attr('href',url);
    });
});
</script><!--Expenditure-->



<script>
$(document).ready(function(){
    $("#admin_banks").click(function(){
    	var url = "home.php?utab=adminitstratorsysNsromapaadmin_bankmanagement";    
		$(location).attr('href',url);
    });
});
</script><!--Administrator Banking-->


<script>
$(document).ready(function(){
    $("#logins").click(function(){
    	var url = "home.php?utab=adminitstratorsysNsromapauser_management";    
		$(location).attr('href',url);
    });
});
</script><!--User Management-->



<script>
$(document).ready(function(){
    $("#admin_academics").click(function(){
    	var url = "home.php?utab=adminitstratorsysNsromapaadmin_academics";    
		$(location).attr('href',url);
    });
});
</script><!--Academics-->

<?php

$tab = $_GET['utab'];
?>


<?php
if (strpos($tab,'student_info') !== false OR $tab=="new_reg" OR strpos($tab, 'fee_prosesing') !==false  OR strpos($tab, 'fee_paying') !==false OR strpos($tab, 'fee_receipts') !==false OR strpos($tab, 'billing_system') !== false OR $tab=="admission_form" OR strpos($tab,"reports") !==false) {


				/////////////////// Check if Student Information is clicked //////////////
					
				if (strpos($tab,'student_info') !== false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"student_info\"  class=\"onlink\"  value=\"Student Info\" /></li>
													<li><input type=\"button\" id=\"new_reg\"  value=\"New Registration\" /></li>
													<li><input type=\"button\" id=\"fee_prosesing\" value=\"Fee Processing\" /></li>
													<li><input type=\"button\" id=\"billing_system\" value=\"Billing System\" /></li>
													<li><input type=\"button\" id=\"reports\"  value=\"reports\" /></li>
													<li><input type=\"button\" id=\"admission_form\" value=\"Admission Form\" /></li>
												
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								


								<div  class=\"thedivs\" id=\"student_infodiv\">";
									include "inc/child_info.php";
						echo"	</div>
							</div>
								




							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\" >
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; \">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";

						if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										
									}
					
	echo "	
									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
										</ul>
								
							</div>
						</div>
					</center>
					";
				}






				//////////////////////////////     Check if New Registration is clicked      //////////////
				elseif ($tab=="new_reg") {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"student_info\"  value=\"Student Info\" /></li>
													<li><input type=\"button\" id=\"new_reg\" class=\"onlink\"  value=\"New Registration\" /></li>
													<li><input type=\"button\" id=\"fee_prosesing\" value=\"Fee Processing\" /></li>
													<li><input type=\"button\" id=\"billing_system\" value=\"Billing System\" /></li>
													<li><input type=\"button\" id=\"reports\"  value=\"reports\" /></li>
													<li><input type=\"button\" id=\"admission_form\" value=\"Admission Form\" /></li>
												
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		


								<div class=\"thedivs\" id=\"new_regdiv\">   ";
									include "inc/new_account.php";
					echo "		</div>
							</div>
								




							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\" >
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; \">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "	

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
										</ul>
								
							</div>
						</div>
					</center>
					";
				}








				//////////////////////////////     Check if Fee Processing is clicked      //////////////
				elseif (strpos($tab, 'fee_prosesing') !==false  OR strpos($tab, 'fee_paying') !==false OR strpos($tab, 'fee_receipts') !==false){
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"student_info\"  value=\"Student Info\" /></li>
													<li><input type=\"button\" id=\"new_reg\"  value=\"New Registration\" /></li>
													<li><input type=\"button\" class=\"onlink\" id=\"fee_prosesing\" value=\"Fee Processing\" /></li>
													<li><input type=\"button\" id=\"billing_system\" value=\"Billing System\" /></li>
													<li><input type=\"button\" id=\"reports\"  value=\"reports\" /></li>
													<li><input type=\"button\" id=\"admission_form\" value=\"Admission Form\" /></li>
												
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								<div class=\"thedivs\" id=\"fee_prosesingdiv\">";
								include "inc/fee_processing.php";
						echo"		</div>
							</div>
								




							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\" >
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; \">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>
									";
									}else{
										//Do Nothing
									}
			echo "		

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
								</ul>
								
							</div>
						</div>
					</center>
					";
				}








				//////////////////////////////     Check if Billing  System is clicked      //////////////
				elseif (strpos($tab, 'billing_system') !==false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"student_info\"  value=\"Student Info\" /></li>
													<li><input type=\"button\" id=\"new_reg\"  value=\"New Registration\" /></li>
													<li><input type=\"button\" id=\"fee_prosesing\" value=\"Fee Processing\" /></li>
													<li><input type=\"button\" class=\"onlink\" id=\"billing_system\" value=\"Billing System\" /></li>
													<li><input type=\"button\" id=\"reports\"  value=\"reports\" /></li>
													<li><input type=\"button\" id=\"admission_form\" value=\"Admission Form\" /></li>
												
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								<div class=\"thedivs\" id=\"billing_systemdiv\">";
									include "inc/billing_system.php";
						echo "		</div>
							</div>
								




							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\" >
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; \">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "		

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>
					</center>
					";
				}









				//////////////////////////////     Check if Admission Form is clicked      //////////////
				elseif ($tab=="admission_form") {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"student_info\"  value=\"Student Info\" /></li>
													<li><input type=\"button\" id=\"new_reg\"  value=\"New Registration\" /></li>
													<li><input type=\"button\" id=\"fee_prosesing\" value=\"Fee Processing\" /></li>
													<li><input type=\"button\" id=\"billing_system\" value=\"Billing System\" /></li>
													<li><input type=\"button\" id=\"reports\"  value=\"reports\" /></li>
													<li><input type=\"button\" class=\"onlink\" id=\"admission_form\" value=\"Admission Form\" /></li>
												
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		


								<div class=\"thedivs\" id=\"admission_form\">";
								include 'inc/admin_form.php';
						echo"	</div>
							</div>
								




							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\" >
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; \">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "		

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>
					</center>
					";
				}













				//////////////////////////////     Check if reports is clicked      //////////////
				elseif (strpos($tab,"reports") !==false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"student_info\"  value=\"Student Info\" /></li>
													<li><input type=\"button\" id=\"new_reg\"  value=\"New Registration\" /></li>
													<li><input type=\"button\" id=\"fee_prosesing\" value=\"Fee Processing\" /></li>
													<li><input type=\"button\" id=\"billing_system\" value=\"Billing System\" /></li>
													<li><input type=\"button\" class=\"onlink\" id=\"reports\"  value=\"reports\" /></li>
													<li><input type=\"button\" id=\"admission_form\" value=\"Admission Form\" /></li>
												
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		


								<div class=\"thedivs\" id=\"reports\">";
								include 'inc/report.php';
						echo"	</div>
							</div>
								




							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\" >
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; \">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "		

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>
					</center>
					";
				}

































	//////////////////////////////   If Staff is Selected  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\	
	
}elseif (strpos($tab,'staff_info') !== false OR strpos($tab, "add_staff") !==false OR strpos($tab, 'staff_payment') !==false  OR strpos($tab, 'staff_qualification') !==false ) {


				/////////////////// Check if staff Information is clicked //////////////
					
				if (strpos($tab,'staff_info') !== false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"staff_info\"  class=\"onlink\"  value=\"Staff Info\" /></li>
													<li><input type=\"button\" id=\"add_staff\"  value=\"Add Staff\" /></li>
													<li><input type=\"button\" id=\"staff_payment\" value=\"Staff Payment\" /></li>
													<li><input type=\"button\" id=\"staff_qualification\" value=\"Staff Qualifications\" /></li>

													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								


								<div  class=\"thedivs\" id=\"student_infodiv\">";
									include "inc/staff_info.php";
						echo"	</div>
							</div>
								




							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\"  style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat;\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}






				//////////////////////////////     Check if add_staff is clicked      //////////////
				elseif (strpos($tab, "add_staff") !==false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"staff_info\"  value=\"Staff Info\" /></li>
													<li><input type=\"button\" id=\"add_staff\" class=\"onlink\"  value=\"Add Staff\" /></li>
													<li><input type=\"button\" id=\"staff_payment\" value=\"Staff Payment\" /></li>
													<li><input type=\"button\" id=\"staff_qualification\" value=\"Staff Qualifications\" /></li>
													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		


								<div class=\"thedivs\" id=\"new_regdiv\">   ";
									include "inc/new_staff.php";
					echo "		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\"  style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat;\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "		

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>
					</center>
					";
				}








				//////////////////////////////     Check if staff_payment is clicked      //////////////
				elseif (strpos($tab, 'staff_payment') !==false){
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"staff_info\"    value=\"Staff Info\" /></li>
													<li><input type=\"button\" id=\"add_staff\"  value=\"Add Staff\" /></li>
													<li><input type=\"button\" id=\"staff_payment\" value=\"Staff Payment\" class=\"onlink\"/></li>
													<li><input type=\"button\" id=\"staff_qualification\" value=\"Staff Qualifications\" /></li>
													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								<div class=\"thedivs\" id=\"fee_prosesingdiv\">";
								include "inc/staff_payment.php";
						echo"		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\"  style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat;\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "		

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>
					</center>
					";
				}








				//////////////////////////////     Check if staff_qualification is clicked      //////////////
				elseif (strpos($tab, 'staff_qualification') !==false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"staff_info\"  value=\"Staff Info\" /></li>
													<li><input type=\"button\" id=\"add_staff\"  value=\"Add Staff\" /></li>
													<li><input type=\"button\" id=\"staff_payment\" value=\"Staff Payment\" /></li>
													<li><input type=\"button\" class=\"onlink\" id=\"staff_qualification\" value=\"Staff Qualifications\" /></li>
													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								<div class=\"thedivs\" id=\"billing_systemdiv\">";
									echo "Demanded From the School";
						echo "		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\"  style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat;\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>	";
									}else{
										//Do Nothing
									}
			echo "		

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
								
								</ul>
								
							</div>
						</div>
					</center>
					";
				}























































/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//
//				THE ACCOUNTING SYSTEM
//
/////////////////////////////////////////////////////////////////////////////////////////////




	

}elseif (strpos($tab,'accounts') !== false) {


				/////////////////// Check if accounts Expenditure is clicked //////////////
					
				if (strpos($tab,'accountsExpenditure') !== false OR $tab =="accounts") {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"Expenditure\"  class=\"onlink\"  value=\"Expenditure\" /></li>

													<li><input type=\"button\" id=\"Banking\"  value=\"Bank Account\" /></li>

													<li><input type=\"button\" id=\"Ledger\" value=\"Ledger Book\" /></li>

													<li><input type=\"button\" id=\"Notes\" value=\"Notes\" /></li>

													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								


								<div  class=\"thedivs\" id=\"student_infodiv\">";
									include 'inc/expenses.php';
						echo"	</div>
							</div>
								




							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat;\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}






				//////////////////////////////     Check ifaccounts Banking is clicked      //////////////
				elseif (strpos($tab, "accountsBanking") !==false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"Expenditure\" value=\"Expenditure\" /></li>

													<li><input type=\"button\" class=\"onlink\" id=\"Banking\"  value=\"Bank Account\" /></li>

													<li><input type=\"button\" id=\"Ledger\" value=\"Ledger Book\" /></li>

													<li><input type=\"button\" id=\"Notes\" value=\"Notes\" /></li>
													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		


								<div class=\"thedivs\" id=\"new_regdiv\">   ";
									include 'inc/bank_account.php';
					echo "		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat;\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}








				//////////////////////////////     Check accounts Ledger is clicked      //////////////
				elseif (strpos($tab, 'accountsLedger') !==false){
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"Expenditure\" value=\"Expenditure\" /></li>

													<li><input type=\"button\" id=\"Banking\"  value=\"Bank Account\" /></li>

													<li><input type=\"button\" class=\"onlink\" id=\"Ledger\" value=\"Ledger Book\" /></li>

													<li><input type=\"button\" id=\"Notes\" value=\"Notes\" /></li>
													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								<div class=\"thedivs\" id=\"fee_prosesingdiv\">";
								include 'inc/ledger.php';
						echo"		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat;\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}








				//////////////////////////////     Check if accounts Notes is clicked      //////////////
				elseif (strpos($tab, 'accountsNotes') !==false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"Expenditure\" value=\"Expenditure\" /></li>

													<li><input type=\"button\" id=\"Banking\"  value=\"Bank Account\" /></li>

													<li><input type=\"button\" id=\"Ledger\" value=\"Ledger Book\" /></li>

													<li><input type=\"button\" class=\"onlink\" id=\"Notes\" value=\"Notes\" /></li>
													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								<div class=\"thedivs\" id=\"billing_systemdiv\">";
									include 'inc/notes.php';
						echo "		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat;\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}























	










































////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//			                   THE REPORTING SYSYEM				////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////





	

}elseif (strpos($tab,'Nsromapareport') !== false) {


				/////////////////// Check if Report For Students tab is clicked //////////////
					
				if (strpos($tab,'NsromapareportStudents') !== false OR $tab =="Nsromapareport") {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"report_students\"  class=\"onlink\"  value=\"From Students\" /></li>

													<li><input type=\"button\" id=\"report_staff\"  value=\"From Staff\" /></li>

													<li><input type=\"button\" id=\"report_accounts\" value=\"From Accounts\" /></li>

													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								


								<div  class=\"thedivs\" id=\"student_infodiv\">";
									include 'inc/reportstudents.php';
						echo"	</div>
							</div>
								




							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\"/>
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; \">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\"  style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}






				//////////////////////////////     Check if Report For STAFF tab  is clicked      //////////////
				elseif (strpos($tab, "NsromapareportStaffs") !==false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"report_students\"    value=\"From Students\" /></li>

													<li><input type=\"button\" id=\"report_staff\" class=\"onlink\" value=\"From Staff\" /></li>

													<li><input type=\"button\" id=\"report_accounts\" value=\"From Accounts\" /></li>

													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		


								<div class=\"thedivs\" id=\"new_regdiv\">   ";
									include 'inc/reportstaffs.php';
					echo "		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\"/>
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; font-size: 18px\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\"  style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}










				//////////////////////////////     Check if Report For ACCOUNTS tab  is clicked      //////////////
				elseif (strpos($tab, 'NsromapareportAccounts') !==false){
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"report_students\"  value=\"From Students\" /></li>

													<li><input type=\"button\" id=\"report_staff\"  value=\"From Staff\" /></li>

													<li><input type=\"button\" id=\"report_accounts\" class=\"onlink\"  value=\"From Accounts\" /></li>

													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								<div class=\"thedivs\" id=\"fee_prosesingdiv\">";
									include 'inc/reportaccounts.php';
						echo"		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\"/>
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; font-size: 18px\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\"  style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>	";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
								
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}










				//////////////////////////////     Check if Billing  System is clicked      //////////////
				elseif (strpos($tab, 'NsromapareportAdmin') !==false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
												<li><input type=\"button\" id=\"report_students\" value=\"From Students\" /></li>

													<li><input type=\"button\" id=\"report_staff\"  value=\"From Staff\" /></li>

													<li><input type=\"button\" id=\"report_accounts\" value=\"From Accounts\" /></li>

													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								<div class=\"thedivs\" id=\"billing_systemdiv\">";
									include 'inc/reportadmin.php';
						echo "		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\"/>
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\" style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; font-size: 18px\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\"  style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}


























































////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//			                   THE ADMINISTRATOR SYSYEM				////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////





	

}elseif (strpos($tab,'adminitstratorsysNsromapa') !== false) {


				/////////////////// Check if Staff Management  is clicked //////////////
					
				if (strpos($tab,'adminitstratorsysNsromapaadmin_staffmanagement') !== false OR $tab =="adminitstratorsysNsromapa") {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"admin_staff\"  class=\"onlink\"  value=\"Staffs\" /></li>

													<li><input type=\"button\" id=\"admin_banks\"  value=\"Bank Accounts\" /></li>

													<li><input type=\"button\" id=\"logins\" value=\"User Management\" /></li>

													<li><input type=\"button\" id=\"admin_academics\" value=\"Academics\" /></li>

													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								


								<div  class=\"thedivs\" id=\"student_infodiv\">";
									include 'inc/staff_management.php';
						echo"	</div>
							</div>
								




							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\"/>
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\"  style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}






				//////////////////////////////     Check if New Registration is clicked      //////////////
				elseif (strpos($tab, "adminitstratorsysNsromapaadmin_bankmanagement") !==false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!-----------------------------Navigation Area Codes-------------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"admin_staff\"   value=\"Staffs\" /></li>

													<li><input type=\"button\" id=\"admin_banks\" class=\"onlink\" value=\"Bank Accounts\" /></li>

													<li><input type=\"button\" id=\"logins\" value=\"User Management\" /></li>

													<li><input type=\"button\" id=\"admin_academics\" value=\"Academics\" /></li>

													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		


								<div class=\"thedivs\" id=\"new_regdiv\">   ";
									include 'inc/admin_bank.php';
					echo "		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\"/>
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\"  style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}










				//////////////////////////////     Check if Fee Processing is clicked      //////////////
				elseif (strpos($tab, 'adminitstratorsysNsromapauser_management') !==false){
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
													<li><input type=\"button\" id=\"admin_staff\" value=\"Staffs\" /></li>

													<li><input type=\"button\" id=\"admin_banks\"  value=\"Bank Accounts\" /></li>

													<li><input type=\"button\" id=\"logins\" class=\"onlink\" value=\"User Management\" /></li>

													<li><input type=\"button\" id=\"admin_academics\" value=\"Academics\" /></li>

													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								<div class=\"thedivs\" id=\"fee_prosesingdiv\">";
								include 'inc/user_management.php';
						echo"		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\"/>
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\"  style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>	";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
								
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}










				//////////////////////////////     Check if Billing  System is clicked      //////////////
				elseif (strpos($tab, 'adminitstratorsysNsromapaadmin_academics') !==false) {
					
				echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											<ul>
												
												
												<li><input type=\"button\" id=\"admin_staff\" value=\"Staffs\" /></li>

													<li><input type=\"button\" id=\"admin_banks\"  value=\"Bank Accounts\" /></li>

													<li><input type=\"button\" id=\"logins\" value=\"User Management\" /></li>

													<li><input type=\"button\" id=\"admin_academics\" class=\"onlink\" value=\"Academics\" /></li>

													
											</ul>
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		

								<div class=\"thedivs\" id=\"billing_systemdiv\">";
									include 'inc/academic_manag.php';
						echo "		</div>
							</div>
								




							
								<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\"/>
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\" style=\"background-color: #fff; font-size: 27px; font-weight: bolder; text-shadow: 1px 1px #000;\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\"  style=\"color: #03b; background:url(images/arror2.png); background-size: 25px 25px; background-position:160px 7px; background-repeat: no-repeat; font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>		
					</center>
					";
				}




























































	
}elseif (strpos($tab, "Changepass")!==false) {
					echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											
											<!----- No Nav Bar Here ----->
											
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		
								<div class=\"thedivs\" id=\"fee_prosesingdiv\">";
									include 'inc/changepass.php';
						echo"		</div>
							</div>
								





							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>";
									}else{
										//Do Nothing
									}
			echo "		

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									
								</ul>
								
							</div>
						</div>
					</center>
					";




}

	//////////////////////////////        If None is Selected    \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
				else{
					echo "	<center>
						<div id=\"homeall\">
							<div id=\"otherside\">
							";
				?>
					<!----------------------------Navigation Area Codes-------------------------->
				<?php
						echo "	
									<div id=\"navbar\">";?><!------Nav but holder------><?php
						echo "	   		<div id=\"holder\">
											
											<!----- No Nav Bar Here ----->
											
										</div>";	?><!----End of Holder----><?php
						echo "		</div>";	?><!-----End Of Navbar--------><?php
						echo "		


								<div class=\"thedivs\" id=\"general\">
									<form action=\"#\" method=\"post\" >
										<input type=\"submit\" name=\"\" value=\"Click Here To Get Started!\" \>
									</form>
								</div>
							</div>
								





							
							<div id=\"leftsidepannel\">
								
								<div id=\"buts\">
									<a href=\"home.php?utab=Changepass$Login_staff\" title=\"Change Password\"><div id=\"Changepass\"></div></a>
									<a href=\"runners/logout.php\" title=\"Sign Out\"><div id=\"logout\"></div></a>
									<a href=\"home.php?utab=1\" title=\"Home\"><div id=\"home\"></div></a>
								</div><br />
								<div id=\"crest\">
									<img src=\"images/crest.png\"/>
								</div>
								<ul >
									<div id=\"hover\">
										<a href=\"home.php?utab=student_info\" >
											<li class=\"students\">
											<img src=\"images/students.png\" style=\"top: 295px; left: 4px;\" />

												STUDENTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=staff_info\">
											<li class=\"staff\">
											<img src=\"images/staff.png\" style=\"top: 350px; left: 4px;\" />
												STAFF
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=accounts\">
											<li class=\"accounts\">
												<img src=\"images/account.png\" style=\"top: 404px; left: 4px;\" />
												ACCOUNTS
											</li>
										</a>
									</div>";
									if (strpos($Login_staff, "AD")!==false) {
										echo "<div id=\"hover\">
										<a href=\"home.php?utab=Nsromapareport\">
											<li class=\"staff\">
											<img src=\"images/report.png\" style=\"top: 460px; left: 4px;\" />
												REPORTS
											</li>
										</a>
									</div>
									<div id=\"hover\">
										<a href=\"home.php?utab=adminitstratorsysNsromapa\">
											<li class=\"accounts\" style=\"font-size: 18px\">
												<img src=\"images/admin_center.png\" style=\"top: 510px; left: 4px;\" />
												ADMIN CENTER
											</li>
										</a>
									</div>

									<div style=\"background: #8faaec; height: 32px; margin-top: 7px;\">
										<a href=\"Upload_db.php\">
											<li class=\"accounts\" style=\"background-image:url(''); font-size: 16px;\">
												Upload to Cloud
											</li>
										</a>
									</div>
									";
									}else{
										//Do Nothing
									}
			echo "		
								</ul>
								
							</div>
						</div>
					</center>
					";
				}
?>
<?php include "inc/footer.php"; ?>




