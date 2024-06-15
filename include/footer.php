  <!-- footer -->
  <div class="container-fluid bg-white mt-5">
      <div class="row">
          <div class="col-lg-4 p-4">
              <h3 class="h-font fw-bold fs-3 mb-2">Hotel Hill View</h3>
              <p>Welcome to Hotel Hill View, where comfort, luxury, and exceptional service converge to create an unforgettable experience. Nestled in the heart of Kathmandu, our hotel is an oasis of tranquility amidst the bustling city life, offering a perfect retreat for both business and leisure travelers.</p>
          </div>
          <div class="col-lg-4 p-4">
              <h5 class="mb-3">Links</h5>
              <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
              <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
              <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
              <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a><br>
              <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a><br>
          </div>
          <div class="col-lg-4 p-4">
              <h5 class="mb-3">Follow Us</h5>
              <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">
                  <i class="bi bi-twitter-x"></i> X
              </a>
              <br>
              <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">
                  <i class="bi bi-facebook"></i> Facebook
              </a>
              <br>
              <a href="#" class="d-inline-block  text-dark text-decoration-none">
                  <i class="bi bi-instagram"></i> Instagram
              </a>

          </div>
      </div>
  </div>



  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
      function alert(type, msg) {
          let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
          let element = document.createElement('div');
          element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
          document.body.append(element);
          setTimeout(() => {
              remAlert(element);
          }, 2000);
      }

      function remAlert(element) {
          if (element) {
              element.remove();
          }
      }

      function setActive() {
          let navbar = document.getElementById('nav-bar');
          let a_tags = navbar.getElementsByTagName('a');

          for (i = 0; i < a_tags.length; i++) {

              let file = a_tags[i].href.split('/').pop();
              let file_name = file.split('.')[0];

              if (document.location.href.indexOf(file_name) >= 0) {
                  a_tags[i].classList.add('active');
              }

          }

      }

      let register_form = document.getElementById('register-form');
      register_form.addEventListener('submit', (e) => {
          e.preventDefault();

          let data = new FormData();

          data.append('name', register_form.elements['name'].value);
          data.append('email', register_form.elements['email'].value);
          data.append('phonenum', register_form.elements['phonenum'].value);
          data.append('dob', register_form.elements['dob'].value);
          data.append('address', register_form.elements['address'].value);
          data.append('pass', register_form.elements['pass'].value);
          data.append('cpass', register_form.elements['cpass'].value);
          data.append('register', '');

          var myModal = document.getElementById("registerModal");
          var modal = bootstrap.Modal.getInstance(myModal);
          modal.hide();

          let xhr = new XMLHttpRequest();
          xhr.open("POST", "ajax/login_register.php", true);

          xhr.onload = function() {
              if (this.responseText === 'pass_missmatch') {
                  alert('error', 'Passwords are not matching!');
              } else if (this.responseText === 'date_missmatch') {
                  alert('error', 'The entered date of birth is invalid!');
              } else if (this.responseText === 'already_registered') {
                  alert('error', 'The email or Phone is already registered!');
              } else if (this.responseText === '0') {
                  alert('error', 'Failed to register!');
              } else {
                  alert('success', 'Registration Success!');
                  register_form.reset();
              }
          };

          xhr.send(data);
      });

      let login_form = document.getElementById('login-form');
      login_form.addEventListener('submit', (e) => {
          e.preventDefault();

          let data = new FormData();

          data.append('email', login_form.elements['email'].value);
          data.append('pass', login_form.elements['pass'].value);
          data.append('login', '');

          var myModal = document.getElementById("loginModal");
          var modal = bootstrap.Modal.getInstance(myModal);
          modal.hide();

          let xhr = new XMLHttpRequest();
          xhr.open("POST", "ajax/login_register.php", true);

          xhr.onload = function() {
              if (this.responseText === 'inv_email') {
                  alert('error', 'Invalid Email');
                  window.location = window.location.pathname;
              } else if (this.responseText === 'inv_pass') {
                  alert('error', 'Enter Correct Password!');
              } else if (this.responseText === 'inactive') {
                  alert('error', 'Account Suspended!');
              } else {
                  window.location = window.location.pathname;
              }

          };

          xhr.send(data);
      });

      function redirectToBooking(room_id) {
          window.location.href = 'confirm_booking.php?id=' + room_id;
      }

      setActive();
  </script>