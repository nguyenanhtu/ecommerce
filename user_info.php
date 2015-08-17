<?php
	//Thông tin tài khoản user
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
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="user_orders.php">Đơn hàng đã gửi</a></div>
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="user_info.php">Thông tin cá nhân</a></div>
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="change_password.php">Đổi mật khẩu</a></div>
										</td>		
	<td width="600px" height="300" align="center">
	<?php
	
	echo '<div style="font-family:Verdana, Geneva, sans-serif; font-size:17px;float:center;">&nbsp;&nbsp;&nbsp;Thông tin cá nhân<br/><br/></div>';
			$query = 'select * from users where id="'.$_SESSION['user_id'].'"';
			$result = mysql_query($query);
			if($row = mysql_fetch_array($result))
				{
					$id=$row['id'];
					$pass=$row['password'];
					$name=$row["user_name"];
					$email=$row["email"];
					echo '<table  class= "bang" width="600px" height="200px" border="1px">';
						echo '<tr>';
							echo '<td border="1px" width="300px" height="50px" align="center">';
								echo "Tên người dùng";
							echo '</td>';
								
							echo '<td border="1px" width="300px" height="50px" align="center">';
								echo $name;
							echo '</td>';
							
						echo '</tr>';
						echo '<tr>';
							echo '<td border="1px" width="300px" height="50px" align="center">';
								echo "Password";
							echo '</td>';
								
							echo '<td border="1px" width="300px" height="50px" align="center">';
								echo $pass;
							echo '</td>';
							
						echo '</tr>';
						echo '<tr>';
							echo '<td border="1px" width="300px" height="50px" align="center">';
								echo "Email";
							echo '</td>';
							echo '<td border="1px" width="300px" height="50px" align="center">';
								echo $email;
							echo '</td>';
							
						echo '</tr>';
					echo '</table>';
			}
		?>
	</td>
</tr>
</table>

<!-- Code Ends -->
<?php
	include('includes/footer.html');
?>
