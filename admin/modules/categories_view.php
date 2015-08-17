<?php
if(isset($_POST['upload']))
	{
		$name = $_POST['name'];
		$desc = $_POST['descript'];
		$category = $_FILES['image']['tmp_name'];
		$fa = fopen($category,"rb");
		$data = fread($fa, filesize($category));
		fclose($fa);
		$cat->insert_cat($name,$desc,$data);
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
                            	<th>Tên danh mục</th>
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
							echo "<a href='index_categories.php?cid=".$key[0]."'>".$key[1]."</a>";
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
								echo "<a href='index_categories.php?page=".($page-1)."'> <div class='page-item'>Trước</div> </a>";
							}
							for($i=1;$i<=$nums_page;$i++)
							{
								if($i==$page)
								{
									echo "<div class='page-item-v' > <b> $i </b> </div>";
									
								}
								else
								{
									echo "<a href='index_categories.php?page=".$i."'> <div class='page-item'>".$i."</div> </a>";
								}
							}
					    }
						else
						{
							echo "Hiện chưa có sản phẩm nào";
						}
						?>
                    </div>
                <br />
                <div id="box">
                    <form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                      <fieldset id="personal">
                        <legend>THÊM DANH MỤC MỚI</legend>
                        <label for="name">Nhập tên danh mục : </label> 
                        <input name="name" id="name" type="text" tabindex="1" size="100" />
                        <br />
                        <label for="descript">Nhập mô tả : </label> 
                        <input name="descript" id="descript" type="text" tabindex="1" size="100" />
                        <br />
						<label for="image">Tải ảnh : </label>
					    <input name="MAX_FILE_SIZE" value="102400" type="hidden">
						<input name="image" accept="image/jpeg" type="file">
                        <br />
                      </fieldset>
                      <div align="center">
                      <input id="button1" type="submit" value="Gửi dữ liệu" name="upload" /> 
                      </div>
                    </form>

                </div>
</div>