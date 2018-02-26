<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<style>
		img {
			width:<?php echo $width ?>;
		}
	</style>
</head>
<body>
 
<?php

	$letter = $_GET['letter'];
	$number = $_GET['number'];

	$width = $number*10;
	// $delay = $_GET['delay'];
	// $delayvalue = $delay*250000;

	// $counter = 1;

	// echo "hello ";
	// flush();
	// usleep($delayvalue);
	// while ($counter<=$number){
	// 	echo "$letter ";
	// 	$counter++;
	// 	usleep($delayvalue);
	// 	// system(escapeshellcmd("say $letter"));
	// 	flush();
	// }
	// usleep($delayvalue);
	// echo "goodbye ";
	// echo "$letter";

	echo "<img src='assets/$letter.jpg'>";
?>




</body>
</html>