<?php
	//Xem giỏ hàng
	include('includes/header.html');
	if(isset($_POST['update']))
	{
		$num = $_POST['number'];
		foreach($num as $key => $value)
		{
			if($value==0)
			{
				unset($_SESSION['cart'][$key]);
			}
			else if($value > 0)
			{
				$_SESSION['cart'][$key] = $value;
			}
		}
	}
	if(isset($_POST['delcart']))
	{
		unset($_SESSION['cart']);
	}
	$empty = TRUE;
	if(isset($_SESSION["cart"]))
	{
		foreach($_SESSION["cart"] as $key => $value)
		{
			if(isset($value))
			{
				$empty = false;
			}
		}
	}
	
	if($empty == false)
	{
		require("includes/mysql.php");
		$query = "Select * from products where id in (";
		foreach($_SESSION["cart"] as $key => $value)
		{
			$query .= $key .",";
		}
		$query = substr($query,0,-1).")";
		$result = mysql_query($query);
		echo "<form action='".$_SERVER['PHP_SELF']."' method = 'POST' >";
		echo "&nbsp;&nbsp;&nbsp;<table border='1' width='850px' height='400px'>";
		echo "<tr>";
		echo "<th colspan='7' align='center' bgcolor='lightpink'>";
		echo "DANH SÁCH SẢN PHẨM";
		echo "</th>";
		echo "</tr>";
		echo "<tr>";
		echo " <td align='center'> Tên Sản Phẩm </td>
				<td align='center'> Ảnh </td>
				<td align='center'> Giá </td>
				<td align='center'> Số lượng hàng </td>
				<td align='center'> Thành tiền </td>
				</tr>";
		$total = 0;
		$data = array();
		while($row = mysql_fetch_array($result))
				{
					$subtotal = $_SESSION["cart"][$row["id"]] * $row["price"];
					$total += $subtotal; 
					$prod_id = $row["id"];
					echo "<tr>";
					echo "<td align='center'>";
					echo $row["product"];
					echo "</td>";
					echo "<td align='center'>";
					echo "<img src='includes/image_products.php?id=".$prod_id."' />";
					echo "</td>";
					echo "<td align='center'>";
					echo $row["price"];
					echo "</td>";
					echo "<td align='center'>";
					echo "<input type='text' size='4' name='number[".$row['id']."]' value ='".$_SESSION["cart"][$row["id"]]."' />";
					echo "</td>";
					echo "<td align='center'>";
					echo $subtotal;
					echo "</td>";
					echo "</tr>";
					$data[] = array($row['id'],$row['product'],$row['price'],$_SESSION['cart'][$row['id']],$subtotal);
				}
				echo "</table>";
				echo "<br/>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<font color='red'>Tổng cộng :</font>" .$total;
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<input name='update' type='submit' value='Cập nhật giỏ hàng' />";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<input name='delcart' type='submit' value='Xóa trống giỏ hàng' />";
				echo "</form>";
				if(isset($_SESSION['user_id']))
				{
				echo "<form action='order.php' method='POST'>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<input type='submit' value='Gửi đơn hàng' />";
				echo "</form>";
				}
				else
				{
				if(isset($_COOKIE['username']) and isset($_COOKIE['userpass']))
				{
				echo "<a href='order.php?uid=".$_COOKIE['userid']."'";
				}
				else
				{
				}
				}
				echo "</body>";
				echo "</html>";
				mysql_close($conn);
	}
	else
	{
		echo "Giỏ hàng của bạn hiện đang trống";
	}
	
	include('includes/footer.html');
	
	
?>