<?php

    include "connect.php";

    $sql = "SELECT type FROM files ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		// echo $row['type'];
		$type = $row['type'];
		if ($type === 'image') {
			include "audio_prompt.php";
			
		} if ($type === 'audio') {
			include "image_prompt.php";
		}
	}

?>