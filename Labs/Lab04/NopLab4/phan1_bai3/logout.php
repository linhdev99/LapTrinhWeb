<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
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
      <h1>Bạn đã đăng xuất!</h1>
      <form action="./login.php">
        <button type="submit" class="btn btn-primary">LOGIN</button>
      </form>
    </div>
</body>

</html>