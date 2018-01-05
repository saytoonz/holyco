<?php
	include_once("../inc/session.php");
?>
<?php
	include ("../inc/config.php");
?>

<?php
	if(isset($_REQUEST["loginside"])){
  $user_name = $_POST["username"];
  $user_password = $_POST["userpassword"];
  
  if($user_name !="" OR $user_password !=""){
	  $user_password = md5($user_password);
	$queryy = "SELECT *";
	$queryy .= "FROM staffs ";
	$queryy .= "WHERE staff_name = '{$user_name}'";
	$queryy .= "AND password = '{$user_password}'";
	$queryy .= "AND active = 'yes'";
	$queryy .= " LIMIT 1";
	
	 
	$effect = mysql_query($queryy , $join);
	if(!$effect){
		die("on user found:".mysql_error());
	 }
	 
	 if(mysql_num_rows($effect)===1){
		if($fetch = mysql_fetch_assoc($effect)){
			
			$username = $fetch["staff_name"];
			$id = $fetch["id"];
			$staff_id = $fetch["staff_id"];

			$_SESSION["staff_id"] = $staff_id;


$hour = date("g");
$hour = $hour - 2;
$time = date(":i");
$dated =  date("jS F, Y - ");
$am_pm = date("A");

if ($hour=="-1") {
			$hour ="11";
			if ($am_pm =="AM" ){
				$am_pm ="PM";
			}elseif ($am_pm=="PM") {
				$am_pm = "AM";
			}
		}elseif ($hour=="0") {
			$hour ="12";
			if ($am_pm =="AM" ) {
				$am_pm ="PM";
			}elseif ($am_pm=="PM") {
				$am_pm = "AM";
			}
		}else{
			$hour = "$hour";
		}
		
			mysql_query("UPDATE staffs SET logged_in='yes',last_entry='$dated $hour$time $am_pm' WHERE staff_id='$staff_id' AND active='yes'")
		?>
		<script> 
			window.location.href=('../home.php?utab=<?php echo "$username$id";?>');
		</script>
		<?php
		}
	 }else{ 
		 ?>
			<script>
				location.replace("../index.php?error1");
			</script>
		<?php
	 }
  }else{
	   ?>
			<script>
				location.replace("../index.php?error2");
			</script>
		<?php
  }
	}
?>
<?php  include ("../inc/close_config.php");?>