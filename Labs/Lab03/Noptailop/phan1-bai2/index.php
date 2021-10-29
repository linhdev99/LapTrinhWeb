<!DOCTYPE html>
<html>

<head>
  <title>Phần 1 - Bài 2 - Huỳnh Phạm Phước Linh</title>
</head>

<body>
  <form action="index.php" method="post">
    Text: <input type="text" name="num" min="0" autocomplete="off"><br>
    <input type="submit">
  </form>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (is_numeric($_POST["num"]) == false) {
      echo "Please enter number!";
      return;
    }
    $id = $_POST["num"] % 5;
    switch ($id) {
      case 0:
        echo "Hello";
        break;
      case 1:
        echo "How are you?";
        break;
      case 2:
        echo "I’m doing well, thank you";
        break;
      case 3:
        echo "See you later";
        break;
      case 4:
        echo "Good-bye";
        break;
      default:
        echo "Please enter number!";
    }
  }


  ?>
</body>

</html>