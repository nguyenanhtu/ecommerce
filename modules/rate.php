<?php
	require('../includes/mysql.php');
	if(isset($_POST['id']) and isset($_POST['uid']))
	{
		$id = mysql_real_escape_string($_POST['id'],$conn);
		$name = mysql_real_escape_string($_POST['name'],$conn);
		$uid = mysql_real_escape_string($_POST['uid'],$conn);
		$query = mysql_query('select * from products where id="'.$id.'"');
		$uid_query = mysql_query('select * from likes where product_id="'.$id.'" and user_id="'.$uid.'"');
		$countlike = mysql_num_rows($uid_query);
		while($row = mysql_fetch_array($query))
		{
			$like = $row['likes'];
		}
		if($countlike==0)
		{
	    $like_update = $like +1;
		$query2 = mysql_query('update products set likes = "'.$like_update.'" where id="'.$id.'"');
		$query3 = mysql_query('insert into likes (product_id,user_id) values("'.$id.'","'.$uid.'")');
		echo $like_update;
		}
		else if($countlike !=0)
		{
			echo "<script language=javascript>alert('Bạn chỉ được like sản phẩm một lần !!')</script>";
			echo $like;
		}
	    
		
		/*echo "Lượng like :".$likes_update;
		echo "\nLượng dislike:".$dislikes_update;*/
		mysql_close();
	}
?>