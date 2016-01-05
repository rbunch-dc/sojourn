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
	$result = mysql_query('SELECT * FROM about');

	while ($row = mysql_fetch_assoc($result)) { 
		$rows[] = $row;
	}

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

<script type="text/javascript">
	$(document).ready(function(){
		updateTextArea($('#section').val());
		$('#section').change(function(){
			updateTextArea($(this).val());
		});
	});

	function updateTextArea(section){
		var url = 'http://local-phpland.com/admin_api.php?page=about&section='+section;
		console.log(url);
		$.getJSON(url, function(result){
			$('#content').val(result.content);
		});
}

</script>

	<div class="container">

		<?php if ($_GET['result']){
			print '<h1>'.$_GET['result'].'</h1>';
		} 
		?>

		<form action="http://local-phpland.com/admin_api.php" method="post">
			<div class="row">
				<div class="dropdown">
					<select class="form-control" id="section" name="section">
						<?php
							foreach($rows as $row){
								print '<option value="'.$row['section'].'">'.$row['section'].'</option>';
							}
						?>				
					</select>				
				</div>
			</div>
			<div class="row B">
				<div class="form-group">
	  				<label for="comment">Enter Content</label>
	  				<textarea name="content" class="form-control" rows="7" id="content"></textarea>
				</div>
			</div>
			<button class="btn btn-lg" type="submit">Submit</button>
		</form>
	</div>

</body>
</html>