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


		<div class="panel-group" id="accordion">
		  <div class="panel panel-default">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
		        Add new section</a>
		      </h4>
		    </div>
		    <div id="collapse1" class="panel-collapse collapse in">
		      <div class="panel-body">


		      		This is where our Add stuff will go.

		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
		        Delete Section</a>
		      </h4>
		    </div>
		    <div id="collapse2" class="panel-collapse collapse">
		      <div class="panel-body">

		      		This is where our Delete stuff will go.

		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
		        Update Section</a>
		      </h4>
		    </div>
		    <div id="collapse3" class="panel-collapse collapse">
		      <div class="panel-body">

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
		    </div>
		  </div>
		</div>


		<?php if ($_GET['result']){
			print '<h1>'.$_GET['result'].'</h1>';
		} 
		?>



<!-- 		<form action="admin_api.php" method="post" enctype="multipart/form-data">
		    Select image to upload:
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input type="submit" value="Upload Image" name="submit">
		</form>
 -->

	</div>

</body>
</html>