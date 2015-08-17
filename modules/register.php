<?php
	if(isset($_POST['submit']))
	{
		$name = $_POST['nickname'];
		$pass = $_POST['password'];
		$repass = $_POST['re-pass'];
		$email = $_POST['email'];
		$add = mysql_real_escape_string($_POST['address'],$conn);
		if(preg_match("/^[[:alnum:].-]{4,}$/",stripslashes(trim($name))))
		{
			$nk = mysql_real_escape_string($name,$conn);
		}
		else
		{
			$nk = false;
			echo "<p color='red'> Nickname phải dài ít nhất 4 ký tự. Hãy nhập lại </p>";
		}
		
		if($pass == $repass)
		{
			$ps = mysql_real_escape_string($pass,$conn);
		}
		else
		{
			$ps = false;
			echo "<p color='red'> Password phải khớp nhau. Hãy nhập lại </p>";
		}
		
		if(preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9_.-]+\.[a-z]{2,4}$/",stripslashes(trim($email))))
		{
			$em =  mysql_real_escape_string($email,$conn);
		}
		else
		{
			$em = false;
			echo "<p color='red'> Hãy nhập email hợp lệ </p>";
		}
		
		if(($nk !=false)&&($ps !=false) &&($em !=false))
		{
			$query = "Select * from customers  where username='".$nk."'";
			$result = mysql_query($query);
			if(mysql_num_rows($result)==0)
			{
				$query2 = "insert into customers(username,password,email,address)". "values('".$nk."','".$ps."','".$em."','".$add."')";
				if(mysql_query($query2,$conn))
				{
					echo "Cám ơn. Bạn đã đăng ký thành công.";
					include('../views/footer.html');
					exit();
				}
				else
				{
					echo "Error inserting:".mysql_error();
				}
			}
			else
			{
				echo "<p color='red'> Nick của bạn đã có người đăng ký. Xin nhập một nick khác.</p>";
			}
			mysql_close($conn);	
		}
		else
		{
			echo "<p> Hãy nhập lại </p>";
		}
	}
?>

<form action="<?php echo $_SERVER['PHP_SELF'].'?p=register'; ?>" method="POST">
	<p> <b>Nhập nickname </b> </p><input type="text" size="100" name="nickname" />
	<p><b> Nhập password </b> </p> <input type="password" size="100" name="password" />
	<p><b> Nhập lại password </b> </p> <input type="password" size="100" name="re-pass" />
	<p><b> Nhập email </b> </p> <input type="text" size="100" name="email" />
	<p><b> Nhập địa chỉ </b> </p> <input type="text" size="100" name="address" />
	<div align="center"> <input type="submit" name="submit" value="Hoàn tất đăng ký" /> </div>
</form>
