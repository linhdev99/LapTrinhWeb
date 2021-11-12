<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
  <title>1710165 - Huynh Pham Phuoc Linh</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="checkInputForm.js"></script>
</head>
<?php
$fname = "";
$lname = "";
$email = "";
$password = "";
$about = "";
$gender = "male";
$fname_err = "";
$lname_err = "";
$email_err = "";
$password_err = "";
$about_err = "";
$foundErr = false;
$messComplete = "Complete!";
$messFail = "Dữ liệu nhập không đúng!";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["btn-action"] == "Reset") {
    header("Refresh:0");
  } else if ($_POST["btn-action"] == "Submit") {
    $fname = $_POST['input_firstname'];
    $lname = $_POST['input_lastname'];
    $email = $_POST['input_email'];
    $password = $_POST['input_password'];
    $about = $_POST['input_about'];
    $foundErr = checkForm($fname, $lname, $email, $password, $about);
    if ($foundErr) {
      echo "<script type='text/javascript'>alert('$messFail');</script>";
    } else {
      echo "<script type='text/javascript'>alert('$messComplete');</script>";
    }
  }
}
function checkForm($fname, $lname, $email, $password, $about)
{
  global $fname_err, $lname_err, $about_err, $password_err, $email_err;
  $foundErr = false;
  // Check first name
  if (strlen($fname) > 1 && strlen($fname) < 30) {
    $fname_err = "* Complete!";
  } else {
    $fname_err = "* Nhập chuỗi từ 2 - 30 kí tự!";
    $foundErr =  true;
  }
  // Check last name
  if (strlen($lname) > 1 && strlen($lname) < 30) {
    $lname_err = "* Complete!";
  } else {
    $lname_err = "* Nhập chuỗi từ 2 - 30 kí tự!";
    $foundErr = true;
  }
  // Check password
  if (strlen($password) > 1 && strlen($password) < 30) {
    $password_err = "* Complete!";
  } else {
    $password_err = "* Nhập chuỗi từ 2 - 30 kí tự!";
    $foundErr = true;
  }
  // Check email
  $RegExp =  '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
  if (preg_match($RegExp, $email)) {
    $email_err = "* Complete!";
  } else {
    $email_err = "* Nhập theo định dạng sth@sth.sth!";
    $foundErr = true;
  }
  // Check about
  if (strlen($about) < 10000) {
    $about_err = "* Complete!";
  } else {
    $about_err = "* Giới hạn 10000 kí tự!";
    $foundErr =  true;
  }
  return $foundErr;
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<body>
  <div class="head-content">
    <h1>Đăng ký thành viên</h1>
    <p>"1710165 - Huỳnh Phạm Phước Linh"</p>
  </div>
  <hr />
  <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" class="form-cal">
    <div class="mb-3">
      <label for="input_firstname" class="form-label">First Name</label>
      <input class="form-control" id="input_firstname" type="text" name="input_firstname" value="<?php echo $fname ?>" />
      <p class="state-check-err" id="text_check_input_firtname" style="color: <?php
                                                                              if ($fname_err == "* Complete!")
                                                                                echo "green";
                                                                              else
                                                                                echo "red"; ?>;">
        <?php echo $fname_err ?>
      </p>
    </div>
    <div class="mb-3">
      <label for="input_lastname" class="form-label">Last Name</label>
      <input class="form-control" id="input_lastname" type="text" name="input_lastname" value="<?php echo $lname ?>" />
      <p class="state-check-err" id="text_check_input_lastname" style="color: <?php
                                                                              if ($lname_err == "* Complete!")
                                                                                echo "green";
                                                                              else
                                                                                echo "red"; ?>;">
        <?php echo $lname_err ?>
      </p>
    </div>
    <div class="mb-3">
      <label for="input_email" class="form-label">Email</label>
      <input class="form-control" id="input_email" type="text" name="input_email" value="<?php echo $email ?>" />
      <p class="state-check-err" id="text_check_input_email" style="color: <?php
                                                                            if ($email_err == "* Complete!")
                                                                              echo "green";
                                                                            else
                                                                              echo "red"; ?>;">
        <?php echo $email_err ?>
      </p>
    </div>
    <div class="mb-3">
      <label for="input_password" class="form-label">Password</label>
      <input type="password" class="form-control" id="input_password" name="input_password" value="<?php echo $password ?>" />
      <p class="state-check-err" id="text_check_input_password" style="color: <?php
                                                                              if ($password_err == "* Complete!")
                                                                                echo "green";
                                                                              else
                                                                                echo "red"; ?>;">
        <?php echo $password_err ?>
      </p>
    </div>
    <div class="mb-3">
      <label class="form-label">
        Birthday (dd/mm/yyyy)
      </label>
      <div class="row">
        <div class="col-4">
          <select class="form-select" id="input_day" name="input_day">
            <?php
            $i = 1;
            for ($i = 1; $i < 32; $i++) {
              echo "<option value=" . $i . ">$i</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-4">
          <select class="form-select" id="input_month" name="input_month">
            <?php
            $i = 1;
            for ($i = 1; $i < 12; $i++) {
              echo "<option value=" . $i . ">$i</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-4">
          <select class="form-select" id="input_year" name="input_year">
            <?php
            $i = 1;
            for ($i = 2021; $i > 1900; $i--) {
              echo "<option value=" . $i . ">$i</option>";
            }
            ?>
          </select>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label" id="input_gender" name="input_gender">Gender</label>
      <div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="radio_gender" id="radio_male" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> />
          <label class="form-check-label" for="radio_male">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="radio_gender" id="radio_female" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> />
          <label class="form-check-label" for="radio_female">
            Female
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="radio_gender" id="radio_other" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> />
          <label class="form-check-label" for="radio_other">
            Other
          </label>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">Country</label>
      <select class="form-select" id="input_country" name="input_country">
        <option value="1">Vietnam</option>
        <option value="2">Australia</option>
        <option value="3">United States</option>
        <option value="4">India</option>
        <option value="5">Other</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="input_about" class="form-label">About</label>
      <textarea class="form-control" id="input_about" rows="3" name="input_about" value="<?php echo $about ?>"></textarea>
      <p class="state-check-err" id="text_check_input_about" style="color: <?php
                                                                            if ($about_err == "* Complete!")
                                                                              echo "green";
                                                                            else
                                                                              echo "red"; ?>;">
        <?php echo $about_err ?>
      </p>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="d-grid gap-2">
          <button id="btn-reset" type="submit" class="btn btn-outline-danger" name="btn-action" value="Reset">
            Reset
          </button>
        </div>
      </div>
      <div class="col-6">
        <div class="d-grid gap-2">
          <button id="btn-submit" type="submit" class="btn btn-outline-primary" name="btn-action" value="Submit">
            Submit
          </button>
        </div>
      </div>
    </div>
  </form>
  <br />
  <hr />
  <br />
  <br />
  <br />
  <br />
</body>

</html>