<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<style>
/*		body {
			background-color:blue;
		}*/
		img {
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

	$letter = $_GET['letter'];
	$number = $_GET['number'];
	$width = $number*10;
	$widthpx = $width."px";
	$duration = (100/$number)."s";
	echo "<img  src='assets/$letter.jpg'>";
	echo "<head><style> img {width:$widthpx; animation-duration:$duration;}</style></head>"

?>


</body>
</html>