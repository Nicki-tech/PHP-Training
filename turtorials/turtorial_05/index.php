<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turtorial-05</title>
</head>

<body>
  <?php
  $myfile = fopen("sample.txt", "r") or die("Unable to open file!");

  echo "<table>";
  while (!feof($myfile)) {
    echo "<tr><td width='600' bgcolor='blue'>";
    echo fgets($myfile) . "<br>";
    echo "</td></tr>";
  }
  echo "</table>";
  fclose($myfile);
  ?>

  <table>
    <?php

    $file = fopen("samples.csv", "r");
    while (($data = fgetcsv($file)) !== false) {
      echo "<tr>";
      foreach ($data as $i) {
        echo "<td>" . "$i" . "</td>";
      }
      echo "</tr>";
    }
    fclose($file);
    ?>
  </table>
  <table>
    <?php
    require "vendor/autoload.php";
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    $spreadsheet = $reader->load("sample.xlsx");
    $worksheet = $spreadsheet->getActiveSheet();
    foreach ($worksheet->getRowIterator() as $row) {
      $cellIterate = $row->getCellIterator();
      $cellIterate->setIterateOnlyExistingCells(false);
      echo "<tr>";
      foreach ($cellIterate as $cell) {
        echo "<td>" . $cell->getValue() . "</td>";
      }
      echo "</tr>";
    }
    ?>
  </table>

  <?php
  if ($file = fopen("sample.doc", "r")) {
    while (!feof($file)) {
      $filename = fgets($file);
      echo ("$filename" . "<br>");
    }
    fclose($file);
  }
  ?>
</body>

</html>