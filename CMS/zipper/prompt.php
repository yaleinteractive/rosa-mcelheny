<?php
    include "connect.php";

    $sql = "SELECT * FROM files ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		$type = $row['type'];
		$date = $row['date'];
		$today = date("Y-m-d");
		
		// if the date of the last row is NOT equal to the current date, then ask to initiate new chain
			if ($date !== $today){
				include "first_prompt.php";
			} 

		// if the date of the last row IS equal to the current date, then show the prompt.
			else {
			 	if ($type === 'image') {
					include "audio_prompt.php";
				} if ($type === 'audio') {
					include "image_prompt.php";
				}
			}
		}

?>

