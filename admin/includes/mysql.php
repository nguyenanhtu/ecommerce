<?php
	class MySQLProvider {
	
	public $servername="localhost";
	public $username="root";
	public $pass="";
	public $databasename="ecommerce2";
	
	function getconnect() {
	$conn=mysql_connect($this->servername,$this->username,$this->pass);
			if($conn==false)
			{
				die("Could not connect to MySQL:".mysql_error());
			}
			else
			{
				return $conn;
				/*mysql_select_db($databasename,$conn);
				mysql_query("SET NAMES 'utf8'");*/
			}
	}
	
	function getresult($query) {
		$conn = $this->getconnect();
		mysql_select_db($this->databasename,$conn);
		mysql_query("SET NAMES 'utf8'");
		$result = mysql_query($query,$conn);
		return $result;
	}
	
	function closeconnect() {
		mysql_close($this->getconnect());
	}
	}
?>