<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>

<style>
	body {
		margin:none;
	}
	.container {
		width:100vw;
		height:100vh;
		position:absolute;
		background-color:orange;
		top:0;
		left:0;
	}

	.red {
		background-color:red;
	}

	.blue {
		background-color:blue;
	}
</style>

<body>

<?php
	$number = $_GET['number'];

	if(isset($number) && !empty($number) && is_numeric($number)){
			if ($number <=10){
				// turn page blue
				echo '<div class="container blue">';
			} else if ($number > 10){
				// turn page red
				echo '<div class="container red">';
			}
	} else {
		echo '<div class="container">';
	}

	
?>

<!-- <?php
	// $number = $_GET['number'];
	// if ($number > 0 & $number <=10){
	// 	// turn page blue
	// 	echo '<div class="container blue">';
	// } else if ($number > 10){
	// 	// turn page red
	// 	echo '<div class="container red">';
	// } else {
	// 	echo '<div class="container">';
	// }
?> -->

</div>

</body>
</html>

<!-- 
	// = assigns value
	// == asks if it's equal. questions... is operator
	// look up php compairson operators...
	// if (condition is true){
	// 		run this
	// } -->