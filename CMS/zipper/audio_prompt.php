<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Example 3</title>
	<link rel="stylesheet" href="zipper.css">
</head>
<body>
	<div class="container">
		<div class="instruction prompt">Look at this picture uploaded by another user, then record a sound to go with it.</div>
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
<script class="containerScript">
	
</script>
</body>
</html>
