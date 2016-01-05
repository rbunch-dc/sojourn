<?php

	$link = mysql_connect('127.0.0.1', 'phpland', 'x');
	if (!$link) {
	    die('Not connected : ' . mysql_error());
	}

	// make phpland the current db
	$db_selected = mysql_select_db('phpland', $link);
	if (!$db_selected) {
	    die ('Can\'t use phpland : ' . mysql_error());
	}

	$query = "SELECT * FROM about WHERE section='".$_GET['section']."'";
	$result = mysql_query($query);

	$row = mysql_fetch_assoc($result);

	if($row){
		print json_encode($row);
	}else{
		print json_encode('error!');
	}

exit;


?>
