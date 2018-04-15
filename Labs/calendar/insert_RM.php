<?php
  $title = $_GET['title'];
  $date = $_GET['date'];
  $time = $_GET['time'];
  $description = $_GET['description'];
  // If a title and a date were specified, insert a new event
  // into the database
  if ($title && $date) {
    // Construct SQL to insert a new row
    $sql = "INSERT INTO events (title, date, time, description)
                               VALUES('$title', '$date', '$time', '$description')";
    // Run the SQL
    $result = $conn->query($sql);
    echo "<h2>Event added</h2>";
  }
?>

<!-- two ways to submit a form: one is through GET (from URL) the other through POST -->
<!-- with POST, you write $_REQUEST (can also use $_POST)-->
with POST, you add form data to request, in header, from browser to server, it is form data
use Post when you add soemthign to a database; use get when you display something
you can't upload a file into a url
use post.


<?php
  $title = $_REQUEST['title'];
  $date = $_REQUEST['date'];
  $time = $_REQUEST['time'];
  $description = $_REQUEST['description'];
  $image = basename($FILES['image']]'name');
  // If a title and a date were specified, insert a new event
  // into the database
  if ($title && $date) {



    // Construct SQL to insert a new row
    $sql = "INSERT INTO events (title, date, time, description, image)
                               VALUES('$title', '$date', '$time', '$description', '$image')";
    // Run the SQL
    $result = $conn->query($sql);
    echo "<h2>Event added</h2>";



  }
?>

to display image:

echo "<p>";
echo "<img src='../uploads/{row['image']}'>";
echo "<p>";

  use isset to check if something was passed
  use $conn->insert_id to get the current id

  make folder with id name; then put file in that folder.
  don't overwrite the file name...

  turn on display_error

  

