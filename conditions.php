<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>

<!-- <?php 

	$myName = $_GET['name'];

?>

<p>Call me <?php echo $myName ?>. Some years ago - never mind how long precisely - having little or no money in my purse, and nothing particular to interest me on shore, I thought I would sail about a little and see the watery part of the world. It is a way I have of driving off the spleen and regulating the circulation. Whenever I find myself growing grim about the mouth; whenever it is a damp, drizzly November in my soul; whenever I find myself involuntarily pausing before coffin warehouses, and bringing up the rear of every funeral I meet; and especially whenever my hypos get such an upper hand of me, that it requires a strong moral principle to prevent me from deliberately stepping into the street, and methodically knocking people's hats off - then, I account it high time to get to sea as soon as I can. This is my substitute for pistol and ball. With a philosophical flourish Cato throws himself upon his sword; I quietly take to the ship. There is nothing surprising in this. If they but knew it, almost all men in their degree, some time or other, cherish very nearly the same feelings towards the ocean with me.</p>
 -->

 
<?php

	$letter = $_GET['letter'];
	$number = $_GET['number'];
	$delay = $_GET['delay'];
	$delayvalue = $delay*250000;

	$counter = 1;

	echo "hello ";
	flush();
	usleep($delayvalue);
	while ($counter<=$number){
		echo "$letter ";
		$counter++;
		usleep($delayvalue);
		// system(escapeshellcmd("say $letter"));
		flush();
	}
	usleep($delayvalue);
	echo "goodbye ";
?>




</body>
</html>