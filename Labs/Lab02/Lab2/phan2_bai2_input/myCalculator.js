function tinhtoan(left, right, operate) {
  ret = "Nhập giá trị";
  if (left == "" || right == "") {
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
      ret = "Không thể chia cho không!";
    } else {
      ret = left / right;
    }
  } else {
    ret = "Chọn toán tử!";
  }
  return ret;
}

function printResult() {
  document.getElementById("result").innerHTML = "";
  var num1, num2, operate, result;
  num1 = document.getElementById("num1").value;
  num2 = document.getElementById("num2").value;
  op = document.getElementById("operater").value;
  result = tinhtoan(num1, num2, op);
  document.getElementById("result").innerHTML = result;
}
