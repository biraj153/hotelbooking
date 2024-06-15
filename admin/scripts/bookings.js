function get_bookings() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/bookings.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("bookings-data").innerHTML = this.responseText;
  };

  xhr.send("get_bookings");
}

function rem_booking(val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/bookings.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    console.log(val);
    get_bookings();
  };

  xhr.send("rem_booking=" + val);
}

window.onload = function () {
  get_bookings();
};
