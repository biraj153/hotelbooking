<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php require('include/links.php') ?>
  <title>Hotel Hill View - Rooms</title>
</head>

<body class="bg-light">

  <?php require('include/header.php') ?>

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Our Rooms</h2>
    <div class="h-line bg-dark"></div>
  </div>

  <div class="container">
    <div class="row">



      <div class="col-lg-12 col-md-12 px-4">
        <?php
        $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?", [1, 0], 'ii');


        while ($room_data = mysqli_fetch_assoc($room_res)) {

          //get features
          $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f 
          INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
          WHERE rfea.room_id = '$room_data[id] '");

          $features_data = "";
          while ($fea_row = mysqli_fetch_assoc($fea_q)) {
            $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>$fea_row[name]</span>";
          }
          //get facilities
          $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f 
          INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
          WHERE rfac.room_id = '$room_data[id] '");

          $facilities_data = "";
          while ($fac_row = mysqli_fetch_assoc($fac_q)) {
            $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>$fac_row[name]</span>";
          }

          //get thumbnail
          $room_thumb = "";
          $thumb_q = mysqli_query($con, "SELECT * FROM `room_images` 
          WHERE `room_id`='$room_data[id]' 
          AND `thumb` ='1'");
          if (mysqli_num_rows($thumb_q) > 0) {
            $thumb_res = mysqli_fetch_assoc($thumb_q);
            $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
          }

          $book_btn = "";
          if (!$setting_r['shutdown'] && isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $book_btn = "<button onclick='redirectToBooking($room_data[id])' class='btn btn-sm w-100 text-white custom-bg shadow-none mb-2'>Book Now</button>";
          }

          /// print room card
          echo <<<data
          <div class="card mb-4 border-0 shadow">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <img src="$room_thumb" class="img-fluid rounded">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
              <h5 class="mb-1">$room_data[name]</h5>
              <div class="features mb-3">
                <h6 class="mb-1">Features</h6>
                $features_data
              </div>
              <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                $facilities_data
              </div>
              <div class="guests">
                <h6 class="mb-1">Guests</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap">$room_data[adult] Adults</span>
                <span class="badge rounded-pill bg-light text-dark text-wrap">$room_data[children] Children</span>
              </div>
            </div>
            <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
              <h6 class="mb-4">रु. $room_data[price] Per Night</h6>
              $book_btn
              <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
            </div>
          </div>
          </div>
          data;
        }


        ?>
      </div>

    </div>
  </div>

  <?php require('include/footer.php') ?>

</body>

</html>