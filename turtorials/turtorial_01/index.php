<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Turtorial_01</title>
   <style>
      table {
         margin: 0 auto;
      }
      h3{
         text-align: center;
      }
   </style>
</head>

<body>
   <h3 >Chess Board</h3>
   <table>
      <?php
      for ($row = 1; $row <= 8; $row++) {
         echo "<tr>";
         for ($column = 1; $column <= 8; $column++) {
            if ($column % 2 == 0) {
               $color = '#ffffff';
            } else {
               $color = '#000000';
            }
            if ($row % 2 == 0) {
               if ($column % 2 == 0) {
                  $color = '#000000';
               } else {
                  $color = '#ffffff';
               }
            }
            echo "<td style = 'border:1px solid;height:90px;width:90px;background-color:" . $color . "'></td>";
         }
         echo "</tr>";
      }
      ?>
   </table>
</body>

</html>