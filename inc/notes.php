<div id="child_all" style="overflow: auto;">

<?php
$intab = $_GET['utab'];

if (strpos($intab, "accountsNotesdel") !== false) {
	if (strpos($intab, "accountsNotesdelUndo") !== false) {
		$id = substr($intab, 20);
		mysql_query("UPDATE notes SET deleted='no' WHERE id='$id'");
				?>
		<script type="text/javascript">
			location.replace("home.php?utab=accountsNotes");
		</script>
				<?php

	}else{
	$id = substr($intab, 16);
	mysql_query("UPDATE notes SET deleted='yes' WHERE id='$id'");

	echo "<center>
	<div id=\"big\">
		<div id=\"bill_all\">
		<form method=\"post\" action=\"#\">
			<div style=\"margin-top: 18%; margin-bottom: 18%;\">
				<span style=\"font-size: 22spx; font-family: Lucida Calligraphy; font-weight:bolder;\">
					Note has been Updated
				</span>
					<br /><br />
				<span style=\"font-size: 40px; font-weight:bold; color: #fff; text-shadow: -2px 1.8px #000; \">
					Successfully!
				</span>
			</div>
				<a href=\"home.php?utab=accountsNotes\" style=\"text-decoration: none;\">
					<img src=\"images/ok.png\" height=\"15%\" width=\"22%\" title=\"Okay\" />
				</a>

				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;

				<a href=\"home.php?utab=accountsNotesdelUndo$id\" style=\"text-decoration: none;\">
					<img src=\"images/undo.png\" height=\"14%\" width=\"22%\" title=\"Undo\" />
				</a>

				</form>
			</div>
		</div>
	</center>";
	}


}
elseif (strpos($intab, "accountsNotesEdit") !== false) {

	$id = substr($intab, 17);

	if (isset($_POST['updateNotes'])) {
		$notes = $_POST['note'];
		$titles = $_POST['titles'];
		$date = date("jS F, Y");

		if ($notes !="" AND $titles !="") {
		mysql_query("UPDATE notes SET title='$titles', note ='$notes', dated='Last Update $date' WHERE id='$id' AND deleted='no'");
			
	echo "<center>
	<div id=\"big\">
		<div id=\"bill_all\">
		<form method=\"post\" action=\"#\">
			<div style=\"margin-top: 18%; margin-bottom: 18%;\">
				<span style=\"font-size: 22spx; font-family: Lucida Calligraphy; font-weight:bolder;\">
					Note has been Updated
				</span>
					<br /><br />
				<span style=\"font-size: 40px; font-weight:bold; color: #fff; text-shadow: -2px 1.8px #000; \">
					Successfully!
				</span>
			</div>
				<a href=\"home.php?utab=accountsNotes\">
					<img src=\"images/backarror.png\" height=\"40%\" width=\"50%\" />
				</a>
			</form>
		</div>
	</div>
</center>";
		}
	}
	else{
		$note_query = mysql_query("SELECT * FROM notes WHERE id ='$id' AND deleted ='no'");
	if (mysql_num_rows($note_query) ===0) {
		?>
<script type="text/javascript">
	location.replace("home.php?utab=accountsNotes");
</script>
		<?php
	}else{
		$get = mysql_fetch_assoc($note_query);
		$title = $get['title'];
		$date = $get['dated'];
		$note = $get['note'];
	}
				
				echo "<div id=\"pad\">
			<form action=\"#\" method=\"post\" style=\"margin-left: 20px;\">
			<input type=\"submit\" value=\"Update Notes\" name=\"updateNotes\" style=\"border: 2px solid #03cb9b; background-color: #039b9b; padding: 3px; font-family: Times; font-weight: bolder; color: #fff; font-size: 16px; float: right; margin-top: 100px; margin-right: 20px; \">
		<h2>
			<input type=\"text\" value=\"$title\" name=\"titles\" placeholder=\"Title\" style=\"width: 590px; margin: 2px; color: #fff; font-size: 16px; float: left;\" />

		</h2>
			<textarea id=\"note\" name=\"note\"
			style=\"height:390px;\">$note</textarea>
			<h1></h1>
			</form>
	</div>";
	}
}

else{
if (isset($_POST['saveNotes'])) {
	$notes = $_POST['notes'];
	$title = $_POST['title'];
	$date = date("jS F, Y");
if ($notes != "" AND $title !="") {

	mysql_query("INSERT INTO notes VALUES('','$title','$notes','$date','no')");

	echo "<center>
	<div id=\"big\">
		<div id=\"bill_all\">
		<form method=\"post\" action=\"#\">
			<div style=\"margin-top: 18%; margin-bottom: 18%;\">
				<span style=\"font-size: 22spx; font-family: Lucida Calligraphy; font-weight:bolder;\">
					Note has been Added
				</span>
					<br /><br />
				<span style=\"font-size: 40px; font-weight:bold; color: #fff; text-shadow: -2px 1.8px #000; \">
					Successfully!
				</span>
			</div>
				<a href=\"home.php?utab=accountsNotes\">
					<img src=\"images/backarror.png\" height=\"45%\" width=\"50%\" />
				</a>
			</form>
		</div>
	</div>
</center>";
	}else{
		?>
<script type="text/javascript">
	location.replace("home.php?utab=accountsNoteserror");
</script>
		<?php
	}

}else{
	echo "<div id=\"pad\">
			<form action=\"#\" method=\"post\" style=\"margin-left: 20px;\">
			<input type=\"submit\" value=\"Save Notes\" name=\"saveNotes\" style=\"border: 2px solid #03cb9b; background-color: #039b9b; padding: 3px; font-family: Times; font-weight: bolder; color: #fff; font-size: 20px; float: right; margin-top: 100px; margin-right: 20px; \">
		<h2>
			<input type=\"text\" name=\"title\" placeholder=\"Title\" style=\"width: 590px; margin: 2px; color: #fff; font-size: 16px; float: left;\" />

		</h2>
			<textarea id=\"note\" name=\"notes\">";
			if ($intab=="accountsNoteserror") {
				echo "Title or Notes Cannot Be Save Empty";
			}
		echo"</textarea>
			<h1></h1>
			</form>
	</div>";

				$found_notes="";
				if (isset($_REQUEST['sendsearch'])) {

					$searchq = $_POST['search'];

				$query1 = mysql_query("SELECT * FROM notes WHERE dated LIKE '%$searchq%' AND deleted = 'no' ORDER BY id DESC");
				if (mysql_num_rows($query1)===0) {
					$found_notes = "
					<tr>
						<td>Plese there is </td><td>no Notes available for</td><td> Your Search</td>
					</tr>";
				}else{
					while ($fetch = mysql_fetch_assoc($query1)) {
						$id=$fetch['id'];
						$title=$fetch['title'];
						$note=$fetch['note'];
						$date=$fetch['dated'];
						if (strlen($title) > 25) {
							$title = substr($title, 0 , 28)."...";
						}

					$found_notes.="
						<tr style=\"height: 22px; border-bottom: 1px solid #ccc;\" >
							<td>$date</td>
							<td>
								<a href=\"up.php?u=$id\" target=\"_blank\" style=\"text-decoration: none; color: #000;\">
									$title
								</a>
							</td>
							<td>
								&nbsp;&nbsp;
								<a href=\"home.php?utab=accountsNotesEdit$id\" style=\"text-decoration: none; color: #000;\">
									<img src=\"images/edit.png\" title=\"Edit\" style=\"height: 25px; cursor: pointer;\" \>
								</a>


										 &nbsp;&nbsp;&nbsp;&nbsp;
								<a href=\"home.php?utab=accountsNotesdel$id\">
									<input type=\"image\" name=\"delete\" src=\"images/delete.png\" title=\"Delete\" style=\"height: 22px; cursor: pointer;\" \>
								</a>
							</td>
						</tr>

						";
					}
				}
				}else{
				$query = mysql_query("SELECT * FROM notes WHERE deleted = 'no' ORDER BY id DESC LIMIT 25");
				if (mysql_num_rows($query)===0) {
					$found_notes = "
					<tr>
						<td>Plese there is </td><td>no Notes available</td><td>for Now</td>
					</tr>";
				}else{
					while ($fetch = mysql_fetch_assoc($query)) {
						$id=$fetch['id'];
						$title=$fetch['title'];
						$note=$fetch['note'];
						$date=$fetch['dated'];
						if (strlen($title) > 25) {
							$title = substr($title, 0 , 28)."...";
						}

					$found_notes.="
						<tr style=\"height: 22px; border-bottom: 1px solid #ccc;\" >
							<td>$date</td>
							<td>
								<a href=\"up.php?u=$id\" target=\"_blank\" style=\"text-decoration: none; color: #000;\">
									$title
								</a>
							</td>
							<td>
								&nbsp;&nbsp;
								<a href=\"home.php?utab=accountsNotesEdit$id\" style=\"text-decoration: none; color: #000;\">
									<img src=\"images/edit.png\" title=\"Edit\" style=\"height: 25px; cursor: pointer;\" \>
								</a>


										 &nbsp;&nbsp;&nbsp;&nbsp;
								<a href=\"home.php?utab=accountsNotesdel$id\">
									<input type=\"image\" name=\"delete\" src=\"images/delete.png\" title=\"Delete\" style=\"height: 22px; cursor: pointer;\" \>
								</a>
							</td>
						</tr>

						";
					}
				}
				}

echo "<div id=\"savednotes\">
		<center>
			<form method=\"post\" action=\"#\">
				<input type=\"text\" name=\"search\" placeholder=\"Search Date\" style=\"width: 280px; height: 30px; background-color: #fff; color: #000;\" />
				<input type=\"submit\" value=\"Search\" name=\"sendsearch\" style=\"width: 65px; height: 30px; font-weight: 600;\" />
			</form>
			<div id=\"div\">
			<table style=\"width: 90%;  max-height: 180px; background-color: #ffc; overflow: auto;\">
				<tr>
					<th>Date</th>
					<th>Title</th>
					<th>Edit/Delete</th>
				</tr>
					$found_notes
			</table>
			</div>
		</center>
	</div>


	";
}
}
?>
	


</div>