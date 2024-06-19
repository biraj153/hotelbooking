function get_users() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/users.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("users-data").innerHTML = this.responseText;
  };

  xhr.send("get_users");
}

function toggle_status(id, val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/users.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if (this.responseText == 1) {
      alert("success", "Status Toggled!");
      get_users();
    } else {
      alert("error", "Status Not Toggled!");
    }
  };

  xhr.send("toggle_status=" + id + "&value=" + val);
}

function remove_user(user_id) {
  if (confirm("Confirm to Delete User")) {
    let data = new FormData();
    data.append("user_id", user_id);
    data.append("remove_user", "");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);

    xhr.onload = function () {
      if (this.responseText == 1) {
        alert("success", "User Removed");
        get_users();
      } else {
        alert("error", "Failed to Remove User");
      }
    };

    xhr.send(data);
  }
}

window.onload = function () {
  get_users();
};