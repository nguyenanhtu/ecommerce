<?php
	include('includes/mysql.php');
	class User {
	
		function show_all_user($page) {
			$mysql = new MySQLProvider();
			$list_query = "Select * from users";
			$query = $mysql->getresult($list_query);
			$count_use = mysql_num_rows($query);
			$display = 2;
			if($count_use > $display)
			{
				$this->num_page = ceil($count_use/$display);
			}
			else
			{
				$this->num_page = 1;
			}
			$start = $display*($page-1);
			$query2 = "select * from users limit $start, $display";
			$paging = $mysql->getresult($query2);
			$datapage = array();
            while($row = mysql_fetch_array($paging))
            {
                $datapage[] = array($row['id'],$row['user_name']);
            }
            return $datapage;
		}
		
		function show_one_user($uid) {
			$mysql = new MySQLProvider();
			$query = "select * from users where id='".$uid."'";
			$result = $mysql->getresult($query);
			return $result;
		}
		
		function del_user($uid) {
			$mysql = new MySQLProvider();
			$query = "delete from users where id='".$uid."'";
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
	}
?>