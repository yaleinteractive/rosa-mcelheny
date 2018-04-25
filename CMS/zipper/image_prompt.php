<!DOCTYPE html>
<html>
<head>
	<title>zipper</title>
	<link rel="icon" href="assets/icon.png" type="image/gif" sizes="32x32">
	<link rel="stylesheet" href="zipper.css">
</head>
<body>
	<div class="container center">

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

	      $counter = $_GET['counter'];
		?>
		</div>

		<div class="instruction prompt">Listen to this sound recorded by somebody else, then take a picture to go with it.</div>

		<div class="button">
			<?php include "arrow.html"; ?>
		</div>

		<form id = "form" method="POST" action="upload_image.php" enctype="multipart/form-data">
			<input id="file" type="file" accept="image/*" capture="camera" name="image">
		</form>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

	var colors;
	 var audio_colors = function() {
            var colors = ['AntiqueWhite', 'CadetBlue', 'Chartreuse', 'DarkSeaGreen', 'LightSteelBlue', 'Lavender', 'Thistle', 'MistyRose', 'OrangeRed', 'Yellow','RosyBrown', 'Peru'];
            var max = colors.length;  
            function getRandomInt(max) {
              return Math.floor(Math.random() * Math.floor(max));
            }
            i = (getRandomInt(max));
            color = colors[i];
            $('.audio').css('background-color', color);
            console.log(color)
        };

	// deal with play/pause of audio
	var playing = false;
	$('.playbutton').click(function(){
		if (playing == false) {
			$('.audio_prompt').trigger('play');
			$('.arrow-right').hide();
			$('.paused').show();
			playing = true;
			colors = setInterval(audio_colors, 100);
		} else {
			$('.audio_prompt').trigger('pause');
			$('.arrow-right').show();
			$('.paused').hide();
			playing = false;
			clearInterval(colors);
		}
	})

	// trigger click within form when button is clicked.
	$(".button").click(function(){ 
		$('#file').trigger('click'); 
		$('.audio_prompt').trigger('pause');
		$('.arrow-right').show();
		$('.paused').hide();
		playing = false;
		clearInterval(colors);
	});

	// submit form when file is changed
	document.getElementById("file").onchange = function() {
		document.getElementById("form").submit();
	};

</script>
</body>
</html>
