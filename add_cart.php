<?php
	//Thêm sản phẩm vào giỏ hàng
	include('includes/header.html');
	if(isset($_GET["id"]))
	{
	$pid = $_GET["id"];
	if(isset($_SESSION["cart"][$pid]))
	{
		$qty = $_SESSION["cart"][$pid] + 1;
		
	}
	else 
	{
		$qty = 1;
	}
	
	$_SESSION["cart"][$pid] = $qty;
	echo '<table width="996" align="center"  border="0" cellspacing="0" cellpadding="0">';
	echo "<tr>";
	echo '<td border="1px"> <img src="includes/image_big.php?id='.$_GET['id'].'" alt="" width="400" height="400" border="0"> </td>';
	echo '</tr>';
	echo '<tr align="left" valign="top">';
	echo "<td border='1px'>";
	echo "Bạn đã thêm mặt hàng vào giỏ hàng thành công";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td border='1px'>";
	echo "<a href='view_cart.php'> <img src='images/button_cart.gif' /> </a>";
	echo "</td>";
	echo "</tr>";
	echo '</table>';
	}
	else
	{
	echo "Xin lỗi, bạn chưa chọn mặt hàng";
	header("Refresh:3,url=show_products.php");
	}
	
	include('includes/footer.html');
	
?>