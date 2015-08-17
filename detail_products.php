<?php
	//Hiển thị chi tiết nội dung một sản phẩm
	include('includes/mysql.php');
	include('includes/header.html');
	$pid = $_GET['pid'];
	include('includes/details_product.html');
	include('includes/footer.html');
?>