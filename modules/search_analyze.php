<?php
	include('../includes/mysql.php');
	$html ='';
	$html .= '<li class="result">';
	$html .= '<a href="urlString">';
	$html .= '<h3>nameString</h3>';
	$html .= '</a>';
	$html .= '</li>';
	if(isset($_POST['keyword']))
	{
		$keyword = mysql_real_escape_string($_POST['keyword'],$conn);
		$query = 'SELECT * FROM products WHERE product LIKE "%'.$keyword.'%"';
		$result = mysql_query($query);
		if($result)
		{
			while($row = mysql_fetch_array($result))
			{
				$display_result = '<b> '.$row["product"].' </b>';
				$link = 'detail_products.php?pid='.$row["id"].'';
				$output = str_replace('nameString',$display_result,$html);
				$output2 = str_replace('urlString',$link,$output);
				echo $output2;
			}
		}
		else
		{
			$output = str_replace('nameString','Không có kết quả tương ứng',$html);
			echo $output;
		}
		
	}
?>