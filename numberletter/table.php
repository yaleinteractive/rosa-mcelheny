<!DOCTYPE html>
	<html>
	<head>
		<title>test</title>
		<style>
			body {
				margin:0;
				overflow:hidden;
			}

			table {
				width:100%;
				height:100%;
				border-spacing:0;
				border-collapse:collapse;
				position:absolute;
				top:0;
				bottom:0;
				left:0;
				right:0;
			}

			td {
				padding:0px;
				margin:0px;
				vertical-align:baseline;
			}

			img {
				display:block;
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

    			animation-name:fade;
				animation-iteration-count: infinite;
				animation-direction:alternate;
				animation-delay:0s;
			}

		@keyframes fade {
			from {opacity:1;}
			to {opacity:0;}
		}

		.a {
			background-image: url('assets/c.jpg');
		}

		</style>
	</head>
	<body>
		 
		<?php

			$number = $_GET['number'];
			$letter = $_GET['letter'];
			$counter = 1;
			$cellcounter = 1;
			$duration = (100/$number)."s";
			$numberinc = $number+1;
			$cellid = 1;
			// echo "<head><style>.item {width=$width; height=$height;}</style></head";

			if(!isset($number) || empty($number) || !is_numeric($number)){
				$number = 1;
			};

			if(!isset($letter) || empty($letter) || !ctype_alpha($letter)){
				$letter = a;
			};
				echo "<a href='table.php?number=$numberinc&letter=$letter'><table>";
						while ($counter <= $number) {

							echo "<head><style> .item {animation-duration:$duration;}</style></head>";
							echo "<tr>";
								while ($cellcounter <= $number){
									$delay = ($cellcounter/2).'s';
									echo "<head><style>#$cellid {animation-delay:$delay;}</style></head>"; 
									echo "<td class='item $letter' id='$cellid'></td>";
									$cellcounter++;
									$cellid++;
								};
							echo "</tr>";
							$cellcounter = 1;	
							$counter++;

						};
				echo "</table></a>";
		?>
<!-- <img style='height:100%;width:100%;' src='assets/$letter.jpg'> -->
	</body>
</html>

				