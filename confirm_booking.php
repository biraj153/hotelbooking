<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php require('include/links.php') ?>
  <title>Hotel Hill View - Confirm Booking</title>
</head>

<body class="bg-light">

  <?php require('include/header.php') ?>
  <?php
  if (!isset($_GET['id']) || $setting_r['shutdown'] == true) {
    redirect('rooms.php');
  } else if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    redirect('rooms.php');
  }


  $data = filteration($_GET);

  $room_res = select("SELECT * FROM `rooms` WHERE `id`= ? AND `status`=? AND `removed`=?", [$data['id'], 1, 0], 'iii');

  if (mysqli_num_rows($room_res) == 0) {
    redirect('rooms.php');
  }

  $room_data = mysqli_fetch_assoc($room_res);

  $_SESSION['room'] = [
    "id" => $room_data['id'],
    "name" => $room_data['name'],
    "price" => $room_data['price'],
    "available" => false,
  ];
  $user_res = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1 ", [$_SESSION['uId']], "s");
  $user_data = mysqli_fetch_assoc($user_res);


  ?>


  <div class="container">
    <div class="row">

      <div class="col-12 my-5 mb-4 px-4">
        <h2 class="fw-bold">CONFIRM BOOKING</h2>
      </div>

      <div class="col-lg-12 col-md-12 mb-4 px-4">
        <?php
        $room_thumb = "";
        $thumb_q = mysqli_query($con, "SELECT * FROM `room_images` 
        WHERE `room_id`='$room_data[id]' 
        AND `thumb` ='1'");
        if (mysqli_num_rows($thumb_q) > 0) {
          $thumb_res = mysqli_fetch_assoc($thumb_q);
          $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
        }
        echo <<<data
        <div class = "card p-3 shadow-sm rounded">
        <img src="$room_thumb" class="img-fluid rounded">
        <h5>$room_data[name]</h5>
        <h6>रु. $room_data[price] Per Night</h6>
        </div>
        data;

        ?>

      </div>

      <div class="col-lg-12 col-md-12 px-4">
        <div class="card mb-4 border-0 rounded-3 shadow-sm">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <form id="confirm-booking-form">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="form-label">From</label>
                      <input type="date" name="book_from" class="form-control shadow-none" required />
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label">To</label>
                      <input type="date" name="book_to" class="form-control shadow-none" required />
                    </div>
                  </div>
                  <button type="submit" class="btn w-100 text-white custom-bg shadow-none ">Book</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>


  <?php require('include/footer.php') ?>
  <script>
    let confirm_booking_form = document.getElementById("confirm-booking-form");
    confirm_booking_form.addEventListener("submit", function(e) {
      e.preventDefault();
      book_room();
    });

    function book_room() {
      let data = new FormData();
      data.append("book_room", "");
      data.append("user", <?php echo $_SESSION['uId'] ?>);
      data.append("room_id", <?php echo $_SESSION['room']['id']; ?>);
      data.append("from", confirm_booking_form[0].value);
      data.append("to", confirm_booking_form[1].value);



      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/confirm_booking.php", true);

      xhr.onload = function() {

        if (this.responseText == 1) {
          alert("success", "Room Booked");
          add_room_form.reset();
          get_all_rooms();
        } else if (this.responseText == 'error') {
          alert("error", "Error Booking Room");
        } else if (this.responseText == 'date_missmatch') {
          alert("error", "Error: Booking Date is invalid.");

        } else {
          alert("error", this.responseText);
        }
      };

      xhr.send(data);
    }
  </script>
</body>

</html>