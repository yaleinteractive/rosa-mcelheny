<!DOCTYPE html>
<html>
<head>
	<title>test</title>
<!-- 	<style>

	.fade {
		animation-name:fade;
	}

	@keyframes fade {
		from {opacity:1;}
		to {opacity:2;}
	}

	</style> -->
</head>
<body>
 
<?php

	$letter = $_GET['letter'];
	$number = $_GET['number'];

	$width = $number*10;
	$widthpx = $width."px";
	echo "<img style='width:$widthpx;' src='assets/$letter.jpg'>";

?>

</body>
</html>