<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>NGCorpers Forum</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?=AUTH?>assets/img/favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?=AUTH?>assets/css/vendor.min.css">

  <!-- CSS NGCorpers Template -->
  <link rel="stylesheet" href="<?=AUTH?>assets/css/nc.min.css">
  <link rel="stylesheet" href="<?=AUTH?>assets/css/custom.css">

</head>
<body>
  <!-- ========== HEADER ========== -->
  <header id="header" class="header header-bg-transparent header-abs-top">
    <div class="header-section">
      <div id="logoAndNav" class="container-fluid">
        <!-- Nav -->
        <nav class="navbar navbar-expand header-navbar">
          <!-- White Logo -->
          <a class="d-none d-lg-flex navbar-brand header-navbar-brand" href="./" aria-label="NGCorpers">
            <img src="<?=AUTH?>assets/img/logo-white.jpg" style="width: 3rem" alt="Logo">
          </a>
          <!-- End White Logo -->

          <!-- Default Logo -->
          <a class="d-flex d-lg-none navbar-brand header-navbar-brand header-navbar-brand-collapsed" href="./" aria-label="NGCorpers">
            <img src="<?=AUTH?>assets/img/logo.png" style="width: 3rem" alt="Logo">
          </a>
          <!-- End Default Logo -->

          <!-- Button -->
          <div class="ml-auto">
            <a class="btn btn-sm btn-link text-primary" href="./">
              <i class="fas fa-angle-left fa-sm mr-1"></i> Go to main
            </a>
          </div>
          <!-- End Button -->
        </nav>
        <!-- End Nav -->
      </div>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <div class="d-flex align-items-center vh-lg-100">

      <div class="col-lg-5 col-xl-4 d-none d-lg-flex align-items-center position-relative px-0" style="height:100%; background: #679436;">
        <div class="w-100 p-5" >
          <!-- SVG Quote -->
          <figure class="text-center mb-5 mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px"
               viewBox="0 0 8 8" style="enable-background:new 0 0 8 8;" xml:space="preserve">
              <path fill="#fff" d="M3,1.3C2,1.7,1.2,2.7,1.2,3.6c0,0.2,0,0.4,0.1,0.5c0.2-0.2,0.5-0.3,0.9-0.3c0.8,0,1.5,0.6,1.5,1.5c0,0.9-0.7,1.5-1.5,1.5
                C1.4,6.9,1,6.6,0.7,6.1C0.4,5.6,0.3,4.9,0.3,4.5c0-1.6,0.8-2.9,2.5-3.7L3,1.3z M7.1,1.3c-1,0.4-1.8,1.4-1.8,2.3
                c0,0.2,0,0.4,0.1,0.5c0.2-0.2,0.5-0.3,0.9-0.3c0.8,0,1.5,0.6,1.5,1.5c0,0.9-0.7,1.5-1.5,1.5c-0.7,0-1.1-0.3-1.4-0.8
                C4.4,5.6,4.4,4.9,4.4,4.5c0-1.6,0.8-2.9,2.5-3.7L7.1,1.3z"/>
            </svg>
          </figure>
          <!-- End SVG Quote -->

          <!-- Testimonials Carousel Main -->
          <div id="testimonialsNavMain" class="js-slick-carousel slick mb-4"
               data-hs-slick-carousel-options='{
                 "autoplay": true,
                 "autoplaySpeed": 5000,
                 "fade": true,
                 "infinite": true,
                 "asNavFor": "#testimonialsNavPagination"
               }'>
            <div class="js-slide">
              <!-- Testimonials -->
              <div class="w-md-80 w-lg-60 text-center mx-auto">
                <blockquote class="h3 text-white font-weight-normal mb-4">The community is really nice and offers quite a large set of options. Thank you!</blockquote>
                <span class="d-block text-white-70">Christina Kray, Google</span>
              </div>
              <!-- End Testimonials -->
            </div>

            <div class="js-slide">
              <!-- Testimonials -->
              <div class="w-md-80 w-lg-60 text-center mx-auto">
                <blockquote class="h3 text-white font-weight-normal mb-4">It's beautiful to be here and we expect more to be done quickly and seamlessly. Keep it up!</blockquote>
                <span class="d-block text-white-70">James Austin, Slack</span>
              </div>
              <!-- End Testimonials -->
            </div>

            <div class="js-slide">
              <!-- Testimonials -->
              <div class="w-md-80 w-lg-60 text-center mx-auto">
                <blockquote class="h3 text-white font-weight-normal mb-4">I love NGCorpers! I love the ease of use, I love the fact that I can share my business with freedom</blockquote>
                <span class="d-block text-white-70">Charlotte Moore, Amazon</span>
              </div>
              <!-- End Testimonials -->
            </div>
          </div>
          <!-- End Testimonials Carousel Main -->

          <!-- Testimonials Carousel Pagination -->
          <div id="testimonialsNavPagination" class="js-slick-carousel slick slick-transform-off slick-pagination-modern mx-auto"
               data-hs-slick-carousel-options='{
                 "infinite": true,
                 "slidesToShow": 3,
                 "centerMode": true,
                 "isThumbs": true,
                 "asNavFor": "#testimonialsNavMain"
               }'>
            <div class="js-slide">
              <div class="avatar avatar-circle mx-auto">
                <img class="avatar-img" src="<?=AUTH?>assets/img/100x100/img1.jpg" alt="Image Description">
              </div>
            </div>

            <div class="js-slide">
              <div class="avatar avatar-circle mx-auto">
                <img class="avatar-img" src="<?=AUTH?>assets/img/100x100/img3.jpg" alt="Image Description">
              </div>
            </div>

            <div class="js-slide">
              <div class="avatar avatar-circle mx-auto">
                <img class="avatar-img" src="<?=AUTH?>assets/img/100x100/img2.jpg" alt="Image Description">
              </div>
            </div>
          </div>
          <!-- End Testimonials Carousel Pagination -->

          <!-- Clients -->
          <div class="position-absolute right-0 bottom-0 left-0 text-center p-5">
            <span class="d-block text-white-70 mb-3">NGCorpers &copy; <script>document.write(new Date().getFullYear())</script></span>
            <div class="d-flex justify-content-center">
              <i class="max-w-10rem mx-auto fab fa-twitter text-white-70" alt="NGCorpers on twitter"></i>
              <i class="max-w-10rem mx-auto fab fa-facebook text-white-70" alt="NGCorpers on facebook"></i>
              <i class="max-w-10rem mx-auto fab fa-instagram text-white-70" alt="NGCorpers on instagram"></i>
            </div>
          </div>
          <!-- End Clients -->
        </div>
      </div>
      <div class="container">
