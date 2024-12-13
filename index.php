<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elsie Executive.</title>
  <link rel="apple-touch-icon" sizes="180x180" href="res/img/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="res/img/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="res/img/favicon_io/favicon-16x16.png">
  <link rel="manifest" href="res/img/favicon_io/site.webmanifest">


  <link rel="stylesheet" href="res/css/index.css">
  <!-- <link rel="stylesheet" href="res/css/loader.css"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- BOOTSTRAP ICONS CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

  <div class="loader">
    <div></div>
    <div></div>
  </div>
  <div class="blurred-content">

    <nav class="navbar">
      <div class="navbar-header">
        <button class="navbar-toggler" data-toggle="open-navbar1">
          <i class="bi bi-list" id="Nav-list"></i>
        </button>
        <a href="#home">
          <h2><span>Elsie</span>Executive</h2>
        </a>
      </div>

      <div class="navbar-menu" id="open-navbar1">
        <ul class="navbar-nav">
          <li class="active"><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#houses">Houses</a></li>
          <li><a href="#">Contact</a></li>
          <li class="navbar-dropdown">
            <a href="#" class="dropdown-toggler" data-dropdown="my-dropdown-id">
              Sign in as<i class="bi bi-chevron-down"></i>
            </a>

            <ul class="dropdown" id="my-dropdown-id">
              <li>
                <a href="log-in.php">Administrator </a>
              </li>
              <li class="separator"></li>
              <li>
                <a href="login.php">Tenant </a>
              </li>
              <li class="separator"></li>
              <li>
                <a href="login.php">Manager</a>
              </li>
            </ul>
          </li>
          <li><a href="Register.php">Register</a></li>
        </ul>
      </div>
    </nav>


    <section id="home" class="home-section">
      <div class="home-container">
        <div class="slider-container">
          <!-- Parking -->
          <div class="slide active" id="slide1">
            <div class="text-box">
              <h2>Our Parking Facility</h2>
              <p>At Elsie Executive Apartments, we offer residents the convenience of secure, well-maintained parking
                facilities designed for comfort and peace of mind. With ample parking spaces available, residents can
                easily access their vehicles any time of day, knowing that the area is monitored and safe. Whether you
                drive a car or own a motorcycle, our parking area is spacious and conveniently located just steps from
                your apartment. Experience hassle-free parking at Elsie Executive Apartments, where your vehicle is as
                well cared for as your home.</p>
              <a href="#" class="home-btn">Read More</a>
            </div>
            <img src="res/img/parking-2.png" alt="Parking Facility">
          </div>

          <!-- Kitchen -->
          <div class="slide" id="slide2">
            <div class="text-box">
              <h2>Open Kitchen Design</h2>
              <p>At Elsie Executive Apartments, the open kitchen experience blends modern design with functionality,
                creating the perfect space for culinary creativity. Enjoy a spacious, contemporary layout that
                seamlessly connects to the living area, allowing for a social and inviting atmosphere. Whether you're
                cooking a gourmet meal or preparing a quick snack, the sleek countertops, high-quality appliances, and
                abundant natural light make every moment in the kitchen enjoyable. The open design not only enhances
                your cooking experience but also allows you to stay connected with family and guests, making it the
                heart of your home.</p>
              <a href="#" class="home-btn">Read More</a>
            </div>
            <img src="res/img/Open-Kitchen.jpg" alt="Open-Kitchen" loading="lazy">
          </div>

          <!-- Space -->
          <div class="slide" id="slide3">
            <div class="text-box">
              <h2>Spacious Rooms</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit voluptatum harum fugiat. Vero et
                repudiandae eligendi modi ea aspernatur id ab dicta adipisci? Alias, ad? Aliquam, id! Ab, voluptatum
                ipsa?</p>
              <a href="#" class="home-btn">Read More</a>
            </div>
            <img src="res/img/Space.jpg" alt="Spacious Rooms" loading="lazy">
          </div>

          <!-- Navigation arrows -->
          <i class="bi bi-chevron-left" id="prevBtn"></i>
          <i class="bi bi-chevron-right" id="nextBtn"></i>

        </div>
      </div>
    </section>

    <section id="about" class="about-section">
      <div class="about-container">
        <h2>About Elsie Executive Apartments</h2>
        <div class="about-content">
          <div class="about-text">
            <p>
              Welcome to Elsie Executive Apartments, located in the heart of Kitengela. Our apartments are designed to
              provide a luxurious and comfortable living experience for both short and long-term stays. With modern
              amenities and stylish decor, we ensure that our guests feel right at home.
            </p>
            <p>
              At Elsie Executive Apartments, we pride ourselves on our exceptional service and attention to detail.
              Whether you are here for business or leisure, our dedicated staff is always available to assist you with
              your needs, ensuring a pleasant and memorable stay.
            </p>
            <p>
              Experience the perfect blend of comfort, convenience, and style at Elsie Executive Apartments. We look
              forward to welcoming you!
            </p>
          </div>
        </div>
      </div>

      <!-- Back to Top Button -->
      <i class="bi bi-chevron-up" id="btn-back-to-top"></i>

      <script>
        window.onscroll = function() {
          const backToTopButton = document.getElementById('btn-back-to-top');
          if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            backToTopButton.style.display = 'block';
          } else {
            backToTopButton.style.display = 'none';
          }
        };

        document.getElementById('btn-back-to-top').addEventListener('click', function(event) {
          event.preventDefault();
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        });
      </script>

    </section>

    <footer class="footer">
      <div class="waves">
        <div class="wave" id="wave1"></div>
        <div class="wave" id="wave2"></div>
        <div class="wave" id="wave3"></div>
        <div class="wave" id="wave4"></div>
      </div>

      <ul class="social-icon">
        <li class="social-icon__item"><a class="social-icon__link" href="https://www.instagram.com/_b0nni3._._/"
            target="_blank">
            <i class="bi bi-instagram"></i>
          </a>
        </li>

        <li class="social-icon__item"><a class="social-icon__link" href="#">
            <i class="bi bi-twitter-x"></i>
          </a>
        </li>

        <li class="social-icon__item"><a class="social-icon__link"
            href="" target="_blank">
            <i class="bi bi-linkedin"></i>
          </a>
        </li>

        <li class="social-icon__item"><a class="social-icon__link"
            href="" target="_blank">
            <i class="bi bi-dribbble"></i>
          </a>
        </li>

        <li class="social-icon__item"><a class="social-icon__link"
            href="" target="_blank">
            <i class="bi bi-github"></i>
          </a>
        </li>
      </ul>
      <ul class="menu">
        <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
        <li class="menu__item"><a class="menu__link" href="#about">About</a></li>
        <li class="menu__item"><a class="menu__link" href="#">Services</a></li>
        <li class="menu__item"><a class="menu__link" href="#">Blog</a></li>
        <li class="menu__item"><a class="menu__link" href="#">Contact</a></li>
      </ul>

      <p>
        <span><i class="bi bi-c-circle"></i> CopyRight, ElsieExecutive. All Rights Reserved
          <span id="currentYear"></span></span>
        <script>
          document.getElementById("currentYear").textContent = new Date().getFullYear();
        </script>
      </p>
    </footer>
  </div>

  <script src="res/js/index.js" defer></script>


</body>

</html>