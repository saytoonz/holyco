<div id="child_all">

<?php
$intab = $_REQUEST['utab'];
$Admino = substr($intab, 20);
$searchitem = substr($intab, 14);
$specificAdmiNo=substr($intab, 15);
$AdmitionNumber=substr($intab, 20);
$AdmitionNumberExist=substr($intab, 25);
$sClass=substr($intab, 12);
$sClass2=substr($intab, 16);
$sClass3=substr($intab, 15);
$EditIDno=substr($intab, 15);

if (strpos($intab, "reportsEditIDno") !== false) {
	

		$qq = mysql_query("SELECT * FROM studentsReports WHERE id = '$EditIDno'");
			$get = mysql_fetch_assoc($qq);
				$admissionNumber = $get['admissionNumber'];

			$qqname= mysql_query("SELECT * FROM students WHERE admissionNumber='$admissionNumber'");
				$ff = mysql_fetch_assoc($qqname);
				$first_name = $ff['first_name'];
				$middle_name = $ff['middle_name'];
				$last_name = $ff['last_name'];
				$studentName = "$first_name $middle_name $last_name";

				$termReport = $get['termReport'];
				$academic_year = $get['academic_year'];
				$Position = $get['Position'];
				$Class = $get['Class'];
				$Roll = $get['Roll'];
				$Vacation = $get['Vacation'];
				$Reopening = $get['Reopening'];
				$Promoted = $get['Promoted'];
				$engScore30 = $get['engScore30'];
				$engScore70 = $get['engScore70'];
				$engPosition = $get['engPosition'];
				$MATScore30 = $get['MATScore30'];
				$MATScore70 = $get['MATScore70'];
				$MATPosition = $get['MATPosition'];
				$SCIScore30 = $get['SCIScore30'];
				$SCIScore70 = $get['SCIScore70'];
				$SCIPosition = $get['SCIPosition'];
				$SOCScore30 = $get['SOCScore30'];
				$SOCScore70 = $get['SOCScore70'];
				$SOCPosition = $get['SOCPosition'];
				$RMEScore30 = $get['RMEScore30'];
				$RMEScore70 = $get['RMEScore70'];
				$RMEPosition = $get['RMEPosition'];
				$ICTScore30 = $get['ICTScore30'];
				$ICTScore70 = $get['ICTScore70'];
				$ICTPosition = $get['ICTPosition'];
				$TWIScore30 = $get['TWIScore30'];
				$TWIScore70 = $get['TWIScore70'];
				$TWIPosition = $get['TWIPosition'];
				$C_ARTScore30 = $get['C_ARTScore30'];
				$C_ARTScore70 = $get['C_ARTScore70'];
				$C_ARTPosition = $get['C_ARTPosition'];
				$FREScore30 = $get['FREScore30'];
				$FREScore70 = $get['FREScore70'];
				$FREPosition = $get['FREPosition'];
				$Attendance = $get['Attendance'];
				$Outof = $get['Outof'];
				$Conduct = $get['Conduct'];
				$Attitude = $get['Attitude'];
				$Interest = $get['Interest'];
				$Teacher_Remarks = $get['Teacher_Remarks'];
				
			

				$engScore100 = $engScore30 + $engScore70;

				$MATScore100 = $MATScore30 + $MATScore70;

				$SCIScore100 = $SCIScore30 + $SCIScore70;

				$SOCScore100 = $SOCScore30  + $SOCScore70;

				$RMEScore100 = $RMEScore30 + $RMEScore70;

				$ICTScore100 = $ICTScore30 + $ICTScore70;

				$TWIScore100 = $TWIScore30 + $TWIScore70;

				$C_ARTScore100 = $C_ARTScore30 + $C_ARTScore70;

				$FREScore100 = $FREScore30 + $FREScore70;


				if ($engScore100 > 79.9) {
					$enggrade = "A Excellent";
				}elseif ($engScore100 > 69.9 AND $engScore100 < 80) {
					$enggrade = "B Very Good";
				}elseif ($engScore100 > 59.9 AND $engScore100 < 70) {
					$enggrade = "C Good";
				}elseif ($engScore100 > 49.9 AND $engScore100 < 60) {
					$enggrade = "D Weak";
				}elseif ($engScore100 > 34.9 AND $engScore100 < 50) {
					$enggrade = "E Pass";
				}elseif ($engScore100 < 35) {
					$enggrade = "F Fail";
				}

				if ($MATScore100 > 79.9) {
					$MATgrade = "A Excellent";
				}elseif ($MATScore100 > 69.9 AND $MATScore100 < 80) {
					$MATgrade = "B Very Good";
				}elseif ($MATScore100 > 59.9 AND $MATScore100 < 70) {
					$MATgrade = "C Good";
				}elseif ($MATScore100 > 49.9 AND $MATScore100 < 60) {
					$MATgrade = "D Weak";
				}elseif ($MATScore100 > 34.9 AND $MATScore100 < 50) {
					$MATgrade = "E Pass";
				}elseif ($MATScore100 < 35) {
					$MATgrade = "F Fail";
				}

				if ($SCIScore100 > 79.9) {
					$SCIgrade = "A Excellent";
				}elseif ($SCIScore100 > 69.9 AND $SCIScore100 < 80) {
					$SCIgrade = "B Very Good";
				}elseif ($SCIScore100 > 59.9 AND $SCIScore100 < 70) {
					$SCIgrade = "C Good";
				}elseif ($SCIScore100 > 49.9 AND $SCIScore100 < 60) {
					$SCIgrade = "D Weak";
				}elseif ($SCIScore100 > 34.9 AND $SCIScore100 < 50) {
					$SCIgrade = "E Pass";
				}elseif ($SCIScore100 < 35) {
					$SCIgrade = "F Fail";
				}

				if ($SOCScore100 > 79.9) {
					$SOCgrade = "A Excellent";
				}elseif ($SOCScore100 > 69.9 AND $SOCScore100 < 80) {
					$SOCgrade = "B Very Good";
				}elseif ($SOCScore100 > 59.9 AND $SOCScore100 < 70) {
					$SOCgrade = "C Good";
				}elseif ($SOCScore100 > 49.9 AND $SOCScore100 < 60) {
					$SOCgrade = "D Weak";
				}elseif ($SOCScore100 > 34.9 AND $SOCScore100 < 50) {
					$SOCgrade = "E Pass";
				}elseif ($SOCScore100 < 35) {
					$SOCgrade = "F Fail";
				}

				if ($RMEScore100 > 79.9) {
					$RMEgrade = "A Excellent";
				}elseif ($RMEScore100 > 69.9 AND $RMEScore100 < 80) {
					$RMEgrade = "B Very Good";
				}elseif ($RMEScore100 > 59.9 AND $RMEScore100 < 70) {
					$RMEgrade = "C Good";
				}elseif ($RMEScore100 > 49.9 AND $RMEScore100 < 60) {
					$RMEgrade = "D Weak";
				}elseif ($RMEScore100 > 34.9 AND $RMEScore100 < 50) {
					$RMEgrade = "E Pass";
				}elseif ($RMEScore100 < 35) {
					$RMEgrade = "F Fail";
				}

				if ($ICTScore100 > 79.9) {
					$ICTgrade = "A Excellent";
				}elseif ($ICTScore100 > 69.9 AND $ICTScore100 < 80) {
					$ICTgrade = "B Very Good";
				}elseif ($ICTScore100 > 59.9 AND $ICTScore100 < 70) {
					$ICTgrade = "C Good";
				}elseif ($ICTScore100 > 49.9 AND $ICTScore100 < 60) {
					$ICTgrade = "D Weak";
				}elseif ($ICTScore100 > 34.9 AND $ICTScore100 < 50) {
					$ICTgrade = "E Pass";
				}elseif ($ICTScore100 < 35) {
					$ICTgrade = "F Fail";
				}



				if ($TWIScore100 > 79.9) {
					$TWIgrade = "A Excellent";
				}elseif ($TWIScore100 > 69.9 AND $TWIScore100 < 80) {
					$TWIgrade = "B Very Good";
				}elseif ($TWIScore100 > 59.9 AND $TWIScore100 < 70) {
					$TWIgrade = "C Good";
				}elseif ($TWIScore100 > 49.9 AND $TWIScore100 < 60) {
					$TWIgrade = "D Weak";
				}elseif ($TWIScore100 > 34.9 AND $TWIScore100 < 50) {
					$TWIgrade = "E Pass";
				}elseif ($TWIScore100 < 35) {
					$TWIgrade = "F Fail";
				}


				if ($C_ARTScore100 > 79.9) {
					$C_ARTgrade = "A Excellent";
				}elseif ($C_ARTScore100 > 69.9 AND $C_ARTScore100 < 80) {
					$C_ARTgrade = "B Very Good";
				}elseif ($C_ARTScore100 > 59.9 AND $C_ARTScore100 < 70) {
					$C_ARTgrade = "C Good";
				}elseif ($C_ARTScore100 > 49.9 AND $C_ARTScore100 < 60) {
					$C_ARTgrade = "D Weak";
				}elseif ($C_ARTScore100 > 34.9 AND $C_ARTScore100 < 50) {
					$C_ARTgrade = "E Pass";
				}elseif ($C_ARTScore100 < 35) {
					$C_ARTgrade = "F Fail";
				}



				if ($FREScore100 > 79.9) {
					$FREgrade = "A Excellent";
				}elseif ($FREScore100 > 69.9 AND $FREScore100 < 80) {
					$FREgrade = "B Very Good";
				}elseif ($FREScore100 > 59.9 AND $FREScore100 < 70) {
					$FREgrade = "C Good";
				}elseif ($FREScore100 > 49.9 AND $FREScore100 < 60) {
					$FREgrade = "D Weak";
				}elseif ($FREScore100 > 34.9 AND $FREScore100 < 50) {
					$FREgrade = "E Pass";
				}elseif ($FREScore100 < 35) {
					$FREgrade = "F Fail";
				}

		

echo"	<div id=\"info\">

			<form action=\"#\" method=\"post\">

			<table cellpadding=\"5px\" cellspacing=\"5px\">
				<tr>
					<td>Name</td>
					<td>
						<input type=\"text\" value=\"$studentName\" placeholder=\"Student's Name\" class=\"inputs\" title=\"Student's Name\" style=\"width: 270px; margin-right: 30px;\" name=\"studentName\"  />
					</td>
					<td>Term</td>
					<td>
						<input type=\"text\" value=\"$termReport\" placeholder=\"Student's Name\" class=\"inputs\" title=\"Student's Name\" name=\"termReport\" style=\"width: 150px; margin-right: 30px;\"  />
						<select title=\"Select Term\" class=\"terms\" name=\"termReport\" style=\"width: 150px; margin-right: 30px;\">
							<option value=\"$termReport\">$termReport</option>
							<option value=\"Term 1\">Term 1</option>
							<option value=\"Term 2\">Term 2</option>
							<option value=\"Term 3\">Term 3</option>
						</select>
					</td>
					<td>Year</td>
					<td>
						<input type=\"text\" value=\"$academic_year\" placeholder=\"Student's Name\" class=\"inputs\" title=\"Accademic Year\" name=\"academic_year\" style=\"width: 150px; margin-right: 30px;\"  />
					</td>
				</tr>
				<tr>
						<td>Position</td>
					<td>
						<input type=\"text\" name=\"Position\" value=\"$Position\"  placeholder=\"Position\" class=\"inputs\" title=\"Position In Class\" />
					</td>

						<td>Class</td>
					<td>
						<input type=\"text\" value=\"$Class\" placeholder=\"Class\" class=\"inputs\" title=\"Class\" style=\"width: 150px;\" name=\"Class\"  />
					</td>

					<td>Roll:</td>
					<td>
						<input type=\"text\" value=\"$Roll\" placeholder=\"No. On Roll\" class=\"inputs\" title=\"No. On Roll\" style=\"width: 150px;\" name=\"Roll\"   />
					</td>
				</tr>
			</table>
			<div class=\"next\">
					<b>Vacation Date:</b><input type=\"date\" name=\"Vacation\" value=\"$Vacation\" title=\"School Vacate On\"  />
					<b>Reopening Date:</b><input type=\"date\" name=\"Reopening\" value=\"$Reopening\" name=\"\" title=\"School Vacate On\" />
					
					<b>Promoted To</b>
						<select title=\"Class\" class=\"terms\" name=\"Promoted\" style=\"width: 100px;\">
							<option value=\"$Promoted\">$Promoted</option>
							<option value=\"Creche\">Creche</option>
							<option value=\"Nursery 1\">Nursery 1</option>
							<option value=\"Nursery 2\">Nursery 2</option>
							
							<option value=\"KG 1\">KG 1</option>
							<option value=\"KG 2\">KG 2</option>
						
							<option value=\"Grade 1\">Grade 1</option>
							<option value=\"Grade 2\">Grade 2</option>
						</select>	
			</div>
			



		<div class=\"fill\">
			<table border=\"1px\" cellpadding=\"10px\" cellspacing=\"10px\" width=\"100%\">
				<tr>
					<td>Subject</td>
					<td>Class Score 30%</td>
					<td>Exams Score 70%</td>
					<td>Subject Position</td>
				</tr>
				<tr>
					<td>LANGUAGE AND LITERACY</td>
					<td>
						<input type=\"text\" value=\"$engScore30\" name=\"engScore30\" />
					</td>
					<td>
						<input type=\"text\" value=\"$engScore70\" name=\"engScore70\" />
					</td>
					<td>
						<input type=\"text\" value=\"$engPosition\" name=\"engPosition\" />
					</td>
				</tr>
					<tr>
						<td>NUMERACY</td>
						<td>
							<input type=\"text\"  value=\"$MATScore30\" name=\"MATScore30\" />
						</td>
						<td>
							<input type=\"text\"  value=\"$MATScore70\" name=\"MATScore70\" />
						</td>
						<td>
							<input type=\"text\" value=\"$MATPosition\"  name=\"MATPosition\" />
						</td>
					
				</tr>
					<tr>
						<td>COLOURING AND SCRIBBLING</td>
						<td>
							<input type=\"text\" value=\"$SCIScore30\" name=\"SCIScore30\" />
						</td>
						<td>
							<input type=\"text\" value=\"$SCIScore70\" name=\"SCIScore70\" />
						</td>
						<td>
							<input type=\"text\" value=\"$SCIPosition\" name=\"SCIPosition\" />
						</td>
					
					<tr>
						<td>ENVIRONMENTAL STUDIES</td>
						<td>
							<input type=\"text\" value=\"$SOCScore30\" name=\"SOCScore30\" />
						</td>
						<td>
							<input type=\"text\" value=\"$SOCScore70\" name=\"SOCScore70\" />
						</td>
						<td>
							<input type=\"text\" value=\"$SOCPosition\" name=\"SOCPosition\" />
						</td>
						
					</tr>
					<tr>
						<td>R.M.E</td>
						<td>
							<input type=\"text\" value=\"$RMEScore30\" name=\"RMEScore30\" />
						</td>
						<td>
							<input type=\"text\" value=\"$RMEScore70\" name=\"RMEScore70\" />
						</td>
						<td>
							<input type=\"text\" value=\"$RMEPosition\" name=\"RMEPosition\" />
						</td>
					
				</tr>
					<tr>
						<td>I.C.T</td>						<td>
							<input type=\"text\" value=\"$ICTScore30\" name=\"ICTScore30\" />
						</td>
						<td>
							<input type=\"text\" value=\"$ICTScore70\" name=\"ICTScore70\" />
						</td>
						<td>
							<input type=\"text\" value=\"$ICTPosition\" name=\"ICTPosition\" />
						</td>
						
				</tr>
					<tr>
						<td>POEMS</td>
						<td>
							<input type=\"text\" value=\"$TWIScore30\" name=\"TWIScore30\" />
						</td>
						<td>
							<input type=\"text\" value=\"$TWIScore70\" name=\"TWIScore70\" />
						</td>
						<td>
							<input type=\"text\" value=\"$TWIPosition\" name=\"TWIPosition\" />
						</td>
						
				</tr>
				<tr>
					<td>CREATIVE ART</td>
						<td>
							<input type=\"text\" value=\"$C_ARTScore30\" name=\"C_ARTScore30\" />
						</td>
						<td>
							<input type=\"text\" value=\"$C_ARTScore70\" name=\"C_ARTScore70\" />
						</td>
						<td>
							<input type=\"text\" value=\"$C_ARTPosition\" name=\"C_ARTPosition\" />
						</td>
			
					<tr>
						<td>WRITING</td>
						<td>
							<input type=\"text\" value=\"$FREScore30\" name=\"FREScore30\" />
						</td>
						<td>
							<input type=\"text\" value=\"$FREScore70\" name=\"FREScore70\" />
						</td>
						<td>
							<input type=\"text\" value=\"$FREPosition\" name=\"FREPosition\" />
						</td>
						
				</tr>
			</table>
		</div>
		<table style=\"width: 100%;\">
			<tr >
				<td>
					Attendance:
				</td>
				<td>
					<input type=\"text\" value=\"$Attendance\" name=\"Attendance\" style=\"width: 60%;\" />
				</td>
				<td>
					Out of:
				</td>
				<td>
					<input type=\"text\" value=\"$Outof\" name=\"Outof\" style=\"width: 60%;\" />
				</td>
			</tr>
		</table>
		<table style=\"width: 100%;\">
			<tr>
				<td>
					Conduct:
				</td>
				<td>
					<input type=\"text\" value=\"$Conduct\" name=\"Conduct\" style=\"width: 80%;\" />
				</td>
			</tr>
			<tr>
				<td>
					Attitude:
				</td>
				<td>
					<input type=\"text\" value=\"$Attitude\" name=\"Attitude\" style=\"width: 80%;\" />
				</td>
			</tr>
			<tr>
				<td>
					Interest:
				</td>
				<td>
					<input type=\"text\" value=\"$Interest\" name=\"Interest\" style=\"width: 80%;\" />
				</td>
			</tr>
			<tr>
				<td>
					Teacher's<br> Remarks:
				</td>
				<td>
					<input type=\"text\" value=\"$Teacher_Remarks\" name=\"Teacher_Remarks\" style=\"width: 80%;\" />
				</td>
			</tr>
			<tr></tr><tr></tr>
		</table>
		<input type=\"submit\" value=\"Update\" name=\"Update_report\" style=\"padding: 5px; font-family: Lucida Fax; color: #fff; font-size: 18px; font-weight: bold; background-color: #03b9b9;\" />

		</form>
		<input type=\"submit\" value=\"Cancel\"  onclick=\"javascript:window.history.go(-1)\" style=\"padding: 5px; font-family: Lucida Fax; color: #fff; font-size: 10px; background-color: #ff0000; float: right;\" />
	</div>";

	if (isset($_POST["Update_report"])) {

		$studentName = $_POST['studentName'];
				$termReport = $_POST['termReport'];
				$academic_year = $_POST['academic_year'];
				$Position = $_POST['Position'];
				$Class = $_POST['Class'];
				$Roll = $_POST['Roll'];
				$Vacation = $_POST['Vacation'];
				$Reopening = $_POST['Reopening'];
				$Promoted = $_POST['Promoted'];
				$engScore30 = $_POST['engScore30'];
				$engScore70 = $_POST['engScore70'];
				$engPosition = $_POST['engPosition'];
				$MATScore30 = $_POST['MATScore30'];
				$MATScore70 = $_POST['MATScore70'];
				$MATPosition = $_POST['MATPosition'];
				$SCIScore30 = $_POST['SCIScore30'];
				$SCIScore70 = $_POST['SCIScore70'];
				$SCIPosition = $_POST['SCIPosition'];
				$SOCScore30 = $_POST['SOCScore30'];
				$SOCScore70 = $_POST['SOCScore70'];
				$SOCPosition = $_POST['SOCPosition'];
				$RMEScore30 = $_POST['RMEScore30'];
				$RMEScore70 = $_POST['RMEScore70'];
				$RMEPosition = $_POST['RMEPosition'];
				$ICTScore30 = $_POST['ICTScore30'];
				$ICTScore70 = $_POST['ICTScore70'];
				$ICTPosition = $_POST['ICTPosition'];
				$TWIScore30 = $_POST['TWIScore30'];
				$TWIScore70 = $_POST['TWIScore70'];
				$TWIPosition = $_POST['TWIPosition'];
				$C_ARTScore30 = $_POST['C_ARTScore30'];
				$C_ARTScore70 = $_POST['C_ARTScore70'];
				$C_ARTPosition = $_POST['C_ARTPosition'];
				$FREScore30 = $_POST['FREScore30'];
				$FREScore70 = $_POST['FREScore70'];
				$FREPosition = $_POST['FREPosition'];
				$Attendance = $_POST['Attendance'];
				$Outof = $_POST['Outof'];
				$Conduct = $_POST['Conduct'];
				$Attitude = $_POST['Attitude'];
				$Interest = $_POST['Interest'];
				$Teacher_Remarks = $_POST['Teacher_Remarks'];


				$engScore100 = $engScore30 + $engScore70;

				$MATScore100 = $MATScore30 + $MATScore70;

				$SCIScore100 = $SCIScore30 + $SCIScore70;

				$SOCScore100 = $SOCScore30  + $SOCScore70;

				$RMEScore100 = $RMEScore30 + $RMEScore70;

				$ICTScore100 = $ICTScore30 + $ICTScore70;

				$TWIScore100 = $TWIScore30 + $TWIScore70;

				$C_ARTScore100 = $C_ARTScore30 + $C_ARTScore70;

				$FREScore100 = $FREScore30 + $FREScore70;


				if ($engScore100 > 79.9) {
					$enggrade = "A Excellent";
				}elseif ($engScore100 > 69.9 AND $engScore100 < 80) {
					$enggrade = "B Very Good";
				}elseif ($engScore100 > 59.9 AND $engScore100 < 70) {
					$enggrade = "C Good";
				}elseif ($engScore100 > 49.9 AND $engScore100 < 60) {
					$enggrade = "D Weak";
				}elseif ($engScore100 > 34.9 AND $engScore100 < 50) {
					$enggrade = "E Pass";
				}elseif ($engScore100 < 35) {
					$enggrade = "F Fail";
				}

				if ($MATScore100 > 79.9) {
					$MATgrade = "A Excellent";
				}elseif ($MATScore100 > 69.9 AND $MATScore100 < 80) {
					$MATgrade = "B Very Good";
				}elseif ($MATScore100 > 59.9 AND $MATScore100 < 70) {
					$MATgrade = "C Good";
				}elseif ($MATScore100 > 49.9 AND $MATScore100 < 60) {
					$MATgrade = "D Weak";
				}elseif ($MATScore100 > 34.9 AND $MATScore100 < 50) {
					$MATgrade = "E Pass";
				}elseif ($MATScore100 < 35) {
					$MATgrade = "F Fail";
				}

				if ($SCIScore100 > 79.9) {
					$SCIgrade = "A Excellent";
				}elseif ($SCIScore100 > 69.9 AND $SCIScore100 < 80) {
					$SCIgrade = "B Very Good";
				}elseif ($SCIScore100 > 59.9 AND $SCIScore100 < 70) {
					$SCIgrade = "C Good";
				}elseif ($SCIScore100 > 49.9 AND $SCIScore100 < 60) {
					$SCIgrade = "D Weak";
				}elseif ($SCIScore100 > 34.9 AND $SCIScore100 < 50) {
					$SCIgrade = "E Pass";
				}elseif ($SCIScore100 < 35) {
					$SCIgrade = "F Fail";
				}

				if ($SOCScore100 > 79.9) {
					$SOCgrade = "A Excellent";
				}elseif ($SOCScore100 > 69.9 AND $SOCScore100 < 80) {
					$SOCgrade = "B Very Good";
				}elseif ($SOCScore100 > 59.9 AND $SOCScore100 < 70) {
					$SOCgrade = "C Good";
				}elseif ($SOCScore100 > 49.9 AND $SOCScore100 < 60) {
					$SOCgrade = "D Weak";
				}elseif ($SOCScore100 > 34.9 AND $SOCScore100 < 50) {
					$SOCgrade = "E Pass";
				}elseif ($SOCScore100 < 35) {
					$SOCgrade = "F Fail";
				}

				if ($RMEScore100 > 79.9) {
					$RMEgrade = "A Excellent";
				}elseif ($RMEScore100 > 69.9 AND $RMEScore100 < 80) {
					$RMEgrade = "B Very Good";
				}elseif ($RMEScore100 > 59.9 AND $RMEScore100 < 70) {
					$RMEgrade = "C Good";
				}elseif ($RMEScore100 > 49.9 AND $RMEScore100 < 60) {
					$RMEgrade = "D Weak";
				}elseif ($RMEScore100 > 34.9 AND $RMEScore100 < 50) {
					$RMEgrade = "E Pass";
				}elseif ($RMEScore100 < 35) {
					$RMEgrade = "F Fail";
				}

				if ($ICTScore100 > 79.9) {
					$ICTgrade = "A Excellent";
				}elseif ($ICTScore100 > 69.9 AND $ICTScore100 < 80) {
					$ICTgrade = "B Very Good";
				}elseif ($ICTScore100 > 59.9 AND $ICTScore100 < 70) {
					$ICTgrade = "C Good";
				}elseif ($ICTScore100 > 49.9 AND $ICTScore100 < 60) {
					$ICTgrade = "D Weak";
				}elseif ($ICTScore100 > 34.9 AND $ICTScore100 < 50) {
					$ICTgrade = "E Pass";
				}elseif ($ICTScore100 < 35) {
					$ICTgrade = "F Fail";
				}



				if ($TWIScore100 > 79.9) {
					$TWIgrade = "A Excellent";
				}elseif ($TWIScore100 > 69.9 AND $TWIScore100 < 80) {
					$TWIgrade = "B Very Good";
				}elseif ($TWIScore100 > 59.9 AND $TWIScore100 < 70) {
					$TWIgrade = "C Good";
				}elseif ($TWIScore100 > 49.9 AND $TWIScore100 < 60) {
					$TWIgrade = "D Weak";
				}elseif ($TWIScore100 > 34.9 AND $TWIScore100 < 50) {
					$TWIgrade = "E Pass";
				}elseif ($TWIScore100 < 35) {
					$TWIgrade = "F Fail";
				}



				if ($C_ARTScore100 > 79.9) {
					$C_ARTgrade = "A Excellent";
				}elseif ($C_ARTScore100 > 69.9 AND $C_ARTScore100 < 80) {
					$C_ARTgrade = "B Very Good";
				}elseif ($C_ARTScore100 > 59.9 AND $C_ARTScore100 < 70) {
					$C_ARTgrade = "C Good";
				}elseif ($C_ARTScore100 > 49.9 AND $C_ARTScore100 < 60) {
					$C_ARTgrade = "D Weak";
				}elseif ($C_ARTScore100 > 34.9 AND $C_ARTScore100 < 50) {
					$C_ARTgrade = "E Pass";
				}elseif ($C_ARTScore100 < 35) {
					$C_ARTgrade = "F Fail";
				}



				if ($FREScore100 > 79.9) {
					$FREgrade = "A Excellent";
				}elseif ($FREScore100 > 69.9 AND $FREScore100 < 80) {
					$FREgrade = "B Very Good";
				}elseif ($FREScore100 > 59.9 AND $FREScore100 < 70) {
					$FREgrade = "C Good";
				}elseif ($FREScore100 > 49.9 AND $FREScore100 < 60) {
					$FREgrade = "D Weak";
				}elseif ($FREScore100 > 34.9 AND $FREScore100 < 50) {
					$FREgrade = "E Pass";
				}elseif ($FREScore100 < 35) {
					$FREgrade = "F Fail";
				}
		if ($studentName!="" AND $termReport!="" AND $academic_year!="" AND $Class!="" AND $Roll!="") {
						mysql_query("UPDATE studentsReports SET studentName='$studentName',termReport='$termReport', academic_year='$academic_year', Position='$Position', Class='$Class', Roll='$Roll', Vacation='$Vacation', Reopening='$Reopening', Promoted='$Promoted', engScore30='$engScore30', engScore70='$engScore70',engScore100='$engScore100', engPosition='$engPosition',enggrade='$enggrade', MATScore30='$MATScore30', MATScore70='$MATScore70', MATScore100='$MATScore100', MATPosition='$MATPosition', MATgrade='$MATgrade', SCIScore30='$SCIScore30', SCIScore70='$SCIScore70', SCIScore100='$SCIScore100', SCIPosition='$SCIPosition', SCIgrade='$SCIgrade', SOCScore30='$SOCScore30', SOCScore70='$SOCScore70', SOCScore100='$SOCScore100', SOCPosition='$SOCPosition', SOCgrade='$SOCgrade', RMEScore30='$RMEScore30', RMEScore70='$RMEScore70', RMEScore100='$RMEScore100', RMEPosition='$RMEPosition', RMEgrade='$RMEgrade', ICTScore30='$ICTScore30', ICTScore70='$ICTScore70', ICTScore100='$ICTScore100', ICTPosition='$ICTPosition', ICTgrade='$ICTgrade', TWIScore30='$TWIScore30', TWIScore70='$TWIScore70', TWIScore100='$TWIScore100', TWIPosition='$TWIPosition', TWIgrade='$TWIgrade', C_ARTScore30='$C_ARTScore30', C_ARTScore70='$C_ARTScore70', C_ARTScore100='$C_ARTScore100', C_ARTPosition='$C_ARTPosition', C_ARTgrade='$C_ARTgrade', FREScore30='$FREScore30', FREScore70='$FREScore70', FREScore100='$FREScore100', FREPosition='$FREPosition', FREgrade='$FREgrade', Attendance='$Attendance', Outof='$Outof', Conduct='$Conduct', Attitude='$Attitude', Interest='$Interest', Teacher_Remarks='$Teacher_Remarks' WHERE id='$EditIDno'");

							?>
						<script type="text/javascript">
							alert("Report Updated!");
							javascript:window.history.go(-1);
						</script>
							<?php
					}else{

					?>
				<script type="text/javascript">
					alert("Name, Term, Year, Class and Roll cannot be empty");
				</script>
					<?php
					}
	}





}elseif (strpos($intab, "reportsAddClass") !== false) {
		$output="";
$query = mysql_query("SELECT * FROM students WHERE  class = '$sClass3' AND active='yes'") or die("could not search!");

		while($fetch = mysql_fetch_array($query)){
			$first_name = $fetch['first_name'];
			$last_name = $fetch['last_name'];
			$middle_name = $fetch['middle_name'];
			$admissionNumber = $fetch['admissionNumber'];
			$class = $fetch['class'];
			$passport = $fetch['passport'];
			
	$output.="
<a href=\"home.php?utab=reportsstudentAdmino$admissionNumber\" id=\"class_pipuls\">
	<div id=\"search_r_pass\"><img src=\"student_data/$passport\" height=\"100%\" width=\"100%\"></div>
	<ul class=\"class_pipuls\">
		<li>$first_name  $middle_name $last_name</li>
		<li id=\"down\">Admin No: $admissionNumber    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Class: $class</li>
	</ul>
</a>
";
	}
				
 echo "<div id=\"child_all\">";
 echo "$output";
 echo "</div>";

}



elseif (strpos($intab, "reportsClass") !== false) {


				echo "<div id=\"child_all\">
					<div style=\"padding-top: 5%;\"> 
						<center>
					<div id=\"select_class_search_adnimno\">
					<br><br><br><br /><br />
						<a href=\"home.php?utab=reportsAddClass$sClass\" style=\"color:#03cb9b; text-decoration: none; font-size: 30px; font-family: Lucida Fax; background-color: #fff; width: 190%; padding: 4%; padding-top:7%;  border-radius: 7px;\">
							<img src=\"images/add_report.png\" />
							Add Report
						</a>
						<br /><br /><br /><br />
						<a href=\"home.php?utab=reportsOpenClass$sClass\" style=\"color:#03cb9b; text-decoration: none; font-size: 25px; font-family: Lucida Fax; background-color: #fff; width: 190%; padding: 4%; padding-top:7%; border-radius: 7px;\">
						<img src=\"images/open_report.png\" />
							Open Reports
						</a>
					</div>
						</center>
					</div>
				</div>";





} 


elseif (strpos($intab, "reportsOpenClass") !== false) {


		echo "
			<form action=\"#\" method=\"post\" style=\"margin-left: 20px;\">

			<select title=\"Select Term\" class=\"terms\" name=\"term\" style=\"width: 100px;\">
							<option value=\"Term 1\">Term 1</option>
							<option value=\"Term 2\">Term 2</option>
							<option value=\"Term 3\">Term 3</option>
			</select>

			<input type=\"text\" class=\"terms\" name=\"academicYear\" style=\"width: 100px;\" />
			


			<input type=\"submit\" class=\"terms\" name=\"searchRep\" value=\"Search\">
		
			</form>	";
	

	 	if (isset($_POST['searchRep'])) {

					$term = $_POST['term'];
					$academicYear = $_POST['academicYear'];
	 		
	 		$qq = mysql_query("SELECT * FROM studentsReports WHERE class = '$sClass2' AND termReport='$term'AND academic_year='$academicYear'");
	 		if (mysql_numrows($qq)!==0) {

		while ($get = mysql_fetch_assoc($qq)) {



				$admissionNumber = $get['admissionNumber'];

			$qqname= mysql_query("SELECT * FROM students WHERE admissionNumber='$admissionNumber'");
				$ff = mysql_fetch_assoc($qqname);
				$first_name = $ff['first_name'];
				$middle_name = $ff['middle_name'];
				$last_name = $ff['last_name'];
				$studentName = "$first_name $middle_name $last_name";


				$id = $get['id'];
				$termReport = $get['termReport'];
				$academic_year = $get['academic_year'];
				$Position = $get['Position'];
				$Class = $get['Class'];
				$Roll = $get['Roll'];
				$Vacation = $get['Vacation'];
				$Reopening = $get['Reopening'];
				$Promoted = $get['Promoted'];
				$engScore30 = $get['engScore30'];
				$engScore70 = $get['engScore70'];
				$engPosition = $get['engPosition'];
				$MATScore30 = $get['MATScore30'];
				$MATScore70 = $get['MATScore70'];
				$MATPosition = $get['MATPosition'];
				$SCIScore30 = $get['SCIScore30'];
				$SCIScore70 = $get['SCIScore70'];
				$SCIPosition = $get['SCIPosition'];
				$SOCScore30 = $get['SOCScore30'];
				$SOCScore70 = $get['SOCScore70'];
				$SOCPosition = $get['SOCPosition'];
				$RMEScore30 = $get['RMEScore30'];
				$RMEScore70 = $get['RMEScore70'];
				$RMEPosition = $get['RMEPosition'];
				$ICTScore30 = $get['ICTScore30'];
				$ICTScore70 = $get['ICTScore70'];
				$ICTPosition = $get['ICTPosition'];
				$TWIScore30 = $get['TWIScore30'];
				$TWIScore70 = $get['TWIScore70'];
				$TWIPosition = $get['TWIPosition'];
				$C_ARTScore30 = $get['C_ARTScore30'];
				$C_ARTScore70 = $get['C_ARTScore70'];
				$C_ARTPosition = $get['C_ARTPosition'];
				$FREScore30 = $get['FREScore30'];
				$FREScore70 = $get['FREScore70'];
				$FREPosition = $get['FREPosition'];
				$Attendance = $get['Attendance'];
				$Outof = $get['Outof'];
				$Conduct = $get['Conduct'];
				$Attitude = $get['Attitude'];
				$Interest = $get['Interest'];
				$Teacher_Remarks = $get['Teacher_Remarks'];


				$engScore100 = $engScore30 + $engScore70;

				$MATScore100 = $MATScore30 + $MATScore70;

				$SCIScore100 = $SCIScore30 + $SCIScore70;

				$SOCScore100 = $SOCScore30  + $SOCScore70;

				$RMEScore100 = $RMEScore30 + $RMEScore70;

				$ICTScore100 = $ICTScore30 + $ICTScore70;

				$TWIScore100 = $TWIScore30 + $TWIScore70;

				$C_ARTScore100 = $C_ARTScore30 + $C_ARTScore70;

				$FREScore100 = $FREScore30 + $FREScore70;


				if ($engScore100 > 79.9) {
					$enggrade = "A Excellent";
				}elseif ($engScore100 > 69.9 AND $engScore100 < 80) {
					$enggrade = "B Very Good";
				}elseif ($engScore100 > 59.9 AND $engScore100 < 70) {
					$enggrade = "C Good";
				}elseif ($engScore100 > 49.9 AND $engScore100 < 60) {
					$enggrade = "D Weak";
				}elseif ($engScore100 > 34.9 AND $engScore100 < 50) {
					$enggrade = "E Pass";
				}elseif ($engScore100 < 35) {
					$enggrade = "F Fail";
				}

				if ($MATScore100 > 79.9) {
					$MATgrade = "A Excellent";
				}elseif ($MATScore100 > 69.9 AND $MATScore100 < 80) {
					$MATgrade = "B Very Good";
				}elseif ($MATScore100 > 59.9 AND $MATScore100 < 70) {
					$MATgrade = "C Good";
				}elseif ($MATScore100 > 49.9 AND $MATScore100 < 60) {
					$MATgrade = "D Weak";
				}elseif ($MATScore100 > 34.9 AND $MATScore100 < 50) {
					$MATgrade = "E Pass";
				}elseif ($MATScore100 < 35) {
					$MATgrade = "F Fail";
				}

				if ($SCIScore100 > 79.9) {
					$SCIgrade = "A Excellent";
				}elseif ($SCIScore100 > 69.9 AND $SCIScore100 < 80) {
					$SCIgrade = "B Very Good";
				}elseif ($SCIScore100 > 59.9 AND $SCIScore100 < 70) {
					$SCIgrade = "C Good";
				}elseif ($SCIScore100 > 49.9 AND $SCIScore100 < 60) {
					$SCIgrade = "D Weak";
				}elseif ($SCIScore100 > 34.9 AND $SCIScore100 < 50) {
					$SCIgrade = "E Pass";
				}elseif ($SCIScore100 < 35) {
					$SCIgrade = "F Fail";
				}

				if ($SOCScore100 > 79.9) {
					$SOCgrade = "A Excellent";
				}elseif ($SOCScore100 > 69.9 AND $SOCScore100 < 80) {
					$SOCgrade = "B Very Good";
				}elseif ($SOCScore100 > 59.9 AND $SOCScore100 < 70) {
					$SOCgrade = "C Good";
				}elseif ($SOCScore100 > 49.9 AND $SOCScore100 < 60) {
					$SOCgrade = "D Weak";
				}elseif ($SOCScore100 > 34.9 AND $SOCScore100 < 50) {
					$SOCgrade = "E Pass";
				}elseif ($SOCScore100 < 35) {
					$SOCgrade = "F Fail";
				}

				if ($RMEScore100 > 79.9) {
					$RMEgrade = "A Excellent";
				}elseif ($RMEScore100 > 69.9 AND $RMEScore100 < 80) {
					$RMEgrade = "B Very Good";
				}elseif ($RMEScore100 > 59.9 AND $RMEScore100 < 70) {
					$RMEgrade = "C Good";
				}elseif ($RMEScore100 > 49.9 AND $RMEScore100 < 60) {
					$RMEgrade = "D Weak";
				}elseif ($RMEScore100 > 34.9 AND $RMEScore100 < 50) {
					$RMEgrade = "E Pass";
				}elseif ($RMEScore100 < 35) {
					$RMEgrade = "F Fail";
				}

				if ($ICTScore100 > 79.9) {
					$ICTgrade = "A Excellent";
				}elseif ($ICTScore100 > 69.9 AND $ICTScore100 < 80) {
					$ICTgrade = "B Very Good";
				}elseif ($ICTScore100 > 59.9 AND $ICTScore100 < 70) {
					$ICTgrade = "C Good";
				}elseif ($ICTScore100 > 49.9 AND $ICTScore100 < 60) {
					$ICTgrade = "D Weak";
				}elseif ($ICTScore100 > 34.9 AND $ICTScore100 < 50) {
					$ICTgrade = "E Pass";
				}elseif ($ICTScore100 < 35) {
					$ICTgrade = "F Fail";
				}



				if ($TWIScore100 > 79.9) {
					$TWIgrade = "A Excellent";
				}elseif ($TWIScore100 > 69.9 AND $TWIScore100 < 80) {
					$TWIgrade = "B Very Good";
				}elseif ($TWIScore100 > 59.9 AND $TWIScore100 < 70) {
					$TWIgrade = "C Good";
				}elseif ($TWIScore100 > 49.9 AND $TWIScore100 < 60) {
					$TWIgrade = "D Weak";
				}elseif ($TWIScore100 > 34.9 AND $TWIScore100 < 50) {
					$TWIgrade = "E Pass";
				}elseif ($TWIScore100 < 35) {
					$TWIgrade = "F Fail";
				}


				if ($C_ARTScore100 > 79.9) {
					$C_ARTgrade = "A Excellent";
				}elseif ($C_ARTScore100 > 69.9 AND $C_ARTScore100 < 80) {
					$C_ARTgrade = "B Very Good";
				}elseif ($C_ARTScore100 > 59.9 AND $C_ARTScore100 < 70) {
					$C_ARTgrade = "C Good";
				}elseif ($C_ARTScore100 > 49.9 AND $C_ARTScore100 < 60) {
					$C_ARTgrade = "D Weak";
				}elseif ($C_ARTScore100 > 34.9 AND $C_ARTScore100 < 50) {
					$C_ARTgrade = "E Pass";
				}elseif ($C_ARTScore100 < 35) {
					$C_ARTgrade = "F Fail";
				}



				if ($FREScore100 > 79.9) {
					$FREgrade = "A Excellent";
				}elseif ($FREScore100 > 69.9 AND $FREScore100 < 80) {
					$FREgrade = "B Very Good";
				}elseif ($FREScore100 > 59.9 AND $FREScore100 < 70) {
					$FREgrade = "C Good";
				}elseif ($FREScore100 > 49.9 AND $FREScore100 < 60) {
					$FREgrade = "D Weak";
				}elseif ($FREScore100 > 34.9 AND $FREScore100 < 50) {
					$FREgrade = "E Pass";
				}elseif ($FREScore100 < 35) {
					$FREgrade = "F Fail";
				}

		

			echo "<div id=\"content$id\">
			
			
			  <div class=\"report-box\">
			  	<center>
			  		<img src=\"images/header.png\" width=\"100%\"><br>

			  		<span style=\"font-family: Lucida Fax; font-weight: bolder; font-size:20px;\">  
			  			STUDENTS REPORT
			 		</span>
			 	</center>
       <table cellpadding=\"5px\" cellspacing=\"5px\" class=\"head\">
				<tr>
					<td>Name: </td>
					<td>
						$studentName
					</td>
					<td>Term: </td>
					<td>
						$termReport 
					</td>
					<td>Year: </td>
					<td>
						$academic_year
					</td>
				</tr>
				<tr>
						<td>Position: </td>
					<td>
						$Position
					</td>

						<td>Class: </td>
					<td>
						$Class
					</td>

					<td>Roll:</td>
					<td>
						$Roll
					</td>
				</tr>
			</table>
			<div class=\"next\">
					<b>Vacation Date: </b>$Vacation 
					<b>Reopening Date: </b>$Reopening 
					
					<b>Promoted To: </b> $Promoted
						
			</div>
			
				
		<div class=\"fill\">
			<table>
				<tr>
					<td>Subject</td>
					<td>Class Score 30% </td>
					<td>Exams Score 70% </td>
					<td>Total Score 100% </td>
					<td>Subject Position </td>
					<td>Grade Remarks  </td>
				</tr>
				<tr>
					<th>LANGUAGE AND LITERACY</th>
					<td>
						$engScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$engScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$engScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$engPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$enggrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
					<tr>
						<th>NUMERACY</th>
					<td>
						$MATScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
					<tr>
						<th>COLOURING AND SCRIBBLING</th>
					<td>
						$SCIScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
					<tr>
						<th>ENVIRONMENTAL STUDIES</th>
						<td>
							$SOCScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
					</tr>
					<tr>
						<th>R.M.E</th>
						<td>
							$RMEScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
			</tr>
				</tr>
					<tr>
						<th>I.C.T</th>						<td>
							$ICTScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				</tr>
					<tr>
						<th>POEMS</th>
						<td>
							$TWIScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				</tr>
				<tr>
					<th>CREATIVE ART</th>
						<td>
							$C_ARTScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				
					<tr>
						<th>WRITING</th>
						<td>
							$FREScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				</tr>
			</table>
		</div>
		<table>
			<tr>
				<td>
					Attendance:
				</td>
				<td>
					$Attendance
				</td>
				<td>
					Out of:
				</td>
				<td>
					$Outof
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>
					Conduct:
				</td>
				<td>
					$Conduct
				</td>
			</tr>
			<tr>
				<td>
					Attitude:
				</td>
				<td>
					$Attitude
				</td>
			</tr>
			<tr>
				<td>
					Interest:
				</td>
				<td>
					$Interest
				</td>
			</tr>
			<tr>
				<td>
					Teacher's<br> Remarks:
				</td>
				<td>
					$Teacher_Remarks
				</td>
			</tr>
			<tr></tr><tr></tr>
		</table>
    </div>

			</div>
			<div id=\"editor$id\"></div>


				<button onclick=\"printDiv(content$id)\" class=\"preint_rcpt\" id=\"cd$id\">Print</button>
				<button onclick=\"location.replace('home.php?utab=reportsEditIDno$id');\" class=\"preint_rcpt\" id=\"cd$id\">Edit</button>
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
		echo "Class has no report in database";
	}
	 	}else {
	 		
	 	$qq = mysql_query("SELECT * FROM studentsReports WHERE Class = '$sClass2'");

	if (mysql_numrows($qq)!==0) {

		while ($get = mysql_fetch_assoc($qq)) {

				$id = $get['id'];


				$admissionNumber = $get['admissionNumber'];

			$qqname= mysql_query("SELECT * FROM students WHERE admissionNumber='$admissionNumber'");
				$ff = mysql_fetch_assoc($qqname);
				$first_name = $ff['first_name'];
				$middle_name = $ff['middle_name'];
				$last_name = $ff['last_name'];
				$studentName = "$first_name $middle_name $last_name";


				$termReport = $get['termReport'];
				$academic_year = $get['academic_year'];
				$Position = $get['Position'];
				$Class = $get['Class'];
				$Roll = $get['Roll'];
				$Vacation = $get['Vacation'];
				$Reopening = $get['Reopening'];
				$Promoted = $get['Promoted'];
				$engScore30 = $get['engScore30'];
				$engScore70 = $get['engScore70'];
				$engPosition = $get['engPosition'];
				$MATScore30 = $get['MATScore30'];
				$MATScore70 = $get['MATScore70'];
				$MATPosition = $get['MATPosition'];
				$SCIScore30 = $get['SCIScore30'];
				$SCIScore70 = $get['SCIScore70'];
				$SCIPosition = $get['SCIPosition'];
				$SOCScore30 = $get['SOCScore30'];
				$SOCScore70 = $get['SOCScore70'];
				$SOCPosition = $get['SOCPosition'];
				$RMEScore30 = $get['RMEScore30'];
				$RMEScore70 = $get['RMEScore70'];
				$RMEPosition = $get['RMEPosition'];
				$ICTScore30 = $get['ICTScore30'];
				$ICTScore70 = $get['ICTScore70'];
				$ICTPosition = $get['ICTPosition'];
				$TWIScore30 = $get['TWIScore30'];
				$TWIScore70 = $get['TWIScore70'];
				$TWIPosition = $get['TWIPosition'];
				$C_ARTScore30 = $get['C_ARTScore30'];
				$C_ARTScore70 = $get['C_ARTScore70'];
				$C_ARTPosition = $get['C_ARTPosition'];
				$FREScore30 = $get['FREScore30'];
				$FREScore70 = $get['FREScore70'];
				$FREPosition = $get['FREPosition'];
				$Attendance = $get['Attendance'];
				$Outof = $get['Outof'];
				$Conduct = $get['Conduct'];
				$Attitude = $get['Attitude'];
				$Interest = $get['Interest'];
				$Teacher_Remarks = $get['Teacher_Remarks'];


				$engScore100 = $engScore30 + $engScore70;

				$MATScore100 = $MATScore30 + $MATScore70;

				$SCIScore100 = $SCIScore30 + $SCIScore70;

				$SOCScore100 = $SOCScore30  + $SOCScore70;

				$RMEScore100 = $RMEScore30 + $RMEScore70;

				$ICTScore100 = $ICTScore30 + $ICTScore70;

				$TWIScore100 = $TWIScore30 + $TWIScore70;

				$C_ARTScore100 = $C_ARTScore30 + $C_ARTScore70;

				$FREScore100 = $FREScore30 + $FREScore70;


				if ($engScore100 > 79.9) {
					$enggrade = "A Excellent";
				}elseif ($engScore100 > 69.9 AND $engScore100 < 80) {
					$enggrade = "B Very Good";
				}elseif ($engScore100 > 59.9 AND $engScore100 < 70) {
					$enggrade = "C Good";
				}elseif ($engScore100 > 49.9 AND $engScore100 < 60) {
					$enggrade = "D Weak";
				}elseif ($engScore100 > 34.9 AND $engScore100 < 50) {
					$enggrade = "E Pass";
				}elseif ($engScore100 < 35) {
					$enggrade = "F Fail";
				}

				if ($MATScore100 > 79.9) {
					$MATgrade = "A Excellent";
				}elseif ($MATScore100 > 69.9 AND $MATScore100 < 80) {
					$MATgrade = "B Very Good";
				}elseif ($MATScore100 > 59.9 AND $MATScore100 < 70) {
					$MATgrade = "C Good";
				}elseif ($MATScore100 > 49.9 AND $MATScore100 < 60) {
					$MATgrade = "D Weak";
				}elseif ($MATScore100 > 34.9 AND $MATScore100 < 50) {
					$MATgrade = "E Pass";
				}elseif ($MATScore100 < 35) {
					$MATgrade = "F Fail";
				}

				if ($SCIScore100 > 79.9) {
					$SCIgrade = "A Excellent";
				}elseif ($SCIScore100 > 69.9 AND $SCIScore100 < 80) {
					$SCIgrade = "B Very Good";
				}elseif ($SCIScore100 > 59.9 AND $SCIScore100 < 70) {
					$SCIgrade = "C Good";
				}elseif ($SCIScore100 > 49.9 AND $SCIScore100 < 60) {
					$SCIgrade = "D Weak";
				}elseif ($SCIScore100 > 34.9 AND $SCIScore100 < 50) {
					$SCIgrade = "E Pass";
				}elseif ($SCIScore100 < 35) {
					$SCIgrade = "F Fail";
				}

				if ($SOCScore100 > 79.9) {
					$SOCgrade = "A Excellent";
				}elseif ($SOCScore100 > 69.9 AND $SOCScore100 < 80) {
					$SOCgrade = "B Very Good";
				}elseif ($SOCScore100 > 59.9 AND $SOCScore100 < 70) {
					$SOCgrade = "C Good";
				}elseif ($SOCScore100 > 49.9 AND $SOCScore100 < 60) {
					$SOCgrade = "D Weak";
				}elseif ($SOCScore100 > 34.9 AND $SOCScore100 < 50) {
					$SOCgrade = "E Pass";
				}elseif ($SOCScore100 < 35) {
					$SOCgrade = "F Fail";
				}

				if ($RMEScore100 > 79.9) {
					$RMEgrade = "A Excellent";
				}elseif ($RMEScore100 > 69.9 AND $RMEScore100 < 80) {
					$RMEgrade = "B Very Good";
				}elseif ($RMEScore100 > 59.9 AND $RMEScore100 < 70) {
					$RMEgrade = "C Good";
				}elseif ($RMEScore100 > 49.9 AND $RMEScore100 < 60) {
					$RMEgrade = "D Weak";
				}elseif ($RMEScore100 > 34.9 AND $RMEScore100 < 50) {
					$RMEgrade = "E Pass";
				}elseif ($RMEScore100 < 35) {
					$RMEgrade = "F Fail";
				}

				if ($ICTScore100 > 79.9) {
					$ICTgrade = "A Excellent";
				}elseif ($ICTScore100 > 69.9 AND $ICTScore100 < 80) {
					$ICTgrade = "B Very Good";
				}elseif ($ICTScore100 > 59.9 AND $ICTScore100 < 70) {
					$ICTgrade = "C Good";
				}elseif ($ICTScore100 > 49.9 AND $ICTScore100 < 60) {
					$ICTgrade = "D Weak";
				}elseif ($ICTScore100 > 34.9 AND $ICTScore100 < 50) {
					$ICTgrade = "E Pass";
				}elseif ($ICTScore100 < 35) {
					$ICTgrade = "F Fail";
				}



				if ($TWIScore100 > 79.9) {
					$TWIgrade = "A Excellent";
				}elseif ($TWIScore100 > 69.9 AND $TWIScore100 < 80) {
					$TWIgrade = "B Very Good";
				}elseif ($TWIScore100 > 59.9 AND $TWIScore100 < 70) {
					$TWIgrade = "C Good";
				}elseif ($TWIScore100 > 49.9 AND $TWIScore100 < 60) {
					$TWIgrade = "D Weak";
				}elseif ($TWIScore100 > 34.9 AND $TWIScore100 < 50) {
					$TWIgrade = "E Pass";
				}elseif ($TWIScore100 < 35) {
					$TWIgrade = "F Fail";
				}


				if ($C_ARTScore100 > 79.9) {
					$C_ARTgrade = "A Excellent";
				}elseif ($C_ARTScore100 > 69.9 AND $C_ARTScore100 < 80) {
					$C_ARTgrade = "B Very Good";
				}elseif ($C_ARTScore100 > 59.9 AND $C_ARTScore100 < 70) {
					$C_ARTgrade = "C Good";
				}elseif ($C_ARTScore100 > 49.9 AND $C_ARTScore100 < 60) {
					$C_ARTgrade = "D Weak";
				}elseif ($C_ARTScore100 > 34.9 AND $C_ARTScore100 < 50) {
					$C_ARTgrade = "E Pass";
				}elseif ($C_ARTScore100 < 35) {
					$C_ARTgrade = "F Fail";
				}



				if ($FREScore100 > 79.9) {
					$FREgrade = "A Excellent";
				}elseif ($FREScore100 > 69.9 AND $FREScore100 < 80) {
					$FREgrade = "B Very Good";
				}elseif ($FREScore100 > 59.9 AND $FREScore100 < 70) {
					$FREgrade = "C Good";
				}elseif ($FREScore100 > 49.9 AND $FREScore100 < 60) {
					$FREgrade = "D Weak";
				}elseif ($FREScore100 > 34.9 AND $FREScore100 < 50) {
					$FREgrade = "E Pass";
				}elseif ($FREScore100 < 35) {
					$FREgrade = "F Fail";
				}

		

			echo "<div id=\"content$id\">
			
			
			  <div class=\"report-box\">
			  	<center>
			  		<img src=\"images/header.png\" width=\"100%\"><br>

			  		<span style=\"font-family: Lucida Fax; font-weight: bolder; font-size:20px;\">  
			  			STUDENTS REPORT
			 		</span>
			 	</center>
       <table cellpadding=\"5px\" cellspacing=\"5px\" class=\"head\">
				<tr>
					<td>Name: </td>
					<td>
						$studentName
					</td>&nbsp;&nbsp;
					<td>Term: </td>
					<td>
						$termReport 
					</td>
					<td>Year: </td>
					<td>
						$academic_year
					</td>
				</tr>
				<tr>
						<td>Position: </td>
					<td>
						$Position
					</td>

						<td>Class: </td>
					<td>
						$Class
					</td>

					<td>Roll:</td>
					<td>
						$Roll
					</td>
				</tr>
			</table>
			<div class=\"next\">
					<b>Vacation Date: </b>$Vacation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<b>Reopening Date: </b>$Reopening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<b>Promoted To: </b> $Promoted
						
			</div>
			
				
		<div class=\"fill\">
			<table>
				<tr>
					<th>Subject</th>
					<th>Class Score 30% </th>
					<th>Exams Score 70% </th>
					<th>Total Score 100% </th>
					<th>Subject Position </th>
					<th>Grade Remarks  </th>
				</tr>
				<tr>
					<th>LANGUAGE AND LITERACY</th>
					<td>
						$engScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$engScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$engScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$engPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$enggrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
					<tr>
						<th>NUMERACY</th>
					<td>
						$MATScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
					<tr>
						<th>COLOURING AND SCRIBBLING</th>
					<td>
						$SCIScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
					<tr>
						<th>ENVIRONMENTAL STUDIES</th>
						<td>
							$SOCScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
					</tr>
					<tr>
						<th>R.M.E</th>
						<td>
							$RMEScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
			</tr>
				</tr>
					<tr>
						<th>I.C.T</th>						<td>
							$ICTScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				</tr>
					<tr>
						<th>POEMS</th>
						<td>
							$TWIScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				</tr>
				<tr>
					<th>CREATIVE ART</th>
						<td>
							$C_ARTScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				
					<tr>
						<th>WRITING</th>
						<td>
							$FREScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				</tr>
			</table>
		</div>
		<table class=\"foot\">
			<tr>
				<td>
					Attendance:
				</td>
				<td>
					$Attendance
				</td>
				<td>
					Out of:
				</td>
				<td>
					$Outof
				</td>
			</tr>
		</table>
		<table class=\"foot\">
			<tr>
				<td>
					Conduct:
				</td>
				<td>
					$Conduct
				</td>
			</tr>
			<tr>
				<td>
					Attitude:
				</td>
				<td>
					$Attitude
				</td>
			</tr>
			<tr>
				<td>
					Interest:
				</td>
				<td>
					$Interest
				</td>
			</tr>
			<tr>
				<td>
					Teacher's<br> Remarks:
				</td>
				<td>
					$Teacher_Remarks
				</td>
			</tr>
			<tr></tr><tr></tr>
		</table>
    </div>

			</div>
			<div id=\"editor$id\"></div>


				<button onclick=\"printDiv(content$id)\" class=\"preint_rcpt\" id=\"cd$id\">Print</button>
				<button onclick=\"location.replace('home.php?utab=reportsEditIDno$id');\" class=\"preint_rcpt\" id=\"cd$id\">Edit</button>			
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
		echo "Class has no report in database";
	}
	 	}











}elseif (strpos($intab, "reportsExiststudentAdmino") !== false) {

		echo "

			<form action=\"#\" method=\"post\" style=\"margin-left: 20px;\">

			<select title=\"Select Term\" class=\"terms\" name=\"term\" style=\"width: 100px;\">
							<option value=\"Term 1\">Term 1</option>
							<option value=\"Term 2\">Term 2</option>
							<option value=\"Term 3\">Term 3</option>
						</select>

						<select title=\"Select Class\" class=\"terms\" name=\"class\" style=\"width: 100px;\">
							<option value=\"Creche\">Creche</option>
							<option value=\"Nursery 1\">Nursery 1</option>
							<option value=\"Nursery 2\">Nursery 2</option>
							
							<option value=\"KG 1\">KG 1</option>
							<option value=\"KG 2\">KG 2</option>
						
							<option value=\"Grade 1\">Grade 1</option>
							<option value=\"Grade 2\">Grade 2</option>
						</select>

			<input type=\"submit\" class=\"terms\" name=\"searchRep\" value=\"Search\">
		
			</form>	";
	

	 	if (isset($_POST['searchRep'])) {

					$term = $_POST['term'];
					$class = $_POST['class'];

	 		
	 		$qq = mysql_query("SELECT * FROM studentsReports WHERE class = '$class' AND termReport='$term' AND admissionNumber = '$AdmitionNumberExist'");
	 		if (mysql_numrows($qq)!==0) {

		while ($get = mysql_fetch_assoc($qq)) {

				$id = $get['id'];


				$admissionNumber = $get['admissionNumber'];

			$qqname= mysql_query("SELECT * FROM students WHERE admissionNumber='$admissionNumber'");
				$ff = mysql_fetch_assoc($qqname);
				$first_name = $ff['first_name'];
				$middle_name = $ff['middle_name'];
				$last_name = $ff['last_name'];
				$studentName = "$first_name $middle_name $last_name";


				$termReport = $get['termReport'];
				$academic_year = $get['academic_year'];
				$Position = $get['Position'];
				$Class = $get['Class'];
				$Roll = $get['Roll'];
				$Vacation = $get['Vacation'];
				$Reopening = $get['Reopening'];
				$Promoted = $get['Promoted'];
				$engScore30 = $get['engScore30'];
				$engScore70 = $get['engScore70'];
				$engPosition = $get['engPosition'];
				$MATScore30 = $get['MATScore30'];
				$MATScore70 = $get['MATScore70'];
				$MATPosition = $get['MATPosition'];
				$SCIScore30 = $get['SCIScore30'];
				$SCIScore70 = $get['SCIScore70'];
				$SCIPosition = $get['SCIPosition'];
				$SOCScore30 = $get['SOCScore30'];
				$SOCScore70 = $get['SOCScore70'];
				$SOCPosition = $get['SOCPosition'];
				$RMEScore30 = $get['RMEScore30'];
				$RMEScore70 = $get['RMEScore70'];
				$RMEPosition = $get['RMEPosition'];
				$ICTScore30 = $get['ICTScore30'];
				$ICTScore70 = $get['ICTScore70'];
				$ICTPosition = $get['ICTPosition'];
				$TWIScore30 = $get['TWIScore30'];
				$TWIScore70 = $get['TWIScore70'];
				$TWIPosition = $get['TWIPosition'];
				$C_ARTScore30 = $get['C_ARTScore30'];
				$C_ARTScore70 = $get['C_ARTScore70'];
				$C_ARTPosition = $get['C_ARTPosition'];
				$FREScore30 = $get['FREScore30'];
				$FREScore70 = $get['FREScore70'];
				$FREPosition = $get['FREPosition'];
				$Attendance = $get['Attendance'];
				$Outof = $get['Outof'];
				$Conduct = $get['Conduct'];
				$Attitude = $get['Attitude'];
				$Interest = $get['Interest'];
				$Teacher_Remarks = $get['Teacher_Remarks'];


				$engScore100 = $engScore30 + $engScore70;

				$MATScore100 = $MATScore30 + $MATScore70;

				$SCIScore100 = $SCIScore30 + $SCIScore70;

				$SOCScore100 = $SOCScore30  + $SOCScore70;

				$RMEScore100 = $RMEScore30 + $RMEScore70;

				$ICTScore100 = $ICTScore30 + $ICTScore70;

				$TWIScore100 = $TWIScore30 + $TWIScore70;

				$C_ARTScore100 = $C_ARTScore30 + $C_ARTScore70;

				$FREScore100 = $FREScore30 + $FREScore70;


				if ($engScore100 > 79.9) {
					$enggrade = "A Excellent";
				}elseif ($engScore100 > 69.9 AND $engScore100 < 80) {
					$enggrade = "B Very Good";
				}elseif ($engScore100 > 59.9 AND $engScore100 < 70) {
					$enggrade = "C Good";
				}elseif ($engScore100 > 49.9 AND $engScore100 < 60) {
					$enggrade = "D Weak";
				}elseif ($engScore100 > 34.9 AND $engScore100 < 50) {
					$enggrade = "E Pass";
				}elseif ($engScore100 < 35) {
					$enggrade = "F Fail";
				}

				if ($MATScore100 > 79.9) {
					$MATgrade = "A Excellent";
				}elseif ($MATScore100 > 69.9 AND $MATScore100 < 80) {
					$MATgrade = "B Very Good";
				}elseif ($MATScore100 > 59.9 AND $MATScore100 < 70) {
					$MATgrade = "C Good";
				}elseif ($MATScore100 > 49.9 AND $MATScore100 < 60) {
					$MATgrade = "D Weak";
				}elseif ($MATScore100 > 34.9 AND $MATScore100 < 50) {
					$MATgrade = "E Pass";
				}elseif ($MATScore100 < 35) {
					$MATgrade = "F Fail";
				}

				if ($SCIScore100 > 79.9) {
					$SCIgrade = "A Excellent";
				}elseif ($SCIScore100 > 69.9 AND $SCIScore100 < 80) {
					$SCIgrade = "B Very Good";
				}elseif ($SCIScore100 > 59.9 AND $SCIScore100 < 70) {
					$SCIgrade = "C Good";
				}elseif ($SCIScore100 > 49.9 AND $SCIScore100 < 60) {
					$SCIgrade = "D Weak";
				}elseif ($SCIScore100 > 34.9 AND $SCIScore100 < 50) {
					$SCIgrade = "E Pass";
				}elseif ($SCIScore100 < 35) {
					$SCIgrade = "F Fail";
				}

				if ($SOCScore100 > 79.9) {
					$SOCgrade = "A Excellent";
				}elseif ($SOCScore100 > 69.9 AND $SOCScore100 < 80) {
					$SOCgrade = "B Very Good";
				}elseif ($SOCScore100 > 59.9 AND $SOCScore100 < 70) {
					$SOCgrade = "C Good";
				}elseif ($SOCScore100 > 49.9 AND $SOCScore100 < 60) {
					$SOCgrade = "D Weak";
				}elseif ($SOCScore100 > 34.9 AND $SOCScore100 < 50) {
					$SOCgrade = "E Pass";
				}elseif ($SOCScore100 < 35) {
					$SOCgrade = "F Fail";
				}

				if ($RMEScore100 > 79.9) {
					$RMEgrade = "A Excellent";
				}elseif ($RMEScore100 > 69.9 AND $RMEScore100 < 80) {
					$RMEgrade = "B Very Good";
				}elseif ($RMEScore100 > 59.9 AND $RMEScore100 < 70) {
					$RMEgrade = "C Good";
				}elseif ($RMEScore100 > 49.9 AND $RMEScore100 < 60) {
					$RMEgrade = "D Weak";
				}elseif ($RMEScore100 > 34.9 AND $RMEScore100 < 50) {
					$RMEgrade = "E Pass";
				}elseif ($RMEScore100 < 35) {
					$RMEgrade = "F Fail";
				}

				if ($ICTScore100 > 79.9) {
					$ICTgrade = "A Excellent";
				}elseif ($ICTScore100 > 69.9 AND $ICTScore100 < 80) {
					$ICTgrade = "B Very Good";
				}elseif ($ICTScore100 > 59.9 AND $ICTScore100 < 70) {
					$ICTgrade = "C Good";
				}elseif ($ICTScore100 > 49.9 AND $ICTScore100 < 60) {
					$ICTgrade = "D Weak";
				}elseif ($ICTScore100 > 34.9 AND $ICTScore100 < 50) {
					$ICTgrade = "E Pass";
				}elseif ($ICTScore100 < 35) {
					$ICTgrade = "F Fail";
				}



				if ($TWIScore100 > 79.9) {
					$TWIgrade = "A Excellent";
				}elseif ($TWIScore100 > 69.9 AND $TWIScore100 < 80) {
					$TWIgrade = "B Very Good";
				}elseif ($TWIScore100 > 59.9 AND $TWIScore100 < 70) {
					$TWIgrade = "C Good";
				}elseif ($TWIScore100 > 49.9 AND $TWIScore100 < 60) {
					$TWIgrade = "D Weak";
				}elseif ($TWIScore100 > 34.9 AND $TWIScore100 < 50) {
					$TWIgrade = "E Pass";
				}elseif ($TWIScore100 < 35) {
					$TWIgrade = "F Fail";
				}


				if ($C_ARTScore100 > 79.9) {
					$C_ARTgrade = "A Excellent";
				}elseif ($C_ARTScore100 > 69.9 AND $C_ARTScore100 < 80) {
					$C_ARTgrade = "B Very Good";
				}elseif ($C_ARTScore100 > 59.9 AND $C_ARTScore100 < 70) {
					$C_ARTgrade = "C Good";
				}elseif ($C_ARTScore100 > 49.9 AND $C_ARTScore100 < 60) {
					$C_ARTgrade = "D Weak";
				}elseif ($C_ARTScore100 > 34.9 AND $C_ARTScore100 < 50) {
					$C_ARTgrade = "E Pass";
				}elseif ($C_ARTScore100 < 35) {
					$C_ARTgrade = "F Fail";
				}



				if ($FREScore100 > 79.9) {
					$FREgrade = "A Excellent";
				}elseif ($FREScore100 > 69.9 AND $FREScore100 < 80) {
					$FREgrade = "B Very Good";
				}elseif ($FREScore100 > 59.9 AND $FREScore100 < 70) {
					$FREgrade = "C Good";
				}elseif ($FREScore100 > 49.9 AND $FREScore100 < 60) {
					$FREgrade = "D Weak";
				}elseif ($FREScore100 > 34.9 AND $FREScore100 < 50) {
					$FREgrade = "E Pass";
				}elseif ($FREScore100 < 35) {
					$FREgrade = "F Fail";
				}

		

			echo "<div id=\"content$id\">
			
			
			  <div class=\"report-box\">
			  	<center>
			  		<img src=\"images/header.png\" width=\"100%\"><br>

			  		<span style=\"font-family: Lucida Fax; font-weight: bolder; font-size:20px;\">  
			  			STUDENTS REPORT
			 		</span>
			 	</center>
       <table cellpadding=\"5px\" cellspacing=\"5px\" class=\"head\">
				<tr>
					<td>Name: </td>
					<td>
						$studentName
					</td>&nbsp;&nbsp;
					<td>Term: </td>
					<td>
						$termReport 
					</td>
					<td>Year: </td>
					<td>
						$academic_year
					</td>
				</tr>
				<tr>
						<td>Position: </td>
					<td>
						$Position
					</td>

						<td>Class: </td>
					<td>
						$Class
					</td>

					<td>Roll:</td>
					<td>
						$Roll
					</td>
				</tr>
			</table>
			<div class=\"next\">
					<b>Vacation Date: </b>$Vacation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<b>Reopening Date: </b>$Reopening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<b>Promoted To: </b> $Promoted
						
			</div>
			
				
		<div class=\"fill\">
			<table>
				<tr>
					<th>Subject</th>
					<th>Class Score 30% </th>
					<th>Exams Score 70% </th>
					<th>Total Score 100% </th>
					<th>Subject Position </th>
					<th>Grade Remarks  </th>
				</tr>
				<tr>
					<th>LANGUAGE AND LITERACY</th>
					<td>
						$engScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$engScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$engScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$engPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$enggrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
					<tr>
						<th>NUMERACY</th>
					<td>
						$MATScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$MATgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
					<tr>
						<th>COLOURING AND SCRIBBLING</th>
					<td>
						$SCIScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						$SCIgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
					<tr>
						<th>ENVIRONMENTAL STUDIES</th>
						<td>
							$SOCScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$SOCgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
					</tr>
					<tr>
						<th>R.M.E</th>
						<td>
							$RMEScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$RMEgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
			</tr>
				</tr>
					<tr>
						<th>I.C.T</th>						<td>
							$ICTScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$ICTgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				</tr>
					<tr>
						<th>POEMS</th>
						<td>
							$TWIScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$TWIgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				</tr>
				<tr>
					<th>CREATIVE ART</th>
						<td>
							$C_ARTScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$C_ARTgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				
					<tr>
						<th>WRITING</th>
						<td>
							$FREScore30 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREScore70 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREScore100 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREPosition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							$FREgrade &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
				</tr>
			</table>
		</div>
		<table>
			<tr>
				<td>
					Attendance:
				</td>
				<td>
					$Attendance
				</td>
				<td>
					Out of:
				</td>
				<td>
					$Outof
				</td>
			</tr>
		</table><br /><br />
		<table>
			<tr>
				<td>
					Conduct:
				</td>
				<td>
					$Conduct
				</td>
			</tr>
			<tr>
				<td>
					Attitude:
				</td>
				<td>
					$Attitude
				</td>
			</tr>
			<tr>
				<td>
					Interest:
				</td>
				<td>
					$Interest
				</td>
			</tr>
			<tr>
				<td>
					Teacher's<br> Remarks:
				</td>
				<td>
					$Teacher_Remarks
				</td>
			</tr>
			<tr></tr><tr></tr>
		</table>
    </div>

			</div>
			<div id=\"editor$id\"></div>


				<button onclick=\"printDiv(content$id)\" class=\"preint_rcpt\" id=\"cd$id\">Print</button>
				<button onclick=\"location.replace('home.php?utab=reportsEditIDno$id');\" class=\"preint_rcpt\" id=\"cd$id\">Edit</button>			
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
		echo "Student has no report in database";
	}
	 	}else {
	 		$qq = mysql_query("SELECT * FROM studentsReports WHERE admissionNumber = '$AdmitionNumberExist'");

	if (mysql_numrows($qq)!==0) {

		while ($get = mysql_fetch_assoc($qq)) {

				$id = $get['id'];
				$admissionNumber = $get['admissionNumber'];

			$qqname= mysql_query("SELECT * FROM students WHERE admissionNumber='$admissionNumber'");
				$ff = mysql_fetch_assoc($qqname);
				$first_name = $ff['first_name'];
				$middle_name = $ff['middle_name'];
				$last_name = $ff['last_name'];
				$studentName = "$first_name $middle_name $last_name";


				$termReport = $get['termReport'];
				$academic_year = $get['academic_year'];
				$Position = $get['Position'];
				$Class = $get['Class'];
				$Roll = $get['Roll'];
				$Vacation = $get['Vacation'];
				$Reopening = $get['Reopening'];
				$Promoted = $get['Promoted'];
				$engScore30 = $get['engScore30'];
				$engScore70 = $get['engScore70'];
				$engPosition = $get['engPosition'];
				$MATScore30 = $get['MATScore30'];
				$MATScore70 = $get['MATScore70'];
				$MATPosition = $get['MATPosition'];
				$SCIScore30 = $get['SCIScore30'];
				$SCIScore70 = $get['SCIScore70'];
				$SCIPosition = $get['SCIPosition'];
				$SOCScore30 = $get['SOCScore30'];
				$SOCScore70 = $get['SOCScore70'];
				$SOCPosition = $get['SOCPosition'];
				$RMEScore30 = $get['RMEScore30'];
				$RMEScore70 = $get['RMEScore70'];
				$RMEPosition = $get['RMEPosition'];
				$ICTScore30 = $get['ICTScore30'];
				$ICTScore70 = $get['ICTScore70'];
				$ICTPosition = $get['ICTPosition'];
				$TWIScore30 = $get['TWIScore30'];
				$TWIScore70 = $get['TWIScore70'];
				$TWIPosition = $get['TWIPosition'];
				$C_ARTScore30 = $get['C_ARTScore30'];
				$C_ARTScore70 = $get['C_ARTScore70'];
				$C_ARTPosition = $get['C_ARTPosition'];
				$FREScore30 = $get['FREScore30'];
				$FREScore70 = $get['FREScore70'];
				$FREPosition = $get['FREPosition'];
				$Attendance = $get['Attendance'];
				$Outof = $get['Outof'];
				$Conduct = $get['Conduct'];
				$Attitude = $get['Attitude'];
				$Interest = $get['Interest'];
				$Teacher_Remarks = $get['Teacher_Remarks'];


				$engScore100 = $engScore30 + $engScore70;

				$MATScore100 = $MATScore30 + $MATScore70;

				$SCIScore100 = $SCIScore30 + $SCIScore70;

				$SOCScore100 = $SOCScore30  + $SOCScore70;

				$RMEScore100 = $RMEScore30 + $RMEScore70;

				$ICTScore100 = $ICTScore30 + $ICTScore70;

				$TWIScore100 = $TWIScore30 + $TWIScore70;

				$C_ARTScore100 = $C_ARTScore30 + $C_ARTScore70;

				$FREScore100 = $FREScore30 + $FREScore70;


				if ($engScore100 > 79.9) {
					$enggrade = "A Excellent";
				}elseif ($engScore100 > 69.9 AND $engScore100 < 80) {
					$enggrade = "B Very Good";
				}elseif ($engScore100 > 59.9 AND $engScore100 < 70) {
					$enggrade = "C Good";
				}elseif ($engScore100 > 49.9 AND $engScore100 < 60) {
					$enggrade = "D Weak";
				}elseif ($engScore100 > 34.9 AND $engScore100 < 50) {
					$enggrade = "E Pass";
				}elseif ($engScore100 < 35) {
					$enggrade = "F Fail";
				}

				if ($MATScore100 > 79.9) {
					$MATgrade = "A Excellent";
				}elseif ($MATScore100 > 69.9 AND $MATScore100 < 80) {
					$MATgrade = "B Very Good";
				}elseif ($MATScore100 > 59.9 AND $MATScore100 < 70) {
					$MATgrade = "C Good";
				}elseif ($MATScore100 > 49.9 AND $MATScore100 < 60) {
					$MATgrade = "D Weak";
				}elseif ($MATScore100 > 34.9 AND $MATScore100 < 50) {
					$MATgrade = "E Pass";
				}elseif ($MATScore100 < 35) {
					$MATgrade = "F Fail";
				}

				if ($SCIScore100 > 79.9) {
					$SCIgrade = "A Excellent";
				}elseif ($SCIScore100 > 69.9 AND $SCIScore100 < 80) {
					$SCIgrade = "B Very Good";
				}elseif ($SCIScore100 > 59.9 AND $SCIScore100 < 70) {
					$SCIgrade = "C Good";
				}elseif ($SCIScore100 > 49.9 AND $SCIScore100 < 60) {
					$SCIgrade = "D Weak";
				}elseif ($SCIScore100 > 34.9 AND $SCIScore100 < 50) {
					$SCIgrade = "E Pass";
				}elseif ($SCIScore100 < 35) {
					$SCIgrade = "F Fail";
				}

				if ($SOCScore100 > 79.9) {
					$SOCgrade = "A Excellent";
				}elseif ($SOCScore100 > 69.9 AND $SOCScore100 < 80) {
					$SOCgrade = "B Very Good";
				}elseif ($SOCScore100 > 59.9 AND $SOCScore100 < 70) {
					$SOCgrade = "C Good";
				}elseif ($SOCScore100 > 49.9 AND $SOCScore100 < 60) {
					$SOCgrade = "D Weak";
				}elseif ($SOCScore100 > 34.9 AND $SOCScore100 < 50) {
					$SOCgrade = "E Pass";
				}elseif ($SOCScore100 < 35) {
					$SOCgrade = "F Fail";
				}

				if ($RMEScore100 > 79.9) {
					$RMEgrade = "A Excellent";
				}elseif ($RMEScore100 > 69.9 AND $RMEScore100 < 80) {
					$RMEgrade = "B Very Good";
				}elseif ($RMEScore100 > 59.9 AND $RMEScore100 < 70) {
					$RMEgrade = "C Good";
				}elseif ($RMEScore100 > 49.9 AND $RMEScore100 < 60) {
					$RMEgrade = "D Weak";
				}elseif ($RMEScore100 > 34.9 AND $RMEScore100 < 50) {
					$RMEgrade = "E Pass";
				}elseif ($RMEScore100 < 35) {
					$RMEgrade = "F Fail";
				}

				if ($ICTScore100 > 79.9) {
					$ICTgrade = "A Excellent";
				}elseif ($ICTScore100 > 69.9 AND $ICTScore100 < 80) {
					$ICTgrade = "B Very Good";
				}elseif ($ICTScore100 > 59.9 AND $ICTScore100 < 70) {
					$ICTgrade = "C Good";
				}elseif ($ICTScore100 > 49.9 AND $ICTScore100 < 60) {
					$ICTgrade = "D Weak";
				}elseif ($ICTScore100 > 34.9 AND $ICTScore100 < 50) {
					$ICTgrade = "E Pass";
				}elseif ($ICTScore100 < 35) {
					$ICTgrade = "F Fail";
				}



				if ($TWIScore100 > 79.9) {
					$TWIgrade = "A Excellent";
				}elseif ($TWIScore100 > 69.9 AND $TWIScore100 < 80) {
					$TWIgrade = "B Very Good";
				}elseif ($TWIScore100 > 59.9 AND $TWIScore100 < 70) {
					$TWIgrade = "C Good";
				}elseif ($TWIScore100 > 49.9 AND $TWIScore100 < 60) {
					$TWIgrade = "D Weak";
				}elseif ($TWIScore100 > 34.9 AND $TWIScore100 < 50) {
					$TWIgrade = "E Pass";
				}elseif ($TWIScore100 < 35) {
					$TWIgrade = "F Fail";
				}


				if ($C_ARTScore100 > 79.9) {
					$C_ARTgrade = "A Excellent";
				}elseif ($C_ARTScore100 > 69.9 AND $C_ARTScore100 < 80) {
					$C_ARTgrade = "B Very Good";
				}elseif ($C_ARTScore100 > 59.9 AND $C_ARTScore100 < 70) {
					$C_ARTgrade = "C Good";
				}elseif ($C_ARTScore100 > 49.9 AND $C_ARTScore100 < 60) {
					$C_ARTgrade = "D Weak";
				}elseif ($C_ARTScore100 > 34.9 AND $C_ARTScore100 < 50) {
					$C_ARTgrade = "E Pass";
				}elseif ($C_ARTScore100 < 35) {
					$C_ARTgrade = "F Fail";
				}



				if ($FREScore100 > 79.9) {
					$FREgrade = "A Excellent";
				}elseif ($FREScore100 > 69.9 AND $FREScore100 < 80) {
					$FREgrade = "B Very Good";
				}elseif ($FREScore100 > 59.9 AND $FREScore100 < 70) {
					$FREgrade = "C Good";
				}elseif ($FREScore100 > 49.9 AND $FREScore100 < 60) {
					$FREgrade = "D Weak";
				}elseif ($FREScore100 > 34.9 AND $FREScore100 < 50) {
					$FREgrade = "E Pass";
				}elseif ($FREScore100 < 35) {
					$FREgrade = "F Fail";
				}

		

			echo "<div id=\"content$id\">
			
			
			  <div class=\"report-box\">
			  	<center>
			  		<img src=\"images/header.png\" width=\"100%\"><br>

			  		<span style=\"font-family: Lucida Fax; font-weight: bolder; font-size:20px;\">  
			  			STUDENTS REPORT
			 		</span>
			 	</center>
       <table cellpadding=\"5px\" cellspacing=\"5px\" class=\"head\">
				<tr>
					<td>Name: </td>
					<td>
						$studentName
					</td>&nbsp;&nbsp;
					<td>Term: </td>
					<td>
						$termReport 
					</td>
					<td>Year: </td>
					<td>
						$academic_year
					</td>
				</tr>
				<tr>
						<td>Position: </td>
					<td>
						$Position
					</td>

						<td>Class: </td>
					<td>
						$Class
					</td>

					<td>Roll:</td>
					<td>
						$Roll
					</td>
				</tr>
			</table>
			<div class=\"next\">
					<b>Vacation Date: </b>$Vacation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<b>Reopening Date: </b>$Reopening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<b>Promoted To: </b> $Promoted
						
			</div>
			
				
		<div class=\"fill\">
			<table>
				<tr>
					<th>Subject</th>
					<th>Class Score 30% </th>
					<th>Exams Score 70% </th>
					<th>Total Score 100% </th>
					<th>Subject Position </th>
					<th>Grade Remarks  </th>
				</tr>
				<tr>
					<th>LANGUAGE AND LITERACY</th>
					<td>
						$engScore30 
					</td>
					<td>
						$engScore70 
					</td>
					<td>
						$engScore100 
					</td>
					<td>
						$engPosition 
					</td>
					<td>
						$enggrade 
					</td>
				</tr>
					<tr>
						<th>NUMERACY</th>
					<td>
						$MATScore30 
					</td>
					<td>
						$MATScore70 
					</td>
					<td>
						$MATScore100 
					</td>
					<td>
						$MATPosition 
					</td>
					<td>
						$MATgrade 
					</td>
				</tr>
					<tr>
						<th>COLOURING AND SCRIBBLING</th>
					<td>
						$SCIScore30 
					</td>
					<td>
						$SCIScore70 
					</td>
					<td>
						$SCIScore100 
					</td>
					<td>
						$SCIPosition 
					</td>
					<td>
						$SCIgrade 
					</td>
				</tr>
					<tr>
						<th>ENVIRONMENTAL STUDIES</th>
						<td>
							$SOCScore30 
						</td>
						<td>
							$SOCScore70 
						</td>
						<td>
							$SOCScore100 
						</td>
						<td>
							$SOCPosition 
						</td>
						<td>
							$SOCgrade 
						</td>
					</tr>
					<tr>
						<th>R.M.E</th>
						<td>
							$RMEScore30 
						</td>
						<td>
							$RMEScore70 
						</td>
						<td>
							$RMEScore100 
						</td>
						<td>
							$RMEPosition 
						</td>
						<td>
							$RMEgrade 
						</td>
			</tr>
				</tr>
					<tr>
						<th>I.C.T</th>						<td>
							$ICTScore30 
						</td>
						<td>
							$ICTScore70 
						</td>
						<td>
							$ICTScore100 
						</td>
						<td>
							$ICTPosition 
						</td>
						<td>
							$ICTgrade 
						</td>
				</tr>
					<tr>
						<th>POEMS</th>
						<td>
							$TWIScore30 
						</td>
						<td>
							$TWIScore70 
						</td>
						<td>
							$TWIScore100 
						</td>
						<td>
							$TWIPosition 
						</td>
						<td>
							$TWIgrade 
						</td>
				</tr>
				<tr>
					<th>CREATIVE ART</th>
						<td>
							$C_ARTScore30 
						</td>
						<td>
							$C_ARTScore70 
						</td>
						<td>
							$C_ARTScore100 
						</td>
						<td>
							$C_ARTPosition 
						</td>
						<td>
							$C_ARTgrade 
						</td>
				
					<tr>
						<th>WRITING</th>
						<td>
							$FREScore30 
						</td>
						<td>
							$FREScore70 
						</td>
						<td>
							$FREScore100 
						</td>
						<td>
							$FREPosition 
						</td>
						<td>
							$FREgrade 
						</td>
				</tr>
			</table>
		</div>
		<table>
			<tr>
				<td>
					Attendance:
				</td>
				<td>
					$Attendance
				</td>
				<td>
					Out of:
				</td>
				<td>
					$Outof
				</td>
			</tr>
		</table>
		<table style=\"width: 98%; font-family: Times New Roman; b font-size: 20px;\">
			<tr>
				<td>
					Conduct:
				</td>
				<td>
					$Conduct
				</td>
			</tr>
			<tr>
				<td>
					Attitude:
				</td>
				<td>
					$Attitude
				</td>
			</tr>
			<tr>
				<td>
					Interest:
				</td>
				<td>
					$Interest
				</td>
			</tr>
			<tr>
				<td>
					Teacher's<br> Remarks:
				</td>
				<td>
					$Teacher_Remarks
				</td>
			</tr>
			<tr></tr><tr></tr>
		</table>
    </div>

			</div>
			<div id=\"editor$id\"></div>


				<button onclick=\"printDiv(content$id)\" class=\"preint_rcpt\" id=\"cd$id\">Print</button>
				<button onclick=\"location.replace('home.php?utab=reportsEditIDno$id');\" class=\"preint_rcpt\" id=\"cd$id\">Edit</button>			
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
		echo "Student has no report in database";
	}
	 	}






}elseif ($intab=="reportsdone") {
	echo "<center>
	<div id=\"big\">
		<div id=\"bill_all\">

			<form action=\"#\" method=\"post\">

			<div style=\"margin-top: 18%; margin-bottom: 18%;\">
				<span style=\"font-size: 22spx; font-family: Lucida Calligraphy; font-weight:bolder;\">
					Report Added
				</span>
					<br /><br />
				<span style=\"font-size: 40px; font-weight:bold; color: #fff; text-shadow: -2px 1.8px #000; \">
					Successfully!
				</span>
			</div>
				<a href=\"#\" onclick='javascript:window.history.go(-2)'>
					<img src=\"images/backarror.png\" height=\"25%\" width=\"33%\" />
				</a>
		</form>
		</div>
	</div>
</center>
";
}elseif ($intab=="reportsstudentAdmino$Admino") {

$query = mysql_query("SELECT * FROM students WHERE admissionNumber='$Admino'");
	$get = mysql_fetch_assoc($query);
	$first_name = $get['first_name'];
	$middle_name =$get['middle_name'];
	$last_name = $get['middle_name'];
	$class = $get['class'];


	$admiINFO = mysql_query("SELECT * FROM admin_center  WHERE id='1'");
	 $reap = mysql_fetch_assoc($admiINFO);
		$academic_year=$reap['accademic_year'];
		$term = $reap['term'];
	 	$vacation_date = $reap['vacation_date'];
	 	$reopening_date = $reap['reopening_date'];

	 	
	 	$find_class= mysql_query("SELECT * FROM students WHERE class='$class'");
	 	$noRows= mysql_num_rows($find_class);


echo"	<div id=\"info\">

			<form action=\"#\" method=\"post\">

			<table cellpadding=\"5px\" cellspacing=\"5px\">
				<tr>
					<td>Name</td>
					<td>
						<input type=\"text\" value=\"$first_name $middle_name $last_name\" placeholder=\"Student's Name\" class=\"inputs\" title=\"Student's Name\" style=\"width: 270px; margin-right: 30px;\" name=\"studentName\"  />
					</td>
					<td>Term</td>
					<td>
						<select title=\"Select Term\" class=\"terms\" name=\"termReport\" style=\"width: 150px; margin-right: 30px;\">
							<option value=\"Term 1\">Term 1</option>
							<option value=\"Term 2\">Term 2</option>
							<option value=\"Term 3\">Term 3</option>
						</select>
					</td>
					<td>Year</td>
					<td>
						<input type=\"text\" value=\"$academic_year\" placeholder=\"Student's Name\" class=\"inputs\" title=\"Accademic Year\" name=\"academic_year\" style=\"width: 150px; margin-right: 30px;\"  />
					</td>
				</tr>
				<tr>
						<td>Position</td>
					<td>
						<input type=\"text\" name=\"Position\" placeholder=\"Position\" class=\"inputs\" title=\"Position In Class\" />
					</td>

						<td>Class</td>
					<td>
						<input type=\"text\" value=\"$class\" placeholder=\"Class\" class=\"inputs\" title=\"Class\" style=\"width: 150px;\" name=\"Class\"  />
					</td>

					<td>Roll:</td>
					<td>
						<input type=\"text\" value=\"$noRows\" placeholder=\"No. On Roll\" class=\"inputs\" title=\"No. On Roll\" style=\"width: 150px;\" name=\"Roll\"   />
					</td>
				</tr>
			</table>
			<div class=\"next\">
					<b>Vacation Date:</b><input type=\"date\" name=\"Vacation\" value=\"$vacation_date\" title=\"School Vacate On\"  />
					<b>Reopening Date:</b><input type=\"date\" name=\"Reopening\" value=\"$reopening_date\" name=\"\" title=\"School Vacate On\" />
					
					<b>Promoted To</b>
						<select title=\"Class\" class=\"terms\" name=\"Promoted\" style=\"width: 100px;\">
							<option value=\"Creche\">Creche</option>
							<option value=\"Nursery 1\">Nursery 1</option>
							<option value=\"Nursery 2\">Nursery 2</option>
							
							<option value=\"KG 1\">KG 1</option>
							<option value=\"KG 2\">KG 2</option>
						
							<option value=\"Grade 1\">Grade 1</option>
							<option value=\"Grade 2\">Grade 2</option>
						</select>	
			</div>
			



		<div class=\"fill\">
			<table border=\"1px\" cellpadding=\"10px\" cellspacing=\"10px\" width=\"100%\">
				<tr>
					<td>Subject</td>
					<td>Class Score 30%</td>
					<td>Exams Score 70%</td>
					<td>Subject Position</td>
				</tr>
				<tr>
					<td>LANGUAGE AND LITERACY</td>
					<td>
						<input type=\"text\" name=\"engScore30\" />
					</td>
					<td>
						<input type=\"text\" name=\"engScore70\" />
					</td>
					<td>
						<input type=\"text\" name=\"engPosition\" />
					</td>
				</tr>
					<tr>
						<td>NUMERACY</td>
						<td>
							<input type=\"text\" name=\"MATScore30\" />
						</td>
						<td>
							<input type=\"text\" name=\"MATScore70\" />
						</td>
						<td>
							<input type=\"text\" name=\"MATPosition\" />
						</td>
					
				</tr>
					<tr>
						<td>COLOURING AND SCRIBBLING</td>
						<td>
							<input type=\"text\" name=\"SCIScore30\" />
						</td>
						<td>
							<input type=\"text\" name=\"SCIScore70\" />
						</td>
						<td>
							<input type=\"text\" name=\"SCIPosition\" />
						</td>
					
					<tr>
						<td>ENVIRONMENTAL STUDIES</td>
						<td>
							<input type=\"text\" name=\"SOCScore30\" />
						</td>
						<td>
							<input type=\"text\" name=\"SOCScore70\" />
						</td>
						<td>
							<input type=\"text\" name=\"SOCPosition\" />
						</td>
						
					</tr>
					<tr>
						<td>R.M.E</td>
						<td>
							<input type=\"text\" name=\"RMEScore30\" />
						</td>
						<td>
							<input type=\"text\" name=\"RMEScore70\" />
						</td>
						<td>
							<input type=\"text\" name=\"RMEPosition\" />
						</td>
					
				</tr>
					<tr>
						<td>I.C.T</td>						<td>
							<input type=\"text\" name=\"ICTScore30\" />
						</td>
						<td>
							<input type=\"text\" name=\"ICTScore70\" />
						</td>
						<td>
							<input type=\"text\" name=\"ICTPosition\" />
						</td>
						
				</tr>
					<tr>
						<td>POEMS</td>
						<td>
							<input type=\"text\" name=\"TWIScore30\" />
						</td>
						<td>
							<input type=\"text\" name=\"TWIScore70\" />
						</td>
						<td>
							<input type=\"text\" name=\"TWIPosition\" />
						</td>
						
				</tr>
				<tr>
					<td>CREATIVE ART</td>
						<td>
							<input type=\"text\" name=\"C_ARTScore30\" />
						</td>
						<td>
							<input type=\"text\" name=\"C_ARTScore70\" />
						</td>
						<td>
							<input type=\"text\" name=\"C_ARTPosition\" />
						</td>
			
					<tr>
						<td>WRITING</td>
						<td>
							<input type=\"text\" name=\"FREScore30\" />
						</td>
						<td>
							<input type=\"text\" name=\"FREScore70\" />
						</td>
						<td>
							<input type=\"text\" name=\"FREPosition\" />
						</td>
						
				</tr>
			</table>
		</div>
		<table style=\"width: 100%;\">
			<tr >
				<td>
					Attendance:
				</td>
				<td>
					<input type=\"text\" name=\"Attendance\" style=\"width: 60%;\" />
				</td>
				<td>
					Out of:
				</td>
				<td>
					<input type=\"text\" name=\"Outof\" style=\"width: 60%;\" />
				</td>
			</tr>
		</table>
		<table style=\"width: 100%;\">
			<tr>
				<td>
					Conduct:
				</td>
				<td>
					<input type=\"text\" name=\"Conduct\" style=\"width: 80%;\" />
				</td>
			</tr>
			<tr>
				<td>
					Attitude:
				</td>
				<td>
					<input type=\"text\" name=\"Attitude\" style=\"width: 80%;\" />
				</td>
			</tr>
			<tr>
				<td>
					Interest:
				</td>
				<td>
					<input type=\"text\" name=\"Interest\" style=\"width: 80%;\" />
				</td>
			</tr>
			<tr>
				<td>
					Teacher's<br> Remarks:
				</td>
				<td>
					<input type=\"text\" name=\"Teacher_Remarks\" style=\"width: 80%;\" />
				</td>
			</tr>
			<tr></tr><tr></tr>
		</table>
		<input type=\"submit\" value=\"Submit\" name=\"report\" style=\"padding: 20px; font-family: Lucida Fax; color: #fff; font-size: 20px; font-weight: bold; background-color: #03cb9b;\" />
		</form>
	</div>";
		if (isset($_REQUEST['report'])) {


				$studentName = $_POST['studentName'];
				$termReport = $_POST['termReport'];
				$academic_year = $_POST['academic_year'];
				$Position = $_POST['Position'];
				$Class = $_POST['Class'];
				$Roll = $_POST['Roll'];
				$Vacation = $_POST['Vacation'];
				$Reopening = $_POST['Reopening'];
				$Promoted = $_POST['Promoted'];
				$engScore30 = $_POST['engScore30'];
				$engScore70 = $_POST['engScore70'];
				$engPosition = $_POST['engPosition'];
				$MATScore30 = $_POST['MATScore30'];
				$MATScore70 = $_POST['MATScore70'];
				$MATPosition = $_POST['MATPosition'];
				$SCIScore30 = $_POST['SCIScore30'];
				$SCIScore70 = $_POST['SCIScore70'];
				$SCIPosition = $_POST['SCIPosition'];
				$SOCScore30 = $_POST['SOCScore30'];
				$SOCScore70 = $_POST['SOCScore70'];
				$SOCPosition = $_POST['SOCPosition'];
				$RMEScore30 = $_POST['RMEScore30'];
				$RMEScore70 = $_POST['RMEScore70'];
				$RMEPosition = $_POST['RMEPosition'];
				$ICTScore30 = $_POST['ICTScore30'];
				$ICTScore70 = $_POST['ICTScore70'];
				$ICTPosition = $_POST['ICTPosition'];
				$TWIScore30 = $_POST['TWIScore30'];
				$TWIScore70 = $_POST['TWIScore70'];
				$TWIPosition = $_POST['TWIPosition'];
				$C_ARTScore30 = $_POST['C_ARTScore30'];
				$C_ARTScore70 = $_POST['C_ARTScore70'];
				$C_ARTPosition = $_POST['C_ARTPosition'];
				$FREScore30 = $_POST['FREScore30'];
				$FREScore70 = $_POST['FREScore70'];
				$FREPosition = $_POST['FREPosition'];
				$Attendance = $_POST['Attendance'];
				$Outof = $_POST['Outof'];
				$Conduct = $_POST['Conduct'];
				$Attitude = $_POST['Attitude'];
				$Interest = $_POST['Interest'];
				$Teacher_Remarks = $_POST['Teacher_Remarks'];


				$engScore100 = $engScore30 + $engScore70;

				$MATScore100 = $MATScore30 + $MATScore70;

				$SCIScore100 = $SCIScore30 + $SCIScore70;

				$SOCScore100 = $SOCScore30  + $SOCScore70;

				$RMEScore100 = $RMEScore30 + $RMEScore70;

				$ICTScore100 = $ICTScore30 + $ICTScore70;

				$TWIScore100 = $TWIScore30 + $TWIScore70;

				$C_ARTScore100 = $C_ARTScore30 + $C_ARTScore70;

				$FREScore100 = $FREScore30 + $FREScore70;


				if ($engScore100 > 79.9) {
					$enggrade = "A Excellent";
				}elseif ($engScore100 > 69.9 AND $engScore100 < 80) {
					$enggrade = "B Very Good";
				}elseif ($engScore100 > 59.9 AND $engScore100 < 70) {
					$enggrade = "C Good";
				}elseif ($engScore100 > 49.9 AND $engScore100 < 60) {
					$enggrade = "D Weak";
				}elseif ($engScore100 > 34.9 AND $engScore100 < 50) {
					$enggrade = "E Pass";
				}elseif ($engScore100 < 35) {
					$enggrade = "F Fail";
				}

				if ($MATScore100 > 79.9) {
					$MATgrade = "A Excellent";
				}elseif ($MATScore100 > 69.9 AND $MATScore100 < 80) {
					$MATgrade = "B Very Good";
				}elseif ($MATScore100 > 59.9 AND $MATScore100 < 70) {
					$MATgrade = "C Good";
				}elseif ($MATScore100 > 49.9 AND $MATScore100 < 60) {
					$MATgrade = "D Weak";
				}elseif ($MATScore100 > 34.9 AND $MATScore100 < 50) {
					$MATgrade = "E Pass";
				}elseif ($MATScore100 < 35) {
					$MATgrade = "F Fail";
				}

				if ($SCIScore100 > 79.9) {
					$SCIgrade = "A Excellent";
				}elseif ($SCIScore100 > 69.9 AND $SCIScore100 < 80) {
					$SCIgrade = "B Very Good";
				}elseif ($SCIScore100 > 59.9 AND $SCIScore100 < 70) {
					$SCIgrade = "C Good";
				}elseif ($SCIScore100 > 49.9 AND $SCIScore100 < 60) {
					$SCIgrade = "D Weak";
				}elseif ($SCIScore100 > 34.9 AND $SCIScore100 < 50) {
					$SCIgrade = "E Pass";
				}elseif ($SCIScore100 < 35) {
					$SCIgrade = "F Fail";
				}

				if ($SOCScore100 > 79.9) {
					$SOCgrade = "A Excellent";
				}elseif ($SOCScore100 > 69.9 AND $SOCScore100 < 80) {
					$SOCgrade = "B Very Good";
				}elseif ($SOCScore100 > 59.9 AND $SOCScore100 < 70) {
					$SOCgrade = "C Good";
				}elseif ($SOCScore100 > 49.9 AND $SOCScore100 < 60) {
					$SOCgrade = "D Weak";
				}elseif ($SOCScore100 > 34.9 AND $SOCScore100 < 50) {
					$SOCgrade = "E Pass";
				}elseif ($SOCScore100 < 35) {
					$SOCgrade = "F Fail";
				}

				if ($RMEScore100 > 79.9) {
					$RMEgrade = "A Excellent";
				}elseif ($RMEScore100 > 69.9 AND $RMEScore100 < 80) {
					$RMEgrade = "B Very Good";
				}elseif ($RMEScore100 > 59.9 AND $RMEScore100 < 70) {
					$RMEgrade = "C Good";
				}elseif ($RMEScore100 > 49.9 AND $RMEScore100 < 60) {
					$RMEgrade = "D Weak";
				}elseif ($RMEScore100 > 34.9 AND $RMEScore100 < 50) {
					$RMEgrade = "E Pass";
				}elseif ($RMEScore100 < 35) {
					$RMEgrade = "F Fail";
				}

				if ($ICTScore100 > 79.9) {
					$ICTgrade = "A Excellent";
				}elseif ($ICTScore100 > 69.9 AND $ICTScore100 < 80) {
					$ICTgrade = "B Very Good";
				}elseif ($ICTScore100 > 59.9 AND $ICTScore100 < 70) {
					$ICTgrade = "C Good";
				}elseif ($ICTScore100 > 49.9 AND $ICTScore100 < 60) {
					$ICTgrade = "D Weak";
				}elseif ($ICTScore100 > 34.9 AND $ICTScore100 < 50) {
					$ICTgrade = "E Pass";
				}elseif ($ICTScore100 < 35) {
					$ICTgrade = "F Fail";
				}



				if ($TWIScore100 > 79.9) {
					$TWIgrade = "A Excellent";
				}elseif ($TWIScore100 > 69.9 AND $TWIScore100 < 80) {
					$TWIgrade = "B Very Good";
				}elseif ($TWIScore100 > 59.9 AND $TWIScore100 < 70) {
					$TWIgrade = "C Good";
				}elseif ($TWIScore100 > 49.9 AND $TWIScore100 < 60) {
					$TWIgrade = "D Weak";
				}elseif ($TWIScore100 > 34.9 AND $TWIScore100 < 50) {
					$TWIgrade = "E Pass";
				}elseif ($TWIScore100 < 35) {
					$TWIgrade = "F Fail";
				}



				if ($C_ARTScore100 > 79.9) {
					$C_ARTgrade = "A Excellent";
				}elseif ($C_ARTScore100 > 69.9 AND $C_ARTScore100 < 80) {
					$C_ARTgrade = "B Very Good";
				}elseif ($C_ARTScore100 > 59.9 AND $C_ARTScore100 < 70) {
					$C_ARTgrade = "C Good";
				}elseif ($C_ARTScore100 > 49.9 AND $C_ARTScore100 < 60) {
					$C_ARTgrade = "D Weak";
				}elseif ($C_ARTScore100 > 34.9 AND $C_ARTScore100 < 50) {
					$C_ARTgrade = "E Pass";
				}elseif ($C_ARTScore100 < 35) {
					$C_ARTgrade = "F Fail";
				}



				if ($FREScore100 > 79.9) {
					$FREgrade = "A Excellent";
				}elseif ($FREScore100 > 69.9 AND $FREScore100 < 80) {
					$FREgrade = "B Very Good";
				}elseif ($FREScore100 > 59.9 AND $FREScore100 < 70) {
					$FREgrade = "C Good";
				}elseif ($FREScore100 > 49.9 AND $FREScore100 < 60) {
					$FREgrade = "D Weak";
				}elseif ($FREScore100 > 34.9 AND $FREScore100 < 50) {
					$FREgrade = "E Pass";
				}elseif ($FREScore100 < 35) {
					$FREgrade = "F Fail";
				}

				$compQuery = mysql_query("SELECT * FROM studentsReports WHERE termReport='$termReport' AND academic_year='$academic_year' AND admissionNumber = '$AdmitionNumber'");
				if (mysql_num_rows($compQuery)!==0) {
					
					?>
				<script type="text/javascript">
					alert("Report for this Year and Term aready exist\n Please you can't add another");
				</script>
					<?php

				}else{

					if ($studentName!="" AND $termReport!="" AND $academic_year!="" AND $Class!="" AND $Roll!="") {
						mysql_query("INSERT INTO studentsReports VALUES ('','$AdmitionNumber','$studentName','$termReport','$academic_year','$Position','$Class','$Roll','$Vacation','$Reopening','$Promoted','$engScore30','$engScore70','$engScore100','$engPosition','$enggrade','$MATScore30','$MATScore70','$MATScore100','$MATPosition','$MATgrade','$SCIScore30','$SCIScore70','$SCIScore100','$SCIPosition','$SCIgrade','$SOCScore30','$SOCScore70','$SOCScore100','$SOCPosition','$SOCgrade','$RMEScore30','$RMEScore70','$RMEScore100','$RMEPosition','$RMEgrade','$ICTScore30','$ICTScore70','$ICTScore100','$ICTPosition','$ICTgrade','$TWIScore30','$TWIScore70','$TWIScore100','$TWIPosition','$TWIgrade','$C_ARTScore30','$C_ARTScore70','$C_ARTScore100','$C_ARTPosition','$C_ARTgrade','$FREScore30','$FREScore70','$FREScore100','$FREPosition','$FREgrade','$Attendance','$Outof','$Conduct','$Attitude','$Interest','$Teacher_Remarks')");

							?>
						<script type="text/javascript">
							location.replace('home.php?utab=reportsdone');
						</script>
							<?php
					}else{

					?>
				<script type="text/javascript">
					alert("Name, Term, Year, Class and Roll cannot be empty");
				</script>
					<?php
					}
					
				

				}

			

		}
}
elseif($intab=="reportsstudent$searchitem"){
	$output="";
$query = mysql_query("SELECT * FROM students WHERE first_name LIKE '%$searchitem%' OR last_name LIKE '%$searchitem%' OR middle_name LIKE '%$searchitem%' OR admissionNumber LIKE '%$searchitem%'") or die("could not search!");

		while($fetch = mysql_fetch_array($query)){
			$first_name = $fetch['first_name'];
			$last_name = $fetch['last_name'];
			$middle_name = $fetch['middle_name'];
			$admissionNumber = $fetch['admissionNumber'];
			$class = $fetch['class'];
			$passport = $fetch['passport'];
			
	$output.="
<a href=\"home.php?utab=reportsspecific$admissionNumber\" id=\"class_pipuls\">
	<div id=\"search_r_pass\"><img src=\"student_data/$passport\" height=\"100%\" width=\"100%\"></div>
	<ul class=\"class_pipuls\">
		<li>$first_name  $middle_name $last_name</li>
		<li id=\"down\">Admin No: $admissionNumber    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Class: $class</li>
	</ul>
</a>
";
	}
				
 echo "<div id=\"child_all\">";
 echo "$output";
 echo "</div>";
}elseif ($intab =="reportsspecific$specificAdmiNo") {
	echo "<div id=\"child_all\">
		<div style=\"padding-top: 5%;\"> 
			<center>
		<div id=\"select_class_search_adnimno\">
		<br><br><br><br /><br />
			<a href=\"home.php?utab=reportsstudentAdmino$specificAdmiNo\" style=\"color:#03cb9b; text-decoration: none; font-size: 30px; font-family: Lucida Fax; background-color: #fff; width: 190%; padding: 4%; padding-top:7%;  border-radius: 7px;\">
				<img src=\"images/add_report.png\" />
				Add Report
			</a>
			<br /><br /><br /><br />
			<a href=\"home.php?utab=reportsExiststudentAdmino$specificAdmiNo\" style=\"color:#03cb9b; text-decoration: none; font-size: 25px; font-family: Lucida Fax; background-color: #fff; width: 190%; padding: 4%; padding-top:7%; border-radius: 7px;\">
			<img src=\"images/open_report.png\" />
				Open Reports
			</a>
		</div>
			</center>
		</div>
	</div>";
}
else{
	echo "
		<div id=\"child_all\">
	<div style=\"padding-top: 5%;\"> 
		<center>
			<div id=\"select_class_search_adnimno\">

			<form action=\"#\" method=\"post\" style=\"margin-left: 20px;\">

				<select name=\"rep4class\" title=\"Select Class\" >
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



				<input type=\"text\" name=\"searchin\" placeholder=\"Name or Admission No.\" />		
				<input type=\"submit\" name=\"select_adno_or_name\" value=\"Search\">
			</form><br><br><br><br><br><br>";

			if ($intab =="reportserror1") {
				echo "<b style=\"color: #ff0000; text-shadow: 1px 1px #000;\">Search Area is Empty!</b>";
			}elseif ($intab =="reportserror2") {
				echo "<b style=\"color: #ff0000; text-shadow: 1px 1px #000;\">
				No Student found!</b>";
			}elseif ($intab =="reportserror3") {
				echo "<b style=\"color: #ff0000; text-shadow: 1px 1px #000;\">
				No class is selected!</b>";
			}elseif ($intab =="reportserror4") {
				echo "<b style=\"color: #ff0000; text-shadow: 1px 1px #000;\">
				No Student found in this class!</b>";
			}

echo"	</div>
		</center>
	</div>
</div>
	";
	if (isset($_REQUEST['select_adno_or_name'])) {
		$admiNo_name = $_REQUEST['searchin'];
		
		if ($admiNo_name=="") {
			?>
		<script type="text/javascript">
			location.replace('home.php?utab=reportserror1');
		</script>
			<?php
		}else{
			$searchq = preg_replace("#[^0-9a-z]#i","",$admiNo_name);

			$select = mysql_query("SELECT * FROM students WHERE first_name LIKE '%$searchq%' OR last_name LIKE '%$searchq%' OR middle_name LIKE '%$searchq%' OR admissionNumber LIKE '%$searchq%'") or die("could not search!");
				$selectrow = mysql_num_rows($select);
				if ($selectrow == 0) {

					?>
				<script type="text/javascript">
					location.replace('home.php?utab=reportserror2');
				</script>
					<?php

				}else{
					?>
				<script type="text/javascript">
					location.replace('home.php?utab=reportsstudent<?php echo 
					$searchq ?>');
				</script>
					<?php

				}
		}
	}


	if (isset($_REQUEST['select_class'])) {

		$rep4class = $_REQUEST['rep4class'];
		
		?>
			<script type="text/javascript">
				location.replace('home.php?utab=reportsClass<?php echo$rep4class ?>');
			</script>
		<?php
	}


}
?>

</div>
