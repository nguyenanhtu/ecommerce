<?php
	$servername="localhost";
	$username="root";
	$pass="";
	$databasename="ecommerce2";
	$conn=mysql_connect($servername,$username,$pass);
			if($conn==false)
			{
				die("Could not connect to MySQL:".mysql_error());
			}
			else
			{
				mysql_select_db($databasename,$conn);
				mysql_query("SET NAMES 'utf8'");
			}
?>