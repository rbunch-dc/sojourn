<?php

	include 'inc/db_connect.php';

	if(!isset($_SESSION['username'])){
		//Goodbye.
		header('Location: http://local-phpland.com/');
		exit;
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

	<div id="logout"><a href="index.php?logout=true">Logout</a></div>

	<h1>Welcome, <?php print $_SESSION['username']; ?></h1>

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