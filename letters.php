Greetings!

<?php

	$letter = $_GET['letter'];
	$number = $_GET['number'];

	$counter = 1;

	while ($counter<=5){
		echo $letter;
		$counter++;
		// usleep(100000);
		system(escapeshellcmd("say $letter"));
		flush();
	}

?>

Goodbye.