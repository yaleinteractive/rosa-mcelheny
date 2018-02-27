<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<style>
		body {
			margin:0;
			overflow:hidden;
		}
		.fade {
			animation-name:fade;
			animation-iteration-count: infinite;
			animation-direction:alternate;
			animation-delay:0s;
		}
		@keyframes fade {
			from {opacity:1;}
			to {opacity:0;}
		}

		img {
			width:20vw;
			float:left;
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
	$width = (1000/$number).'px';


	while ($counter <= 50) {
			$delay = ($counter/25).'s';
			$id = 'img'.$counter;
			echo "<head><style> img {animation-duration:$duration; width:$width} #$id {animation-delay:$delay;}</style></head>";
			echo "<img class='fade' id='$id' src='assets/$letter.jpg'>";
			$counter++;
		};

?>
</body>
</html>


<!-- echo "<head> <style> img {animation-duration:$duration;} #$id {animation-delay:$delay;}</style> </head>"; -->