<?php
	include('includes/mysql.php');
	class Order {
	
		function show_all_order($page) {
			$mysql = new MySQLProvider();
			$list_query = "Select * from (orders LEFT OUTER JOIN order_details on orders.id = order_details.order_id) INNER JOIN products on order_details.product_id = products.id";
			$query = $mysql->getresult($list_query);
			$count_order = mysql_num_rows($query);
			$display = 5;
			if($count_order > $display)
			{
				$this->num_page = ceil($count_order/$display);
			}
			else
			{
				$this->num_page = 1;
			}
			$start = $display*($page-1);
			$query2 = "Select * from (orders LEFT OUTER JOIN order_details on orders.id = order_details.order_id) INNER JOIN products on order_details.product_id = products.id limit $start, $display";
			$paging = $mysql->getresult($query2);
			$datapage = array();
            while($row = mysql_fetch_array($paging))
            {
                $datapage[] = array($row['product'],$row['full_name'],$row['address'],$row['order_date'],$row['number_per'],$row['subtotal'],$row['total']);
            }
            return $datapage;
		}
		}
?>