<?php
	//Đăng ký tài khoản
	require('includes/mysql.php');
	include('includes/header.html');
	if(isset($_POST['submit']))
	{
		$name = trim($_POST['nickname']);
		$pass = trim($_POST['password']);
		$repass = trim($_POST['re-pass']);
		$email = trim($_POST['email']);
		if(($name == '') or ($pass == '') or ($repass == '') or ($email == ''))
		{
			echo '<div class="info" align="left">Hãy điền đầy đủ thông tin </div>';
		}
		else
		{
		if(preg_match("/^[[:alnum:].-]{4,}$/",stripslashes($name)))
		{
			$nk = mysql_real_escape_string($name,$conn);
		}
		else
		{
			$nk = false;
			echo "<div class='info'> Nickname phải dài ít nhất 4 ký tự. Hãy nhập lại </div>";
		}
		
		if($pass == $repass)
		{
			$ps = mysql_real_escape_string($pass,$conn);
		}
		else
		{
			$ps = false;
			echo "<div class='info'>  Password phải khớp nhau. Hãy nhập lại </div>";
		}
		
		if(preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9_.-]+\.[a-z]{2,4}$/",stripslashes($email)))
		{
			$em =  mysql_real_escape_string($email,$conn);
		}
		else
		{
			$em = false;
			echo "<div class='info'> Hãy nhập email hợp lệ </div>";
		}
		
		if(($nk !=false)&&($ps !=false) &&($em !=false))
		{
			$query = "Select * from users  where user_name='".$nk."'";
			$result = mysql_query($query);
			if(mysql_num_rows($result)==0)
			{
				$query2 = "insert into users(user_name,password,email)". "values('".$nk."','".$ps."','".$em."')";
				if(mysql_query($query2,$conn))
				{
					echo "<div class='info'>Cám ơn. Bạn đã đăng ký thành công. </div>";
					include('includes/footer.html');
					exit();
				}
				else
				{
					echo "Error inserting:".mysql_error();
				}
			}
			else
			{
				echo "<div class='info'> Nick của bạn đã có người đăng ký. Xin nhập một nick khác.</p>";
			}
			mysql_close($conn);	
		}
		}
	}
?>
<link href="css/register.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="js/jquery-1.9.1.js"></script>
<center>
<br clear="all" />
<div style="font-family:Verdana, Geneva, sans-serif; font-size:24px;">Đăng ký thành viên</div><br clear="all" /><br clear="all" />
<center>
<!-- Code Begins -->
<div class="vpb_main_wrapper">

<div style="width:520px;float:left;padding:10px;" align="left"><div id="submit_without_page_refresh_status" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;"></div></div><br clear="all">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div style="width:100px;float:left;padding:10px;padding-top:20px;font-family:Verdana, Geneva, sans-serif; font-size:11px; color:black;" align="left">Nhập nick đăng ký:</div>
<div style="width:400px;float:left;padding:10px;" align="left"><input type="text" name="nickname" class="vpb_textAreaBoxInputs" /></div><br clear="all">

<div style="width:100px;float:left;padding:10px;padding-top:20px;font-family:Verdana, Geneva, sans-serif; font-size:11px; color:black;" align="left">Nhập password:</div>
<div style="width:400px;float:left;padding:10px;" align="left"><input type="password" name="password" class="vpb_textAreaBoxInputs" /></div><br clear="all">

<div style="width:100px;float:left;padding:10px;padding-top:20px;font-family:Verdana, Geneva, sans-serif; font-size:11px; color:black;" align="left">Nhập lại password:</div>
<div style="width:400px;float:left;padding:10px;" align="left"><input type="password" name="re-pass" class="vpb_textAreaBoxInputs" /></div><br clear="all">

<div style="width:100px;float:left;padding:10px;padding-top:20px;font-family:Verdana, Geneva, sans-serif; font-size:11px; color:black;" align="left">Email Address:</div>
<div style="width:400px;float:left;padding:10px;" align="left"><input type="text" name="email" class="vpb_textAreaBoxInputs" /></div><br clear="all">

<div style="width:120px;float:left;" align="left">&nbsp;</div>
<div style="width:400px;float:left;padding:10px;" align="left">
<input type="submit" name="submit" class="vpb_general_button" value="Hoàn tất đăng ký" /> </div>
</form>
<br clear="all">
</div>
<!-- Code Ends -->









</center>
</center>

<?php
	include('includes/footer.html');
?>