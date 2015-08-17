<?php
	if(isset($_POST['delbut']))
	{
		$cid = $_POST['id'];
		if($cat->del_cat($cid))
		{
			echo "<div id='content'> <p>Đã xóa thành công</p> </div>";
		}
		else
		{
			echo "<div id='content'> <p>Có lỗi trong quá trình xử lý</p> </div>";
		}
		
		
	}
	if(isset($_POST['up']))
	{
		$cid= $_POST['id'];
		$name = $_POST['category'];
		$descript = $_POST['descript'];
		if($cat->update_cat($cid,$name,$descript))
		{
			echo "<div id='content'> <p>Bản ghi đã được cập nhật thành công</p> </div>";
		}
		else
		{
			echo "<div id='content'> <p>Có lỗi trong quá trình xử lý</p> </div>";
		}
		
	}
?>


<div id="content">
                <div id="box">
                	<h3>Chi tiết danh mục sản phẩm</h3>
                	<table width='100%'>
						<thead>
							<tr>
                            	<th width="40px">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></th>
                            	<th>Tên danh mục</th>
								<th> Mô tả danh mục </th>
								<th> Hình ảnh </th>
								<th> Xóa </th>
                            </tr>
						</thead>
						<tbody>
						<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
						<?php
							if($row=mysql_fetch_array($results))
							{
								$cid = $row["id"];
								echo "<tr>";
								echo "<td>";
								echo $row["id"];
								echo "<input type='hidden' value='".$row['id']."' name='id' />";
								echo "</td>";
								echo "<td>";
								echo "<input type='text' value='".$row["category"]."' name='category' />";
								echo "</td>";
								echo "<td>";
								echo "<input type='text' value='".$row["description"]."' name='descript' />";
								echo "</td>";
								echo "<td>";
								echo "<img src='modules/image_cat.php?id=".$cid."' />";
								echo "</td>";
								echo "<td>";
								echo "<input type='submit' value='Xóa' name='delbut' />";
								echo "</td>";
								echo "</tr>";
								
							}
						?>
						</tbody>
					</table>
                   <input type="submit" value="Update" name="up" />
				   </form>
                  </div>
              
</div>
