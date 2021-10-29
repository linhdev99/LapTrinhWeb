<!DOCTYPE html>
<html>

<head>
  <title>Phần 1 - Bài 4 - Huỳnh Phạm Phước Linh</title>
  <style>
    th {
      width: 50px;
    }

    tr {
      height: 50px;
    }

    table,
    th,
    tr {
      border: 1px solid black;
      border-collapse: collapse;
      background-color: yellow;
    }
  </style>
</head>

<body>
  <table>
    <?php
    for ($i = 1; $i <= 7; $i++) {
      echo "<tr>";
      for ($j = 1; $j <= 7; $j++) {
        echo "<th>" . $i * $j . "</th>";
      }
      echo "</tr>";
    }
    ?>
  </table>

</body>

</html>