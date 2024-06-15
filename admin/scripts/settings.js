let general_data;

function get_general() {
  let shutdown_toggle = document.getElementById("shutdown-toggle");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/settings_crud.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    general_data = JSON.parse(this.responseText);
    if (general_data.shutdown == 0) {
      shutdown_toggle.checked = false;
      shutdown_toggle.value = 0;
    } else {
      shutdown_toggle.checked = true;
      shutdown_toggle.value = 1;
    }
  };

  xhr.send("get_general");
}

function upd_shutdown(val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/settings_crud.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if ((this.responseText == 1) & (general_data.shutdown == 0)) {
      alert("success", "Bookings are Shut Down!");
    } else {
      alert("success", "Bookings are Enabled!");
    }
    get_general();
  };

  xhr.send("upd_shutdown=" + val);
}

window.onload = function () {
  get_general();
};
