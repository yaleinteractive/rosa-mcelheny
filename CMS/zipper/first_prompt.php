<!DOCTYPE html>
<html>
<head>
	<title>zipper</title>
	<link rel="icon" href="assets/icon.png" type="image/gif" sizes="32x32">
	<link rel="stylesheet" href="zipper.css">
</head>
<body>
	<div class="container">
		<div class="instruction prompt">You are first! You can initiate today's video with a sound. Find something nearby, and then press the arrow to record it.</div>

		<a href="audio.php">
			<div class="button">
				<?php include "arrow.html"; ?>
			</div>
		</a>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> 		
	$( document ).ready(function() {
	    var colors = ['AntiqueWhite', 'CadetBlue', 'Chartreuse', 'DarkSeaGreen', 'LightSteelBlue', 'Lavender', 'Thistle', 'MistyRose', 'OrangeRed', 'Yellow','RosyBrown', 'Peru'];
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
