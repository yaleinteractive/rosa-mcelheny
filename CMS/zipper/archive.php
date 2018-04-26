<html>
<head>
    <title>zipper</title>
    <link rel="icon" href="assets/icon.png" type="image/gif" sizes="32x32">
	<link rel="stylesheet" href="zipper.css">
</head>

<body class='archive_page'>


    <a class='exit' href='archive_index.php'>
        <div class="diag"></div>
        <div class="diag down"></div>
    </a>

    <div class="play">
        <div class='instruction'>Play it back!</div>
       <div class="playbutton">
                <div class='arrow-right'></div>
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
    <audio id='player'></audio>

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

        // if on mobile, audio playback is reconfigured.
        // on desktop, audio plays back automatically.
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                var next_item = function() {

                // this is the audio file that will play the tracks as the sources change.
                var audio_player = $('#player').get(0);

                // put all the archive items in an array, count the length
                var items = $( ".archive" ).toArray();
                var number = items.length;
                console.log(number);
                // change the color of audio files.
                audio_colors();
                // if there is at least one archive item, do this function
                    if (number >= 1) {
                        var $item = $('.content .archive').first();
                        $item.show();
                        if ($item.hasClass('image')) {
                            $(audio_player).attr('src', 'sounds/0.mp3');
                            audio_player.play();
                            setTimeout(function() {
                                $item.remove();
                                next_item();
                            }, 2000);
                        } if ($item.hasClass('audio')) {
                            // find the audio element, and get it's source.
                            audio = $item.find('audio').attr('src');
                            // replace the audio_player source with the new audio. play it, and then 
                            $(audio_player).attr('src', audio);
                            audio_player.play();
                            $(audio_player).on('ended', function() {
                                $item.remove();
                                next_item();
                            });
                        }
                    } if (number === 0) {
                        window.location = 'archive_index.php';
                    }
                }

                $('.playbutton').click( function(){
                    $('.play').hide();
                    $('.exit').show();
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

            $('.playbutton').click( function(){
                $('.play').hide();
                $('.exit').show();
                next_item();
            });
        }
    });
</script>
</body>
</html>

