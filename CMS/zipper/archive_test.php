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
    <audio  id='player'></audio>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

    $(document).ready(function() {

        // show the first archive item.
        $('.content .archive').first().show();
        


            var next_item = function() {

                var audio_player = $('#player').get(0);

                // put all the archive items in an array, count the length
                var items = $( ".archive" ).toArray();
                var number = items.length;
                console.log(number);

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
                    }
                    if ($item.hasClass('audio')) {
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
                }

                // if there are 0 items in the archive array, redirect to index.php.
                 if (number === 0) {
                    window.location = 'archive_index.php';
                }
            }

            // on click, trigger the next_item callback.
            $('.play').click( function(){
                $(this).hide();
                next_item();
            });
    }); 

</script>
</body>
</html>



<!--  // play the first audio
 // on ended, change it to a 2-second audio file.
 // and play the image at the same time.
 // then change it to the next audio.

            
                // var audio = $('#one').get(0);
                // audio.play();
                // $(audio).on('ended', function(){
                //     audio.src = "sounds/21.mp3";
                //     audio.play();
                // })
                // $(this).hide();
                // next_item();
 -->
</script>
</body>
</html>

