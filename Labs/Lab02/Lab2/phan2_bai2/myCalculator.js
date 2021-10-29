var btn_number = document.getElementsByClassName("btn-number");
var system_class = document.getElementsByClassName("system-class");
var cur_result = document.getElementById("cur-result");
var pre_result = document.getElementById("pre-result");
var preValue = "";
var curValue = "";
var op = "+";
var opSys = "";
var flag = true;
var eqClick = false;
var getErr = false;
for (var i = 0; i < btn_number.length; i++) {
  btn_number[i].addEventListener("click", function () {
    if (eqClick) {
      cur_result.innerText = this.innerText;
      eqClick = false;
      getErr = false;
    } else {
      cur_result.innerText += this.innerText;
    }
    flag = true;
    curValue = cur_result.innerText;
  });
}
for (var i = 0; i < system_class.length; i++) {
  system_class[i].addEventListener("click", function () {
    if (this.id == "delete-all") {
      deleteAll();
    } else if (this.id == "eq") {
      clickBtnEq();
    } else if (this.id == "sign-num") {
      if (cur_result.innerText != "") {
        cur_result.innerText = -parseFloat(curValue);
        curValue = cur_result.innerText;
      }
    } else {
      op = this.innerText;
      opSys = this.id;
      clickBtnOp();
    }
  });
}
function deleteAll() {
  cur_result.innerText = "";
  pre_result.innerText = "";
  curValue = "";
  preValue = "";
}
function clickBtnOp() {
  console.log(getErr);
  if (getErr) {
    deleteAll();
    getErr = false;
    return;
  }
  if (flag) {
    if (preValue != "" && curValue != "") {
    } else {
      flag = false;
      preValue = cur_result.innerText;
      pre_result.innerText = cur_result.innerText + " " + op;
      cur_result.innerText = "";
    }
  } else {
    pre_result.innerText = preValue + " " + op;
    cur_result.innerText = "";
  }
}
function clickBtnEq() {
  eqClick = true;
  resultValue = tinhtoan(preValue, curValue, opSys);
  preValue = "";
  deleteAll();
  cur_result.innerText = resultValue;
  curValue = cur_result.innerText;
}
function tinhtoan(left, right, operate) {
  ret = "Nhập giá trị";
  if (left == "" || right == "") {
    getErr = true;
    ret = "Nhập giá trị!";
    return ret;
  }
  // console.log(left, right, operate);
  left = parseFloat(left);
  right = parseFloat(right);
  if (operate == "add") ret = left + right;
  else if (operate == "sub") ret = left - right;
  else if (operate == "mul") ret = left * right;
  else if (operate == "exp") ret = left ** right;
  else if (operate == "div") {
    if (right == 0) {
      getErr = true;
      ret = "Không thể chia cho không!";
    } else {
      ret = left / right;
    }
  } else {
    getErr = true;
    ret = "Chọn toán tử!";
  }
  return ret;
}
