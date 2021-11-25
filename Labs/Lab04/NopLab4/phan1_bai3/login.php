<?php
ob_start();
session_start();
$message = "";
if (isset($_SESSION["username"])) {
  header("Location:info.php");
} else {
  if (isset($_POST) && !empty($_POST["username"]) && !empty($_POST["password"])) {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    header("Location:info.php");
  } else {
    $message = "Nhập tài khoản và mật khẩu!";
  }
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
      <h1>Login Page</h1>
    </div>
    <div style="display:flex; justify-content:center; margin:100px;">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="mb-3">
          <label for="input_username" class="form-label">Tài khoản</label>
          <input type="text" class="form-control" id="input_username" style="min-width:400px;" name="username">
        </div>
        <div class="mb-3">
          <label for="input_password" class="form-label">Mật khẩu</label>
          <input type="password" class="form-control" id="input_password" style="min-width:400px;" name="password">
        </div>
        <div class="mb-3">
          <p style="color: red;"><?php echo $message; ?></p>
        </div>
        <button type="submit" class="btn btn-primary" style="min-width:400px;">LOGIN</button>
      </form>
    </div>
  </div>
</body>

</html>