<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
  <title>1710165 - Huynh Pham Phuoc Linh</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="myCalculator.js" type="text/javascript"></script>
</head>
<?php
$e1 = $e2 = $op = "";
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $e1 = $_POST["e1"];
  $e2 = $_POST["e2"];
  $op = $_POST["op"];
  if (!is_numeric($e1) || !is_numeric($e2)) {
    $result = "Lỗi!";
  } else {
    if ($op == "add") {
      $result = (float) $e1 + (float) $e2;
    } elseif ($op == "sub") {
      $result = (float) $e1 - (float) $e2;
    } elseif ($op == "mul") {
      $result = (float) $e1 * (float) $e2;
    } elseif ($op == "div") {
      if ((float) $e2 != 0) {
        $result = (float) $e1 / (float) $e2;
      } else {
        $result = "Không thể chia cho 0!";
      }
    } elseif ($op == "exp") {
      $result = (float) $e1 ** (float) $e2;
    } elseif ($op == "nd") {
      if ((float) $e1 != 0) {
        $result = 1 / (float) $e1;
      } else {
        $result = "Không thể chia cho 0!";
      }
    } else {
      $result = "Chọn phép tính!";
    }
  }
}
?>

<body>
  <div class="head-content">
    <h1>Tính toán đơn giản bằng Javascript</h1>
    <p>Nhập bài toán dưới đây</p>
  </div>
  <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" class="form-cal">
    <div class="mb-3">
      <label for="num1" class="form-label">Toán hạng</label>
      <input class="form-control" autocomplete="off" type="text" id="e1" name="e1" value="<?php echo $e1 ?>" />
    </div>
    <div class="mb-3">
      <label for="operater" class="form-label">Toán tử</label>
      <select class="form-select" aria-label="operater" type="text" id="op" name="op" value="<?php echo $op ?>">
        <option selected value="">Chọn phép tính</option>
        <option value="add">Cộng</option>
        <option value="sub">Trừ</option>
        <option value="mul">Nhân</option>
        <option value="div">Chia</option>
        <option value="exp">Lũy thừa</option>
        <option value="nd">Nghịch đảo số thứ nhất!</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="num2" class="form-label">Toán hạng</label>
      <input class="form-control" autocomplete="off" type="text" id="e2" name="e2" value="<?php echo $e2 ?>" />
    </div>
    <div class="d-grid">
      <button id="btn-cal" type="submit" name="Cal" class="btn btn-outline-primary">
        Tính toán
      </button>
    </div>
    <div class="mb-3 form-result">
      <label class="form-label">Kết quả:</label>
      <label id="result" class="form-label fw-bold"><?php echo $result ?></label>
    </div>
  </form>
</body>

</html>