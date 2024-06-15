<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php require('include/links.php') ?>
  <title>Hotel Hill View - Home</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <style>
    .availabity-form {
      margin-top: -50px;
      z-index: 11;
      position: relative;
    }

    @media screen and (nax-width: 575px) {
      .availabity-form {
        margin-top: 25px;
        padding: 0 35px;
      }
    }
  </style>
</head>

<body class="bg-light">
  <?php require('include/header.php') ?>
  <!-- Carousel -->
  <div class="container-fluid px-lg-4 mt-4">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="./images/carousel/1.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="./images/carousel/2.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="./images/carousel/3.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="./images/carousel/4.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="./images/carousel/5.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="./images/carousel/6.png" class="w-100 d-block" />
        </div>
      </div>
    </div>
  </div>


  <!-- Room Cards -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
  <div class="container">
    <div class="row">
      <?php
      $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed` =? LIMIT 3", [1, 0], 'ii');


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

          $book_btn = "<button onclick='redirectToBooking($room_data[id])' class='btn btn-sm text-white custom-bg shadow-none'>Book Now</button>";
        }


        /// print room card
        echo <<<data
          <div class="col-lg-4 col-md-6 my-3">
          <div class="card border-0 shadow" style="max-width: 350px; margin:  auto;">
            <img src="$room_thumb" class="card-img-top">
            <div class="card-body">
              <h5>$room_data[name]</h5>
              <h6 class="mb-4">रु.$room_data[price] Per Night</h6>
              <div class="features mb-4">
                <h6 class="mb-1">Features</h6>
                $features_data
              </div>
              <div class="facilities mb-4">
                <h6 class="mb-1">Facilities</h6>
                $facilities_data
              </div>
              <div class="d-flex justify-content-evenly mb-2">
              $book_btn 
                <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
              </div>
            </div>
          </div>
          </div>
          data;
      }


      ?>

      <div class="col-lg-12 text-center mt-5">
        <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms</a>
      </div>
    </div>
  </div>

  <!-- Facilities -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
  <div class="container">
    <div class="row justify-content-evenly pc-lg-0 px-md-0 px-5">
      <?php
      $res = mysqli_query($con, "SELECT * FROM `facilities`  ORDER BY id DESC LIMIT 5");
      $path = FACILITIES_IMG_PATH;

      while ($row = mysqli_fetch_assoc($res)) {
        echo <<<data
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="$path$row[icon]" width="80px">
        <h5 class="mt-5">$row[name]</h5>
        </div>
        data;
      }
      ?>

      <div class="col-lg-12 text-center mt-5">
        <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities</a>
      </div>
    </div>
  </div>


  <!-- reach us -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>
  <div class="container ">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
        <iframe class="w-100 rounded" height="320" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7063.487745887487!2d85.34113119999999!3d27.725193299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19693c88645f%3A0xbf69e587bc07a866!2sDhumbarahi%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1714162236837!5m2!1sen!2snp" loading="lazy"></iframe>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="bg-white p-4 rounded mb-4">
          <h5>Call Us</h5>
          <a href="tel: +9779851000000" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +9779851000000
          </a>
          <br>
          <a href="tel: +9779851000000" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +9779851000000
          </a>
        </div>
        <div class="bg-white p-4 rounded mb-4">
          <h5>Follow Us</h5>
          <a href="#" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2 me-1"><i class="bi bi-twitter-x"></i>X</span>
          </a>
          <br>
          <a href="#" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2 me-1"><i class="bi bi-facebook"></i>Facebook</span>
          </a>
          <br>
          <a href="#" class="d-inline-block W">
            <span class="badge bg-light text-dark fs-6 p-2 me-1"><i class="bi bi-instagram"></i>Instagram</span>
          </a>

        </div>
      </div>
    </div>

  </div>

  <?php require('include/footer.php') ?>


  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
    });
    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1
        },
        640: {
          slidesPerView: 2
        },
        1024: {
          slidesPerView: 3
        },
      }
    });
  </script>
</body>

</html>,