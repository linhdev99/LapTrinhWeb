<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
  <title>1710165 - Huynh Pham Phuoc Linh</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>

<body>
  <div class="container">
    <script>
      window.onload = load_ajax;

      function load_ajax() {
        $(document).ready(function() {
          $.ajax({
            type: "GET",
            url: "database.php",
            data: "btn-action=reload",
            dataType: 'json',
            cache: false,
            success: function(result) {
              dataTable = result;
              var table = document.getElementById("my_table");
              for (var i = 0; i < dataTable.length; i++) {
                var them_row = table.insertRow(-1);
                for (var j = 0; j < dataTable[i].length; j++) {
                  var cell = them_row.insertCell(-1);
                  cell.innerHTML = dataTable[i][j];
                  them_row.appendChild(cell);
                }
              }
            }
          });
          event.preventDefault();
        });
      }

      function InsertData() {
        $(document).ready(function() {
          $("#my_form").submit(function(event) {
            var formData = {
              name: $("#input_id").val(),
              email: $("#input_name").val(),
              year: $("#input_year").val(),
            };
            console.log(formData);
            $.ajax({
              type: "POST",
              url: "database.php",
              data: $('#my_form').serialize() + "&btn-action=insert",
              dataType: 'html',
              success: function() {
                alert($('#my_form').serialize() + "&btn-action=insert");
                location.reload();
              }
            });

            event.preventDefault();
          });
        });
      }

      function UpdateData() {
        $(document).ready(function() {
          $("#my_form").submit(function(event) {
            var formData = {
              name: $("#input_id").val(),
              email: $("#input_name").val(),
              year: $("#input_year").val(),
            };
            console.log(formData);
            $.ajax({
              type: "POST",
              url: "database.php",
              data: $('#my_form').serialize() + "&btn-action=update",
              dataType: 'html',
              success: function() {
                alert($('#my_form').serialize() + "&btn-action=update");
                location.reload();
              }
            });

            event.preventDefault();
          });
        });
      }

      function DeleteData() {
        $(document).ready(function() {
          $("#my_form").submit(function(event) {
            var formData = {
              name: $("#input_id").val(),
              email: $("#input_name").val(),
              year: $("#input_year").val(),
            };
            console.log(formData);
            $.ajax({
              type: "POST",
              url: "database.php",
              data: $('#my_form').serialize() + "&btn-action=delete",
              dataType: 'html',
              success: function() {
                alert($('#my_form').serialize() + "&btn-action=delete");
                location.reload();
              }
            });

            event.preventDefault();
          });
        });
      }
    </script>
    <h1>Database</h1>
    <hr />
    <table class="table" id='my_table'>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Year</th>
        </tr>
      </thead>
      <tbody>
        <tr></tr>
      </tbody>
    </table>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" class="form-cal" id="my_form">
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
      <hr />
      <div class="row">
        <div class="col-4">
          <div class="d-grid gap-2">
            <button id="btn-insert" type="submit" class="btn btn-outline-success" name="btn-action" value="insert" onclick=InsertData()>
              INSERT
            </button>
          </div>
        </div>
        <div class="col-4">
          <div class="d-grid gap-2">
            <button id="btn-update" type="submit" class="btn btn-outline-primary" name="btn-action" value="update" onclick=UpdateData()>
              UPDATE
            </button>
          </div>
        </div>
        <div class="col-4">
          <div class="d-grid gap-2">
            <button id="btn-delete" type="submit" class="btn btn-outline-danger" name="btn-action" value="delete" onclick=DeleteData()>
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