<?php
  // If we're going to set a cookie, we need to
  // do it before we output any content,
  // because cookies are sent as part of the
  // HTTP headers, which have to come before the payload.
  // if ($_COOKIE['visited_before'] == 'Yes') {
  //   $visited_before = true;
  // }
  // else {
  //   setcookie('visited_before', 'Yes');
  // }
?>
<html>
<head>
  <title>Calendar</title>
</head>

<body>

  <?php
  include "connect.php";
  // include "track_session.php";
  include "insert.php";
  // Format today's date as YYYY-MM-DD
  $today = date('Y-m-d');
  echo "<h1>Calendar for $today</h1>";
  // Run a SQL query and store the results in $result
  // Always specify an order
  // * - all columns
  // FROM events - always specify the table name
  // ORDER BY - always specify an order and use ASC or DESC
  // WHERE - a condition
  $sql = "SELECT * FROM events WHERE date >= '$today' ORDER BY date DESC, time DESC";
  $result = $conn->query($sql);
  // If there is at least 1 row in the result, show all the rows
  if ($result->num_rows > 0) {
      // Get one row at a time until we're out of rows
      while ($row = $result->fetch_assoc()) {
          echo "<h2>";
          echo "{$row['date']}. ";
          echo "<a href='event.php?id={$row['id']}'>";
          echo $row['title'];
          echo "</a>";
          echo "</h2>";
      }
  } else {
      echo "No events";
  }
  // Close the databse connection
  $conn->close();
  ?>

  <h2>Add an event</h2>

  <form action="post" enctype="multipart/form-data">
      <label>Title <input type="text" name="title"></label><br>
      <label>Date <input type="date" name="date"></label><br>
      <label>Time <input type="time" name="time"></label><br>
      <label>Description<br>
        <textarea name="description"></textarea></label><br>
      <
      <input type="submit" value="Add">
  </form>


</body>