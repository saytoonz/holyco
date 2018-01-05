<?php



$tab = $_GET['utab'];

$select_sting = strpos($tab, "student_infosearch")!==false;
$select_edit = strpos($tab, "student_info_edit")!==false;

if (strpos($tab, "student_info_deavtivate")!==false) {
	$admissionNumber = substr($tab, 23);

		mysql_query("UPDATE students SET active='no' WHERE admissionNumber='$admissionNumber'");
		$query2 = mysql_query("SELECT * FROM students WHERE admissionNumber='$admissionNumber'");
			$fetch = mysql_fetch_assoc($query2);
			$first_name = $fetch['first_name'];
			$middle_name = $fetch['middle_name'];
			$last_name = $fetch['last_name'];
			$preferred_name = $fetch['preferred_name'];
			$class = $fetch['class'];
			$dated = date("jS F, Y");
			$full_name = "$first_name $middle_name $last_name ($preferred_name)";

			mysql_query("INSERT INTO report_activate_deactivate_students VALUES ('','$full_name','$class','$admissionNumber','deactivated','$dated','$Login_staff','no')");
		?>
	<script type="text/javascript">
		location.replace('home.php?utab=student_info<?php echo "$admissionNumber";?>');
	</script>
		<?php



}elseif (strpos($tab, "student_info_activate")!==false) {
	$admissionNumber = substr($tab, 21);

		mysql_query("UPDATE students SET active='yes' WHERE admissionNumber='$admissionNumber'");
		$query2 = mysql_query("SELECT * FROM students WHERE admissionNumber='$admissionNumber'");
			$fetch = mysql_fetch_assoc($query2);
			$first_name = $fetch['first_name'];
			$middle_name = $fetch['middle_name'];
			$last_name = $fetch['last_name'];
			$preferred_name = $fetch['preferred_name'];
			$class = $fetch['class'];
			$dated = date("jS F, Y");
			$full_name = "$first_name $middle_name $last_name ($preferred_name)";

			mysql_query("INSERT INTO report_activate_deactivate_students VALUES ('','$full_name','$class','$admissionNumber','activated','$dated','$Login_staff','no')");
		?>
	<script type="text/javascript">
		location.replace('home.php?utab=student_info<?php echo "$admissionNumber";?>');
	</script>
		<?php
}

/////////////////////////////////////////Edit Student Information   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
elseif($select_edit){
	$grab = substr($tab, 17);

	$select = mysql_query("SELECT * FROM students WHERE admissionNumber = '$grab' AND active='yes' LIMIT 1");
if ($selectrow = mysql_num_rows($select) !== 0) {
	$fetch = mysql_fetch_assoc($select);
	
	$id = $fetch['id'];
	$passport = $fetch['passport'];
	$active = $fetch['active'];
	$first_name =$fetch['first_name'];
	$last_name =$fetch['last_name'];
	$middle_name =$fetch['middle_name'];
	$place_of_birth =$fetch['place_of_birth'];
	$admissionNumber = $fetch['admissionNumber'];
	$dob_day =$fetch['dob_day'];
	$dob_month =$fetch['dob_month'];
	$dob_year =$fetch['dob_year'];
	$gender =$fetch['gender'];
	$hometown =$fetch['hometown'];
	$house_address = $fetch['house_address'];
	$religion =$fetch['religion'];
	$class =$fetch['class'];
	$fee =$fetch['fee'];
	$nationality =$fetch['nationality'];
	$tribe =$fetch['tribe'];
	$languages =$fetch['languages'];
	$disabilities =$fetch['disabilities'];
	$allergies = $fetch['allergies'];





	$insurance_number = $fetch['insurance_number'];
	$child_lives_with = $fetch['child_lives_with'];


	$Poliomyelitis = $fetch['Poliomyelitis'];
	$Measles = $fetch['Measles'];
	$Yellow_Fever = $fetch['Yellow_FeverDB'];
	$Tetanus = $fetch['Tetanus'];
	$Whooping_Cough = $fetch['Whooping_CoughDB'];




	$father_name = $fetch['father_name'];
	$father_occupation = $fetch['father_occupation'];
	$father_nationality = $fetch['father_nationality'];
	$father_hometown = $fetch['father_hometown'];
	$father_mobile_number = $fetch['father_mobile_number'];
	$father_address = $fetch['father_address'];
	$father_email = $fetch['father_email'];
	$father_denomination = $fetch['father_denomination'];


	$mother_name = $fetch['mother_name'];
	$mother_occupation = $fetch['mother_occupation'];
	$mother_nationality = $fetch['mother_nationality'];
	$mother_hometown = $fetch['mother_hometown'];
	$mother_mobile_number = $fetch['mother_mobile_number'];
	$mother_address =  $fetch['mother_address'];
	$mother_email = $fetch['mother_email'];
	$mother_denomination = $fetch['mother_denomination'];




	}
	echo "
<div id=\"new_all\">
	<form method=\"post\" action=\"#\" enctype=\"multipart/form-data\" id=\"uploadForm\">
		<div class=\"child_info\">
		<fieldset>
		<legend>Child Informations</legend>


			<div id=\"passport\" style=\"height: 155px;\">
				<input type=\"file\" name=\"file\" id=\"file\" value=\"$passport\" />
				<img src=\"student_data/$passport\" width=\"150px\" height=\"150px\" />
				<input type=\"submit\" title=\"Update Image\"value=\" \" name=\"up_image\" style=\"height: 20px; width: 20px; position: absolute; padding: 0px; float: right; margin: 0px; margin-top: 125px; margin-left: 25px;\"/>

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
echo "		</div>
			<input type=\"text\" name=\"middle_name\" value=\"$middle_name\" placeholder=\"Surname\" title=\"First Name\" required />
			<input type=\"text\" name=\"first_name\" value=\"$first_name\" placeholder=\"First Name\" title=\"Last Name\" required /><br />


			<input type=\"text\" name=\"last_name\" value=\"$last_name\" placeholder=\"Other Names\" title=\"Middle Name\" />
			<input type=\"text\" name=\"admissionNumberSPECIA\" value=\"$admissionNumber\" placeholder=\"Admission Number\"  /><br />
			

			
			
			

			<select name=\"dob_day\" title=\"Date of Birth Day\" style=\"width:42px; margin-left: 10px; margin-right: 0px;\">
					<option value=\"$dob_day\">$dob_day</option>
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
					<option value=\"$dob_month\">$dob_month</option>
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
					<option value=\"$dob_year\">$dob_year</option>
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

			<input type=\"text\" name=\"place_of_birth\" value=\"$place_of_birth\"placeholder=\"Place of Birth\" title=\"Place of Birth\" />

			<br />



			<select name=\"gender\" title=\"Gender\">
					<option value=\"$gender\">$gender</option>
					<option value=\"Male\">Male</option>
					<option value=\"Female\">Female</option>
			</select>

			<input type=\"text\" name=\"house_address\" value=\"$house_address\" placeholder=\"Address of Permanent Residence\" /><br />


			<input type=\"text\" name=\"hometown\" value=\"$hometown\" placeholder=\"Home Town\" />
			<input type=\"text\" name=\"tribe\" value=\"$tribe\" placeholder=\"Tribe\" /><br />


			<input type=\"text\" name=\"nationality\" value=\"$nationality\" placeholder=\"Nationality\" />
			<input type=\"text\" name=\"religion\" value=\"$religion\" placeholder=\"Religious Denomination\" /><br />



			<input type=\"text\" name=\"languages\" value=\"$languages\" placeholder=\"Language(s) Spoken\" />
			<input type=\"text\" name=\"disabilities\" value=\"$disabilities\" placeholder=\"Physical Disabilities (if any)\" /><br />


			<input type=\"text\" name=\"other_medical_conditions\" value=\"$allergies\" placeholder=\"Other Medical Conditions\" />
			<select name=\"class\" title=\"Assign Class\" >
				<option value=\"$class\">$class</option>
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
			<input type=\"text\" name=\"insurance_number\" value=\"$insurance_number\" placeholder=\"Insurance Number\" /><br /><br />


			<input type=\"text\" name=\"child_lives_with\" value=\"$child_lives_with\" placeholder=\"Child lives with?\" /><br />

		</fieldset>
	</div>



	<div class=\"father\">
		<fieldset>
			<legend>Father / Guardian</legend>
			<input type=\"text\" name=\"father_name\" value=\"$father_name\" placeholder=\"Full Name\" />
			<input type=\"text\" name=\"father_address\"  value=\"$father_address\" placeholder=\"Address\" /><br />

			<input type=\"text\" name=\"father_nationality\" value=\"$father_nationality\"  placeholder=\"Nationality\" />
			<input type=\"text\" name=\"father_hometown\" value=\"$father_hometown\"  placeholder=\"Home Town\" /><br />

			<input type=\"text\" name=\"father_mobile_number\" value=\"$father_mobile_number\"  placeholder=\"Mobile Number\" />
			<input type=\"text\" name=\"father_email\" value=\"$father_email\"  placeholder=\"Email\" /><br />

			<input type=\"text\" name=\"father_occupation\"  value=\"$father_occupation\" placeholder=\"Occupation\" />
			<input type=\"text\" name=\"father_denomination\"  value=\"$father_denomination\" placeholder=\"Religious Denomination\" /><br />
		</fieldset>
	</div>



	<div class=\"mother\">

		<fieldset>
			<legend>Mother / Guardian</legend>
			<input type=\"text\" name=\"mother_name\" value=\"$mother_name\"  placeholder=\"Full Name\" />
			<input type=\"text\" name=\"mother_address\"  value=\"$mother_address\" placeholder=\"Address\" /><br />

			<input type=\"text\" name=\"mother_nationality\"  value=\"$mother_nationality\" placeholder=\"Nationality\" />
			<input type=\"text\" name=\"mother_hometown\"  value=\"$mother_hometown\" placeholder=\"Home Town\" /><br />

			<input type=\"text\" name=\"mother_mobile_number\" value=\"$mother_mobile_number\"  placeholder=\"Mobile Number\" />
			<input type=\"text\" name=\"mother_email\"  value=\"$mother_email\" placeholder=\"Email\" /><br />

			<input type=\"text\" name=\"mother_occupation\" value=\"$mother_occupation\"  placeholder=\"Occupation\" />
			<input type=\"text\" name=\"mother_denomination\" value=\"$mother_denomination\"  placeholder=\"Religious Denomination\" /><br />
		</fieldset>
	</div>






	<div class=\"relatives\">
		<fieldset class=\"fieldset\" >
			<legend><i>CHILD’S HEALTH DETAILS</i></legend>

				<input type=\"text\" placeholder=\"Poliomyelitis\" disabled=\"disabled\" />
				<input type=\"text\" value=\"$Poliomyelitis\" name=\"Poliomyelitis\"  /><br />

				<input type=\"text\" placeholder=\"Measles\" disabled=\"disabled\" />
				<input type=\"text\" value=\"$Measles\" name=\"Measles\" /><br />
				
				<input type=\"text\"  placeholder=\"Yellow Fever \" disabled=\"disabled\" />				
				<input type=\"text\" value=\"$Yellow_Fever\" name=\"Yellow_Fever\"  /><br />

				<input type=\"text\" placeholder=\"Tetanus\" disabled=\"disabled\"/>	
				<input type=\"text\" value=\"$Tetanus\" name=\"Tetanus\"  /><br />

				<input type=\"text\" placeholder=\"Whooping Cough\" disabled=\"disabled\"/>
				<input type=\"text\" value=\"$Whooping_Cough\" name=\"Whooping_Cough\" /><br />
			
			</fieldset>	
		</fieldset>
	</div>
			<input type=\"submit\" name=\"save_update\" value=\"UPDATE\" style=\"font-size: 15px; padding: 20px;\"/>
		
	</form>
</div>";

if (isset($_REQUEST['up_image'])) {
	$grab = substr($tab, 17);
	if ($admissionNumber !="" AND $first_name != "" AND $last_name !="") {
	//$staff_id = $_SESSION['staff_id'];
	$query = mysql_query("SELECT * FROM students WHERE admissionNumber='$admissionNumber'");
	if (mysql_num_rows($query)===1) {

		if((($_FILES["file"] ["type"] == "image/jpeg") || ($_FILES["file"] ["type"] == "image/png"))&&(@$_FILES["file"]["size"] < 5242880)) //5 Megabyte
		{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
		$rand_dir_name = substr(str_shuffle($chars), 0, 15);
		mkdir("student_data/$rand_dir_name");
		
			move_uploaded_file(@$_FILES["file"]["tmp_name"],"student_data/$rand_dir_name/".$_FILES["file"]["name"]);
			//echo"Uploaded and Stored in: student_data/$rand_dir_name/".@$_FILES["file"]["name"];
			
			$profile_pic_name = @$_FILES["file"]["name"];
			

	mysql_query("UPDATE students SET  passport='$rand_dir_name/$profile_pic_name' WHERE admissionNumber='$grab' AND active='yes' LIMIT 1");
	?>
<script type="text/javascript">location.replace("home.php?utab=student_info_edit<?php echo $grab ?>");</script>
	<?php
}else{
		echo "Image type not Supported or Image size is too big!";
	}
}else{
	echo "No Student Found with this Admission No.";
}
}else{
	echo "Admission No. Fist Name and Last Name cannot be Empty!";
}
}





if (isset($_POST['save_update'])) {
	$grab = substr($tab, 17);
	$first_name = ucwords(strtolower(strip_tags(addslashes($_POST['first_name']))));
	$last_name = ucwords(strtolower(strip_tags(addslashes($_POST['last_name']))));
	$middle_name = ucwords(strtolower(strip_tags(addslashes($_POST['middle_name']))));
	$place_of_birth = ucwords(strtolower(strip_tags(addslashes($_POST['place_of_birth']))));
	$admissionNumberSPECIA = $_POST['admissionNumberSPECIA'];
	$dob_day = ucwords(strtolower(strip_tags(addslashes($_POST['dob_day']))));
	$dob_month = ucwords(strtolower(strip_tags(addslashes($_POST['dob_month']))));
	$dob_year = ucwords(strtolower(strip_tags(addslashes($_POST['dob_year']))));
	$gender = ucwords(strtolower(strip_tags(addslashes($_POST['gender']))));
	$hometown = ucwords(strtolower(strip_tags(addslashes($_POST['hometown']))));
	$house_address = mb_strtoupper(strip_tags(addslashes($_POST['house_address'])));
	$religion = ucwords(strtolower(strip_tags(addslashes($_POST['religion']))));
	$class = ucwords(strtolower(strip_tags(addslashes($_POST['class']))));
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


	//mysql_query("UPDATE students SET first_name='$first_name', last_name='$last_name', middle_name='$middle_name', preferred_name='$preferred_name', dob_day='$dob_day', dob_month='$dob_month', dob_year='$dob_year', gender='$gender', hometown='$hometown', house_address='$house_address', religion = '$religion', class = '$class', fee = '$fee',father_name='$father_name', father_occupation= '$father_occupation',father_telephone = '$father_telephone',father_employer = '$father_employer',father_mobile_number = '$father_mobile_number',father_address = '$father_address',father_email = '$father_email',father_work_telephone = '$father_work_telephone',mother_name = '$mother_name',mother_occupation = '$mother_occupation',mother_telephone = '$mother_telephone',mother_employer = '$mother_employer',mother_mobile_number = '$mother_mobile_number',mother_address = '$mother_address',mother_email = '$mother_email',mother_work_telephone = '$mother_work_telephone',family_doctor = '$family_doctor',doctor_telephone = '$doctor_telephone',allergies = '$allergies',medical_aid_nr = '$medical_aid_nr',preferred_hospital = '$preferred_hospital',relativename1 = '$relativename1',relationship_to_child1 = '$relationship_to_child1',relative_hometel1 = '$relative_hometel1',relative_mobile1 = '$relative_mobile1',relative_WorkNo1 = '$relative_WorkNo1',relativename2 = '$relativename2',relationship_to_child2 = '$relationship_to_child2',relative_hometel2 = '$relative_hometel2',relative_mobile2 = '$relative_mobile2',relative_WorkNo2 = '$relative_WorkNo2' WHERE admissionNumber ='$grab' LIMIT 1");

	mysql_query("UPDATE students SET first_name='$first_name', last_name='$last_name', middle_name='$middle_name' , place_of_birth ='$place_of_birth',dob_day = '$dob_day', dob_month='$dob_month', dob_year='$dob_year',  gender='$gender', hometown='$hometown', house_address = '$house_address', tribe='$tribe', nationality='$nationality', religion='$religion', languages='$languages', disabilities='$disabilities',  allergies='$other_medical_conditions', class='$class' , father_name='$father_name', father_occupation='$father_occupation', father_nationality='$father_nationality', father_hometown='$father_hometown', father_mobile_number='$father_mobile_number', father_address='$father_address', father_email='$father_email', father_denomination='$father_denomination' , mother_name='$mother_name', mother_occupation='$mother_occupation', mother_nationality='$mother_nationality', mother_hometown='$mother_hometown', mother_mobile_number='$mother_mobile_number', mother_address='$mother_address', mother_email='$mother_email',mother_denomination='$mother_denomination', insurance_number='$insurance_number', child_lives_with='$child_lives_with',  Poliomyelitis='$Poliomyelitis', Measles='$Measles',Yellow_FeverDB='$Yellow_Fever',Tetanus='$Tetanus', Whooping_CoughDB='$Whooping_Cough'  WHERE admissionNumber ='$grab' LIMIT 1");


	$dated = date("jS F, Y");
	mysql_query("INSERT report_staff_student_info_update VALUES('','$first_name $middle_name $last_name','$admissionNumber','student','$dated','$Login_staff','no')");

	echo "string";

	?>
		<script>///location.replace("home.php?utab=student_info<?php echo $grab; ?>");</script>
	<?php
	}
	}else{
		echo "First Name and Last Name cannot be Empty.";
	}
}
}

//////////////////////////////////  Check If Search \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	elseif($select_sting) {

	$reap = substr($tab, 18);
	$output="";
$query = mysql_query("SELECT * FROM students WHERE first_name LIKE '%$reap%' OR last_name LIKE '%$reap%' OR middle_name LIKE '%$reap%' OR admissionNumber LIKE '%$reap%' AND (active='yes'OR active='no')") or die("could not search!");

	$selectrow = mysql_num_rows($query);
	if ($selectrow == 0) {
		$output = "<div class=\"student_error\"> No Student Found!</div>";
	}else{
		while($fetch = mysql_fetch_array($query)){
			$first_name = $fetch['first_name'];
			$last_name = $fetch['last_name'];
			$middle_name = $fetch['middle_name'];
			$admissionNumber = $fetch['admissionNumber'];
			$class = $fetch['class'];
			$passport = $fetch['passport'];
			
	$output.="
<a href=\"home.php?utab=student_info$admissionNumber\" id=\"class_pipuls\">
	<div id=\"search_r_pass\"><img src=\"student_data/$passport\" height=\"100%\" width=\"100%\"></div>
	<ul class=\"class_pipuls\">
		<li>$first_name  $middle_name $last_name</li>
		<li id=\"down\">Admin No: $admissionNumber    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Class: $class</li>
	</ul>
</a>
";
	}
		}
		
 echo "<div id=\"child_all\">";
 echo "$output";
 echo "</div>";
/////////////////////////////////// iF Not Student Info \\\\\\\\\\\\\\\\\\\\\\\\\\
}elseif ($tab != "student_info") {
	
$adminNo = substr($tab, 12);

$select = mysql_query("SELECT * FROM students WHERE admissionNumber = '$adminNo' AND (active='yes' OR active='no') LIMIT 1");
if ($selectrow = mysql_num_rows($select)===1) {
	$fetch = mysql_fetch_assoc($select);

	$id = $fetch['id'];
	$passport = $fetch['passport'];
	$active = $fetch['active'];
	$first_name =$fetch['first_name'];
	$last_name =$fetch['last_name'];
	$middle_name =$fetch['middle_name'];
	$place_of_birth =$fetch['place_of_birth'];
	$admissionNumber = $fetch['admissionNumber'];
	$dob_day =$fetch['dob_day'];
	$dob_month =$fetch['dob_month'];
	$dob_year =$fetch['dob_year'];
	$gender =$fetch['gender'];
	$hometown =$fetch['hometown'];
	$house_address = $fetch['house_address'];
	$religion =$fetch['religion'];
	$class =$fetch['class'];
	$fee =$fetch['fee'];
	$nationality =$fetch['nationality'];
	$tribe =$fetch['tribe'];
	$languages =$fetch['languages'];
	$disabilities =$fetch['disabilities'];
	$allergies = $fetch['allergies'];





	$insurance_number = $fetch['insurance_number'];
	$child_lives_with = $fetch['child_lives_with'];


	$Poliomyelitis = $fetch['Poliomyelitis'];
	$Measles = $fetch['Measles'];
	$Yellow_Fever = $fetch['Yellow Fever'];
	$Tetanus = $fetch['Tetanus'];
	$Whooping_Cough = $fetch['Whooping Cough'];




	$father_name = $fetch['father_name'];
	$father_occupation = $fetch['father_occupation'];
	$father_nationality = $fetch['father_nationality'];
	$father_hometown = $fetch['father_hometown'];
	$father_mobile_number = $fetch['father_mobile_number'];
	$father_address = $fetch['father_address'];
	$father_email = $fetch['father_email'];
	$father_denomination = $fetch['father_denomination'];


	$mother_name = $fetch['mother_name'];
	$mother_occupation = $fetch['mother_occupation'];
	$mother_nationality = $fetch['mother_nationality'];
	$mother_hometown = $fetch['mother_hometown'];
	$mother_mobile_number = $fetch['mother_mobile_number'];
	$mother_address =  $fetch['mother_address'];
	$mother_email = $fetch['mother_email'];
	$mother_denomination = $fetch['mother_denomination'];


echo "
<div id=\"child_all\">
	<div class=\"left_side\">
	<center>
			<div id=\"student_passport\">
			<img src=\"student_data/$passport\" height=\"100%\" width=\"100%\">
			</div>
			<div id=\"print_edit\" style=\"width: 350px;\">
				<form action=\"#\" method=\"post\">
					<input type=\"button\"  onclick=\"javascript:window.location.href='http://localhost/holyco/home.php?utab=fee_receipts$admissionNumber'\" value=\"Receipts\" style=\"height: 60%; width: 30%; background-color: #f2f2f2; font-weight: 600; font-size: 18px; color: #3cb9b9; border.hover: 0px;\" />";

					if ($active=="no") {
						echo "<input type=\"button\"  onclick=\"javascript:window.location.href='http://localhost/holyco/home.php?utab=student_info_activate$admissionNumber'\" value=\"Activate\" style=\"height: 60%; width: 30%; background-color: #f2f2f2; font-weight: 600; font-size: 18px; color: #3cb9b9; border.hover: 0px;\" />";

					}elseif ($active=="yes") {
						echo "<input type=\"button\"  onclick=\"javascript:window.location.href='http://localhost/holyco/home.php?utab=student_info_edit$admissionNumber'\" value=\"Edit\" style=\"height: 60%; width: 30%; background-color: #f2f2f2; font-weight: 600; font-size: 18px; color: #3cb9b9; border.hover: 0px;\" />";

						echo "<input type=\"button\"  onclick=\"javascript:window.location.href='http://localhost/holyco/home.php?utab=student_info_deavtivate$admissionNumber'\" value=\"Deactivate\" style=\"height: 60%; width: 30%; background-color: #f2f2f2; font-weight: 600; font-size: 18px; color: #3cb9b9; border.hover: 0px;\" />";
					}

echo
			"<input type=\"button\"  onclick=\"printDiv(content$id)\"  value=\"Print\" style=\"height: 60%; width: 30%; background-color: #f2f2f2; font-weight: 600; font-size: 18px; color: #3cb9b9; border.hover: 0px;\">
				</form>
			</div>
		</center>
		<div id=\"content$id\">
			
			
			  <div class=\"invoice-box\">
			  	<center>
			  		<img src=\"images/header.png\" width=\"93%\"><br>

			  		<span style=\"font-family: Lucida Fax; font-weight: bolder; font-size:20px;\">  
			  			STUDENTS INFORMATIONS
			 		</span>
			 	</center>
      				<table id=\"say\">
		<legend>Student's Information</legend>

			<tr>
				<th>Surname   </th>
				<td>
					$middle_name
				</td>
			</tr>
			<tr>
				<th>First Name</th>
				<td>
					$first_name
				</td>
			</tr> 
			<tr>
				<th>Other Name</th>
				<td>
					$last_name
				</td>
			</tr>
			<tr>
				<th>Admission Number</th>
				<td>
					$admissionNumber
				</td>
			</tr>
			<tr>
				<th>Date of Date   </th>
				<td>
					$dob_day
					$dob_month
					$dob_year
				</td>
			</tr>
			<tr>
				<th>Place of Birth</th>
				<td>
					$place_of_birth
				</td>
			</tr>
			<tr>
				<th>Gender</th>
				<td>
					$gender
				</td>
			</tr>
			<tr>
				<th>Address for Parent Residence</th>
				<td>
					$house_address
				</td>
			</tr>
			<tr>
				<th>Home Town   </th>
				<td>
					$hometown
				</td>
			</tr>
			<tr>
				<th>Tribe   </th>
				<td>
					$tribe
				</td>
			</tr>
			<tr>
				<th>Nationality   </th>
				<td>
					$nationality
				</td>
			</tr>
			<tr>
				<th>Religious Denomination   </th>
				<td>
					$religion
				</td>
			</tr>
			<tr>
				<th>Language(s) Spoken   </th>
				<td>
					$languages
				</td>
			</tr>
			<tr>
				<th>Physical Disabilities   </th>
				<td>
					$disabilities
				</td>
			</tr>
			<th>Other Medical Conditions   </th>
				<td>
					$allergies
				</td>
			<tr>
				<th>Class   </th>
				<td>
					$class
				</td>
			</tr>
			<tr>
				<th>Amount Owing</th>
				<td>
					$fee
				</td>
			</tr>
		</table>




		<table>
			<legend>Father / Guardian </legend>

			<tr>
				<th>Full Name   </th>
				<td>
					$father_name
				</td>
			</tr>
			<tr>
				<th>Address   </th>
				<td>
					$father_address
				</td>
			</tr>
			<tr>
				<th>Nationality   </th>
				<td>
					$father_nationality
				</td>
			</tr>

			<tr>
				<th>Home Town   </th>
				<td>
					$father_hometown
				</td>
			</tr>

			<tr>
				<th>Phone Number   </th>
				<td>
					$father_mobile_number
				</td>
			</tr>

			<tr>
				<th>Email  </th>
				<td>
					$father_email
				</td>
			</tr>

			<tr>
				<th>Occupation   </th>
				<td>
					$father_occupation
				</td>
			</tr>
			<tr>
				<th>Denomination   </th>
				<td>
					$father_denomination
				</td>
			</tr>
		</table><!-- End of Father / Guardian info -->


		<table>
			<legend>Mother / Guardian </legend>

			
			<tr>
				<th>Full Name   </th>
				<td>
					$mother_name
				</td>
			</tr>
			<tr>
				<th>Address   </th>
				<td>
					$mother_address
				</td>
			</tr>
			<tr>
				<th>Nationality   </th>
				<td>
					$mother_nationality
				</td>
			</tr>

			<tr>
				<th>Home Town   </th>
				<td>
					$mother_hometown
				</td>
			</tr>

			<tr>
				<th>Phone Number   </th>
				<td>
					$mother_mobile_number
				</td>
			</tr>

			<tr>
				<th>Email  </th>
				<td>
					$mother_email
				</td>
			</tr>

			<tr>
				<th>Occupation   </th>
				<td>
					$mother_occupation
				</td>
			</tr>
			<tr>
				<th>Denomination   </th>
				<td>
					$mother_denomination
				</td>
			</tr>
		</table>
		<table>
			<legend>Child's Health Details</legend>
			<tr>
				<th>Poliomyelitis    </th>
				<td>
					$Poliomyelitis 
				</td>
			</tr>
			<tr>
				<th>Measles     </th>
				<td>
					$Measles  
				</td>
			</tr>
			<tr>
				<th>Yellow Fever    </th>
				<td>
					$Yellow_Fever 
				</td>
			</tr>
			<tr>
				<th>Tetanus     </th>
				<td>
					$Tetanus  
				</td>
			</tr>
			<tr>
				<th>Whooping Cough    </th>
				<td>
					$Whooping_Cough 
				</td>
			</tr>
		</table><!--End Of Medical Informations -->

		<table>
			<legend>Other Informations</legend>
			
			<tr>
				<th>Insurance Number    </th>
				<td>
					$insurance_number 
				</td>
			</tr>

			<tr>
				<th>Child Lives With    </th>
				<td>
					$child_lives_with 
				</td>
			</tr>
			
		</table>
		
   			 </div>

			</div>
			<div id=\"editor$id\"></div>
				<button onclick=\"\" class=\"preint_rcpt\" id=\"cd$id\">Print</button>
			
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

echo"
		
	</div>
								
</div>
";
}




 /////////////////////////////////   If Row Selection equals none \\\\\\\\\\\\\\\\\\
elseif (!$selectrow){

	$outcome="";
	$select = mysql_query("SELECT * FROM students WHERE class = '$adminNo' AND active='yes'");
	$numrows = mysql_numrows($select);
	if(!$selectrow AND !$numrows) {
		$outcome = "<div class=\"student_error\"> No Student Found!</div>";
		$print_but ="";
	}else{
	while ($fetch = mysql_fetch_assoc($select)) {
		$id = $fetch['id'];
		$first_name = $fetch['first_name'];
		$last_name = $fetch['last_name'];
		$middle_name = $fetch['middle_name'];
		$admissionNumber = $fetch['admissionNumber'];
		$class = $fetch['class'];
		$passport = $fetch['passport'];


		$genderMale = mysql_numrows(mysql_query("SELECT * FROM students WHERE class = '$adminNo' AND gender='Male' AND active='yes'"));

		$genderFemale = mysql_numrows(mysql_query("SELECT * FROM students WHERE class = '$adminNo' AND gender='Female' AND active='yes'"));



$print_but = "Number of Females: $genderFemale 	&nbsp;&nbsp;&nbsp; Number of Males: $genderMale &nbsp;&nbsp;&nbsp;  Total:$numrows
<a href=\"runners/topdf.php?u=$class\" target=\"_blank\"> 
				  <input type=\"button\" id=\"prnt_class\" value=\"Print List\"/>
			</a>";

$outcome.="<a href=\"home.php?utab=student_info$admissionNumber\" id=\"class_pipuls\">
	<div id=\"search_r_pass\"><img src=\"student_data/$passport\" height=\"100%\" width=\"100%\"></div>
	<ul class=\"class_pipuls\">
		<li>$first_name  $middle_name $last_name</li>
		<li id=\"down\">Admin No: $admissionNumber    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Class: $class</li>
	</ul>
</a>";

}

}

echo "<div id=\"child_all\">
 		$print_but 
 		";


echo "$outcome";
echo "</div>";
}
}
/////////////////////////////////////////////  If Student info Alone \\\\\\\\\\\\\\\\\\\\\\\\\\
elseif($tab == "student_info"){
	echo "
<div id=\"child_all\">
	<div style=\"padding-top: 5%;\"> 
		<center>
			<div id=\"select_class_search_adnimno\">
			<form action=\"#\" method=\"post\" enctype=\"multipart/form-data\">	
				<select name=\"class\" title=\Assign Class\" >
					<option value=\"Creche\">Creche</option>
					<option value=\"Nursery 1\">Nursery 1</option>
					<option value=\"Nursery 2\">Nursery 2</option>
					
					<option value=\"KG 1\">KG 1</option>
					<option value=\"KG 2\">KG 2</option>
				
					<option value=\"Grade 1\">Grade 1</option>
					<option value=\"Grade 2\">Grade 2</option>
				</select>
				<input type=\"submit\" name=\"select_class\" value=\"Select a Class\">
					<br /><br /><br /><br /><br /><br /><br /><br />



				<input type=\"text\" name=\"search\" placeholder=\"Name or Admission No.\" />		
				<input type=\"submit\" name=\"select_adno_name\" value=\"Search\">
			</form><br><br><br><br><br><br>
					";

/////////////////////////    The Search Name Or Admission Number Code  \\\\\\\\\\\\\\
	if (isset($_POST['select_adno_name'])) {
	$searchq = $_POST['search'];
	if ($searchq !== "") {

	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

		?>
<script type="text/javascript">location.replace("home.php?utab=student_infosearch<?php echo $searchq;?> ");</script>
	<?php
	}else{
		echo "<b style=\"color: #ff0000; text-shadow: 1px 1px #000;\">Search Area is Empty!</b>";
	}
	}
echo "		</div>
		</center>
	</div>
</div>
";
}


if (isset($_POST['select_class'])) {
	$selectClassThis = $_POST['class'];




	?>
<script type="text/javascript">location.replace("home.php?utab=student_info<?php echo $selectClassThis;?> ");</script>
	<?php
	}
?>






							<!-- The Div To Be Printed -->

