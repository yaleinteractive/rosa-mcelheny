<!DOCTYPE html>
	<html>
	<head>
		<title>test</title>
		<style>
			body {
				margin:0;
				overflow:hidden;
			}
			.flex-container {
				width:100vw;
			    height:100vh;
			    position:absolute;
			    top:0;
			    left:0;
			   /* border:1px dotted black;*/
			    display:flex;
			    flex-direction: row;
			    flex-wrap: wrap;
			    justify-content: center;
			    align-content: stretch;
			    align-items: stretch;
			}

			.item {
/*				border:2px red solid;*/
				background-size: cover;
    			background-position: center;
    			background-image: url('assets/c.jpg');

    			animation-name:fade;
				animation-iteration-count: infinite;
				animation-direction:alternate;
				animation-delay:0s;
			}

		@keyframes fade {
			from {opacity:1;}
			to {opacity:0;}
		}

		</style>
	</head>
	<body>
		 
		<?php

			$number = $_GET['number'];
			$counter = 1;
			$duration = (100/$number)."s";
			$width = (100/$number).'vw';
			$height = (100/$number).'vh';
			$numberinc = $number+1;
			// echo "<head><style>.item {width=$width; height=$height;}</style></head";

			echo "<a href='test_2.php?number=$numberinc'> <div class='flex-container'>";
				while ($counter <= $number) {

					if($counter % 5 ){

					}else{
						
					}
					// set delay
						$delay = ($counter/10).'s';
						$id = 'img'.$counter;
						echo "<head><style> .item {animation-duration:$duration;} #$id {animation-delay:$delay;}</style></head>";
						echo "<div class='item' id='$id' style='flex-basis:$width;'></div>";
						$counter++;
					};
			echo "</div></a>";
		?>

	</body>
</html>

