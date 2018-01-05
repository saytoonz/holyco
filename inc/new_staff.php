<script src="../js/jQuery 3.2.1.js "></script>

<div id="child_all" style="overflow:hidden; overflow-y: auto;">
<?php

$qquery = mysql_query("SELECT max(id) FROM teachers");
	$getQuery = mysql_fetch_assoc($qquery);
	$lastid = mysql_result($qquery, 0);
	$nextStaffID = $lastid+1;

	if (isset($_REQUEST['add_staff'])) {
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


	
	if ($staff_id !="" AND $full_name != "") {

		
		$query = mysql_query("SELECT * FROM teachers WHERE staff_id='$staff_id' AND active='yes'");
		if (mysql_num_rows($query) === 0) {



////////////////////////       Upload Passport Image    //////////////////////////////
		$rand_dir_name=""; $profile_pic_name="";
			if((($_FILES["staff_pass"] ["type"] == "image/jpeg") || ($_FILES["staff_pass"] ["type"] == "image/png"))&&(@$_FILES["staff_pass"]["size"] < 5242880)) //5 Megabyte
		{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
		$rand_dir_name = substr(str_shuffle($chars), 0, 15);
		mkdir("staff_data/passport/$rand_dir_name");
		

			move_uploaded_file(@$_FILES["staff_pass"]["tmp_name"],"staff_data/passport/$rand_dir_name/".$_FILES["staff_pass"]["name"]);
			//echo"Uploaded and Stored in: staff_data/passport/$rand_dir_name/".@$_FILES["staff_pass"]["name"];
			
			$profile_pic_name = @$_FILES["staff_pass"]["name"];
		
}else{
			echo"Invalide file! Your image must be no larger than 5MB and must be either .jpg, or .png<br />
			Edit to Add passport<br /><br />";
	}




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
		
}else{
			echo"Invalide file! Your Certificate file must be image and not larger than 5MB and must be either .jpg, or .png<br />
			Edit to Add Certificate<br /><br />";
	}





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
		
}else{
			echo"Invalide file! Your CV file must be image and not larger than 5MB and must be either .jpg, or .png<br />
			Edit to Add CV <br /><br />";	
	}








	////////////////////////       Upload Application    //////////////////////////////
	$rand_dir_app_name=""; $app_name="";
			if((($_FILES["staff_app"] ["type"] == "image/jpeg") || ($_FILES["staff_app"] ["type"] == "image/png"))&&(@$_FILES["staff_app"]["size"] < 5242880)) //5 Megabyte
		{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
		$rand_dir_app_name = substr(str_shuffle($chars), 0, 15);
		mkdir("staff_data/Application/$rand_dir_app_name");
		

			move_uploaded_file(@$_FILES["staff_app"]["tmp_name"],"staff_data/Application/$rand_dir_app_name/".$_FILES["staff_app"]["name"]);
			//echo"Uploaded and Stored in: staff_data/$/".@$_FILES["staff_cert"]["name"];
			
			$app_name = @$_FILES["staff_app"]["name"];
		
}else{
			echo"Invalide file! Your Application file must be image and not larger than 5MB and must be either .jpg, or .png<br />
			Edit to Add Application<br /><br /><br />";
	}





				if ($status == "Accountant") {
					$staff_id = "AC$staff_id";

				}elseif ($status == "Administrator") {
					$staff_id = "AD$staff_id";

				}elseif ($status == "Head") {
					$staff_id = "H$staff_id";

				}elseif ($status == "Teacher") {
					$staff_id = "T$staff_id";

				}elseif ($status == "Non-Teaching") {
					$staff_id = "N$staff_id";

				}


					$passwrd = md5($staff_id);

			mysql_query("INSERT INTO teachers VALUES('','$staff_id','$date_of_employment','$full_name','$status','$title','$ssnit','$date_of_birth','$gender','$merital_status','$spouse_name','$address','$city','$home_tel','$work_tel','$mobile','$email','$degree','$highest_cert','$working_experience','$rand_dir_name/$profile_pic_name','$rand_dir_cert_name/$cert_name','$rand_dir_cv_name/$cv_name','$rand_dir_app_name/$app_name','not','$passwrd')");


		$dated = date("jS F, Y");
	mysql_query("INSERT INTO report_new_staff_student VALUES('','$full_name','$staff_id','$status','staff','$dated','$Login_staff','no')");

		echo "
				<center>
	<div id=\"after_send\">
		<div class=\"singup_info_area\">
			<div style=\"width:140px; height: 130px;\">
				<img src=\"staff_data/passport/$rand_dir_name/$profile_pic_name\" height=\"100%\" width=\"100%\" />
			</div>

			<ul class=\"ul1\">
				<li>
					$full_name </li>
				</ul>

			<ul class=\"ul2\">
				<li>ID - $staff_id</li>
			</ul>


			<ul class=\"ul1\">
				<li>Date of Employment - $date_of_employment</li>
			</ul>
			


			<ul class=\"ul2\">
				<li>Title - $title</li>
			</ul>

			<ul class=\"ul1\">
				<li>Status - $status</li>
			</ul>
			


			<ul class=\"ul2\">
				<li>Mobile - $mobile</li>
			</ul>


			
			<ul class=\"ul1\">
				<li>Address - $address</li>
			</ul>
			<ul class=\"ul2\">
				<li style=\"text-align: center; Color:#0c263c; font-weight:bolder;\">Has Been Added as a Staff!</li>
			</ul>
			
		</div>
		<div class=\"ok_edit_buttons\">
			<input type=\"button\" onclick=\"history.go(-1);\" value=\"Okay\">
			<input type=\"button\"  onclick=\"javascript:window.location.href='http://localhost/holyco/home.php?utab=staff_infoedit$staff_id'\" value=\"Edit\">
		</div>		
	</div>
</center>
		";
		}else{
			?>
<script type="text/javascript">location.replace("home.php?utab=add_stafferror2");</script>
			<?php
		}


	}else{
		?>
<script type="text/javascript">location.replace("home.php?utab=add_stafferror1");</script>
		<?php
	}


}else{
	echo "<div id=\"staff_info_in\">
	<form action=\"#\" method=\"post\" enctype=\"multipart/form-data\" id=\"add_staffform\">
		<div class=\"staff_part1\">";
		$tabhold = $_GET['utab'];
		if ($tabhold == "add_stafferror1") {
			echo "<span style=\"font-size: 10px; color: #ff0000; font-weight: bolder;\">
					Staff ID or Full Name cannot be Empty!
				</span>";
		}elseif ($tabhold == "add_stafferror2") {
			echo "<span style=\"color: #ff0000; font-weight: bolder;\">
					Staff ID is already in used.
				</span>";
		}

		echo "<table style=\"width: 100%;\">
				<tr>
					<th>Staff ID</th>
					<td>
						<input type=\"text\" value=\"$nextStaffID\" name=\"staff_id\" required />
					</td>
					<th>Date of Employment</th>
					<td>
						<input type=\"date\" name=\"date_of_employment\" required>
					</td>
				</tr>
				<tr>
					<th>Full Name</th>
					<td>
						<input type=\"text\" name=\"full_name\" required>
					</td>
					<th>Position</th>
					<td>
						<select name=\"status\">
							<option value=\"Accountant\">Accountant</option>
							<option value=\"Administrator\">Administrator</option>
							<option value=\"Head\">Head</option>
							<option value=\"Teacher\">Teacher</option>
							<option value=\"Non-Teaching\">Non-Teaching Staff</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Title</th>
					<td>
						<input type=\"text\" name=\"title\">
					</td>
					<th>Social Security</th>
					<td>
						<input type=\"text\" name=\"ssnit\">
					</td>
				</tr>
				<tr>
					<th>Date Of Birth</th>
					<td>
						<input type=\"date\" name=\"date_of_birth\">
					</td>
					<th>Gender</th>
					<td>
						<select name=\"gender\">
							<option value=\"Male\">Male</option>
							<option value=\"Female\">Female</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Merital Status</th>
					<td>
						<select name=\"merital_status\">
							<option value=\"Single\">Single</option>
							<option value=\"Married\">Married</option>
							<option value=\"Divorced\">Divorced</option>
							<option value=\"Widow\">Widow</option>
							<option value=\"Widower\">Widower</option>
						</select>
					</td>
					<th>Spouse Full Name</th>
					<td>
						<input type=\"text\" name=\"spouse_name\">
					</td>
				</tr>
			</table>
		</div>

		<div class=\"staff_part2\">
			<table>
				<tr>
					<th>Home Address</th>
					<td>
						<textarea style=\"margin-top: 10px;\" name=\"address\"></textarea>
					</td>
					<th> City</th>
					<td>
						<input type=\"text\" name=\"city\">
					</td>
				</tr>
				<tr>
					<th>Home Tel</th>
					<td>
						<input type=\"tel\" name=\"home_tel\">
					</td>
					<th>Work Tel</th>
					<td>
						<input type=\"tel\" name=\"work_tel\">
					</td>	
				</tr>
				<tr>
					<th>Mobile No.</th>
					<td>
						<input type=\"text\" name=\"mobile\">
					</td>
					<th>Email</th>
					<td>
						<input type=\"email\" name=\"email\">
					</td>
				</tr>
			</table>
		</div>

		<div class=\"staff_part3\">
				
				<div>
					Degree
				
						<textarea style=\"width: 30%; margin-top: 5px;\" name=\"degree\"></textarea>
					&nbsp;
					&nbsp;
					Highest Certificate
						<textarea style=\"width:30%; margin-top: 5px;\" name=\"highest_cert\"></textarea>
				</div>
			<div>
				Working Experience				
					<textarea style=\"width: 71%; margin-top: 10px;\" name=\"working_experience\"></textarea>
				
			</div>
		</div>


		<div class=\"staff_img\">
			
		</div>
		<div class=\"staff_files\" style=\"padding-top: 10px;\">
				Upload Passport<br />
				<input type=\"file\" id=\"staff_pass\" name=\"staff_pass\">

				Upload Certificate<br />
				<input type=\"file\" name=\"staff_cert\">

				Upload CV<br />
				<input type=\"file\" name=\"staff_cv\">

				Upload Application<br />
				<input type=\"file\" name=\"staff_app\">

				<br /><br />	
				<input type=\"submit\" name=\"add_staff\" value=\"SAVE\">
			</div>
		</form>
	</div>";
}
	
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
</div>