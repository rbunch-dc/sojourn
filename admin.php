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


	$query = "SELECT * FROM about";
	$result = mysql_query($query);

	$row_count = mysql_num_rows($result);

	while ($row = mysql_fetch_assoc($result)) { 
		$rows[] = $row;
	}

	// print "<pre>";
	// print_r($rows);
	// exit;


?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>



<script>
	$('#container').each(function(){
		alert("Here is a container!!");
	});
</script>

	<div class="container">
		<div class="row">
			<div class="dropdown">

				<select class="form-control">
				<?php
					foreach($rows as $row){
						print '<option>'.$row['section'].'</option>';
					}
				?>				
				 </select>				
			</div>
		</div>
		<div class="row B">
			<div class="form-group">
  				<label for="comment">Enter Content</label>
  				<textarea class="form-control" rows="7" id="content"></textarea>
				</div>
		</div>
		<button class="btn btn-lg" type="submit">Submit</button>
	</div>

</body>
</html>