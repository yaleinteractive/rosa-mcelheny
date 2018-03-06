<html>
<head></head>
<body>
    <?php

    // sequel connection info is in variables...
    // localhost is common (even when deployed site); depends on hosting
    // user/pswrd is default for mamp; you shoudl use your own in future...
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "calendar";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    // arrow operator
    // die function - quit program and give error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    };

    // this is the command we want to run; events is the name of the table
    // define query
    // SELECT * from Table
    // $sql = "SELECT id, date, title, description FROM events ORDER by date";
    // specify the order... ASC = Ascending; DESC = descending
    $sql = "SELECT * FROM events ORDER by date DESC, time DESC";
    // run query; result variable has results; contains different objects, -> access objects, like num rows...
    $result = $conn->query($sql);
    // if there are rows get one at a time, until we're out of time
    // fetch associated means get the next row, this way it goes through one by one...
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        	

            echo "<h1>";
        	// row is called an associated array; the items have ids; 
            echo "<a href='events.php?id={$row['id']}'>";
            echo $row['id'];
        	echo ".";
        	echo $row['title'];
            echo "</a>";
        	echo "</h1>";


        	echo "<h2>";
        	echo $row['date'];
        	echo "</h2>";

        	echo "<p>";
        	echo $row['description'];
        	echo "</p>";

            // echo "{$row['id']}. {$row['date']}: {$row['title']}<br>";
        };
    } else {
    	// if there are 0 rows (0 entries), then no events
        echo "No events";
    };
    $conn->close();
    ?>

</body>
</html>