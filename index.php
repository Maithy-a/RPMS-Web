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
  <link rel="stylesheet" href="res/css/loader.css">

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
              Login <i class="bi bi-chevron-down"></i>
            </a>

            <ul class="dropdown" id="my-dropdown-id">
              <li>
                <a href="login.php">Tenant </a>
              </li>
              <li class="separator"></li>
              <li>
                <a href="login.php">Caretaker</a>
              </li>
              <li class="separator"></li>
              <li>
                <a href="log-in.php">Lardlord</a>
              </li>
              <li class="separator"></li>
            </ul>
          </li>
          <li><a href="Register.php">Register</a></li>
        </ul>
      </div>
    </nav>

    <section id="home" class="home-section">
      <div class="home-container">
        <div class="slider-container">
          <!-- Slide 1 -->
          <div class="slide active" id="slide1">
            <div class="image-container">
              <img src="res/img/house.jpg" alt="Our house designs">
            </div>
            <div class="text-box">
              <h2>Welcome to Elsie</h2>
              <p>Welcome to Elsie Executive Apartments, where comfort and style come together to create the perfect living experience! From the moment you step in, you’ll feel the spaciousness and thoughtful design that make this more than just a place to stay—it’s a place to call home. With abundant natural light streaming through large windows, sleek modern finishes, and a seamless blend of functionality and elegance, our apartments are designed to inspire and delight. Whether you’re relaxing after a long day or hosting friends for a cozy evening, Elsie Executive Apartments offer the ideal setting to live, unwind, and thrive. Come and experience the difference for yourself!</p>
              <a href="#" class="home-btn">Read More <i class="bi bi-box-arrow-in-up-right"></i></a>
            </div>
          </div>
          <div class="slide " id="slide2">
            <div class="image-container">
              <img src="res/img/Space.jpg" alt="Spacious Rooms">
            </div>
            <div class="text-box">
              <h2>Spacious Rooms</h2>
              <p>Discover the ultimate in comfort and style with our spacious rooms at Elsie Executive Apartments! I
                love how every room is designed with plenty of space to breathe, relax, and truly make it my own. The
                large windows flood the space with natural light, creating a bright and airy vibe that feels so
                inviting. With sleek finishes, modern touches, and layouts that perfectly blend style and functionality,
                these rooms are everything I need for relaxing evenings or hosting friends. Come see for yourself why
                Elsie Executive Apartments isn’t just a place to live—it’s a place to thrive!</p>
              <a href="#" class="home-btn">Read More <i class="bi bi-box-arrow-in-up-right"></i></a>
            </div>
          </div>
          <div class="slide " id="slide3">
            <div class="image-container">
              <img src="res/img/parking-2.png" alt="Parking">
            </div>
            <div class="text-box">
              <h2>Ample parking</h2>
              <p>Say goodbye to parking headaches at Elsie Executive Apartments! Here, convenience meets peace of mind
                with our secure, spacious, and well-maintained parking facilities. Whether you drive a car or a
                motorcycle, there’s always room for your ride—just steps from your front door. With 24/7 safety
                monitoring, you can relax knowing your vehicle is in good hands. At Elsie Executive Apartments, parking
                isn’t just practical—it’s effortless. Because here, we don’t just take care of your home; we take care
                of everything that matters to you. Drive in, park easy, and live stress-free!</p>
              <a href="#" class="home-btn">Read More <i class="bi bi-box-arrow-in-up-right"></i></a>
            </div>
          </div>
          <!-- Additional slides... -->
        </div>
        <!-- Navigation arrows -->
        <i class="bi bi-chevron-left" id="prevBtn"></i>
        <i class="bi bi-chevron-right" id="nextBtn"></i>
      </div>
    </section>

    <section id="about" class="about-section">
      <div class="about-container">
        <h2>About Elsie Executive Apartments</h2>
        <div class="about-content">
          <div class="about-text">
            <p>
              Welcome to Elsie Executive Apartments, located in the heart of Kitengela. Our apartments are
              designed to
              provide a luxurious and comfortable living experience for both short and long-term stays. With
              modern
              amenities and stylish decor, we ensure that our guests feel right at home.

              At Elsie Executive Apartments, we pride ourselves on our exceptional service and attention to
              detail.
              Whether you are here for business or leisure, our dedicated staff is always available to assist
              you with
              your needs, ensuring a pleasant and memorable stay.

              Experience the perfect blend of comfort, convenience, and style at Elsie Executive Apartments. We
              look
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

    <section>
      <footer class="footer">
        <div class="footer-container">
          <!-- Company Column -->
          <div class="footer-column">
            <h2>Company</h2>
            <ul>
              <li><a href="#about">About Us</a></li>
              <li><a href="#">Career Opportunities</a></li>
              <li><a href="#Contact">Contact Us</a></li>
              <li><a href="#">Testimonials</a></li>
              <li><a href="#">Our Partners</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>

          <!-- Products Column -->
          <div class="footer-column">
            <h2>Products</h2>
            <ul>
              <li><a href="#">Elite Trainers</a></li>
              <li><a href="#">Boxing Events</a></li>
              <li><a href="#">Training Facilities</a></li>
              <li><a href="#">Training Packages</a></li>
              <li><a href="#">Pro Boxing Equipment</a></li>
              <li><a href="#">Performance Supplements</a></li>
            </ul>
          </div>

          <!-- Resources Column -->
          <div class="footer-column">
            <h2>Resources</h2>
            <ul>
              <li><a href="#">Training Guides</a></li>
              <li><a href="#">Nutrition Plans</a></li>
              <li><a href="#">Recovery Techniques</a></li>
              <li><a href="#">Injury Prevention</a></li>
              <li><a href="#">Boxing Technique Videos</a></li>
              <li><a href="#">Workout Tracking</a></li>
            </ul>
          </div>

          <!-- Social Column -->
          <div class="footer-column">
            <h2>Social</h2>
            <ul>
              <li><a href="" class="flex"><i class="bi bi-github"></i> Github</a></li>
              <li><a href="https://linkedin.com/in/maithya" class="flex"><i class="bi bi-linkedin"></i> Linkedin</a></li>
              <li><a href="https://x.com/Maithy_a" class="flex"><i class="bi bi-twitter-x"></i> Twitter</a></li>
              <li><a href="https://instagram.com/_b0nni3._._" class="flex"><i class="bi bi-instagram"></i> Instagram</a></li>
            </ul>
          </div>

          <!-- Newsletter Column -->
          <div class="footer-column">
            <h2>Newsletter</h2>
            <ul>
              <p>Subscribe to our newsletter for a weekly dose of news, updates, helpful tips, and exclusive offers.</p>
              <li>
                <form action="#">
                  <input type="text" placeholder="Your email" required>
                  <button type="submit">SUBSCRIBE</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </footer>

      <!-- Footer Bottom -->
      <div class="bottom">
        <i class="bi bi-c-circle"> Copyright</i>
        <span><span id="currentYear"></span></span>
        <script>
          document.getElementById("currentYear").textContent = new Date().getFullYear();
        </script> Elsie Executive Apartments
      </div>

    </section>

    <script src="res/js/index.js" defer></script>
    <script>
      window.addEventListener('load', function() {
        setTimeout(function() {
          document.querySelector('.loader').style.display = 'none';
          document.querySelector('.blurred-content').style.filter = 'none';
        }, 2000);
      });
    </script>
</body>

</html>