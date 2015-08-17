<?php
	if(isset($_POST['submit']))
	{
		if(!isset($_POST['username']))
		{
			$user = false;
			echo "<p><font color='red'> Bạn chưa nhập nickname </font> </p>";
		}
		else
		{
			$user =  mysql_real_escape_string($_POST['username'],$conn);
		}
		
		if(!isset($_POST['password']))
		{
			$pass = false;
			echo "<p><font color='red'> Bạn chưa nhập password. </font> </p>";
		}
		else
		{
			$pass = mysql_real_escape_string($_POST['password'],$conn);
		}
		
		if(($user != false) && ($pass != false))
		{
			$query = "Select id,username,password from customers where username='".$user."' and password='".$pass."'";
			$result = mysql_query($query);
			//Bug 1
			if($row = mysql_fetch_array($result))
			{
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['user_name'] = $row['username'];
				$_SESSION['user_pass'] = $row['password'];
				if(isset($_POST['remem']))
				{
					setcookie('userid',$_SESSION['user_id'],time()+10000000,'/');
					setcookie('username',$_SESSION['user_name'],time()+10000000,'/');
					setcookie('userpass',$_SESSION['user_pass'],time()+10000000,'/');
				}
				
				echo "<p> Bạn đã đăng nhập thành công </p>";
			}
			else
			{
				echo "<p> Tên đăng nhập và pass ko đúng </p>";
			}
			mysql_close();
			
		}
	}
?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
	<p> <b>Tên Đăng Nhập </b> </p><input type="text" size="100" name="username" />
	<p><b> Password </b> </p> <input type="password" size="100" name="password" />
	<p> <input type="checkbox" name="remem" /> Remember me ? </p>
	<div align="center"> <input type="submit" name="submit" value="Đăng nhập" /> </div>
</form>
