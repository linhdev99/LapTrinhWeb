<?php
$servername = "localhost";
$username = "username";
$password = "password";
$database = "examples";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = [];
// $conn = null;
$getErr = "";
// require 'database.php';

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
    return $data;
}
// selectData(null);
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
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $array = selectData(null);
    // $array = array(1, 2, 3, 4, 5, 6);
    echo json_encode($array);
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
