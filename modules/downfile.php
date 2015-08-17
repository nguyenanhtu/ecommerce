<?php
	include('../includes/mysql.php');
	if(isset($_GET['fid']))
	{
	$fid = $_GET['fid'];
	$query = 'select * from upload where id="'.$fid.'"';
	$result = mysql_query($query);
	$data = array();
	while($row= mysql_fetch_array($result))
	{
		$data[0] = $row['file_name'];
		$data[1] = $row['file_type'];
	}
	print_r ($data);
	$file_path = '../uploads/'.$data[0];
	if (file_exists($file_path)) {
    header('Content-Description: File Transfer');
    header('Content-Type:'.$data[1].'');
    header('Content-Disposition: attachment; filename='.basename($data[0]));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
	echo 'Tải xuống thành công';
	readfile($file_path);
	}
	else
	{
	echo 'Thất bại';
	}
	}
?>