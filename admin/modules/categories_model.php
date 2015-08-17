<?php
	include('includes/mysql.php');
	class Category {
	
		function insert_cat($name,$desc,$data) {
			$mysql = new MySQLProvider();
			$query = "insert into categories(category,description,image)". "values('".$name."','".$desc."','".mysql_real_escape_string($data,$mysql->getconnect())."')";
			$result = $mysql->getresult($query);
			$mysql->closeconnect();
			}
			
		function show_all_cat($page) {
			$mysql = new MySQLProvider();
			$list_query = "Select * from categories";
			$query = $mysql->getresult($list_query);
			$count_cat = mysql_num_rows($query);
			$display = 1;
			if($count_cat > $display)
			{
				$this->num_page = ceil($count_cat/$display);
			}
			else
			{
				$this->num_page = 1;
			}
			$start = $display*($page-1);
			$query2 = "select * from categories limit $start, $display";
			$paging = $mysql->getresult($query2);
			$datapage = array();
            while($row = mysql_fetch_array($paging))
            {
                $datapage[] = array($row['id'],$row['category']);
            }
            return $datapage;
		}
		
		function show_one_cat($cid) {
			$mysql = new MySQLProvider();
			$query = "select * from categories where id='".$cid."'";
			$result = $mysql->getresult($query);
			return $result;
		}
		
		function del_cat($cid) {
			$mysql = new MySQLProvider();
			$query = "delete from categories where id='".$cid."'";
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
	
		function update_cat($cid,$name,$descript) {
			$mysql = new MySQLProvider();
			$query = "update categories set category='".$name."', description='".$descript."' where id='".$cid."'";
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
		
		function show_cats() {
			$mysql = new MySQLProvider();
			$list_query = "Select * from categories";
			$query = $mysql->getresult($list_query);
			$datacats = array();
            while($row = mysql_fetch_array($query))
            {
                $datacats[] = array($row['id'],$row['category']);
            }
            return $datacats;
		}
	}
?>