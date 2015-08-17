<?php
	//Xem thông tin về đơn đặt hàng
	require('includes/mysql.php');
	include('includes/header.html');
?>
<link href="css/register.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="js/jquery-1.9.1.js"></script>
<table width="996" align="center"  cellspacing="0" cellpadding="0"style="float:center;">
					<tr align="left" valign="top">
							<td width="500" height="334">
								<table width="500"  cellspacing="0" cellpadding="0">
									<tr>
										<td height="320" align="left" valign="top" colspan="2">
											<div class="category"><img src="images/spacer.gif" alt="" width="30" height="19">Tài khoản của bạn<a href="#"><img src="images/spacer.gif" alt="" width="10" height="10" border="0"></a></div>
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="#">Hi: </a></div>
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="#">Đơn hàng đã gửi</a></div>
						
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="#">Tra cứu đơn hàng</a></div>
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="#">Sản phẩm đã lưu</a></div>
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="#">Đấu giá tham gia</a></div>
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="#">Hòm thư</a></div>
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="#">Thông tin cá nhân</a></div>
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="change_password.php">Đổi mật khẩu</a></div>
										</td>		
	<td width="600px" height="300" align="center">
	<?php
	
	echo '<div style="font-family:Verdana, Geneva, sans-serif; font-size:17px;float:center;">&nbsp;&nbsp;&nbsp;Thông tin đơn hàng<br/><br/></div>';
	echo "<table border='1'>";
	echo "<th>";
	echo "Tên sản phẩm";
	echo "</th>";
	echo "<th>";
	echo "Số lượng";
	echo "</th>";
	$query = "Select * from (orders LEFT OUTER JOIN order_details on orders.id = order_details.order_id) INNER JOIN products on order_details.product_id = products.id where user_id = '".$_SESSION['user_id']."'";;
	$result = mysql_query($query);
	$data = array();
	while($row = mysql_fetch_array($result))
	{
	$data[] = array($row['product'],$row['address'],$row['number_per'],$row['subtotal']);
	}
	foreach($data as $key)
						{
                            echo"<tr>";
                            echo"<td>";
							echo $key[0];
							echo "</td>";
							echo "<td>";
							echo $key[2];
							echo "</td>";
						}
	
	
	echo "</table>";
	mysql_close($conn);
		?>
	</td>
</tr>
</table>

<!-- Code Ends -->
<?php
	include('includes/footer.html');
?>
