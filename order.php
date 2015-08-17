<?php
	//Trang lập hóa đơn đặt hàng
	include('includes/mysql.php');
	include('includes/header.html');
	//Phải chuyển phần xử lý nhập csdl đơn hàng sang một file order_process.php để tránh lỗi vì nếu để form tự
	// xử lý thì sau khi thực hiện câu lệnh if(isset($_POST[submit])) xong nó sẽ chạy lại đoạn code ở dưới, gây
	// ra lỗi.
	// Sau khi khách hàng đăng ký đơn hàng xong, cần xóa bớt số lượng mặt hàng trong bảng products, đồng
	// thời xóa unset biến SESSION[cart] để tránh trùng giỏ hàng.
?>
	<link href="css/register.css" rel="stylesheet" type="text/css">
    <script language="javascript" type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<p> 1. Nhập thông tin khách hàng </p>
	<div class="vpb_main_wrapper">

	<div style="width:520px;float:left;padding:10px;" align="left"><div id="submit_without_page_refresh_status" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;"></div></div><br clear="all">

	<form action="order_process.php" method="POST">
	<div style="width:100px;float:left;padding:10px;padding-top:20px;font-family:Verdana, Geneva, sans-serif; font-size:11px; color:black;" align="left">Nhập họ tên:</div>
	<div style="width:400px;float:left;padding:10px;" align="left"><input type="text" name="fullname" class="vpb_textAreaBoxInputs"></div><br clear="all">
	<div style="width:100px;float:left;padding:10px;padding-top:20px;font-family:Verdana, Geneva, sans-serif; font-size:11px; color:black;" align="left">Nhập địa chỉ:</div>
	<div style="width:400px;float:left;padding:10px;" align="left"><input type="text" name="address" class="vpb_textAreaBoxInputs"></div><br clear="all">
	<div style="width:100px;float:left;padding:10px;padding-top:20px;font-family:Verdana, Geneva, sans-serif; font-size:11px; color:black;" align="left">Nhập số credit card:</div>
	<div style="width:400px;float:left;padding:10px;" align="left"><input type="text" name="credit" class="vpb_textAreaBoxInputs"></div><br clear="all">
	<div style="width:120px;float:left;" align="left">&nbsp;</div>
	<div style="width:400px;float:left;padding:10px;" align="left">
	
	<p> <font size="4px">2. Thông tin đơn hàng</font> </p></br>
	<?php
	echo "<table border='1' width='598' height='200'>";
		echo "<tr>";
		echo " <td> Tên Sản Phẩm </td>
				<td> Giá </td>
				<td> Số lượng đặt </td>
				<td> Thành tiền </td>
				</tr>";
		$total = 0;
		$query = "Select * from products where id in (";
		foreach($_SESSION["cart"] as $key => $value)
		{
			$query .= $key .",";
		}
		$query = substr($query,0,-1).")";
		$result = mysql_query($query);
		$j = 0;
		while($row = mysql_fetch_array($result))
				{
					$subtotal = $_SESSION["cart"][$row["id"]] * $row["price"];
					$total += $subtotal; 
					$prod_id = $row["id"];
					echo "<input type='hidden' name='pid[".$j."]' value ='".$prod_id."' />";
					echo "<input type='hidden' name='subtt[".$j."]' value ='".$subtotal."' />";
					echo "<tr>";
					echo "<td>";
					echo $row["product"];
					echo "</td>";
					echo "<td>";
					echo $row["price"];
					echo "</td>";
					echo "<td>";
					echo $_SESSION["cart"][$row["id"]];
					echo "<input type='hidden' name='number[".$j."]' value ='".$_SESSION["cart"][$row["id"]]."' />";
					echo "</td>";
					echo "<td>";
					echo number_format($subtotal,0,'.','.').'VND';
					echo "</td>";
					echo "</tr>";
					$j++;
				}
				echo "<tr>";
				echo "<td align='center' colspan='3' border='0px'>";
				echo "<b> Tổng tiền thanh toán : </b>"; 
				echo "<td align='center'>";
				echo number_format($total,0,'.','.')."VND";
				echo "<input type='hidden' name='total' value ='".$total."' />";
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				?>
	</form>
	<input type="submit" name="submit" class="vpb_general_button" value="Hoàn thành đơn hàng" /> </div>
	<br clear="all">
	</div>
	
<?php
	include('includes/footer.html');
?>
	