<div id="child_all" style="overflow:hidden; overflow-y: auto;">

<?php 
$staff_in_tab = $_GET['utab'];
if(strpos($staff_in_tab, "staff_infounact") !== false){

			$info_in = substr($staff_in_tab, 15);
			$query = mysql_query("SELECT * FROM teachers WHERE staff_id = '$info_in' AND (active='no' OR active='yes')");
			$grab = mysql_fetch_assoc($query);
			$staff_id = $grab['staff_id'];
			$date_of_employment = $grab['date_of_employment'];
			$full_name = $grab['full_name'];
			$position = $grab['position'];
			$title = $grab['title'];
			$gender = $grab['gender'];
			$passport = $grab['passport'];
			echo "<div class=\"student_error\">Sure want to remove $full_name From Active Staffs?</div>
			<center>
				
				<div id=\"student_passport\" style=\"background-image:url(images/staff_big.png);\">
					<img src=\"staff_data/passport/$passport\" height=\"100%\" width=\"100%\">
				</div>
				<div id=\"tee_out\">
					<span style=\"font-size: 18px; font-family: Lucida Fax; font-weight: 600;\">
						$title $full_name
					</span><br />
					<table style=\"width: 35%; height: 20%;\">
						<tr>
							<th>Staff ID</th>
							<td>
								$staff_id
							</dt>

						</tr>
						<tr>
							<th>Position ID</th>
							<td>
								$position
							</dt>

						</tr>
						<tr>
							<th>Date of Emplayment</th>
							<td>
								$date_of_employment
							</dt>

						</tr>
					</table>
					
				</div>
			<form action=\"#\" method=\"post\">
				<input type=\"submit\" name=\"Cancle\" value=\"Cancle\" style=\"height: 40px; font-size: 16px; color: #fff; background: #039b9b; cursor: pointer; width: 80px; border: 0px;\"/>

				<input type=\"submit\" name=\"Continue\" value=\"Continue\" style=\"height: 40px; font-size: 16px; color: #fff; background: #039b9b; cursor: pointer; width: 80px; border: 0px;\"/>
			</form>
			</center>
			";
			if (isset($_REQUEST['Cancle'])) {
				?>
			<script type="text/javascript">
				location.replace('home.php?utab=staff_infosing<?php echo $info_in;?>');
			</script>
				<?php
			}
			if (isset($_REQUEST['Continue'])) {

				$dated = date("jS F, Y");

				mysql_query("INSERT INTO report_activate_de_staff VALUES('','$full_name','$staff_id','$position','Deactivated','$Login_staff','$dated','no')");

				mysql_query("UPDATE teachers SET active='no' WHERE staff_id='$info_in'");
				mysql_query("UPDATE admin_center_teachers SET active='no' WHERE staff_id='$info_in'");

				$find = mysql_query("SELECT * FROM staffs WHERE staff_id = '$staff_id'");
					if (mysql_num_rows($find)===0) {
						# code...
					}else{
						mysql_query("DELETE FROM staffs WHERE staff_id='$staff_id'");
					}
				?>
			<script type="text/javascript">
				location.replace('home.php?utab=staff_infosing<?php echo $info_in;?>');
			</script>
				<?php
			}


}
elseif(strpos($staff_in_tab, "staff_infoedit") !== false) {
	$info_in = substr($staff_in_tab, 14);

	$query = mysql_query("SELECT * FROM teachers WHERE staff_id = '$info_in' AND (active='not' OR active='yes')");
	$grab = mysql_fetch_assoc($query);
	$staff_id = $grab['staff_id'];
	$date_of_employment = $grab['date_of_employment'];
	$full_name = $grab['full_name'];
	$status = $grab['position'];
	$title = $grab['title'];
	$ssnit = $grab['ssnit'];
	$date_of_birth = $grab['date_of_birth'];
	$gender = $grab['gender'];
	$merital_status = $grab['merital_status'];
	$spouse_name = $grab['spouse_name'];

	$address = $grab['address'];
	$city = $grab['city'];
	$home_tel = $grab['home_tel'];
	$work_tel = $grab['work_tel'];
	$mobile = $grab['mobile'];
	$email = $grab['email'];

	$degree = $grab['degree'];
	$highest_cert = $grab['highest_cert'];
	$working_experience = $grab['working_experience'];
	$passport = $grab['passport'];


	echo "<div id=\"staff_info_in\">
	<form action=\"#\" method=\"post\" enctype=\"multipart/form-data\" id=\"add_staffform\">
		<div class=\"staff_part1\">
			<table style=\"width: 100%;\">
				<tr>
					<th>Staff ID</th>
					<td>
						<input type=\"text\" name=\"staff_id\" value=\"$staff_id\">
					</td>
					<th>Date of Employment</th>
					<td>
						<input type=\"date\" name=\"date_of_employment\" value=\"$date_of_employment\">
					</td>
				</tr>
				<tr>
					<th>Full Name</th>
					<td>
						<input type=\"text\" name=\"full_name\" value=\"$full_name\">
					</td>
					<th>Position</th>
					<td>
						<select name=\"status\">
							<option value=\"$status\">$status</option>
							<option value=\"Director\">Director</option>
							<option value=\"Administrator\">Administrator</option>
							<option value=\"Head\">Head</option>
							<option value=\"Teacher\">Teacher</option>
							<option value=\"Other\">Other</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Title</th>
					<td>
						<input type=\"text\" name=\"title\" value=\"$title\">
					</td>
					<th>Social Security</th>
					<td>
						<input type=\"text\" name=\"ssnit\" value=\"$ssnit\">
					</td>
				</tr>
				<tr>
					<th>Date Of Birth</th>
					<td>
						<input type=\"date\" name=\"date_of_birth\" value=\"$date_of_birth\">
					</td>
					<th>Gender</th>
					<td>
						<select name=\"gender\">
							<option value=\"$gender\">$gender</option>
							<option value=\"Male\">Male</option>
							<option value=\"Female\">Female</option>
							<option value=\"N/A\">N/A</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Merital Status</th>
					<td>
						<select name=\"merital_status\">
							<option value=\"$merital_status\">$merital_status</option>
							<option value=\"Single\">Single</option>
							<option value=\"Married\">Married</option>
							<option value=\"Divorced\">Divorced</option>
							<option value=\"Widow\">Widow</option>
							<option value=\"Widower\">Widower</option>
							<option value=\"N/A\">N/A</option>
						</select>
					</td>
					<th>Spouse Full Name</th>
					<td>
						<input type=\"text\" name=\"spouse_name\" value=\"$spouse_name\">
					</td>
				</tr>
			</table>
		</div>

		<div class=\"staff_part2\">
			<table>
				<tr>
					<th>Home Address</th>
					<td>
						<textarea style=\"margin-top: 10px;\" name=\"address\">$address</textarea>
					</td>
					<th> City</th>
					<td>
						<input type=\"text\" name=\"city\" value=\"$city\">
					</td>
				</tr>
				<tr>
					<th>Home Tel</th>
					<td>
						<input type=\"tel\" name=\"home_tel\" value=\"$home_tel\">
					</td>
					<th>Work Tel</th>
					<td>
						<input type=\"tel\" name=\"work_tel\" value=\"$work_tel\">
					</td>	
				</tr>
				<tr>
					<th>Mobile No.</th>
					<td>
						<input type=\"text\" name=\"mobile\" value=\"$mobile\">
					</td>
					<th>Email</th>
					<td>
						<input type=\"email\" name=\"email\" value=\"$email\">
					</td>
				</tr>
			</table>
		</div>

		<div class=\"staff_part3\">
				
				<div>
					Degree
				
						<textarea style=\"width: 30%; margin-top: 5px;\" name=\"degree\">$degree</textarea>
					&nbsp;
					&nbsp;
					Highest Certificate
						<textarea style=\"width:30%; margin-top: 5px;\" name=\"highest_cert\">$highest_cert</textarea>
				</div>
			<div>
				Working Experience				
					<textarea style=\"width: 71%; margin-top: 10px;\" name=\"working_experience\">$working_experience</textarea>
				
			</div>
		</div>


		<div class=\"staff_img\">
			<img src=\"staff_data/passport/$passport\" style=\"width: 100%; height: 100%;\" />
		</div>
		<div class=\"staff_files\" style=\"padding-top: 10px;\">
				Upload Passport
					<input type=\"submit\" value=\" \" name=\"update_passport\" style=\"padding: 2px; border-radius: 50%; height: 15px; margin-left: 15px; width: 15px;\" title=\"Upload Passport\">
				<input type=\"file\" id=\"staff_pass\" name=\"staff_pass\" style=\" margin-top: 0px;\">




				Upload Cert
					<input type=\"submit\" value=\" \" name=\"update_certificate\" style=\"padding: 2px; border-radius: 50%; margin-left: 41px; height: 15px; width: 15px;\" title=\"Upload Certificate\">
				<input type=\"file\" name=\"staff_cert\" style=\" margin-top: 0px;\">




				Upload CV
					<input type=\"submit\" value=\" \" name=\"update_cv\" style=\"padding: 2px; border-radius: 50%; height: 15px; margin-left: 50px; width: 15px;\" title=\"Upload CV\">
				<input type=\"file\" name=\"staff_cv\" style=\" margin-top: 0px;\">



				Upload App
					<input type=\"submit\" value=\" \" name=\"update_application\" style=\"padding: 2px; border-radius: 50%; margin-left: 40px; height: 15px; width: 15px;\" title=\"Upload Application\">
				<input type=\"file\" name=\"staff_app\" style=\" margin-top: 0px;\">



				<input type=\"submit\" name=\"update_staff\" value=\"UPDATE\" style=\"padding: 5px; margin-top: 0px; margin-bottom: 0px;\" />
			</div>
		</form>
	</div>";	
?>
<script type="text/javascript">
		function filePreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e){
					$('#add_staffform + img').remove();
					$('#add_staffform').after('<img src="'+e.target.result+'" style="position: fixed; top: 85px; left: 420px; width: 155px; height: 145px; border:3px solid #dce5ee;" />');
				}
				reader.readAsDataURL(input.files[0]);
			}
		}

		$('#staff_pass').change(function(){
			filePreview(this);
		});
	</script>
<?php
///////////////// Update All //////////////////////////
	if (isset($_REQUEST['update_staff'])) {
	$staff_id = mb_strtoupper(strip_tags(addslashes($_POST['staff_id'])));
	$date_of_employment = $_POST['date_of_employment'];
	$full_name = ucwords($_POST['full_name']);
	$status = ucwords($_POST['status']);
	$title = ucfirst($_POST['title']);
	$ssnit = $_POST['ssnit'];
	$date_of_birth = $_POST['date_of_birth'];
	$gender = $_POST['gender'];
	$merital_status = $_POST['merital_status'];
	$spouse_name = ucwords($_POST['spouse_name']);

	$address = $_POST['address'];
	$city = $_POST['city'];
	$home_tel = $_POST['home_tel'];
	$work_tel = $_POST['work_tel'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];

	$degree = $_POST['degree'];
	$highest_cert = $_POST['highest_cert'];
	$working_experience = $_POST['working_experience'];


	mysql_query("UPDATE teachers SET date_of_employment ='$date_of_employment',full_name ='$full_name',position='$status',title ='$title',ssnit ='$ssnit',date_of_birth = '$date_of_birth',gender= '$gender',merital_status = '$merital_status',spouse_name = '$spouse_name',address = '$address',city = '$city',home_tel = '$home_tel',work_tel = '$work_tel',mobile = '$mobile',email = '$email',degree = '$degree',highest_cert = '$highest_cert',working_experience = '$working_experience' WHERE staff_id='$info_in'");

		$dated = date("jS F, Y");
	mysql_query("INSERT INTO report_staff_student_info_update VALUES('','$full_name','$info_in','staff','$dated','$Login_staff','no')");

	?>
<script type="text/javascript">
	location.replace('home.php?utab=staff_infosing<?php echo $info_in;?>');
</script>
	<?php

	}

	if (isset($_REQUEST['update_passport'])) {
					$rand_dir_name=""; $profile_pic_name="";
						if((($_FILES["staff_pass"] ["type"] == "image/jpeg") || ($_FILES["staff_pass"] ["type"] == "image/png"))&&(@$_FILES["staff_pass"]["size"] < 5242880)) //5 Megabyte
					{
					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
					$rand_dir_name = substr(str_shuffle($chars), 0, 15);
					mkdir("staff_data/passport/$rand_dir_name");
					

						move_uploaded_file(@$_FILES["staff_pass"]["tmp_name"],"staff_data/passport/$rand_dir_name/".$_FILES["staff_pass"]["name"]);
						//echo"Uploaded and Stored in: staff_data/passport/$rand_dir_name/".@$_FILES["staff_pass"]["name"];
						
						$profile_pic_name = @$_FILES["staff_pass"]["name"];

						mysql_query("UPDATE teachers SET passport='$rand_dir_name/$profile_pic_name' WHERE staff_id='$info_in'");
					?>
					<script type="text/javascript">
						alert("Passport updated Successfully!")
					</script>
					<script type="text/javascript">
						location.replace('home.php?utab=staff_infoedit<?php echo $info_in;?>');
					</script>
						<?php

					
			}else{
						?>
					<script type="text/javascript">
						alert("Invalide file! Your Application file must be image and not larger than 3MB and must be either .jpg, or .png");	
					</script>
						<?php
				}
	}


	if (isset($_REQUEST['update_certificate'])) {
						
				////////////////////////       Upload Certificate    //////////////////////////////
					$rand_dir_cert_name="";  $cert_name="";
							if((($_FILES["staff_cert"] ["type"] == "image/jpeg") || ($_FILES["staff_cert"] ["type"] == "image/png"))&&(@$_FILES["staff_cert"]["size"] < 5242880)) //5 Megabyte
						{
						$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
						$rand_dir_cert_name = substr(str_shuffle($chars), 0, 15);
						mkdir("staff_data/Certificate/$rand_dir_cert_name");
						

							move_uploaded_file(@$_FILES["staff_cert"]["tmp_name"],"staff_data/Certificate/$rand_dir_cert_name/".$_FILES["staff_cert"]["name"]);
							//echo"Uploaded and Stored in: staff_data/$rand_dir_cert_name/".@$_FILES["staff_cert"]["name"];
							
							$cert_name = @$_FILES["staff_cert"]["name"];

							mysql_query("UPDATE teachers SET certificate='$rand_dir_cert_name/$cert_name' WHERE staff_id='$info_in'");
					?>
					<script type="text/javascript">
						alert("Certificate updated Successfully!")
					</script>
					<script type="text/javascript">
						location.replace('home.php?utab=staff_infoedit<?php echo $info_in;?>');
					</script>
						<?php
						
				}else{
							?>
					<script type="text/javascript">
						alert("Invalide file! Your Application file must be image and not larger than 3MB and must be either .jpg, or .png");	
					</script>
						<?php
					}
	}


	if (isset($_REQUEST['update_cv'])) {
		////////////////////////       Upload CV    //////////////////////////////
					$rand_dir_cv_name=""; $cv_name="";
							if((($_FILES["staff_cv"] ["type"] == "image/jpeg") || ($_FILES["staff_cv"] ["type"] == "image/png"))&&(@$_FILES["staff_cv"]["size"] < 5242880)) //5 Megabyte
						{
						$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
						$rand_dir_cv_name = substr(str_shuffle($chars), 0, 15);
						mkdir("staff_data/cv/$rand_dir_cv_name");
						

							move_uploaded_file(@$_FILES["staff_cv"]["tmp_name"],"staff_data/cv/$rand_dir_cv_name/".$_FILES["staff_cv"]["name"]);
							//echo"Uploaded and Stored in: staff_data/$rand_dir_cv_name/".@$_FILES["staff_cv"]["name"];
							
							$cv_name = @$_FILES["staff_cv"]["name"];

						mysql_query("UPDATE teachers SET cv ='$rand_dir_cv_name/$cv_name' WHERE staff_id='$info_in'");
					?>
					<script type="text/javascript">
						alert("CV Updated Successfully!")
					</script>
					<script type="text/javascript">
						location.replace('home.php?utab=staff_infoedit<?php echo $info_in;?>');
					</script>
						<?php
						
				}else{
						?>
					<script type="text/javascript">
						alert("Invalide file! Your Application file must be image and not larger than 3MB and must be either .jpg, or .png");	
					</script>
						<?php	
					}

	}




	if (isset($_REQUEST['update_application'])) {
							///////////////////////       Upload Application    //////////////////////////////
						$rand_dir_app_name=""; $app_name="";
								if((($_FILES["staff_app"] ["type"] == "image/jpeg") || ($_FILES["staff_app"] ["type"] == "image/png"))&&(@$_FILES["staff_app"]["size"] < 5242880)) //5 Megabyte
							{
							$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
							$rand_dir_app_name = substr(str_shuffle($chars), 0, 15);
							mkdir("staff_data/Application/$rand_dir_app_name");
							

								move_uploaded_file(@$_FILES["staff_app"]["tmp_name"],"staff_data/Application/$rand_dir_app_name/".$_FILES["staff_app"]["name"]);
								//echo"Uploaded and Stored in: staff_data/$/".@$_FILES["staff_cert"]["name"];
								
								$app_name = @$_FILES["staff_app"]["name"];

							mysql_query("UPDATE teachers SET application ='$rand_dir_app_name/$app_name' WHERE staff_id='$info_in'");
					?>
					<script type="text/javascript">
						alert("Application Updated Successfully!")
					</script>
					<script type="text/javascript">
						location.replace('home.php?utab=staff_infoedit<?php echo $info_in;?>');
					</script>
						<?php
							
					}else{
								?>
					<script type="text/javascript">
						alert("Invalide file! Your Application file must be image and not larger than 3MB and must be either .jpg, or .png");	
					</script>
						<?php
						}

		}
	






}elseif (strpos($staff_in_tab, "staff_infosch") !== false) {
	$info_in = substr($staff_in_tab, 13);

	$info_in = preg_replace("#[^0-9a-z]#i","",$info_in);


	$output ="";

	$query = mysql_query("SELECT * FROM teachers WHERE (full_name LIKE '%$info_in%' OR staff_id LIKE '%$info_in%') AND active='yes' OR active='no'") or die("Could not Search");
	$selectrow = mysql_num_rows($query);
	if ($selectrow == 0) {
		$output = "<div class=\"student_error\"> No Staff Found!</div>";
		$print_but="";
	}else{
		while($fetch = mysql_fetch_array($query)){
			$full_name = $fetch['full_name'];
			$staff_id = $fetch['staff_id'];
			$position = $fetch['position'];
			$passport = $fetch['passport'];
			$active = $fetch['active'];

			if ($active=="not") {
			$active ="Pending"; 
			}else{
				$active = "$active";
			}

			
	$output.="
<a href=\"home.php?utab=staff_infosing$staff_id\" id=\"class_pipuls\">
	<div id=\"search_r_pass\"><img src=\"staff_data/passport/$passport\" height=\"100%\" width=\"100%\"></div>
	<ul class=\"class_pipuls\">
		<li>$full_name </li>
		<li id=\"down\">Staff ID: $staff_id    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Position: $position     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     Active: $active</li>
	</ul>
</a>
";
$print_but = "<a href=\"runners/topdfstaff.php\" target=\"_blank\">
				<input type=\"button\" id=\"prnt_class\" value=\"Print List\"/>
			</a>";
	}
		}
		
 echo "<div id=\"child_all\">";
 echo "$print_but";
 echo "$output";
 echo "</div>";

}elseif (strpos($staff_in_tab, "staff_infosing") !== false) {
	$singstaff = substr($staff_in_tab, 14);
	$select = mysql_query("SELECT * FROM teachers WHERE staff_id = '$singstaff' AND active='yes' OR active='no' LIMIT 1");
		$get = mysql_fetch_assoc($select);
		$staff_id = $get['staff_id'];
		$date_of_employment = $get['date_of_employment'];
		$full_name = $get['full_name'];
		$position = $get['position'];
		$title = $get['title'];
		$ssnit = $get['ssnit'];
		$date_of_birth = $get['date_of_birth'];
		$gender = $get['gender'];
		$merital_status = $get['merital_status'];
		$spouse_name = $get['spouse_name'];
		$address = $get['address'];
		$city = $get['city'];
		$home_tel = $get['home_tel'];
		$work_tel = $get['work_tel'];
		$mobile = $get['mobile'];
		$email = $get['email'];
		$degree = $get['degree'];
		$highest_cert = $get['highest_cert'];
		$working_experience = $get['working_experience'];
		$passport = $get['passport'];
		$certificate = $get['certificate'];
		$cv = $get['cv'];
		$application = $get['application'];
		$active = $get['active'];


	echo "<div id=\"staff_info_in\">
	<form action=\"#\" method=\"post\" enctype=\"multipart/form-data\" id=\"add_staffform\">
		<div class=\"staff_part1\"><br />
			<table style=\"width: 100%;\">
				<tr>
					<th>Staff ID</th>
					<td>
						$staff_id
					</td>
					<th>Date of Employment</th>
					<td>
						$date_of_employment
					</td>
				</tr>
				<tr>
					<th>Full Name</th>
					<td>
						$full_name
					</td>
					<th>Position</th>
					<td>
						$position
					</td>
				</tr>
				<tr>
					<th>Title</th>
					<td>
						$title
					</td>
					<th>Social Security</th>
					<td>
						$ssnit 
					</td>
				</tr>
				<tr>
					<th>Date Of Birth</th>
					<td>
						$date_of_birth
					</td>
					<th>Gender</th>
					<td>
						$gender
					</td>
				</tr>
				<tr>
					<th>Merital Status</th>
					<td>
						$merital_status
					</td>
					<th>Spouse Full Name</th>
					<td>
						$spouse_name 
					</td>
				</tr>
			</table>
		</div>

		<div class=\"staff_part2\">
			<table>
				<tr>
					<th>Home Address</th>
					<td>$address
							
						</textarea>
					</td>
					<th> City</th>
					<td>
						$city
					</td>
				</tr>
				<tr>
					<th>Home Tel</th>
					<td>
						$home_tel
					</td>
					<th>Work Tel</th>
					<td>
						$work_tel
					</td>	
				</tr>
				<tr>
					<th>Mobile No.</th>
					<td>
						$mobile
					</td>
					<th>Email</th>
					<td>
						$email
					</td>
				</tr>
			</table>
		</div>

		<div class=\"staff_part3\" style=\"overflow:auto;\">
				
				<div>
					Degree  :  &nbsp;&nbsp; $degree<br /><br />
								
					
					Highest Certificate  :  &nbsp;&nbsp; $highest_cert<br /><br />
				</div>
			<div>
				Working Experience  :  &nbsp;&nbsp; $working_experience<br /><br />
				
			</div>
		</div>


		<div class=\"staff_img\">
			<img src=\"staff_data/passport/$passport\" style=\"width: 100%; height: 100%;\" />
		</div>
		<div class=\"staff_files\" style=\"padding-top: 5px; height: 68%;\">

				Certificate<br />
				<div id=\"img_thimbs\">";
					if ($certificate =="/" OR $certificate =="") {
						echo "No Certificate Yet.";
					}else{
						echo "<a href=\"runners/staff_uploadsToPDF.php?u=Certificate/$certificate\" target=\"_blank\">
							<img src=\"staff_data/Certificate/$certificate\" style=\"width: 100%; height: 100%;\" />
						</a>";
					}					
			echo "</div><br />

				Curriculum Vita <br />
				<div id=\"img_thimbs\">";
					if ($cv =="/" OR $cv =="") {
						echo "No CV Yet.";
					}else{
						echo "<a href=\"runners/staff_uploadsToPDF.php?u=cv/$cv\" target=\"_blank\">
							<img src=\"staff_data/cv/$cv\" style=\"width: 100%; height: 100%;\" />
						</a>";
					}					
			echo "</div><br />

				Upload Application<br /><div id=\"img_thimbs\">";
					if ($application =="/" OR $application =="") {
						echo "No Application Yet.";
					}else{
						echo "<a href=\"runners/staff_uploadsToPDF.php?u=Application/$application\" target=\"_blank\">
							<img src=\"staff_data/Application/$application\" style=\"width: 100%; height: 100%;\" />
						</a>";
					}					
			echo "</div><br />
					<input type=\"submit\" name=\"edit_info\" value=\"Edit\" style=\"width: 70%; height: 7%; padding:5px; font-size: 14px; margin:  2px; margin-left: 15%;\">
				
					<input type=\"submit\" name=\"Payment_INFO\" value=\"Payment\" style=\"width: 70%; height: 7%; padding:5px; font-size: 14px; margin: 2px; margin-left: 15%;\">";
					if ($active =="yes") {
						$De_activate = "<input type=\"submit\" name=\"Deactivate\" value=\"Deactivate\" style=\"width: 70%; height: 7%; padding:5px; font-size: 14px; margin: 2px; margin-left: 15%;\">";
					}elseif($active=="no"){
						$De_activate = "<input type=\"submit\" name=\"Activate\" value=\"Activate\" style=\"width: 70%; height: 7%; padding:5px; font-size: 14px; margin: 2px; margin-left: 15%;\">";
					}else{
						$De_activate ="";
					}
					
			echo "	$De_activate
			</div>
		</form>
	</div>";
	if (isset($_POST['edit_info'])) {
		?>
			<script type="text/javascript">
				location.replace('home.php?utab=staff_infoedit<?php echo $singstaff ?>');
			</script>
		<?php
	}
	if (isset($_POST['Payment_INFO'])) {
		?>
		<script type="text/javascript">
			location.replace('home.php?utab=staff_paymentreceiptsPay_<?php echo $singstaff ?>');
		</script>
		<?php
	}
	if (isset($_POST['Deactivate'])) {
		?>
		<script type="text/javascript">
			location.replace('home.php?utab=staff_infounact<?php echo $singstaff ?>');
		</script>
		<?php
	}



	if (isset($_POST['Activate'])) {
		$month = date('m');

		$dated = date("jS F, Y");

		mysql_query("INSERT INTO report_activate_de_staff VALUES('','$full_name','$singstaff','$position','Activated','$Login_staff','$dated','no')");

		mysql_query("UPDATE teachers SET active='yes' WHERE staff_id='$singstaff'");
		mysql_query("INSERT INTO admin_center_teachers VALUES('','$singstaff','$full_name','$month','0','yes')");
		?>
		<script type="text/javascript">
			alert("Staff Has Been Activated");
			location.replace('home.php?utab=staff_infosing<?php echo $singstaff ?>');
		</script>
		<?php
	}


	

}else{

						$MaleStaff = mysql_num_rows(mysql_query("SELECT * FROM teachers WHERE gender = 'Male' AND  active='yes'"));
						$FemaleStaff = mysql_num_rows(mysql_query("SELECT * FROM teachers WHERE gender = 'Female' AND  active='yes'"));
						$TotalStaff = mysql_num_rows(mysql_query("SELECT * FROM teachers WHERE active='yes'"));
	echo "<center style=\"padding-top: 7%;\">
					<div id=\"pay_fees\">

					Male Staffs: $MaleStaff &nbsp;&nbsp;&nbsp;&nbsp;
					Female Staffs: $FemaleStaff<br><br>
					Total: $TotalStaff 
						<form method=\"post\" action=\"#\">
						";


		echo "	<input type=\"text\" name=\"search_staff\" placeholder=\"Search a Staff Id or Name\" style=\"margin-top:40%;\" /><br />
								<input type=\"submit\" name=\"search\" value=\"Search\" />

							";

							if (isset($_REQUEST['search'])) {
								$info = $_POST['search_staff'];
								
								if ($info=="") {
									echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000; font-size: 18px;\">Search are is empty!";
								}else{
									?>
								<script type="text/javascript">
									location.replace('home.php?utab=staff_infosch<?php echo $info ?>');
								</script>
									<?php
								}
							}
						


					echo"</form>
				</div>
			</center>
			";
}
 ?>
 </div>