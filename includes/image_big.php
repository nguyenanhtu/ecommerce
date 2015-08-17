<?php
	require("../includes/mysql.php");
	$query = mysql_query("SELECT * FROM products Where id ='".$_GET["id"]."'");
	if($row=mysql_fetch_array($query))
	{
	$content = $row['image_big'];
	header('Content-type: image/jpeg');
	echo $content;
	}
	mysql_close($conn);
	
?>