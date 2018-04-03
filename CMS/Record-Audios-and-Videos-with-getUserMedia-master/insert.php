<?php


$title = $_GET['title'];
$date = $_GET['date'];
$time = $_GET['time'];
$description = $_GET['description'];

if ($title && $date) {

// this is to insert into DB; 
// first list the table, with column names() and then values (), in the same order
	$sql = "INSERT INTO events (title, date, time, description) VALUES ('$title', '$date', '$time', '$description')";
}

// if a title and a date were specified, insert a new event into the database
// the 'title and 'date' refer to the name specified in the html form
// makes it so that you don't add an event simply on page load. this shoudl be triggered on load
	if ($_GET['title'] && $_GET['date']){



		echo '<h2>Event Added</h2>';
	}

?>