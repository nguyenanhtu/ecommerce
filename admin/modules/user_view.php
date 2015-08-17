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
                	<h3>Danh sách các users</h3>
					<?php
						if($nums_page >0)
						{
					?>
                	<table width='100%'>
						<thead>
							<tr>
                            	<th width="40px">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></th>
                            	<th>Nickname</th>
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
							echo "<a href='users.php?uid=".$key[0]."'>".$key[1]."</a>";
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
								echo "<a href='users.php?page=".($page-1)."'> <div class='page-item'>Trước</div> </a>";
							}
							for($i=1;$i<=$nums_page;$i++)
							{
								if($i==$page)
								{
										echo "<div class='page-item-v' > <b> $i </b> </div>";
									
								}
								else
								{
									echo "<a href='users.php?page=".$i."'> <div class='page-item'>".$i."</div> </a>";
								}
							}
					    }
						else
						{
							echo "<div id='content'> Hiện chưa có user nào đăng ký</div>";
						}
						?>
                    </div>
                <br />