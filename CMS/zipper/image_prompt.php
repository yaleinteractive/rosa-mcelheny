<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Example 3</title>
	<link rel="stylesheet" href="zipper.css">
	<style>
		.hide {
			display:;
		}
	</style>
</head>
<body>
	<div class="container">

		<div class="audio">
			<div class="playbutton">
				<div class='arrow-right'></div>
				<div class='paused'></div>
			</div>

		<?php

			include "connect.php";

			$sql = "SELECT * FROM files WHERE type='audio' ORDER BY id DESC LIMIT 1";
			$result = $conn->query($sql);

			while ($row = $result->fetch_assoc()) {
	          echo "<audio loop class='audio_prompt' src='sounds/{$row['id']}.mp3'></audio>";
	      }

		?>
		</div>

		<div class="instruction prompt">Listen to this sound, then take a picture to go with it.</div>
<!--can arrow key trigger the file upload? the form? So you don't have to go to the next screen? -->
		<a href="image.php">
			<div class="button">
				<?php include "arrow.html"; ?>
			</div>
		</a>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	// deal with play/pause of audio
	var playing = false;
	$('.playbutton').click(function(){
		if (playing == false) {
			$('.audio_prompt').trigger('play');
			$('.arrow-right').hide();
			$('.paused').show();
			playing = true;
		} else {
			$('.audio_prompt').trigger('pause');
			$('.arrow-right').show();
			$('.paused').hide();
			playing = false;
		}
		
	})

	// 
</script>
</body>
</html>
