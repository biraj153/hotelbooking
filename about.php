<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php require('include/links.php') ?>
  <title>Hotel Hill View - About Us</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <style>
    .box {
      border-top-color: var(--primary) !important;
    }
  </style>
</head>

<body class="bg-light">

  <?php require('include/header.php') ?>

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">ABOUT US</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">Hotel Hill View: Where Comfort Meets Serenity in the Heart of Kathmandu</p>
  </div>

  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-5 mb-5 order-lg-1 order-md-1  order-2">
        <h3 class="mb-3 ">About</h3>
        <p style="text-align:justify;">Welcome to Hotel Hill View, where comfort, luxury, and exceptional service converge to create an unforgettable experience. Nestled in the heart of Kathmandu, our hotel is an oasis of tranquility amidst the bustling city life, offering a perfect retreat for both business and leisure travelers.
        </p>
        <p style="text-align:justify;">
          Our elegantly designed rooms cater to a variety of preferences and budgets, ensuring that every guest finds their ideal accommodation. The Standard Rooms provide essential amenities and a cozy ambiance, making them a perfect choice for those seeking comfort and value. For a touch of extra luxury, our Deluxe Rooms offer additional comforts, including air conditioning and in-room massage services, enhancing your stay with relaxation and convenience. For the ultimate in sophistication, our Executive Suites boast all the deluxe amenities plus complimentary high-speed WiFi, ensuring you stay connected while enjoying unparalleled luxury.
        </p>
        <p style="text-align:justify;">
          At Hotel Hill View, we pride ourselves on our exceptional service. Our dedicated staff is committed to meeting your every need, from the moment you arrive until your departure. Whether you require assistance with travel arrangements, dining recommendations, or simply wish to know more about the local attractions, we are here to help.
        </p>
        <p style="text-align:justify;">
          Our hotel features a range of facilities designed to enhance your stay. Enjoy a diverse selection of dining options at our on-site restaurants, unwind in our state-of-the-art fitness center, or take a refreshing dip in our sparkling swimming pool. Business travelers will appreciate our fully equipped conference rooms and business center, providing the perfect setting for meetings and events.
        </p>
        <p style="text-align:justify;">
          Discover the perfect blend of comfort, convenience, and luxury at Hotel Hill View. We look forward to welcoming you and ensuring your stay is nothing short of extraordinary.
        </p>
      </div>
      <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2  order-1">
        <img src="images/about/about.jpg" class="w-100">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/about/hotel.svg" width="70px">
          <h4 class="mt-3">100+ Rooms</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/about/customers.svg" width="70px">
          <h4 class="mt-3">200+ Customers</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/about/rating.svg" width="70px">
          <h4 class="mt-3">150+ Reviews</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/about/staff.svg" width="70px">
          <h4 class="mt-3">100+ Staffs</h4>
        </div>
      </div>
    </div>
  </div>

  <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

  <div class="container px-4">
    <div class="swiper managementSlider">
      <div class="swiper-wrapper mb-5">
        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="./images/about/ram.jpg" class="w-100">
          <h5 class="mt-2">Ram Kumar</h5>
        </div>
        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="./images/about/shyam.jpg" class="w-100">
          <h5 class="mt-2">Shyam Kumar</h5>
        </div>
        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="./images/about/hari.jpg" class="w-100">
          <h5 class="mt-2">Hari Bahadur</h5>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>


  <?php require('include/footer.php') ?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    var swiper = new Swiper(".managementSlider", {
      slidesPerView: 4,
      spaceBetween: 40,
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
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