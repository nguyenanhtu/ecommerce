<?php
//Do ở file products_control.php đã chèn file categories_model.php trong đó đã include file mysql.php rồi
// nên ở file products_model.php không cần chèn lại file mysql.php nữa.
	class Product {
	
		function insert_pro($cat_id,$name,$img_small,$img_big,$price,$quantity,$weight,$maker,$color) {
			$mysql = new MySQLProvider();
			$query = "insert into products(category_id,product,image_small,image_big,price,quantity,weight,maker,color)". "values('".$cat_id."','".$name."','".mysql_real_escape_string($img_small,$mysql->getconnect())."','".mysql_real_escape_string($img_big,$mysql->getconnect())."','".$price."','".$quantity."','".$weight."','".$maker."','".$color."')";
			$result = $mysql->getresult($query);
			$mysql->closeconnect();
			}
			
		function show_all_prod($page) {
			$mysql = new MySQLProvider();
			$list_query = "Select * from products";
			$query = $mysql->getresult($list_query);
			$count_cat = mysql_num_rows($query);
			$display = 5;
			if($count_cat > $display)
			{
				$this->num_page = ceil($count_cat/$display);
			}
			else
			{
				$this->num_page = 1;
			}
			$start = $display*($page-1);
			$query2 = "select * from products limit $start, $display";
			$paging = $mysql->getresult($query2);
			$datapage = array();
            while($row = mysql_fetch_array($paging))
            {
                $datapage[] = array($row['id'],$row['product']);
            }
            return $datapage;
		}
		
		function show_one_prod($pid) {
			$mysql = new MySQLProvider();
			$query = "select * from products where id='".$pid."'";
			$result = $mysql->getresult($query);
			return $result;
		}
		
		function del_prod($pid) {
			$mysql = new MySQLProvider();
			$query = "delete from products where id='".$pid."'";
			$result = $mysql->getresult($query);
			if($result)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	
		function update_prod($pid,$name,$price,$quantity,$weight,$maker,$color) {
			$mysql = new MySQLProvider();
			$query = "update products set product='".$name."', price='".$price."', quantity='".$quantity."', weight='".$weight."', maker='".$maker."', color='".$color."'  where id='".$pid."'";
			$result = $mysql->getresult($query);
			if($result)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		function show_cat_prod($cid) {
			$mysql = new MySQLProvider();
			$query = "select * from categories where id = '".$cid."'";
			$result = $mysql->getresult($query);
			if($row = mysql_fetch_array($result))
            {
                $cat_name = $row['category'];
				return $cat_name;
			}	
		}
		
		function insert_up($pid,$filename,$filetype) {
			$mysql = new MySQLProvider();
			$query = "insert into upload(prod_id,file_name,file_type)". "values('".$pid."','".$filename."','".$filetype."')";
			$result = $mysql->getresult($query);
			$mysql->closeconnect();
		}
	}
?>