var countError = 0;
function onCheckFirstName() {
  var inputbox = document.getElementById("input_firstname");
  var inputstate = document.getElementById("text_check_input_firtname");
  var value = inputbox.value;
  if (value.length < 2) {
    inputstate.innerText = "* Chưa nhập tên";
    inputstate.style.color = "red";
    countError++;
    return;
  }
  if (value.length > 30) {
    inputstate.innerText = "* Tên quá dài";
    inputstate.style.color = "red";
    countError++;
    return;
  }
  inputstate.innerText = "* Complete";
  inputstate.style.color = "green";
}
function onCheckLastName() {
  var inputbox = document.getElementById("input_lastname");
  var inputstate = document.getElementById("text_check_input_lastname");
  var value = inputbox.value;
  if (value.length < 2) {
    inputstate.innerText = "* Chưa nhập tên";
    inputstate.style.color = "red";
    countError++;
    return;
  }
  if (value.length > 30) {
    inputstate.innerText = "* Tên quá dài";
    inputstate.style.color = "red";
    countError++;
    return;
  }
  inputstate.innerText = "* Complete";
  inputstate.style.color = "green";
}
function onCheckEmail() {
  var inputbox = document.getElementById("input_email");
  var inputstate = document.getElementById("text_check_input_email");
  const EMAIL = new RegExp("[a-zA-Z0-9_\\.\\+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-\\.]+");
  var value = inputbox.value;
  if (!EMAIL.test(value)) {
    inputstate.innerText = "* Email không đúng";
    inputstate.style.color = "red";
    countError++;
    return;
  }
  inputstate.innerText = "* Complete";
  inputstate.style.color = "green";
}
function onCheckPassword() {
  var inputbox = document.getElementById("input_password");
  var inputstate = document.getElementById("text_check_input_password");
  var value = inputbox.value;
  if (value.length < 2) {
    inputstate.innerText = "* Chưa nhập mật khẩu";
    inputstate.style.color = "red";
    countError++;
    return;
  }
  if (value.length > 30) {
    inputstate.innerText = "* Mật khẩu quá dài";
    inputstate.style.color = "red";
    countError++;
    return;
  }
  inputstate.innerText = "* Complete";
  inputstate.style.color = "green";
}
function onCheckAbout() {
  var inputbox = document.getElementById("input_about");
  var inputstate = document.getElementById("text_check_input_about");
  var value = inputbox.value;
  if (value.length > 10000) {
    inputstate.innerText = "* About quá dài";
    inputstate.style.color = "red";
    countError++;
    return;
  }
  inputstate.innerText = "";
  inputstate.style.color = "green";
}
function onClickReset() {
  location.reload();
}
function onClickSubmit() {
  countError = 0;
  onCheckFirstName();
  onCheckLastName();
  onCheckEmail();
  onCheckPassword();
  onCheckAbout();
  if (countError > 0) {
    alert("Dữ liệu nhập không đúng định dạng!");
  } else {
    alert("Complete!");
  }
}
