<?php
	require("../includes/mysql.php");
	$mysql = new MySQLProvider();
	$query = "SELECT * FROM products Where id ='".$_GET["id"]."'";
	$result = $mysql->getresult($query);
	if($row=mysql_fetch_array($result))
	{
	$content = $row['image_small'];
	header('Content-type: image/jpeg');
	echo $content;
	}
	$mysql->closeconnect();
	
?>