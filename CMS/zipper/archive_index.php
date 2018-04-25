<html>
<head>
    <title>zipper</title>
    <link rel="icon" href="assets/icon.png" type="image/gif" sizes="32x32">
	<link rel="stylesheet" href="zipper.css">
</head>
<body>
	<div class='index'>
		<?php
            $colors = ['AntiqueWhite', 'CadetBlue', 'Chartreuse', 'DarkSeaGreen', 'LightSteelBlue', 'Lavender', 'Thistle', 'MistyRose', 'OrangeRed', 'Yellow','RosyBrown', 'Peru'];

    	    include "connect.php";

    	    $sql = "SELECT DISTINCT date FROM files ORDER BY date DESC";
    		$result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                if ($row['date'] == '0000-00-00'){
                    break;
                } else {
                    $int = rand (1, 12);
                    $color = $colors[$int];
                    echo "<a href='archive.php?date=".$row['date']."'>";
                      echo "<div class='audio' style='background-color:$color'>";
                        echo "<div class='date instruction'>".$row['date']."</div>";
                      echo "</div>";
                    echo "</a>";
                }
            }
		?>
        <a class='index_link' href="index.php">
            <?php include "arrow.html"; ?>
            <div class="button rotate"> 
            </div>
        </a>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>

