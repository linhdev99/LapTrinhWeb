var dataTable = [];
function onClickCreateTable() {
  var defaultData = [
    ["1x1", "1x2"],
    ["2x1", "2x2"],
  ];
  dataTable = defaultData;
  LoadTableToHTML();
}
function onClickInsRow() {
  var curLenRow = dataTable.length;
  var curLenCol = 0;
  if (curLenRow != 0) curLenCol = dataTable[0].length;
  newRow = [];
  for (let i = 0; i < curLenCol; i++) {
    newRow.push((curLenRow + 1).toString() + "x" + (i + 1).toString());
  }
  dataTable.push(newRow);
  LoadTableToHTML();
}
function onClickInsCol() {
  var curLenRow = dataTable.length;
  var curLenCol = 0;
  if (curLenRow != 0) curLenCol = dataTable[0].length;
  for (let i = 0; i < curLenRow; i++) {
    dataTable[i].push((i + 1).toString() + "x" + (curLenCol + 1).toString());
  }
  LoadTableToHTML();
}
function onClickDeleteRow() {
  var input_index_value = document.getElementById("input_index_value");
  var row = input_index_value.value;
  if (isNaN(row) || row == "") {
    return;
  } else {
    console.log(row);
    var lenRow = dataTable.length;
    if (lenRow > row && row > -1) {
      dataTable.splice(row, 1);
    }
    LoadTableToHTML();
  }
}
function onClickDeleteCol() {
  var input_index_value = document.getElementById("input_index_value");
  var col = input_index_value.value;
  if (isNaN(col) || col == "") {
    return;
  } else {
    var curLenRow = dataTable.length;
    var curLenCol = 0;
    if (curLenRow != 0) curLenCol = dataTable[0].length;
    if (curLenCol > col && col > -1) {
      for (let i = 0; i < curLenRow; i++) {
        dataTable[i].splice(col, 1);
      }
    }
    LoadTableToHTML();
  }
}
function onClickDeleteAll() {
  dataTable = [];
  LoadTableToHTML();
}
function LoadTableToHTML() {
  var table = document.createElement("table");
  table.classList.add("table");
  var tr = table.insertRow(-1);
  for (var i = 0; i < dataTable.length; i++) {
    var them_row = table.insertRow(-1);
    for (var j = 0; j < dataTable[i].length; j++) {
      var cell = them_row.insertCell(-1);
      cell.innerHTML = dataTable[i][j];
      them_row.appendChild(cell);
    }
  }
  var divContainer = document.getElementById("show-table");
  divContainer.innerHTML = "";
  divContainer.appendChild(table);
  console.log(dataTable);
}
