<?php

    include "connect.php";

    // TODO: Add a row to the database
    $type = audio;

    $sql = "INSERT INTO files (type) VALUES('$type')";
    $result = $conn->query($sql);

    // TODO: Name the mp3 with the id of the row we just added, instead of audio.mp3
    // $last_id = mysqli_insert_id($con);

    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
       $blob = fopen('php://input', rb);
        if ($file = fopen('sounds/$id.mp3', 'wb')) {
            while (!feof($blob)) {
                fwrite($file, fread($blob, 4096));
            }
        }
    }

    
    
    $conn->close();

    

?>