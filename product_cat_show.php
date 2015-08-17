<?php
	//Hiển thị sản phẩm tương ứng với từng danh mục
	include('includes/mysql.php');
	include('includes/header.html');
?>
<table width="996"  border="0" cellspacing="0" cellpadding="0">
							<tr align="left" valign="top">
									  <td width="202" height="334">
												  <table width="202"  border="0" cellspacing="0" cellpadding="0">
													<tr>
													  <td height="320" align="left" valign="top">
														<div class="category"><img src="images/spacer.gif" alt="" width="30" height="19">Danh mục nhãn hàng<a href="http://www.templatesfreelance.com/"><img src="images/spacer.gif" alt="" width="10" height="10" border="0"></a></div>
														<?php
														$query = 'select * from categories ';
														$result = mysql_query($query);
														if($result)
														{
														while($row = mysql_fetch_array($result))
														{
														$cat= $row['id'];
														$cat_name = $row['category'];
														echo '<div class="linkmenu"><img src="images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="product_cat_show.php?id='.$cat.'&page=1">'.$cat_name.'</a></div>';
														}
														}
														?>
													</td>
													</tr>
													<tr>
													  <td height="26">&nbsp;</td>
													</tr>
													<tr>
													  <td align="center"><a href="http://www.templatesfreelance.com/"><img src="images/banner.jpg" alt="" width="197" height="215" border="0"></a></td>
													</tr>
												  </table>
									  </td>
									  <td width="20">&nbsp;</td>
									  <td width="774">
										<table width="774"  border="0" cellspacing="0" cellpadding="0">
														  <tr>
																<td width="22">&nbsp;</td>
																<td width="729">&nbsp;</td>
																<td width="23">&nbsp;</td>
														  </tr>
														  <tr>
																<td height="479">&nbsp;</td>
																<td align="left" valign="top">
															
														 <?php
														if(isset($_GET['id']))
														{
															$cat_id = $_GET['id'];
															$page = $_GET['page'];
															$query = "select * from products where category_id=$cat_id";
															$result = mysql_query($query);
															$count_prod = mysql_num_rows($result);
															if($count_prod > 6)
															{
															$num_page = ceil($count_prod/6);
															}
															else
															{
															$num_page = 1;
															}
															$start = 6*($page-1);
															$query2 = "select * from products where category_id=".$cat_id." limit ".$start.",6";
															$paging = mysql_query($query2);
															if($paging)
															{
															while($row = mysql_fetch_array($paging))
															{
                                                                      $pid = $row['id'];
																					echo '<table width="207" height="234"  border="0" cellpadding="0" cellspacing="0" class="productleft_top">';
																					  echo '<tr>';
																						echo '<td align="left" valign="top" class="newtovar">';
																							echo '<table width="207"  border="0" cellspacing="0" cellpadding="0">';
																							  echo '<tr>';
																								echo '<td height="200" valign="top">';
																									echo '<table width="100%"  border="0" cellspacing="0" cellpadding="0">';
																									  echo '<tr>';
																										echo '<td height="53"><span class="style7"><a href="#"> '.$row["product"].' </a> </span></td>';
																									  echo '</tr>';
																									  echo '<tr>';
																										echo '<td height="147" align="center"><a href="http://www.templatesfreelance.com/"><img src="includes/image_products.php?id='.$pid.'" alt="" width="175" height="144" border="0"></a></td>';
																									  echo '</tr>';
																									echo '</table>';
																								echo '</td>';
																								echo '</tr>';
																							  echo '<tr>';
																								echo '<td height="35">';
																									echo '<table width="100%"  border="0" cellspacing="0" cellpadding="0">';
																									  echo '<tr>';
																										echo '<td width="38%" height="24"><span class="style7"><a href="detail_products.php?pid='.$pid.'" id="blue1">More details</a></span></td>';
																										echo '<td width="23%">&nbsp;</td>';
																										echo '<td width="39%" class="price"> '.$row["price"].' VND</td>';
																									  echo '</tr>';
																									echo '</table>';
																								echo '</td>';
																							  echo '</tr>';
																							echo '</table>';
																						echo '</td>';
																					  echo '</tr>';
																					echo '</table>';
															}
															
														 echo '<div id="pager">';
                    	
														if($page >1)
														{
														echo "<a href='product_cat_show.php?id=$cat_id&page=".($page-1)."'> <div class='page-item'>Trước</div> </a>";
														}
														else
														{
														for($i=1;$i<=$num_page;$i++)
														{
														if($i==$page)
														{
														echo "<div class='page-item-v' > <b> $i </b> </div>";
														}
														else
														{
														echo "<a href='product_cat_show.php?id=$cat_id&page=".$i."'> <div class='page-item'>".$i."</div> </a>";
														}
													    }
														echo '</div>';
														}
														}
														else
														{
															echo "Chưa có sản phẩm nào cho nhãn hàng này.";
														}
														}
														?>
												</td>
																<td>&nbsp;</td>
														  </tr>
													</table>
											</td>
							</tr>					

</table>

