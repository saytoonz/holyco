<div id="child_all">
<?php
$bar = $_GET['utab'];

	echo "<center>
		<div id=\"big\">
			<div id=\"bill_all\">
				<form method=\"post\" action=\"#\">";

if (strpos($bar, "adminitstratorsysNsromapaadmin_academicsvry") !== false) {
	$array = substr($bar, 43);
	$explode = explode("!,", $array);
	$year = current($explode);
	$term = next($explode);
	$vac_date =next($explode);
	$reop_date =next($explode);

		if (isset($_POST['act'])) {
			mysql_query("TRUNCATE TABLE admin_center")or die("No delete ".mysql_error());
			mysql_query("INSERT INTO admin_center VALUES('','$year','$term','$vac_date','$reop_date','$Login_staff')");

			echo "
				<div style=\"margin-top: 18%; margin-bottom: 18%;\">
				<span style=\"font-size: 22spx; font-family: Lucida Calligraphy; font-weight:bolder;\">
					Academic Informations has been added
				</span>
					<br /><br />
				<span style=\"font-size: 40px; font-weight:bold; color: #fff; text-shadow: -2px 1.8px #000; \">
					Successfully!
				</span>
			</div>
				<a href=\"home.php?utab=adminitstratorsysNsromapaadmin_academics\" style=\"text-decoration: none;\">
					<img src=\"images/ok.png\" height=\"20%\" width=\"30%\" title=\"Okay\" />
				</a>

			";

		}else{
			
	echo"<div id=\"varify_r_pass\" style=\"background: inherit;\"><img src=\"images/crest.png\" height=\"102%\" width=\"98%\"></div>
			<ul class=\"varify_r_info\">
				<li style=\"font-size:18px; color: #fff; font-weight: bolder; background: rgba(0,0,0,.7);\">
					Year : $year

				</li>
				<li style=\"color: #e9e9e9; font-size: 15px;\">
					Term : $term
				</li>
				<li style=\"color: #e9e9e9; font-size: 15px;\">
					Vacation Date: $vac_date
				</li>
				<li style=\"color: #e9e9e9; font-size: 15px;\">
					Reopening Date: $reop_date
				</li>
			</ul>

		<input type=\"submit\" name=\"act\" value=\"Apply\">";
		}

}else{
				if (isset($_POST['verify'])) {
					$year =$_POST['year'];
					$term =$_POST['term'];
					$vac_date = $_POST['vac_date'];
					$reop_date =$_POST['reop_date'];
				if ($year=="" OR $term=="" OR $vac_date=="" OR $reop_date=="") {
						?>
					<script type="text/javascript">
						location.replace('home.php?utab=adminitstratorsysNsromapaadmin_academicserror1');
					</script>
						<?php
					}else{
						$date = date("Y-m-d");

						if ($vac_date < $date) {
							?>
					<script type="text/javascript">
						location.replace('home.php?utab=adminitstratorsysNsromapaadmin_academicserror2');
					</script>
						<?php
						}elseif ($reop_date <= $vac_date) {
							?>
					<script type="text/javascript">
						location.replace('home.php?utab=adminitstratorsysNsromapaadmin_academicserror3');
					</script>
						<?php
						}else{
								?>
					<script type="text/javascript">
						location.replace('home.php?utab=adminitstratorsysNsromapaadmin_academicsvry<?php echo"$year!,$term!,$vac_date!,$reop_date";?>');
					</script>
						<?php
						}
				}
			}else{
				echo "<br /><br />
			<input type=\"text\" name=\"year\" placeholder=\"Academic year\" />

			<input type=\"text\" name=\"term\" placeholder=\"Term\" />

			<input type=\"date\" name=\"vac_date\" title=\"Vacation Date\" placeholder=\"Vacation Date\"  style=\"padding: 5px; width: 90%; height: 35px; background:rgba(0, 0, 0, 0.1); margin-bottom: 8px; border-radius: 7px; border-top: 1px solid rgba(0, 0, 0,.7); border-left: 1px solid rgba(0, 0, 0,.7); border-bottom: 0px solid rgba(0, 0, 0,.7); border-right: 0px solid rgba(0, 0, 0,.7); margin-top: 7px; color: #fff; font-size: 14px\"/>

			<input type=\"date\" name=\"reop_date\" title=\"Reopening Date\" placeholder=\"Reopening Date\"  style=\"padding: 5px; width: 90%; height: 35px; background:rgba(0, 0, 0, 0.1); margin-bottom: 8px; border-radius: 7px; border-top: 1px solid rgba(0, 0, 0,.7); border-left: 1px solid rgba(0, 0, 0,.7); border-bottom: 0px solid rgba(0, 0, 0,.7); border-right: 0px solid rgba(0, 0, 0,.7); margin-top: 7px; color: #fff; font-size: 14px\"/>

			<input type=\"submit\" name=\"verify\" value=\"Verify\"><br /><br /><br /><br /><br />
			";	
		}

		if ($bar == "adminitstratorsysNsromapaadmin_academicserror1") {
							echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
									Pleace make sure all feilds are filled.
								</span>";
		}elseif ($bar == "adminitstratorsysNsromapaadmin_academicserror2") {
							echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
									Vacation Date has past.
								</span>";
		}elseif ($bar == "adminitstratorsysNsromapaadmin_academicserror3") {
							echo "<span style=\"color: #ff0000; text-shadow: 1px 1px #000;\"><br />
									Reopening Date must be greater than Vacation date.
								</span>";
		}
}
		echo"	</form>
		</div>
	</div>
</center>
";
?>
</div>