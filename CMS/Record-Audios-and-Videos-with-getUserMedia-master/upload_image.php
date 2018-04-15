<?php

    include "connect.php";

    $type = "image";

    if ($type) {
		$sql = "INSERT INTO files (type) VALUES('$type')";
		$result = $conn->query($sql);
		printf ("New Record has id %d.\n", $mysqli->insert_id);
	}

	// specify directory
	$target_dir = "images/";

	// path of the file to be uploaded
	$target_file = $target_dir . $_FILES["imageToUpload"]["name"];

	  $filename = $target_file;

	if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
	    echo "The file ".  $filename . " has been uploaded.";
	} else {
	    echo "Sorry, there was an error uploading your file.";
	}

	$conn->close();

	echo '<script type="text/javascript">window.location = "archive.php"</script>';

?>