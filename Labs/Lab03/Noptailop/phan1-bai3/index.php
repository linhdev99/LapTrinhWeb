<!DOCTYPE html>
<html>

<head>
  <title>Phần 1 - Bài 3 - Huỳnh Phạm Phước Linh</title>
</head>

<body>
  <?php
  echo "<br><hr><br>";
  echo "For loop: <br>";
  $i = 0;
  for ($i = 0; $i < 100; $i++) {
    if ($i % 2 != 0) {
      echo $i . ",   ";
    }
  }
  echo "<br><br><hr><br>";
  echo "While loop: <br>";
  $i = 1;
  while ($i < 100) {
    echo $i . ",   ";
    $i = $i + 2;
  }
  echo "<br><br><hr><br>";
  ?>
</body>

</html>