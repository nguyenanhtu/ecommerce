<?php
	//Thay đổi mật khẩu users
	require('includes/mysql.php');
	include('includes/header.html');
	
	if(isset($_POST['update']))
	{
		$pass1=$_POST['pass1'];
		if(!isset($_POST['pass']))
		{
			$pass = false;
			echo "<div class='info'>Bạn chưa nhập password cũ</div>";
		}
		else
		{
			$pass =  mysql_real_escape_string($_POST['pass'],$conn);
		}
		if(!isset($_POST['pass1']))
		{
			$pass1 = false;
			echo "<p><font color='red'> Bạn chưa nhập password mới. </font> </p>";
		}
		else
		{
			$pass1= mysql_real_escape_string($_POST['pass1'],$conn);
		}
		if(!isset($_POST['pass1']))
		{
			$pass2 = false;
			echo "<p><font color='red'> Bạn chưa nhập password mới. </font> </p>";
		}
		else
		{
			$pass2= mysql_real_escape_string($_POST['pass2'],$conn);
		}
		if(($pass1 != false) && ($pass2 != false))
		{
			$query = 'Update users set password ="'.$pass1.'" where id="'.$_SESSION["user_id"].'"';
			$result = mysql_query($query);
			if($result)
			{
				echo "<div class='info'> Bạn đã thay đổi thành công </div>";
			}
			else
			{
			
			}
			mysql_close();
			
		}
	}
	
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
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="thongtincanhan.php">Thông tin cá nhân</a></div>
														<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="#">Đổi mật khẩu</a></div>
										</td>		
<td width="400px" height="281" align="center">
	<div class="vpb_main_wrapper" >
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div style="font-family:Verdana, Geneva, sans-serif; font-size:17px;float:center">&nbsp;&nbsp;&nbsp;Thay đổi mật khẩu đăng nhập<br/><br/></div>
				<div style="width:100px;float:left;padding:10px;padding-top:10px;font-family:Verdana, Geneva, sans-serif; font-size:12px; color:chocolate;">Mật khẩu cũ:</div>
				<div style="width:400px;float:left;padding:10px;" align="left"></div>
					<input type="password" name="pass" class="vpb_textAreaBoxInputs"/>
				<div style="width:100px;float:left;padding:10px;padding-top:10px;font-family:Verdana, Geneva, sans-serif; font-size:12px; color:chocolate;" >Mật khẩu mới:</div>
				<div style="width:400px;float:left;padding:10px;" align="left"></div>
					<input type="password" name="pass1" class="vpb_textAreaBoxInputs">
					<div style="width:100px;float:left;padding:10px;padding-top:10px;font-family:Verdana, Geneva, sans-serif; font-size:12px; color:chocolate;" >Nhập lại mật khẩu mới:</div>
				<div style="width:400px;float:left;padding:10px;" align="left"></div>
					<input type="password" name="pass2" class="vpb_textAreaBoxInputs">
				<div style="float:right;height:1px;">
					<input type="submit" name="update" class="vpb_general_button" value="Thay đổi" /> 
				</div>
			</form>
	</div>
	</td>
</tr>
</table>
<!-- Code Ends -->
<?php
	include('includes/footer.html');
?>