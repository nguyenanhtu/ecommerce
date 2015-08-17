<?php
	//Trang đăng xuất
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_pass']);
	setcookie('userid','',time()-10000000,'/');
	setcookie('username','',time()-10000000,'/');
	setcookie('userpass','',time()-10000000,'/');
	echo "Redirecting ...";
	header("Refresh:3,url=index.php");
?>