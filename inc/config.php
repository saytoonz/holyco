<?php
$join = mysql_connect("localhost" , "root" ,"");
if(!$join){
 die("database not connected");
}

$select_db = mysql_select_db("holyco" , $join);
if(!$select_db){
 die("database not selected");
}

?>