
<script src="../js/jQuery 3.2.1.js "></script>
<style type="text/css">
	
</style>

<?php

if (isset($_REQUEST['save_data'])) {
	$first_name = ucwords(strtolower(strip_tags(addslashes($_POST['first_name']))));
	$last_name = ucwords(strtolower(strip_tags(addslashes($_POST['last_name']))));
	$middle_name = ucwords(strtolower(strip_tags(addslashes($_POST['middle_name']))));
	$place_of_birth = ucwords(strtolower(strip_tags(addslashes($_POST['place_of_birth']))));
	$admissionNumber = $_POST['admissionNumber'];
	$dob_day = ucwords(strtolower(strip_tags(addslashes($_POST['dob_day']))));
	$dob_month = ucwords(strtolower(strip_tags(addslashes($_POST['dob_month']))));
	$dob_year = ucwords(strtolower(strip_tags(addslashes($_POST['dob_year']))));
	$gender = ucwords(strtolower(strip_tags(addslashes($_POST['gender']))));
	$hometown = ucwords(strtolower(strip_tags(addslashes($_POST['hometown']))));
	$house_address = mb_strtoupper(strip_tags(addslashes($_POST['house_address'])));
	$religion = ucwords(strtolower(strip_tags(addslashes($_POST['religion']))));
	$class = ucwords(strtolower(strip_tags(addslashes($_POST['class']))));
	$fee = ucwords(strtolower(strip_tags(addslashes($_POST['fee']))));
	$nationality = ucwords(strtolower(strip_tags(addslashes($_POST['nationality']))));
	$tribe = ucwords(strtolower(strip_tags(addslashes($_POST['tribe']))));
	$languages = ucwords(strtolower(strip_tags(addslashes($_POST['languages']))));
	$disabilities = ucwords(strtolower(strip_tags(addslashes($_POST['disabilities']))));
	$other_medical_conditions = ucwords(strtolower(strip_tags(addslashes($_POST['other_medical_conditions']))));






	$insurance_number = ucwords(strtolower(strip_tags(addslashes($_POST['insurance_number']))));
	$child_lives_with = ucwords(strtolower(strip_tags(addslashes($_POST['child_lives_with']))));


	$Poliomyelitis = ucwords(strtolower(strip_tags(addslashes($_POST['Poliomyelitis']))));
	$Measles = ucwords(strtolower(strip_tags(addslashes($_POST['Measles']))));
	$Yellow_Fever = ucwords(strtolower(strip_tags(addslashes($_POST['Yellow_Fever']))));
	$Tetanus = ucwords(strtolower(strip_tags(addslashes($_POST['Tetanus']))));
	$Whooping_Cough = ucwords(strtolower(strip_tags(addslashes($_POST['Whooping_Cough']))));




	$father_name = ucwords(strtolower(strip_tags(addslashes($_POST['father_name']))));
	$father_occupation = ucwords(strtolower(strip_tags(addslashes($_POST['father_occupation']))));
	$father_nationality = ucwords(strtolower(strip_tags(addslashes($_POST['father_nationality']))));
	$father_hometown = ucwords(strtolower(strip_tags(addslashes($_POST['father_hometown']))));
	$father_mobile_number = ucwords(strtolower(strip_tags(addslashes($_POST['father_mobile_number']))));
	$father_address = mb_strtoupper(strip_tags(addslashes($_POST['father_address'])));
	$father_email = strtolower(strip_tags(addslashes($_POST['father_email'])));
	$father_denomination = ucwords(strtolower(strip_tags(addslashes($_POST['father_denomination']))));


	$mother_name = ucwords(strtolower(strip_tags(addslashes($_POST['mother_name']))));
	$mother_occupation = ucwords(strtolower(strip_tags(addslashes($_POST['mother_occupation']))));
	$mother_nationality = ucwords(strtolower(strip_tags(addslashes($_POST['mother_nationality']))));
	$mother_hometown = ucwords(strtolower(strip_tags(addslashes($_POST['mother_hometown']))));
	$mother_mobile_number = ucwords(strtolower(strip_tags(addslashes($_POST['mother_mobile_number']))));
	$mother_address =  mb_strtoupper(strip_tags(addslashes($_POST['mother_address'])));
	$mother_email = strtolower(strip_tags(addslashes($_POST['mother_email'])));
	$mother_denomination = ucwords(strtolower(strip_tags(addslashes($_POST['mother_denomination']))));






	
	//Delete Spaces and Symbols From The Admission Number
	$admissionNumber= str_replace(" ", "", $admissionNumber);
	$admissionNumber= str_replace("_", "", $admissionNumber);
	$admissionNumber= str_replace(".", "", $admissionNumber);
	$admissionNumber= str_replace(",", "", $admissionNumber);
	$admissionNumber= str_replace("", "", $admissionNumber);
	$admissionNumber= str_replace(";", "", $admissionNumber);
	$admissionNumber= str_replace("'", "", $admissionNumber);
	$admissionNumber= str_replace("/", "", $admissionNumber);
	$admissionNumber= str_replace("+", "", $admissionNumber);
	$admissionNumber= str_replace("*", "", $admissionNumber);
	$admissionNumber= str_replace(")", "", $admissionNumber);
	$admissionNumber= str_replace("(", "", $admissionNumber);
	$admissionNumber= str_replace("&", "", $admissionNumber);
	$admissionNumber= str_replace("`", "", $admissionNumber);
	$admissionNumber= str_replace("!", "", $admissionNumber);
	$admissionNumber= str_replace("@", "", $admissionNumber);
	$admissionNumber= str_replace("#", "", $admissionNumber);
	$admissionNumber= str_replace("$", "", $admissionNumber);
	$admissionNumber= str_replace("%", "", $admissionNumber);
	$admissionNumber= str_replace("^", "", $admissionNumber);
	$admissionNumber= str_replace("=", "", $admissionNumber);
	$admissionNumber= str_replace("[", "", $admissionNumber);
	$admissionNumber= str_replace("]", "", $admissionNumber);
	$admissionNumber= str_replace("{", "", $admissionNumber);
	$admissionNumber= str_replace("}", "", $admissionNumber);
	$admissionNumber= str_replace("~", "", $admissionNumber);

	//Check if admission number, first name and 
	if ($admissionNumber !="" AND $first_name != "" AND $last_name !="") {
	//$staff_id = $_SESSION['staff_id'];
	$query = mysql_query("SELECT * FROM students WHERE admissionNumber='$admissionNumber'");
	if (mysql_num_rows($query)===1) {
		echo "Admission Number is Already taken";
	}else{



		if((($_FILES["file"] ["type"] == "image/jpeg") || ($_FILES["file"] ["type"] == "image/png"))&&(@$_FILES["file"]["size"] < 5242880)) //5 Megabyte
		{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
		$rand_dir_name = substr(str_shuffle($chars), 0, 15);
		mkdir("student_data/$rand_dir_name");
		

			move_uploaded_file(@$_FILES["file"]["tmp_name"],"student_data/$rand_dir_name/".$_FILES["file"]["name"]);
			//echo"Uploaded and Stored in: student_data/$rand_dir_name/".@$_FILES["file"]["name"];
			
			$profile_pic_name = @$_FILES["file"]["name"];
		
}else{
				$profile_pic_name = "";
				$rand_dir_name = "";
			echo"Invalide file! Your image must be no larger than 5MB and must be either .jpg, or .png<br />
			Edit to Add passport";
	}


	mysql_query("INSERT INTO students VALUES('','$first_name','$last_name','$middle_name','$place_of_birth','$admissionNumber','$dob_day','$dob_month','$dob_year','$gender','$hometown','$house_address','$tribe','$nationality','$religion','$languages','$disabilities','$class','','$rand_dir_name/$profile_pic_name','$father_name','$father_occupation','$father_nationality','$father_hometown','$father_mobile_number','$father_address','$father_email','$father_denomination','$mother_name','$mother_occupation','$mother_nationality','$mother_hometown','$mother_mobile_number','$mother_address','$mother_email','$mother_denomination','$other_medical_conditions','$insurance_number','$child_lives_with','$Poliomyelitis','$Measles','$Yellow_Fever','$Tetanus','$Whooping_Cough','yes')");

		$dated = date("jS F, Y");
	mysql_query("INSERT INTO report_new_staff_student VALUES('','$first_name $middle_name $last_name','$admissionNumber','$class','student','$dated','$Login_staff','no')");


		echo "
			<center>
	<div id=\"after_send\">
		<div class=\"singup_info_area\">
			<ul class=\"ul1\">
				<li>
					$first_name $middle_name $last_name</li>
				</ul>

			<ul class=\"ul2\">
				<li>Gender - $gender</li>
			</ul>


			<ul class=\"ul1\">
				<li>Born on $dob_month $dob_day, $dob_year</li>
			</ul>
			


			<ul class=\"ul2\">
				<li>Address - $house_address</li>
			</ul>

			<ul class=\"ul1\">
				<li>Religion - $religion</li>
			</ul>
			


			<ul class=\"ul2\">
				<li>From - $hometown</li>
			</ul>


			
			<ul class=\"ul1\">
				<li>Admission Number - $admissionNumber</li>
			</ul>
			<ul class=\"ul2\">
				<li style=\"text-align: center; Color:#0c263c; font-weight:bolder;\">Has Been Added to The Database!</li>
			</ul>
			
		</div>
		<div class=\"ok_edit_buttons\">
			<input type=\"button\" onclick=\"history.go(-1);\" value=\"Okay\">
			<input type=\"button\"  onclick=\"javascript:window.location.href='http://localhost/sch/home.php?utab=student_info_edit$admissionNumber'\" value=\"Edit\">
		</div>		
	</div>
</center>
		";

	}
	}else{
		echo "Admission Number, First Name and Last Name must be filled.";
	}
}else{
	echo "
<div id=\"new_all\">
	<form method=\"post\" action=\"#\" enctype=\"multipart/form-data\" id=\"uploadForm\">
		<div class=\"child_info\">
		<fieldset>
		<legend>Child Informations</legend>


			<div id=\"passport\">
				<input type=\"file\" name=\"file\" id=\"file\" />
				";
?>
<script type="text/javascript">
		function filePreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e){
					$('#uploadForm + img').remove();
					$('#uploadForm').after('<img src="'+e.target.result+'"style="position: fixed; top: 130px; right: 250px; width: 150px; height: 150px; border:3px solid #dce5ee;" />');
				}
				reader.readAsDataURL(input.files[0]);
			}
		}

		$('#file').change(function(){
			filePreview(this);
		});
	</script>

	<script type="text/javascript">
		function edit() {
			var url = "http://<?php echo "$admissionNumber";?>";
			location.replace(url);
		}


	</script>
<?php

$qquery = mysql_query("SELECT max(id) FROM students");
	$getQuery = mysql_fetch_assoc($qquery);
	$lastid = mysql_result($qquery, 0);
	$nextStaffID = $lastid+1;
	$year  = date("Y");


echo "		</div>

			<input type=\"text\" name=\"first_name\" placeholder=\"Surname\" title=\"First Name\" required />
			<input type=\"text\" name=\"last_name\" placeholder=\"First Name\" title=\"Last Name\" required /><br />


			<input type=\"text\" name=\"middle_name\" placeholder=\"Other Names\" title=\"Middle Name\" />
			<input type=\"text\" name=\"admissionNumber\" value=\"$year-$nextStaffID\" placeholder=\"Admission Number\" required /><br />
			

			
			
			

			<select name=\"dob_day\" title=\"Date of Birth Day\" style=\"width:42px; margin-left: 10px; margin-right: 0px;\">
					<option value=\"\"></option>
					<option value=\"1\">1</option>
					<option value=\"2\">2</option>
					<option value=\"3\">3</option>
					<option value=\"4\">4</option>
					<option value=\"5\">5</option>
					<option value=\"6\">6</option>
					<option value=\"7\">7</option>
					<option value=\"8\">8</option>
					<option value=\"9\">9</option>
					<option value=\"10\">10</option>
					<option value=\"11\">11</option>
					<option value=\"12\">12</option>
					<option value=\"13\">13</option>
					<option value=\"14\">14</option>
					<option value=\"15\">15</option>
					<option value=\"16\">16</option>
					<option value=\"17\">17</option>
					<option value=\"18\">18</option>
					<option value=\"19\">19</option>
					<option value=\"20\">20</option>
					<option value=\"21\">21</option>
					<option value=\"22\">22</option>
					<option value=\"23\">23</option>
					<option value=\"24\">24</option>
					<option value=\"25\">25</option>
					<option value=\"26\">26</option>
					<option value=\"27\">27</option>
					<option value=\"28\">28</option>
					<option value=\"29\">29</option>
					<option value=\"30\">30</option>
					<option value=\"31\">31</option>
			</select>

			<select name=\"dob_month\" title=\"Date of Birth Month\" style=\"width:98px; 
		margin-left: 0px; margin-right: 0px;\">
					<option value=\"\"></option>
					<option value=\"January\">January</option>
					<option value=\"February\">February</option>
					<option value=\"March\">March</option>
					<option value=\"April\">April</option>
					<option value=\"May\">May</option>
					<option value=\"June\">June</option>
					<option value=\"July\">July</option>
					<option value=\"August\">August</option>
					<option value=\"September\">September</option>
					<option value=\"October\">October</option>
					<option value=\"November\">November</option>
					<option value=\"December\">December</option>
			</select>

			<select name=\"dob_year\" title=\"Date of Birth Year\" style=\"width:60px; margin-left: 0px; margin-right: 20px;\">
					<option value=\"\"></option>
					<option value=\"2017\">2017</option>
					<option value=\"2016\">2016</option>
					<option value=\"2015\">2015</option>
					<option value=\"2014\">2014</option>
					<option value=\"2013\">2013</option>
					<option value=\"2012\">2012</option>
					<option value=\"2011\">2011</option>
					<option value=\"2010\">2010</option>
					<option value=\"2009\">2009</option>
					<option value=\"2008\">2008</option>
			</select>

			<input type=\"text\" name=\"place_of_birth\" placeholder=\"Place of Birth\" title=\"Place of Birth\" />

			<br />



			<select name=\"gender\" title=\"Gender\">
					<option value=\"Male\">Male</option>
					<option value=\"Female\">Female</option>
			</select>

			<input type=\"text\" name=\"house_address\" placeholder=\"Address of Permanent Residence\" /><br />


			<input type=\"text\" name=\"hometown\" placeholder=\"Home Town\" />
			<input type=\"text\" name=\"tribe\" placeholder=\"Tribe\" /><br />


			<input type=\"text\" name=\"nationality\" placeholder=\"Nationality\" />
			<input type=\"text\" name=\"religion\" placeholder=\"Religious Denomination\" /><br />



			<input type=\"text\" name=\"languages\" placeholder=\"Language(s) Spoken\" />
			<input type=\"text\" name=\"disabilities\" placeholder=\"Physical Disabilities (if any)\" /><br />


			<input type=\"text\" name=\"other_medical_conditions\" placeholder=\"Other Medical Conditions\" />
			<select name=\"class\" title=\"Assign Class\" >
				<option value=\"Creche\">Creche</option>
				<option value=\"Nursery 1\">Nursery 1</option>
				<option value=\"Nursery 2\">Nursery 2</option>
				
				<option value=\"KG 1\">KG 1</option>
				<option value=\"KG 2\">KG 2</option>
			
				<option value=\"Grade 1\">Grade 1</option>
				<option value=\"Grade 2\">Grade 2</option>
			</select><br />

		</fieldset>
	</div>


	<div class=\"medical_info\">
		<fieldset>
			<legend>Other Informations</legend>
			<input type=\"text\" name=\"insurance_number\" placeholder=\"Insurance Number\" /><br /><br />


			<input type=\"text\" name=\"child_lives_with\" placeholder=\"Child lives with?\" /><br />

		</fieldset>
	</div>



	<div class=\"father\">
		<fieldset>
			<legend>Father / Guardian</legend>
			<input type=\"text\" name=\"father_name\" placeholder=\"Full Name\" />
			<input type=\"text\" name=\"father_address\" placeholder=\"Address\" /><br />

			<input type=\"text\" name=\"father_nationality\" placeholder=\"Nationality\" />
			<input type=\"text\" name=\"father_hometown\" placeholder=\"Home Town\" /><br />

			<input type=\"text\" name=\"father_mobile_number\" placeholder=\"Mobile Number\" />
			<input type=\"text\" name=\"father_email\" placeholder=\"Email\" /><br />

			<input type=\"text\" name=\"father_occupation\" placeholder=\"Occupation\" />
			<input type=\"text\" name=\"father_denomination\" placeholder=\"Religious Denomination\" /><br />
		</fieldset>
	</div>



	<div class=\"mother\">

		<fieldset>
			<legend>Mother / Guardian</legend>
			<input type=\"text\" name=\"mother_name\" placeholder=\"Full Name\" />
			<input type=\"text\" name=\"mother_address\" placeholder=\"Address\" /><br />

			<input type=\"text\" name=\"mother_nationality\" placeholder=\"Nationality\" />
			<input type=\"text\" name=\"mother_hometown\" placeholder=\"Home Town\" /><br />

			<input type=\"text\" name=\"mother_mobile_number\" placeholder=\"Mobile Number\" />
			<input type=\"text\" name=\"mother_email\" placeholder=\"Email\" /><br />

			<input type=\"text\" name=\"mother_occupation\" placeholder=\"Occupation\" />
			<input type=\"text\" name=\"mother_denomination\" placeholder=\"Religious Denomination\" /><br />
		</fieldset>
	</div>






	<div class=\"relatives\">
		<fieldset class=\"fieldset\" >
			<legend><i>Child's Health Details</i></legend>

				<input type=\"text\" placeholder=\"Poliomyelitis\" disabled=\"disabled\" />
				<input type=\"date\" name=\"Poliomyelitis\"  /><br />

				<input type=\"text\" placeholder=\"Measles\" disabled=\"disabled\" />
				<input type=\"date\" name=\"Measles\" /><br />
				
				<input type=\"text\"  placeholder=\"Yellow Fever \" disabled=\"disabled\" />				
				<input type=\"date\" name=\"Yellow_Fever\"  /><br />

				<input type=\"text\" placeholder=\"Tetanus\" disabled=\"disabled\"/>	
				<input type=\"date\" name=\"Tetanus\"  /><br />

				<input type=\"text\" placeholder=\"Whooping Cough\" disabled=\"disabled\"/>
				<input type=\"date\" name=\"Whooping_Cough\" /><br />
			
			</fieldset>	

	</div>
			<input type=\"submit\" name=\"save_data\" value=\"SAVE\"/>
		
	</form>
</div>";}



?>