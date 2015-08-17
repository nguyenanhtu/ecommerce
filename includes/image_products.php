<?php
	require("../includes/mysql.php");
	$query = mysql_query("SELECT * FROM products Where id ='".$_GET["id"]."'");
	if($row=mysql_fetch_array($query))
	{
	$content = $row['image_small'];
	header('Content-type: image/jpeg');
	echo $content;
	}
?>