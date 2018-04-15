<html>
<head>
</head>

<body>

	<?php
	    include "connect.php";

		 $sql = "SELECT type FROM files ORDER BY id DESC LIMIT 1";
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()) {
              echo "<audio controls>
	  				<source src='horse.ogg' type='audio/ogg'>
				</audio>";
		}    
	?>
	<form method="POST" action="upload_image.php" enctype="multipart/form-data">
		<input type="file" accept="image/*" capture="camera" name="imageToUpload">
		<input type="submit" value="GO" name="sumbit">
	</form>
</body>
</html>