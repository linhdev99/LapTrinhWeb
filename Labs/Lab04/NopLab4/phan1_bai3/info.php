<?php
ob_start();
session_start();
if (!isset($_SESSION["username"])) {
  header("Location:login.php");
} else {
  $username = $_SESSION["username"];
  $password = $_SESSION["password"];
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
  <title>1710165 - Huynh Pham Phuoc Linh</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container">
    <div style="margin: 40px;">
      <h1>Info</h1>
      <h3><?php echo "Chào mừng '$username' đến với trang info.php"; ?></h3>
      <form action="./logout.php">
        <button type="submit" class="btn btn-primary">LOGOUT</button>
      </form>
    </div>
</body>

</html>