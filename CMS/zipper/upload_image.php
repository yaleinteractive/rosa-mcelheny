<?php

    include "connect.php";

    $type = "image";
    $image = basename($_FILES['image']['name']);

    if ($type) {
		$sql = "INSERT INTO files (type, filename) VALUES ('$type', '$image')";
		$result = $conn->query($sql);
	}

	// Get the ID of the inserted row
    $id = $conn->insert_id;


    if ($image) {
      $uploaddir = dirname(__FILE__) . "/images/$id";
      mkdir($uploaddir);
      $success = move_uploaded_file($_FILES['image']['tmp_name'], "$uploaddir/$image");
	    }
	    echo "<h2>Event added</h2>";

  	$conn->close();

  	// redirect to archive
	echo '<script type="text/javascript">window.location = "archive.php"</script>';

?>