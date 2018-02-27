<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<style>
/*		body {
			background-color:blue;
		}*/
		.fade {
			animation-name:fade;
			animation-iteration-count: infinite;
			animation-direction:alternate;
		}
		@keyframes fade {
			from {opacity:1;}
			to {opacity:0;}
		}

	</style>
</head>
<body>
 
<?php
	// $letter = $_GET['letter'];
	// $number = $_GET['number'];
	// $width = $number*10;
	// $widthpx = $width."px";
	// $duration = (100/$number)."s";
	// echo "<img class='fade' src='assets/$letter.jpg'>";
	// echo "<head><style> img {width:$widthpx; animation-duration:$duration;}</style></head>";
?>

<?php

	$letter = $_GET['letter'];
	$number = $_GET['number'];
	$counter = 1;
	$duration = (100/$number)."s";

	while ($counter <= $number) {
			$delay = $counter.'s';	
			echo "<img class='fade' id='$counter' src='assets/$letter.jpg'>";
			echo "<head> <style> #$counter {animation-duration:$duration;}</style> </head>";
			$counter++;
		};

?>
</body>
</html>