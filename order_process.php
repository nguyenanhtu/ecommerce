<?php
	//Xử lý nhập đơn hàng
include('includes/mysql.php');
include('includes/header.html');
if(isset($_POST['submit']))
	{
	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$credit = $_POST['credit'];
	$total = $_POST['total'];
	$pid = $_POST['pid'];
	$subtt = $_POST['subtt'];
	$number = $_POST['number'];
	$query1 = "insert into orders(user_id,full_name,address,credit_card,total)". "values('".$_SESSION['user_id']."','".$fullname."','".$address."','".$credit."','".$total."')";
	$result1 = mysql_query($query1);
	if($result1)
	{
		$query2 = 'select * from orders where user_id="'.$_SESSION['user_id'].'"';
		$result2 = mysql_query($query2);
		$oid = '';
		if($row = mysql_fetch_array($result2))
		{
			$oid = $row['id'];
		}
		for($i=0;$i<count($pid);$i++)
		{
			$query3 = "insert into order_details(order_id,product_id,number_per,subtotal)". "values('".$oid."','".$pid[$i]."','".$number[$i]."','".$subtt[$i]."')";
			$result3 = mysql_query($query3);
		}
			unset($_SESSION['cart']);
			for($i=0;$i<count($pid);$i++)
			{
				$query4 = 'update products set quantity=quantity-'.$number[$i].' where id="'.$pid[$i].'"';
				$result4 = mysql_query($query4);
			}
			echo "Cám ơn bạn đã đặt mua hàng. Hy vọng sản phẩm của chúng tôi sẽ làm bạn hài lòng";
	}
	mysql_close($conn);
	}
include('includes/footer.html');
?>