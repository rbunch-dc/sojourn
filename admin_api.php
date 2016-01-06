<?php

	include 'inc/db_connect.php';

	if($_POST){
		$query = "UPDATE about SET content = '" . $_POST['content'] . "' WHERE section = '" . $_POST['section'] . "'";
		$update = mysql_query($query);
		if(mysql_error()){
			print mysql_error();
		}else{
			header('Location: http://local-phpland.com/admin.php?result=success');
		}

	}

	if($_GET){

		$query = "SELECT * FROM about WHERE section='".$_GET['section']."'";
		$result = mysql_query($query);

		$row = mysql_fetch_assoc($result);

		if($row){
			print json_encode($row);
		}else{
			print json_encode('error!');
		}

		exit;
	}

?>
