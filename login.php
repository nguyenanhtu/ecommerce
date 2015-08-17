<?php
	//Trang đăng nhập
	require('includes/mysql.php');
	include('includes/header.html');
	if(isset($_POST['submit']))
	{
		$user = trim($_POST['username']);
		$pass = trim($_POST['password']);
		if($user== '')
		{
			echo "<div class='info'> Bạn chưa nhập nickname </div>";
		}
		else
		{
			$user =  mysql_real_escape_string($_POST['username'],$conn);
		}
		
		if($pass == '')
		{
			echo "<div class='info'> Bạn chưa nhập password </div>";
		}
		else
		{
			$pass = mysql_real_escape_string($_POST['password'],$conn);
		}
		
		if(($user != '') && ($pass != ''))
		{
			$query = "Select id,user_name,password from users where user_name='".$user."' and password='".$pass."'";
			$result = mysql_query($query);
			//Bug 1
			if($row = mysql_fetch_array($result))
			{
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['user_pass'] = $row['password'];
				if(isset($_POST['remem']))
				{
					setcookie('userid',$_SESSION['user_id'],time()+10000000,'/');
					setcookie('username',$_SESSION['user_name'],time()+10000000,'/');
					setcookie('userpass',$_SESSION['user_pass'],time()+10000000,'/');
				}
				
				echo "<div class='info'> Bạn đã đăng nhập thành công </div>";
				header("Refresh:3,url=index.php");
			}
			else
			{
				echo "<div class='info'> Tên đăng nhập và pass ko đúng </div>";
			}
			
			
		}
		mysql_close($conn);
	}
	
?>

<link href="css/register.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="js/jquery-1.9.1.js"></script>
<center>
<br clear="all" />
<div style="font-family:Verdana, Geneva, sans-serif; font-size:24px;">Đăng nhập</div><br clear="all" /><br clear="all" />
<center>
<!-- Code Begins -->
<div class="vpb_main_wrapper">

<div style="width:520px;float:left;padding:10px;" align="left"><div id="submit_without_page_refresh_status" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;"></div></div><br clear="all">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div style="width:100px;float:left;padding:10px;padding-top:20px;font-family:Verdana, Geneva, sans-serif; font-size:11px; color:black;" align="left">Tên đăng nhập:</div>
<div style="width:400px;float:left;padding:10px;" align="left">
<input type="text" name="username" class="vpb_textAreaBoxInputs" /></div><br clear="all"/>

<div style="width:100px;float:left;padding:10px;padding-top:20px;font-family:Verdana, Geneva, sans-serif; font-size:11px; color:black;" align="left">Password:</div>
<div style="width:400px;float:left;padding:10px;" align="left">
<input type="password" name="password" class="vpb_textAreaBoxInputs" /></div><br clear="all">

<p> <input type="checkbox" name="remem" /> Remember me ? </p>
<div style="width:120px;float:left;" align="left">&nbsp;</div>
<div style="width:400px;float:left;padding:10px;" align="left">

<input type="submit" name="submit" class="vpb_general_button" value="Đăng nhập" /> </div>
</form>
<br clear="all">
</div>
<!-- Code Ends -->
</center>
</center>

<?php
	include('includes/footer.html');
?>