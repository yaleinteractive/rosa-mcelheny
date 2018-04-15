<?php
  $title = $_REQUEST['title'];
  $date = $_REQUEST['date'];
  $time = $_REQUEST['time'];
  $description = $_REQUEST['description'];

  // If a title and a date were specified, insert a new event
  // into the database
  if ($title && $date) {

    
    // Construct SQL to insert a new row
    $sql = "INSERT INTO events (title, date, time, description, image)
                               VALUES('$title', '$date', '$time', '$description', '$image')";
    // // Run the SQL
    $result = $conn->query($sql);
    echo "<h2>Event added</h2>";



  }
?>