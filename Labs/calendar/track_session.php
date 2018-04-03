
<?php
    if ($_COOKIE['visited_before'] == 'Yes') {
        $visited_befer = true; 
    } else {
        setcookie('visited_before', 'yes');

    }
?>


<?php

// cookie, server tells the browser to hold some information
// cookies also has an expiration; can last for the session, or it can last a certain number of milliseconds

// you should see setcookie in response header; that's why you need it to go first, it's in the header
// you have to set cookie before sending any other data back and forth; put setcookie at the top of your doc...
$visited_before = $_COOKIE['visited_before'];

// if the brower has the visited before cookie, 
if ($visited_before == 'Yes'){

	echo "<h2>Welcome back</h2>";

	}else {
// if not, make cookie (in index) and then store the new session in the database; 

	echo "<h2>Welcome new user</h2>";

// this adds an entry into the sessions website; 
	$sql = "INSERT INTO sessions (first_visit) VALUES(NOW())";
	$result = $conn->query($sql);

	setcookie('visited_before', 'yes');
}

?>