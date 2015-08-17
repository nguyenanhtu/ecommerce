<?php
	if(isset($_POST['delbut']))
	{
		$pid = $_POST['id'];
		if($prod->del_prod($pid))
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
		$pid= $_POST['id'];
		$name = $_POST['product'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$weight = $_POST['weight'];
		$maker = $_POST['maker'];
		$color = $_POST['color'];
		if($prod->update_prod($pid,$name,$price,$quantity,$weight,$maker,$color))
		{
			echo "<div id='content'> <p>Bản ghi đã được cập nhật thành công</p> </div>";
		}
		else
		{
			echo "<div id='content'> <p>Có lỗi trong quá trình xử lý</p> </div>";
		}
		
	}
	if(isset($_POST['upload_file']))
	{
		$pid = $_POST['id'];
		$filename = $_FILES['file_up']['name'];
		$filetype = $_FILES['file_up']['type'];
		$prod->insert_up($pid,$filename,$filetype);
		if(move_uploaded_file($_FILES['file_up']['tmp_name'],"../uploads/".$filename.""))
		{
			echo "<p> Tập tin đã được tải lên </p>";
		}
		else
		{
			echo "<p> Có lỗi đã xảy ra </p>";
		}
	}
?>

<div id="content">
                <div id="box">
                	<h3>Chi tiết thông tin sản phẩm</h3>
                	<table width='100%'>
						<thead>
							<tr>
                            	<th width="40px">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></th>
                            	<th>Danh mục sản phẩm</th>
								<th> Tên sản phẩm </th>
								<th> Hình ảnh </th>
								<th> Giá sản phẩm </th>
								<th> Số lượng hàng </th>
								<th> Ngày nhập </th>
								<th> Lượng like </th>
								<th> Trọng lượng </th>
								<th> Nhà sản xuất </th>
								<th> Màu sản phẩm </th>
                            </tr>
						</thead>
						<tbody>
						<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" enctype="multipart/form-data">
						<?php
							if($row=mysql_fetch_array($results))
							{
								$pid = $row["id"];
								$cid = $row["category_id"];
								$catprod = $prod->show_cat_prod($cid);
								echo "<tr>";
								echo "<td>";
								echo $row["id"];
								echo "<input type='hidden' value='".$row['id']."' name='id' />";
								echo "</td>";
								echo "<td>";
								echo "<input type='text' value='".$catprod."' name='product' />";$catprod;
								echo "</td>";
								echo "<td>";
								echo "<input type='text' value='".$row["product"]."' name='product' />";
								echo "</td>";
								echo "<td>";
								echo "<img src='modules/image_prod.php?id=".$pid."' />";
								echo "</td>";
								echo "<td>";
								echo "<input type='text' value='".$row["price"]."' name='price' />";
								echo "</td>";
								echo "<td>";
								echo "<input type='text' value='".$row["quantity"]."' name='quantity' />";
								echo "</td>";
								echo "<td>";
								echo date('d-m-Y',strtotime($row["date_created"])); 
								echo "</td>";
								echo "<td>";
								echo $row["likes"];
								echo "</td>";
								echo "<td>";
								echo "<input type='text' value='".$row["weight"]."' name='weight' />";
								echo "</td>";
								echo "<td>";
								echo "<input type='text' value='".$row["maker"]."' name='maker' />";
								echo "</td>";
								echo "<td>";
								echo "<input type='text' value='".$row["color"]."' name='color' />";
								echo "</td>";
								echo "<td>";
								echo "<input type='submit' value='Xóa' name='delbut' />";
								echo "</td>";
								echo "</tr>";
								
							}
						?>
						</tbody>
					</table>
					<label for="file_up">Tải tập tin mô tả : </label>
					<input name="MAX_FILE_SIZE" value="409600" type="hidden" />
					<input name="file_up"  type="file" />
					<input type="submit" value="Up file" name="upload_file" />
					<input type="submit" value="Update" name="up" />
				   </form>
				   
                  </div>
              
</div>
