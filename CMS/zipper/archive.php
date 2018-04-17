<html>

<head>
	<link rel="stylesheet" href="zipper.css">
</head>

<body class='archive_page'>
	<div class='content'>
		<?php

	    include "connect.php";

	    $sql = "SELECT * FROM files ORDER BY id DESC";
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()) {
			$type = $row['type'];
			if ($type === 'audio') {
				echo "<div class='archive audio'>";
				 echo "<audio src='sounds/{$row['id']}.mp3'></audio>";
				 echo "</div>";
			} if ($type === 'image') {
				echo "<div class='archive image'>";
					echo "<img class='archive_image' src='images/{$row['id']}/{$row['filename']}'>";
				echo "</div>";
			}
		}
		?>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

	// show first item
	// if it is audio, make it autoplay
	// if it is image, make it show for 3s
	// when first item is finished, show second item
	// then show second item

    // make array of everything in the content div
    var items = $( ".archive" ).toArray();
    console.log(items);


    // what to do to an image
    // function showimage(this) {
    // 	this.show();
    // 	setTimeout(function(){ this.hide(); }, 3000);
    // }

    // what to do to an audio file
    // function playaudio() {
    // 	$(this).play();

    // }
  
    

    // TO DO - print the timestamp with each image
    
  </script>
</body>
</html>

