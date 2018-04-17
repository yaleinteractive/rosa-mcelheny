<html>
<head>
	<link rel="stylesheet" href="zipper.css">
</head>

<body>
	<div class="container">

		<div class="button" id="button">Take a picture</div>

		<!-- positioned off-screen -->
		<form id = "form" method="POST" action="upload_image.php" enctype="multipart/form-data">
			<input id="file" type="file" accept="image/*" capture="camera" name="image">
			<!-- <input type="submit" value="GO" name="sumbit"> -->
		</form>

	</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

	// trigger click within form when button is clicked.
	$(".button").click(function(){ 
		$('#file').trigger('click'); 
	});

	// submit form when file is changed
	document.getElementById("file").onchange = function() {
		document.getElementById("form").submit();
	};


</script>
</body>
</html>