<?php

    include "connect.php";

    $sql = "SELECT type FROM files ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		echo $row['type'];
		$type = $row['type'];
		if ($type === 'image') {
			echo '<script type="text/javascript">window.location = "audio.html"</script>';
		} if ($type === 'audio') {
			echo '<script type="text/javascript">window.location = "image.php"</script>';
		}
	}

?>