<html>

<head>

  <style>
     /* img {
        width:100px;
      }*/
  </style>

</head>

<body>


  <?php
  // get letter variable
    $letter = $_GET['letter'];
    $number = $_GET['number'];
    $counter = 1;

// collection of letters
    $table = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'];

// ho
    $tableLength = count($table, COUNT_RECURSIVE);

    $size = ($number*4).'px';

    // echo '<style>img {width:$size;}</style>';


  while ($counter <= $number) {
      for ($i = 0; $i < $tableLength ; $i++){

          if ($letter != $table[$i]) {
              echo "<img style='width:$size' src='assets/$table[$i].png'>";
          } else {
            echo "<img style='width:$size' src='assets/$table[$i].png'>";
            break;
          }
      };
    $counter++;
  };
    
  ?>

<form name="form" action="" method="get">
    <input type="text" name="letter">
    <input type="text" name="number">

    <input type="submit">
</form>

  <!-- i+=2; use this for going through by 2; odd or even #s... -->
    
</body>

</html>
