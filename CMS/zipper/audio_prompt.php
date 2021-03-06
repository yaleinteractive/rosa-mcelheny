<!DOCTYPE html>
<html>
<head>
	<title>zipper</title>
	<link rel="icon" href="assets/icon.png" type="image/gif" sizes="32x32">
	<link rel="stylesheet" href="zipper.css">
</head>
<body>
	<div class="container center">
		<div class="instruction prompt">Look at this picture taken by somebody else, then record a sound to go with it.</div>
		
		<?php
			include "connect.php";

			$sql = "SELECT * FROM files WHERE type='image' ORDER BY id DESC LIMIT 1";
			$result = $conn->query($sql);

			while ($row = $result->fetch_assoc()) {
	          echo "<img class='prompt_image' src='images/{$row['id']}/{$row['filename']}'>";
	      }
		?>
		
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
