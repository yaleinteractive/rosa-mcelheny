<html>
<head>
	<title>zipper</title>
	<link rel="icon" href="assets/icon.png" type="image/gif" sizes="32x32">
	<link rel="stylesheet" href="zipper.css">
</head>
<body>
	<div class="container center">
<!-- 		<div class="instruction">zipper</div>
 -->		<div class="greeting">Contribute to a collaborative video!</div>
		<a class='index_link' href="prompt.php">
			<?php include "arrow.html"; ?>
			<div class="button rotate">	
			</div>
		</a>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script> 		
	$( document ).ready(function() {
	    var colors = ['AntiqueWhite', 'CadetBlue', 'Chartreuse', 'DarkSeaGreen', 'LightSteelBlue', 'Lavender', 'Thistle', 'MistyRose', 'Yellow','RosyBrown', 'Peru'];
		var max = colors.length;	
		function getRandomInt(max) {
		  return Math.floor(Math.random() * Math.floor(max));
		}
		i = (getRandomInt(max));
		color = colors[i];
		$('body').css('background-color', color);

	});
</script>
</body>
</html>
