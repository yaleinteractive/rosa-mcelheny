<?php
    header("Content-type: text/css; charset: UTF-8");

  	$letter = $_GET['letter'];
	$number = $_GET['number'];

	$width = $number*10;
	$widthpx = $width."px";


?>

<style>

	img {
		width: <?php echo $widthpx; ?>;
	}

</style>
