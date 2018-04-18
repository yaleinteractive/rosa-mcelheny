<html>

<head>
	<link rel="stylesheet" href="zipper.css">
</head>

<body class='archive_page'>

    <div class="play">
        <div class="playbutton">
            <div class='arrow-right'></div>
            <div class='paused'></div>
        </div>
    </div>
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

	$(document).ready(function() {

    $('.content .archive').first().show();

    var next_item = function() {
        var items = $( ".archive" ).toArray();
        var number = items.length;
        console.log(number);
        if (number >= 1) {
            var $item = $('.content .archive').first();
            $item.show();
            if ($item.hasClass('image')) {
                setTimeout(function() {
                    $item.remove();
                    next_item();
                }, 2000);
            }
            if ($item.hasClass('audio')) {
                audio = $item.find('audio').get(0);
                audio.play();
                $(audio).on('ended', function() {
                    $item.remove();
                    next_item();
                });
            }
        } if (number === 0) {
            window.location = 'index.php';
        }
    }

    $('.play').click( function(){
        $(this).hide();
        next_item();
    });
    // next_item();

    });

  </script>
</body>
</html>

