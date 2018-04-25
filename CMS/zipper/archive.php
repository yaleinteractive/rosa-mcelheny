<html>
<head>
    <title>zipper</title>
    <link rel="icon" href="assets/icon.png" type="image/gif" sizes="32x32">
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
            date_default_timezone_set("America/New_York");

            if (isset($_GET['date']) ){
                $today = $_GET['date'];
            } else {
                $today = date("Y-m-d");
            };

    	    include "connect.php";

    	    $sql = "SELECT * FROM files WHERE date = '$today' ORDER BY id DESC";
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

        // if on mobile, audio playback must be triggered by click event.
        // on desktop, audio plays back automatically.
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
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
                                audio_colors();
                            }, 2000);
                        }
                        if ($item.hasClass('audio')) {
                            audio = $item.find('audio').get(0);
                            $('.play').show();
                            $('.play').click( function(){
                                $(this).hide();
                                audio.play();
                            });
                            $(audio).on('ended', function() {
                                $item.remove();
                                next_item();
                                audio_colors();
                            });
                        }
                    } if (number === 0) {
                        window.location = 'archive_index.php';
                    }
                }
                $('.play').click( function(){
                    $(this).hide();
                    next_item();
                });
            } 
        else {
            console.log('desktop');
            var next_item = function() {
            var items = $( ".archive" ).toArray();
            var number = items.length;
            console.log(number);
            audio_colors();
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
                window.location = 'archive_index.php';
            }
            }

            $('.play').click( function(){
                $(this).hide();
                next_item();
            });
        }
    });
</script>
</body>
</html>

