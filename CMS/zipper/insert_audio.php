<?php
  $type = audio;
  // If a title and a date were specified, insert a new event
  // into the database
  if ($type) {
    // Construct SQL to insert a new row
    $sql = "INSERT INTO files (type) VALUES('$type')";
    // Run the SQL
    $result = $conn->query($sql);
    // echo "<h2>Event added</h2>";
  }
?>