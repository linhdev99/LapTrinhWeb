var inName;
var inValue;
var inExpire;
var dataTable = [];
function SetTable() {
    if (inName == null) Khaibao();
    console.log(document.cookie);
    var data = document.cookie.split(";");
    dataTable = [];
    for (let index = 0; index < data.length; index++) {
        temp = data[index].split("=");
        name = temp[0];
        value = temp[1];
        console.log(name, value);
        dataTable.push([name, value]);
    }
    LoadTableToHTML();
}
function LoadTableToHTML() {
    // var table = document.createElement("table");
    // table.classList.add("table");
    // var tr = table.insertRow(-1);
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
function GetDataCookie() {
    data = document.cookie;
}
function SetNewCookie() {
    if (inName == null) Khaibao();
    strName = inName.value;
    strValue = inValue.value;
    strDay = parseInt(inExpire.value);
    var exdays = 1;
    if (strDay != "") {
        exdays = strDay;
    }
    var expires = new Date(Date.now() + exdays * 1000 * 60 * 60 * 24).toGMTString();
    var query = strName + "=" + strValue + '; expires="' + expires + '"';
    console.log(query);
    document.cookie = strName + "=" + strValue + '; expires="' + expires + '"';
    alert("Cookie name complete: " + strName);
    location.reload();
}
function DeleteCookie() {
    if (inName == null) Khaibao();
    var user = inName.value;
    document.cookie = user + "=; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    location.reload();
}
function Khaibao() {
    inName = document.getElementById("cookie_name");
    inValue = document.getElementById("cookie_value");
    inExpire = document.getElementById("cookie_expire");
    SetTable();
}
window.onload = Khaibao;
