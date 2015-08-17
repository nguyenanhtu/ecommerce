<?php
	if(isset($_POST['delbut']))
	{
		$uid = $_POST['id'];
		if($user->del_user($uid))
		{
			echo "<div id='content'> <p>Đã xóa thành công</p> </div>";
		}
		else
		{
			echo "<div id='content'> <p>Có lỗi trong quá trình xử lý</p> </div>";
		}	
	}
?>

<div id="content">
                <div id="box">
                	<h3>Chi tiết thông tin users</h3>
                	<table width='100%'>
						<thead>
							<tr>
                            	<th width="40px">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></th>
                            	<th> Nickname</th>
								<th> Password </th>
								<th> Email </th>
                            </tr>
						</thead>
						<tbody>
						<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" >
						<?php
							if($row=mysql_fetch_array($results))
							{
								echo "<tr>";
								echo "<td>";
								echo $row["id"];
								echo "<input type='hidden' value='".$row['id']."' name='id' />";
								echo "</td>";
								echo "<td>";
								echo $row['user_name'];
								echo "</td>";
								echo "<td>";
								echo $row['password'];
								echo "</td>";
								echo "<td>";
								echo $row['email'];
								echo "</td>";
								echo "<td>";
								echo "<input type='submit' value='Xóa' name='delbut' />";
								echo "</td>";
								echo "</tr>";
							}
						?>
						</tbody>
					</table>