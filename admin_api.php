<?php

	include 'inc/db_connect.php';


	if($_POST){
		if(isset($_POST['section'])){

			$query = "UPDATE about SET content = '" . $_POST['content'] . "' WHERE section = '" . $_POST['section'] . "'";
			$update = mysql_query($query);
			if(mysql_error()){
				print mysql_error();
			}else{
				header('Location: http://local-phpland.com/admin.php?result=success');
			}
		}elseif($_POST['delete']){
			$query = "DELETE FROM about WHERE id = " . $_POST['id'];
		}elseif($_POST['addnew']){
			$query = "INSERT INTO about ('section', 'content') VALUES ('".$_POST['section']."', '".$_POST['content']."')";
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
