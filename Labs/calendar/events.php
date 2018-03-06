<html>
<head>
    <title>
    </title>

</head>
<body>
    <?php

    // include means  you put the connection stuff there
    include "connect.php";

    // Get the ID numebr from the URL
    $id = $_GET['id'];

    // SQL can filter the results
    // look up limit data selections for MySQL
    $sql = "SELECT * FROM events WHERE id = $id";
    // run query; result variable has results; contains different objects, -> access objects, like num rows...
    $result = $conn->query($sql);
    // if there are rows get one at a time, until we're out of time
    // fetch associated means get the next row, this way it goes through one by one...
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        	echo "<h1>";
        	echo $row['id'];
        	echo ".";
        	echo $row['title'];
        	echo "</h1>";

        	echo "<h2>";
        	echo $row['date'];
        	echo "</h2>";

        	echo "<p>";
        	echo $row['description'];
        	echo "</p>";
        };
    } else {
        die ('event not found');
    };
    $conn->close();
    ?>

    <a href="index.php">go back</a>

</body>
</html>