<?php

include 'functions.php';
// Your PHP code here.


// Home Page template below.
include "database_connection.php";
	
if(isset($_POST['submit'])) {

	// Count total files
	$countfiles = count($_FILES['files']['name']);
	
	// Prepared statement
	$query = "INSERT INTO images (name,image) VALUES(?,?)";

	$statement = $conn->prepare($query);

	// Loop all files
	for($i = 0; $i < $countfiles; $i++) {

		// File name
		$filename = $_FILES['files']['name'][$i];
	
		// Location
		$target_file = 'upload/'.$filename;
	
		// file extension
		$file_extension = pathinfo(
			$target_file, PATHINFO_EXTENSION);
			
		$file_extension = strtolower($file_extension);
	
		// Valid image extension
		$valid_extension = array("png","jpeg","jpg","pdf");
	
		if(in_array($file_extension, $valid_extension)) {

			// Upload file
			if(move_uploaded_file(
				$_FILES['files']['tmp_name'][$i],
				$target_file)
			) {

				// Execute query
				$statement->execute(
					array($filename,$target_file));
			}
			
		}

		
	}
	

}
?>

<?=template_header('Home')?>
<head>
<link rel="stylesheet" type="text/css" href="dashboard.css"/>

</head>
<body>
<div class="content">
	<h2>Home</h2>
	<h1 style="font-size: 2.5em;">Welcome to <?php echo ucfirst($_SESSION['first_name']); ?>'s page!</h1>
</div>
<div class="image_upload">
	<h1>Upload Images</h1><br>

	<form method='post' action=''
		enctype='multipart/form-data'>
		<input type='file' name='files[]' multiple />
		<input type='submit' value='Submit' name='submit' />
	</form>
	<br>
		
	<br><a href="view.php">|View Uploads|</a>
	</div>
	</body>
<?=template_footer()?>

