<?php
if(isset($_POST['upload']))
	{
		$cat_id = $_POST['categories_name'];
		$name= $_POST['name'];
		$small_img = $_FILES['image_small']['tmp_name'];
		$fa = fopen($small_img,"rb");
		$data_small = fread($fa, filesize($small_img));
		fclose($fa);
		$big_img = $_FILES['image_big']['tmp_name'];
		$fa2 = fopen($big_img,"rb");
		$data_big = fread($fa2, filesize($big_img));
		fclose($fa2);
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$weight = $_POST['weight'];
		$maker = $_POST['maker'];
		$color = $_POST['color'];
		$prod->insert_pro($cat_id,$name,$data_small,$data_big,$price,$quantity,$weight,$maker,$color);
	}
?>

<style>
.clear{
	clear:both;}
.trang{
	
	width:620px;
	margin:auto;
	text-align:center;
}
.page-item{
	border:thin #3CC solid;
	border-radius:3px;
	padding:3px;
	float:left;
	margin-left:3px;	
}
.page-item:hover{
	border:thin #3CC solid;
	border-radius:3px;
	padding:3px;
	float:left;
	margin-left:3px;
	background:pink;	
}
.page-item-v{
	border:thin #3CC solid;
	border-radius:3px;
	padding:3px;
	float:left;
	margin-left:3px;
	background:#FF0;
		
}
</style>

<div id="content">
                <div id="box">
                	<h3>Các loại danh mục sản phẩm</h3>
					<?php
						if($nums_page >0)
						{
					?>
                	<table width='100%'>
						<thead>
							<tr>
                            	<th width="40px">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></th>
                            	<th>Tên sản phẩm</th>
                            </tr>
						</thead>
						<tbody>
						<?php
						foreach($dataonepage as $key)
						{
                            echo"<tr>";
                            echo"<td class='a-center'>";
							echo $key[0];
							echo "</td>";
							echo "<td>";
							echo "<a href='index_products.php?pid=".$key[0]."'>".$key[1]."</a>";
							echo "</td>";
                            echo "</tr>";
						}
						?>
						</tbody>
					</table>
                    <div id="pager">
                    	<?php
							if($page >1)
							{
								echo "<a href='index_products.php?page=".($page-1)."'> <div class='page-item'>Trước</div> </a>";
							}
							for($i=1;$i<=$nums_page;$i++)
							{
								if($i==$page)
								{
										echo "<div class='page-item-v' > <b> $i </b> </div>";
									
								}
								else
								{
									echo "<a href='index_products.php?page=".$i."'> <div class='page-item'>".$i."</div> </a>";
								}
							}
					    }
						else
						{
							echo "<div id='content'> Hiện chưa có sản phẩm nào </div>";
						}
						?>
                    </div>
                <br />
                <div id="box">
                    <form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                      <fieldset id="personal">
                        <legend>THÊM SẢN PHẨM MỚI</legend>
                        <label for="name">Nhập tên sản phẩm : </label> 
                        <input name="name" id="name" type="text" tabindex="1" size="100" />
                        <br />
                        <label for="category">Chọn danh mục sản phẩm : </label> 
                        <select name='categories_name'> 
						<?php
						foreach($datacat as $key)
						{
						echo "<option value=";
						echo $key[0];
						echo ">".$key[1]."</option>";
						}
						?>
						</select>
                        <br />
						<label for="image_small">Tải ảnh cỡ nhỏ : </label>
					    <input name="MAX_FILE_SIZE" value="102400" type="hidden"/>
						<input name="image_small" accept="image/jpeg" type="file" />
                        <br />
						<label for="image_big">Tải ảnh cỡ lớn : </label>
					    <input name="MAX_FILE_SIZE" value="204800" type="hidden" />
						<input name="image_big" accept="image/jpeg" type="file" />
						 <br />
						<label for="price">Nhập giá (VNĐ) : </label> 
                        <input name="price" id="price" type="text" tabindex="1" size="100" />
						<br />
						<label for="quantity">Nhập số lượng sản phẩm : </label> 
                        <input name="quantity" id="quantity" type="text" tabindex="1" size="100" />
						<br />
						<label for="weight">Nhập khối lượng sản phẩm : </label> 
                        <input name="weight" id="name" type="text" tabindex="1" size="100" />
						<br />
						<label for="maker">Nhập hãng sản xuất : </label> 
                        <input name="maker" id="maker" type="text" tabindex="1" size="100" />
						<br />
						<label for="color">Nhập màu sắc : </label> 
                        <input name="color" id="color" type="text" tabindex="1" size="100" />
						<br />
                      </fieldset>
                      <div align="center">
                      <input id="button1" type="submit" value="Gửi dữ liệu" name="upload" /> 
                      </div>
                    </form>

                </div>
</div>