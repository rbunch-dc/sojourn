<?php

	include 'inc/db_connect.php';


	print_r($_FILES);
	exit;


	$target_file = 'uploads/' . $_FILES['fileToUpload']['name'];
	$temp_file = $_FILES['fileToUpload']['tmp_name'];


	if(is_uploaded_file($temp_file)){
		if(move_uploaded_file($temp_file, $target_file)){
			print "Successfully uploaded image. It is at " . $target_file;
		}else{
			print "failed to move image.";
		}
	}

	if($_POST['crud_task'] == "addnew"){
		$section = addslashes($_POST['section']);
		$content = addslashes($_POST['content']);
		$query = "INSERT INTO about (section, content) VALUES ('".$section."', '".$content."')";

		$result = mysql_query($query);
		if(mysql_error()){
			print mysql_error();
		}else{
			header('Location: http://local-phpland.com/admin.php?result=success');
		}
	}

	if($_POST['crud_task'] == "update"){
		if(isset($_POST['section'])){

			$query = "UPDATE about SET content = '" . $_POST['content'] . "' WHERE section = '" . $_POST['section'] . "'";
			$update = mysql_query($query);
			if(mysql_error()){
				print mysql_error();
			}else{
				header('Location: http://local-phpland.com/admin.php?result=success');
			}
		}
	}

	if($_GET['crud_task']== "delete"){
		//Delete the row!!!!
		$query = "DELETE FROM about WHERE id = " . $_GET['id'];
		$result = mysql_query($query);
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
