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
                	<h3>Danh sách các đơn hàng</h3>
					<?php
						if($nums_page >0)
						{
					?>
                	<table width='100%'>
						<thead>
							<tr>
                            	<th width="40px">Tên mặt hàng<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></th>
                            	<th>Tên Khách Hàng</th>
								<th>Địa chỉ</th>
								<th>Ngày đặt hàng</th>
								<th>Số lượng</th>
								<th>Thanh toán</th>
                            </tr>
						</thead>
						<tbody>
						<?php
						$revenue = 0;
						foreach($dataonepage as $key)
						{
                            echo"<tr>";
                            echo"<td class='a-center'>";
							echo $key[0];
							echo "</td>";
							echo "<td>";
							echo $key[1];
							echo "</td>";
							echo"<td class='a-center'>";
							echo $key[2];
							echo "</td>";
							echo "<td>";
							echo $key[3];
							echo "</td>";
							echo"<td class='a-center'>";
							echo $key[4];
							echo "</td>";
							echo "<td>";
							echo $key[5];
							echo "</td>";
                            echo "</tr>";
							$revenue += $key[6];
						}
						?>
						</tbody>
					</table>
                    <div id="pager">
                    	<?php
							if($page >1)
							{
								echo "<a href='index_orders.php?page=".($page-1)."'> <div class='page-item'>Trước</div> </a>";
							}
							for($i=1;$i<=$nums_page;$i++)
							{
								if($i==$page)
								{
										echo "<div class='page-item-v' > <b> $i </b> </div>";
									
								}
								else
								{
									echo "<a href='index_orders.php?page=".$i."'> <div class='page-item'>".$i."</div> </a>";
								}
							}
					    }
						else
						{
							echo "<div id='content'> Hiện chưa có đơn hàng nào </div>";
						}
						?>
                    </div>
					<?php
						echo "<div id='content'> Tổng doanh thu :".number_format($revenue,0,'.','.')." VNĐ </div>";
					?>
                <br />