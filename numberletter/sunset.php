<html>

<head>

  <style>
      body {
        margin:0;
        width:105vw;
        overflow:hidden;
      }

      img {
        width:10vw;
        height:10vh;
      }

      form {
        position:fixed;
        bottom:5px;
        left:10px;
      }

      input {
        width:50px;
        background-color:orange;
        border:black;
      }

      .item {
        animation-name:fade;
        animation-iteration-count: infinite;
        animation-direction:alternate;
        animation-delay:0s;
      }

      @keyframes fade {
        from {opacity:1;}
        to {opacity:0;}
      }
  </style>

</head>

<body>


  <?php
    // get variables
    $letter = $_GET['letter'];
    $number = $_GET['number'];
    
    // initialize counter and id counter. id counter is used to give each img its own unique id, associated with its own styles.
    $counter = 1;
    $idcounter = 1;

    // duration is 100 divided by number in seconds
    $duration = ($number)."s";

    // array that describes sequence of letters
    $table = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    // get number letters in sequence (26)
    $tableLength = count($table, COUNT_RECURSIVE);


    // if letter and number have nothing or are null, set it to 1, a
    if(!isset($number) || empty($number) || !is_numeric($number)){
      $number = 1;
    };
    if(!isset($letter) || empty($letter) || !ctype_alpha($letter)){
      $letter = a;
    };

    // run loop 100 times
    while ($counter <= 100) {

        // set delay; counter divided by two, in seconds; each time counter goes up, delay gets .5s longer
        // $delay = ($idcounter/$number).'s';
       
        // go through table array
        for ($i = 0; $i < $tableLength ; $i++){
            // on each time, if letter is not the same as the item in the array, put in an image that corresponds to the array item.

            $delay = $i.'s';

            if ($letter != $table[$i]) {

                $id = 'img'.$idcounter;
                echo "<head><style>#$id {animation-duration:$duration; animation-delay:$delay;}</style><head>";
                echo "<img class='item' id=$id src='assets/sunset/$table[$i].png'>";
                $idcounter++;
            } 
            // if the array item is the same as the letter, put in an image that corresponds to the letter, then break the loop.
            else {
              $delay = ($idcounter/$number).'s';
              $id = 'img'.$idcounter;
              echo "<head><style>#$id {animation-duration:$duration; animation-delay:$delay;}</style><head>";
              echo "<img class='item' id=$id src='assets/sunset/$table[$i].png'>";
              $idcounter++;
              break;
            }

        };
      $counter++;
    };
      
  ?>

<form name="form" action="" method="get">
    <input type="text" name="letter" maxlength="1" >
    <input type="text" name="number" maxlength="2" >
    <a href="table.php"><input type="submit"></a>
</form>

  <!-- i+=2; use this for going through by 2; odd or even #s... -->
    
</body>

</html>
