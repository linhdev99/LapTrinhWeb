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
    <?php
    $data = [];
    $conn = null;
    $getErr = "";
    require 'database.php';
    function selectData($id)
    {
      global $conn;
      global $data;
      if (empty($id)) {
        $sql = "SELECT * FROM cars";
      } else {
        $sql = "SELECT * FROM cars WHERE id = $id";
      }
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $temp = [
            $row["id"],
            $row["name"],
            $row["year"]
          ];
          array_push($data, $temp);
        }
      }
    }
    selectData(null);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($_POST["btn-action"] == "insert") {
        $getID = $_POST['input_id'];
        $getName = $_POST['input_name'];
        $getYear = $_POST['input_year'];
        insertData($getID, $getName, $getYear);
      } else if ($_POST["btn-action"] == "update") {
        $getID = $_POST['input_id'];
        $getName = $_POST['input_name'];
        $getYear = $_POST['input_year'];
        updateData($getID, $getName, $getYear);
      } else if ($_POST["btn-action"] == "delete") {
        $getID = $_POST['input_id'];
        deleteData('id', $getID);
      }
    }
    function insertData($id, $name, $year)
    {
      global $getErr;
      if ($id == "") {
        $getErr = "Error!";
        return;
      }
      if (!is_numeric($id) || !is_numeric($year)) {
        $getErr = "Error!";
        return;
      }
      if (strlen($name) < 5 || strlen($name) > 40) {
        $getErr = "Error!";
        return;
      }
      if ((int) $year < 1990 || (int) $year > 2015) {
        $getErr = "Error!";
        return;
      }
      global $conn;
      $sql = "INSERT INTO cars (id, name, year) VALUES ($id, '$name', '$year')";
      if ($conn->query($sql) === TRUE) {
        $getErr = "";
        header("Refresh:0");
      } else {
        $getErr = "Error!";
      }
    }
    function updateData($id, $name, $year)
    {
      global $getErr;
      if ($id == "") {
        $getErr = "Error!";
        return;
      }
      if (!is_numeric($id) || !is_numeric($year)) {
        $getErr = "Error!";
        return;
      }
      if (strlen($name) < 5 || strlen($name) > 40) {
        $getErr = "Error!";
        return;
      }
      if ((int) $year < 1990 || (int) $year > 2015) {
        $getErr = "Error!";
        return;
      }
      global $conn;
      $sql = "UPDATE cars SET name='$name', year='$year' WHERE id=$id";
      if ($conn->query($sql) === TRUE) {
        $getErr = "";
        header("Refresh:0");
      } else {
        $getErr = "Error!";
      }
    }
    function deleteData($key, $id)
    {
      global $getErr;
      if ($id == "") {
        $getErr = "Error!";
        return;
      }
      if (!is_numeric($id)) {
        $getErr = "Error!";
        return;
      }
      global $conn;
      $sql = "DELETE FROM cars WHERE $key=$id";
      if ($conn->query($sql) === TRUE) {
        $getErr = "";
        header("Refresh:0");
      } else {
        $getErr = "Error!";
      }
    }
    ?>
    <h1>Database</h1>
    <hr />
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Year</th>
        </tr>
      </thead>
      <tbody>
        <?php
        for ($i = 0; $i < count($data); $i++) {
          echo '<tr>
                  <th scope="row">' . $data[$i][0] . '</th>
                  <td>' . $data[$i][1] . '</td>
                  <td>' . $data[$i][2] . '</td>
                </tr>';
        }
        ?>
      </tbody>
    </table>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" class="form-cal">
      <div class="mb-3">
        <label class="form-label">ID</label>
        <input class="form-control" id="input_id" type="text" name="input_id" />
      </div>
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input class="form-control" id="input_name" type="text" name="input_name" />
      </div>
      <div class="mb-3">
        <label class="form-label">Year</label>
        <input class="form-control" id="input_year" type="text" name="input_year" />
      </div>
      <p><?php echo $getErr; ?></p>
      <hr />
      <div class="row">
        <div class="col-4">
          <div class="d-grid gap-2">
            <button id="btn-insert" type="submit" class="btn btn-outline-success" name="btn-action" value="insert">
              INSERT
            </button>
          </div>
        </div>
        <div class="col-4">
          <div class="d-grid gap-2">
            <button id="btn-update" type="submit" class="btn btn-outline-primary" name="btn-action" value="update">
              UPDATE
            </button>
          </div>
        </div>
        <div class="col-4">
          <div class="d-grid gap-2">
            <button id="btn-delete" type="submit" class="btn btn-outline-danger" name="btn-action" value="delete">
              DELETE BY ID
            </button>
          </div>
        </div>
      </div>
    </form>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
  </div>
</body>