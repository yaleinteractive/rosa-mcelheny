<html>

<head>
	<title>fruit</title>
</head>


<body>



<?php

	$letter = $_GET['letter'];
	$number = $_GET['number'];

	$size = $number
	if ($size .100){
		$size = $size / 10;
	}

	$counter = 1;

	while ($counter <= $number) {
		
		if ($letter == 'a') {
			echo "<img src='apple.png' width=20>";
		}

		else if ($letter == 'b') {
			echo '🐻';
		}

		else {
			echo $letter;
		}

		echo '. ';

		$counter++;
	};
	// echo "$letter";
	// while ($counter => $number) {

	// };

	// COMPARISON OPERATORS:
	// equal to ==
	// not equal to: !=
	// LOGICAL OPERATORS:
	// and &&
	// or ||

	// php understands upper and lower case letters as different, so you have to specify...

	// <img src="images/$letter.jpg" width=$number> works! php can handle variable in the middle of html tags...

// This letter shoudl link to a size that is the current size plus the counter.

	// $link_size = $size +$counter;
	// echo "<a href='links.php?letter=$letter&number=$number&$size=$link_size'>HELLO</a>";

?>


</body>
</html>