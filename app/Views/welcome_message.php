<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Custom JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Booking</title>
    <style>
        body {
            background-color: #faf7f0;
            padding-top: 50px;
            overflow-x: hidden;
        }

        /* Upper Header Styling */
        .upper-header {
            background-color: #800000;
            color: #f8f9fa;
            padding: 5px 0;
            position: fixed;
            top: 0;
            width: 100%;
            height: 60px;
            z-index: 1030;
            /* Above the main navbar */
            transition: background-color 0.3s ease;
        }

        .upper-header .navbar-text {
            color: #f8f9fa;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .upper-header .nav-link {
            color: #f8f9fa;
            transition: color 0.3s ease;
        }

        .upper-header .nav-link:hover {
            color: #FFA500;
            /* Same hover color as main navbar */
            text-decoration: none;
        }

        /* Main Navbar Styling */
        .main-navbar {
            background-color: #800000;
            color: #FFD700;
            padding: 10px 0;
            position: fixed;
            top: 55px;
            /* Height of the upper header */
            width: 100%;
            z-index: 1020;
            transition: opacity 0.3s ease;
        }

        .main-navbar .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: white;
            transition: color 0.3s ease;
        }

        .main-navbar .navbar-brand:hover {
            color: #FFA500;
            text-decoration: none;
        }

        .main-navbar .nav-link {
            color: #ffffff;
            font-weight: 500;
            margin-right: 15px;
            /* Added gap between nav links */
            transition: color 0.3s ease;
        }

        .main-navbar .nav-link:hover {
            color: #FFA500;
            text-decoration: none;
        }

        /* Book Now Button Styling */
        .book-btn {
            transition: border-color 0.3s ease;
            /* Smooth transition */
            background: url(klematis.jpg) repeat;
            border: 2px solid white;
            width: 150px;
            color: #f0f4f8;
            font-weight: bold;
        }

        .book-btn:hover {
            border-color: white;
            /* Blue border on hover */
            background-color: #FFA500;
        }

        /* Carousel Styling (If any) */
        .carousel-item img {
            object-fit: cover;
            margin-top: 0%;
        }

        .carousel-item h5 {
            font-weight: bolder;
            font-size: 32px;
            color: white;
        }

        .carousel-item p {
            font-weight: bolder;
            font-size: 18px;
            color: white;
        }

        /* Dropdown Menu Styling */
        .dropdown-menu {
            background-color: #800000;
            border: none;
        }

        .dropdown-item {
            color: #ffffff;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: transparent;
            color: #FFA500;
            border: none;
        }

        .main-navbar .nav-link.dropdown-toggle:hover,
        .main-navbar .nav-link.dropdown-toggle:focus {
            border: none;
            /* Removes any border */
            outline: none;
            /* Removes the outline */
            box-shadow: none;
            /* Removes any box-shadow */
        }

        /* Adjustments for Responsive Upper Header */
        @media (max-width: 768px) {
            .upper-header .navbar-text {
                font-size: 12px;
            }

            .nav-item.dropdown:hover .dropdown-menu {
                display: block;
                margin-top: 0;
                /* Adjusts the dropdown position */
            }

            .nav-item.dropdown .dropdown-toggle::after {
                transform: rotate(-180deg);
            }

            .upper-header .ms-auto {
                flex-direction: column;
                align-items: flex-start;
            }

            .upper-header i {
                font-size: 9px;
            }

            .main-navbar {
                top: 55px;
                /* Adjust if upper header height changes on small screens */
            }

            .main-navbar .nav-link {
                margin-right: 0;
                /* Remove right margin on small screens */
                margin-bottom: 10px;
                /* Add bottom margin for spacing */
            }

            .navbar-nav {
                gap: 10px;
                /* Add gap between nav items in collapsed menu */
            }
        }

        .carousel-item img {
            height: 750px;
            /* Adjust height as needed */
            object-fit: cover;
            /* Ensures images cover the area without distortion */
        }

        .hero {
            background-image: url('hero-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .hero h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #040720;
        }

        .hero p {
            font-size: 24px;
            margin-bottom: 30px;
            color: #040720;
        }

        .btn-primary {
            background-color: #040720;
            border-color: #007bff;
            color: #f8f9fa;
        }

        .btn-primary:hover {
            background-color: #800000;
            color: #FFA500;
            text-decoration: wavy;
            text-decoration: underline;
        }

        .features {
            padding: 50px 0;
        }

        .feature-item {
            text-align: center;
            margin-bottom: 30px;
            color: #040720;
        }

        .feature-item i {
            font-size: 48px;
            color: #007bff;
            margin-bottom: 20px;
        }

        .feature-item h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .footer {
            background-color: #800000;
            color: white;
            padding: 20px 0;
        }

        .footer-link {
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .columns {
            gap: 1rem;
        }

        .columns h5 {
            margin-left: -5rem;
            text-decoration: underline;
        }

        .footer-link:hover {
            color: #ffd700;
            transition: color 0.3s ease;
        }

        .footer-link i {
            margin-right: 8px;
            color: #ffd700;
            transition: transform 0.3s;
        }

        .footer-link:hover i {
            transform: rotate(10deg);
        }

        .footer ul {
            padding-left: 0;
            list-style-type: none;
            gap: 10px;
        }

        .btn-primary {
            background-color: #040720;
            color: white;
        }

        .carousel-item img {
            height: 750px;
            /* Adjust height as needed */
            object-fit: cover;
            /* Ensures images cover the area without distortion */
        }

        /* About Section */
        .about-section {
            background-color: #f5eceb;
        }

        .about-section h2 {
            font-size: 36px;
            font-weight: bold;
            color: #040720;
        }

        /* Wave Background */
        .about-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 200%;
            /* Extend width for smooth animation */
            height: 150px;
            /* Adjust height as needed */
            background: url("/src/wave.png") repeat-x;
            animation: waveAnimation 10s linear infinite;
            z-index: -1;
        }

        .about-section h3 {
            font-size: 28px;
            font-weight: bold;
            margin-top: 20px;
            color: #982B1C;
        }

        .about-section p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        .about-section .img-wrapper {
            overflow: hidden;
            border-radius: 8px;
        }

        .about-section .img-wrapper img {
            transition: transform 0.3s ease;
        }

        .about-section .img-wrapper:hover img {
            transform: scale(1.1);
        }

        /* accommodation Section */
        .accommodation-section {
            background-color: #faf7f0;
            /* Light background for contrast */
            margin-top: -4.5%;
        }

        .example_d {
            color: black;
            text-transform: uppercase;
            background: #ffffff;
            height: 45px;
            border: 2px solid #20bf6b;
            border-radius: 6px;
            display: inline-block;
            transition: all 0.3s ease 0s;
            font-weight: bolder;
        }

        .example_d:hover {
            color: white;
            background-color: #20bf6b;
            font-weight: bolder;
            transition: all 0.3s ease 0s;
        }

        /* Facilities Section */
        .facilities-section {
            background-color: #f7f2e6;
            padding: 50px 0;
        }

        .facilities-section h2 {
            font-size: 36px;
            font-weight: bold;
            color: #040720;
            margin-bottom: 30px;
        }

        .facility-item {
            margin-bottom: 30px;
        }

        .facility-item .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            /* Ensures all cards are the same height */
        }

        .facility-item .card-body {
            padding: 20px;
            /* Adjust padding as needed */
        }

        .facility-item .card:hover {
            transform: translateY(-5px);
            box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
        }

        .facility-item .icon-hover {
            transition: transform 0.3s ease;
        }

        .facility-item .card:hover .icon-hover {
            transform: scale(1.2);
        }

        .facility-item h4 {
            font-size: 20px;
            color: #040720;
            margin-top: 10px;
            font-weight: bold;
        }

        .facility-item p {
            font-size: 16px;
            color: #333;
        }

        .facility-item .card-body i {
            color: #FFA500;
            /* Smooth yellow color */
            transition: color 1s ease;
        }

        .facility-item .card:hover .card-body i {
            color: #982b1c;
            /* Change color on hover */
        }

        .btn1 {
            transition: border-color 0.3s ease;
            /* Smooth transition */
            background: #800000;
            border: 2px solid white;
            width: 150px;
            color: #f0f4f8;
            font-weight: bold;
        }

        .btn1:hover {
            border-color: white;
            /* Blue border on hover */
            color: #040720;
        }

        .btn-exp {
            transition: border-color 0.3s ease;
            /* Smooth transition */
            background: #800000;
            border: 2px solid white;
            width: 150px;
            color: #f0f4f8;
            font-weight: bold;
        }

        .btn-exp:hover {
            border-color: #800000;
            /* Blue border on hover */
        }

        .explormore {
            margin-left: 45%;
            margin-bottom: 2rem;
        }


        .slider {
            position: relative;
            /* max-width: 1150px; */
            max-height: 600px;
            margin: auto;
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slides img {
            width: 100%;
            /* max-width: 1150px; */
            max-height: 600px;
            display: block;
        }

        button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            cursor: pointer;
            font-size: 24px;
            padding: 10px;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .thumbnail-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .thumbnails {
            display: flex;
            overflow: hidden;
        }

        .thumbnails img {
            width: 100px;
            /* Set thumbnail width */
            margin: 0 5px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .thumbnails img:hover {
            transform: scale(1.1);
            /* Enlarge thumbnail on hover */
        }

        button#prevThumbnails,
        button#nextThumbnails {
            margin: 0 10px;
        }

        .custom-carousel-caption {
            position: absolute;
            bottom: 10px;
            /* Adjust as needed */
            left: 10px;
            /* Adjust as needed */
            color: #fff;
            text-align: left;
        }

        .custom-carousel-caption h5 {
            font-size: 24px;
            font-weight: bold;
        }

        .custom-btn {
            padding: 10px 20px;
            border-color: white;
            /* Button color */
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            text-decoration: none;
            border-radius: 6px;
        }

        .custom-btn:hover {
            border-color: white;
            background-color: #800000;

        }
    </style>
</head>

<body>
    <!-- Upper Header -->
    <nav class="navbar upper-header">
        <div class="container">
            <div class="d-flex w-100 justify-content-end">
                <!-- Location Info -->
                <span class="navbar-text me-3 d-flex align-items-center">
                    <i class="fas fa-map-marker-alt me-1"></i> Addis Ababa, Ethiopia
                </span>
                <!-- Email Info -->
                <span class="navbar-text me-3 d-flex align-items-center">
                    <i class="fas fa-envelope me-1"></i>
                    <a href="mailto:info@ayahotel.com" class="nav-link p-0">info@ayahotel.com</a>
                </span>
                <!-- Profile and Logout for Logged-in Users -->
                <?php if (session()->get('logged_in')): ?>
                    <?php if (session()->get('Role') === 'Customers'): ?>
                        <!-- Profile link for Customers -->
                        <span class="navbar-text d-flex align-items-center">
                            <i class="fas fa-user-alt me-1"></i>
                            <a href="<?= site_url('/dashboard'); ?>" class="nav-link p-0 me-2">Profile</a>
                            <a href="<?= site_url('auth/logout'); ?>" class="nav-link p-0">Logout</a>
                        </span>
                    <?php else: ?>
                        <!-- Sign Up | Login for Admins and Staff -->
                        <span class="navbar-text d-flex align-items-center">
                            <i class="fas fa-user-alt me-1"></i>
                            <a href="<?= site_url('auth/register'); ?>" class="nav-link p-0">Sign Up</a>
                            <a href="<?= site_url('auth/login'); ?>" class="nav-link p-0">Login</a>
                        </span>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- Login | SignUp for Guests -->
                    <span class="navbar-text d-flex align-items-center">
                        <i class="fas fa-user-alt me-1"></i>
                        <a href="<?= site_url('auth/'); ?>" class="nav-link p-0">Login | SignUp</a>
                    </span>
                <?php endif; ?>

            </div>
        </div>
    </nav>
    <!-- Main Navbar -->
    <nav class="navbar main-navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbarNav"
                aria-controls="mainNavbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/">HOTEL</a>
            <div class="collapse navbar-collapse" id="mainNavbarNav">
                <ul class="navbar-nav mx-auto gap-4">
                    <li class="nav-item">
                        <a class="nav-link" href="/">HOME</a>
                    </li>
                    <!-- Accommodation with Dropdown -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('/accommodations') ?>" id="accommodationDropdown">
                            ACCOMMODATION
                        </a>
                    </li>
                    <!-- Services with Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            SERVICES
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="Service/restourant">Restaurant and Bar</a></li>
                            <hr style="color: #f0f4f8; margin-top:2px; margin-bottom: 0px">
                            <li><a class="dropdown-item" href="Service/event">Events</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gallary">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">CONTACT</a>
                    </li>
                </ul>
            </div>
            <!-- Book Now Button -->
            <div class="d-flex justify-content-center">
                <a href="<?= site_url('/accommodations') ?>" class="btn btn-warning book-btn">BOOK NOW</a>
                <!-- Updated link -->
            </div>
        </div>
    </nav>
    <script>
        // Dropdown on Hover for Desktop
        const dropdownElements = document.querySelectorAll('.nav-item.dropdown');
        dropdownElements.forEach(function (dropdown) {
            // Check if the device is desktop
            if (window.innerWidth > 768) {
                // Initialize Bootstrap dropdown
                const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
                const bsDropdown = new bootstrap.Dropdown(dropdownToggle);
                // Show dropdown on mouseenter
                dropdown.addEventListener('mouseenter', function () {
                    bsDropdown.show();
                });
                // Hide dropdown on mouseleave
                dropdown.addEventListener('mouseleave', function () {
                    bsDropdown.hide();
                });
            }
        });
        // Optional: Update dropdown behavior on window resize
        window.addEventListener('resize', function () {
            dropdownElements.forEach(function (dropdown) {
                const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
                const bsDropdown = bootstrap.Dropdown.getInstance(dropdownToggle);
                if (window.innerWidth > 768) {
                    if (!bsDropdown) {
                        // Initialize if not already
                        new bootstrap.Dropdown(dropdownToggle);
                    }
                    // Show dropdown on mouseenter
                    dropdown.addEventListener('mouseenter', function () {
                        bsDropdown.show();
                    });
                    // Hide dropdown on mouseleave
                    dropdown.addEventListener('mouseleave', function () {
                        bsDropdown.hide();
                    });
                } else {
                    if (bsDropdown) {
                        bsDropdown.dispose();
                    }
                }
            });
        });
        AOS.init();
        // Handle Scroll Opacity for Main Navbar
        const mainNavbar = document.querySelector('.main-navbar');
        window.addEventListener('scroll', () => {
            let scrollPosition = window.scrollY;
            if (scrollPosition > 100) {
                mainNavbar.style.opacity = '0.8';
            } else {
                mainNavbar.style.opacity = '1';
            }
        });
    </script>

    <!-- Hero Section with Carousel -->
    <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/src/photo.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome to Our International Hotel</h5>
                    <p>Your First Choice</p>
                    <a href="#about" class="btn btn1">Get Started</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/src/image14.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Luxury Accommodation</h5>
                    <p>Experience comfort and elegance.</p>
                    <a href="#accommodation" class="btn btn1">Explore More</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/src/image11.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Exceptional Services</h5>
                    <p>We cater to all your needs.</p>
                    <a href="#facilities" class="btn btn1">Our Services</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <script>
        AOS.init();
    </script>

    <!-- About Section -->
    <section id="about" class="about-section py-5">
        <div class="container">
            <!-- Centered About Us heading and line image -->
            <div class="text-center mb-4" data-aos="fade-up">
                <h2 style="margin-top: -2%;">About Us</h2>
                <img src="/src/brlinee.png" alt="" style="width: 11rem; margin-top: -1.5rem;">
            </div>

            <div class="row align-items-center" style="margin-top: -4%;">
                <div class="col-md-6">
                    <div class="img-wrapper" data-aos="zoom-in">
                        <img src="/src/image10.jpg" class="img-fluid rounded">
                    </div>
                </div>

                <!-- WHO WE ARE heading and paragraphs -->
                <div class="col-md-6">
                    <h3 class="text-center animate__animated animate__fadeInUp" data-aos="fade-up">WHO WE ARE</h3>
                    <p class="animate__animated animate__fadeInUp" data-aos="fade-up">
                        Nestled in the heart of Addis Ababa, our International Hotel offers a unique blend of luxury,
                        comfort, and hospitality. Our hotel is designed to provide an exceptional experience for both
                        business and leisure travelers. With elegantly furnished rooms, state-of-the-art facilities, and
                        a dedicated staff, we ensure that your stay with us is memorable and enjoyable.
                    </p>
                    <p class="animate__animated animate__fadeInUp" data-aos="fade-up">
                        At this International Hotel, we believe in creating a home away from home. Our commitment to
                        excellence is reflected in every aspect of our service. Whether you are here for a conference, a
                        romantic getaway, or a family vacation, we cater to every need. Enjoy our exquisite dining
                        options, unwind at our spa, or take a dip in our luxurious pool while soaking in the stunning
                        views of the city.
                    </p>
                    <p class="animate__animated animate__fadeInUp" data-aos="fade-up">
                        Join us at this International Hotel, where we prioritize your comfort and satisfaction.
                        Experience the warmth of Ethiopian hospitality and make unforgettable memories with us.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Accommodation Section -->
    <section id="accommodation" class="accommodation-section">
        <div class="container">
            <?php
            // Check if viewing all accommodations
            $isAllAccommodations = isset($isAll) && $isAll; // Assuming you pass a variable $isAll from the controller
            // Set title based on whether it's all accommodations or a specific type
            $sectionTitle = $isAllAccommodations ? "ROOMS" : esc($accommodations[0]['room_type']);
            ?>
            <h2 class="room-title text-center mb-5" style="margin-top: 6rem;"><?= $sectionTitle ?></h2>
            <img src="/src/brlinee.png" alt="" style="width: 11rem; margin-left: 42%; margin-top:-6rem;">
            <div class="row" style="margin-top: -1rem;">
                <?php
                $counter = 0; // Initialize a counter variable
                foreach ($accommodations as $accommodation):
                    ?>
                    <div class="col-12 mb-4" data-aos="fade-right">
                        <div
                            class="card h-150 shadow-sm border-0 <?= ($counter % 2 == 0) ? 'flex-row' : 'flex-row-reverse' ?> d-flex">
                            <!-- Image Section -->
                            <div class="col-md-6 p-0 position-relative" data-aos="zoom-in-right">
                                <?php
                                $images = json_decode($accommodation['image'], true); // Decode JSON to array
                                if (!empty($images)):
                                    ?>
                                    <!-- Bootstrap Carousel for multiple images -->
                                    <div id="carousel<?= $accommodation['id'] ?>" class="carousel slide h-100"
                                        data-bs-ride="carousel">
                                        <div class="carousel-inner h-100">
                                            <?php foreach ($images as $index => $imagePath): ?>
                                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?> h-100">
                                                    <img src="<?= esc($imagePath); ?>" class="img-fluid h-100" alt="Image"
                                                        style="object-fit: cover; width: 100%; height: 100%;">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <!-- Left and Right Controls positioned on both sides of the carousel -->
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carousel<?= $accommodation['id'] ?>" data-bs-slide="prev"
                                            style="left: -2rem; margin-top: 18rem;">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carousel<?= $accommodation['id'] ?>" data-bs-slide="next"
                                            style="right: -2rem; margin-top: 18rem;">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                <?php else: ?>
                                    <p>No images available.</p>
                                <?php endif; ?>
                                <div class="badge bg-primary position-absolute top-0 start-0 m-2">
                                    ETB<?= esc($accommodation['price']) ?>/night</div>
                            </div>
                            <!-- Content Section -->
                            <div class="col-md-6 d-flex flex-column p-4" data-aos="zoom-in-left">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <h5 class="card-title text-center text-uppercase fw-bold">
                                        <?= esc($accommodation['title']) ?></h5>
                                    <img src="/src/brlinee.png" alt=""
                                        style="width: 8rem; margin-left:38%; margin-top: -2%;">
                                    <p class="card-text text-muted">
                                        <?= htmlspecialchars_decode($accommodation['content']) ?></p>
                                    <div class="d-flex" style="gap: 5rem;">
                                        <ul class="list-unstyled">
                                            <li class="mb-3"><i
                                                    class="bi bi-check-circle-fill text-danger me-2"></i><strong>Room
                                                    Type:</strong> <?= esc($accommodation['room_type']) ?>
                                            </li>
                                            <li class="mb-3"><i
                                                    class="bi bi-check-circle-fill text-danger me-2"></i><strong>Bed
                                                    Type:</strong> <?= esc($accommodation['bed_type']) ?></li>
                                            <li class="mb-3"><i
                                                    class="bi bi-check-circle-fill text-danger me-2"></i><strong>Lounge
                                                    Area:</strong>
                                                <?= esc($accommodation['has_lounge_area']) ? 'Yes' : 'No' ?></li>
                                            <li class=""><i class="bi bi-check-circle-fill text-danger me-2"></i><strong>Has
                                                    Jacuzzi:</strong> <?= esc($accommodation['jacuzzi']) ? 'Yes' : 'No' ?>
                                            </li>
                                            <!-- <li class="mb-3"><i
                                                    class="bi bi-check-circle-fill text-danger me-2"></i><strong>Floor
                                                    Number:</strong> <?= esc($accommodation['floor_number']) ?></li>
                                            <li class="mb-3"><i
                                                    class="bi bi-check-circle-fill text-danger me-2"></i><strong>Available
                                                    Room:</strong>
                                                <?= esc($accommodation['room_quantity'] - $accommodation['reserved_rooms']) ?>
                                            </li>
                                            <li><i class="bi bi-check-circle-fill text-danger me-2"></i><strong>Room
                                                    View:</strong> <?= esc($accommodation['room_view']) ?>
                                                </li> -->
                                        </ul>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check-circle-fill text-danger me-2"></i><strong>Has
                                                    Balcony:</strong> <?= esc($accommodation['balcony']) ? 'Yes' : 'No' ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li><i
                                                class="bi bi-check-circle-fill text-danger me-2"></i><strong>Amenities:</strong>
                                            <?= esc($accommodation['amenities']) ?></li>
                                    </ul>
                                    <!-- Updated Book Now button with link to booking form -->
                                    <a href="<?= site_url('bookings/form/' . $accommodation['id']); ?>"
                                        class="example_d btn mt-auto">
                                        <i class="bi bi-calendar-check me-2"></i>Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $counter++; // Increment the counter
                endforeach;
                ?>
            </div>
        </div>
        <div class="explormore">
            <a href="/accommodations" class="btn btn-exp">Explore More</a>
        </div>
    </section>
    <div class="slider">
        <div class="slides">
            <div class="custom-carousel-item">
                <div class="custom-carousel-caption">
                    <h5>Restaurants and Bar</h5>
                    <!-- <p>Your First Choice</p> -->
                    <a href="Service/restourant" class="btn custom-btn">Get Started</a>
                </div>
            </div>
            <img src="/src/image16.jpg" alt="Image 2">
            <img src="/src/image17.jpg" alt="Image 3">
            <img src="/src/image18.jpg" alt="Image 4">
            <img src="/src/image19.jpg" alt="Image 5">
            <img src="/src/image20.jpg" alt="Image 6">
            <img src="/src/image21.jpg" alt="Image 7">
            <img src="/src/image22.jpg" alt="Image 8">
        </div>
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>
    <div class="thumbnail-container">
        <div class="thumbnails" id="thumbnails">
            <img src="/src/image21.jpg" alt="Image 1" onclick="selectSlide(0)">
            <img src="/src/image16.jpg" alt="Image 2" onclick="selectSlide(1)">
            <img src="/src/image17.jpg" alt="Image 3" onclick="selectSlide(2)">
            <img src="/src/image18.jpg" alt="Image 4" onclick="selectSlide(3)">
            <img src="/src/image19.jpg" alt="Image 5" onclick="selectSlide(4)">
            <img src="/src/image20.jpg" alt="Image 6" onclick="selectSlide(5)">
            <img src="/src/image22.jpg" alt="Image 7" onclick="selectSlide(5)">
        </div>
        <button id="prevThumbnails" onclick="changeThumbnailSet(-1)">&#10094;</button>
        <button id="nextThumbnails" onclick="changeThumbnailSet(1)">&#10095;</button>
    </div>
    <script>
        let currentSlide = 0;
        let currentThumbnailSet = 0;
        const thumbnailsPerSet = 6; // Number of thumbnails to show at once
        const allThumbnails = document.querySelectorAll('.thumbnails img');
        const totalThumbnailSets = Math.ceil(allThumbnails.length / thumbnailsPerSet);
        // Initialize the slider
        function showSlides() {
            const slides = document.querySelectorAll('.slides img');
            if (currentSlide >= slides.length) {
                currentSlide = 0;
            }
            if (currentSlide < 0) {
                currentSlide = slides.length - 1;
            }
            slides.forEach((slide, index) => {
                slide.style.display = index === currentSlide ? 'block' : 'none';
            });
        }

        function changeSlide(n) {
            currentSlide += n;
            showSlides();
        }
        // Function to select a specific slide based on thumbnail click
        function selectSlide(index) {
            currentSlide = index;
            showSlides();
        }
        // Function to navigate through thumbnail sets
        function changeThumbnailSet(n) {
            currentThumbnailSet += n;
            // Check bounds
            if (currentThumbnailSet < 0) {
                currentThumbnailSet = 0;
            } else if (currentThumbnailSet >= totalThumbnailSets) {
                currentThumbnailSet = totalThumbnailSets - 1;
            }
            updateThumbnails();
        }
        // Update visible thumbnails based on the current set
        function updateThumbnails() {
            const start = currentThumbnailSet * thumbnailsPerSet;
            const end = start + thumbnailsPerSet;
            allThumbnails.forEach((thumb, index) => {
                thumb.style.display = index >= start && index < end ? 'block' : 'none';
            });
        }

        // Initial call to show the first slide and set of thumbnails
        showSlides();
        updateThumbnails();

        // Optional: Automatically change slides every 5 seconds
        setInterval(() => {
            currentSlide++;
            showSlides();
        }, 5000);
    </script>
    <!-- Facilities Section -->
    <section id="facilities" class="facilities-section py-3">
        <div class="container">
            <h2 class="text-center mb-4">Our Facilities</h2>
            <img src="/src/brlinee.png" alt="" style="width: 11rem; margin-left: 43%; margin-top:-3rem;">
            <div class="row">
                <div class="col-md-3 facility-item text-center" data-aos="flip-right" data-aos-duration="1200">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-film fa-3x mb-3 icon-hover"></i>
                            <h4 class="card-title">Cinema</h4>
                            <p class="card-text">Enjoy the latest movies in our state-of-the-art cinema room.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 facility-item text-center" data-aos="flip-right" data-aos-duration="1200">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-utensils fa-3x mb-3 icon-hover"></i>
                            <h4 class="card-title">Restaurant & Bar</h4>
                            <p class="card-text">Savor delicious meals and refreshing drinks at our on-site restaurant
                                and bar.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 facility-item text-center" data-aos="flip-right" data-aos-duration="1200">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-plane fa-3x mb-3 icon-hover"></i>
                            <h4 class="card-title">Airport Transfer Booking</h4>
                            <p class="card-text">Convenient airport transfer services for a hassle-free travel
                                experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 facility-item text-center" data-aos="flip-right" data-aos-duration="1200">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-concierge-bell fa-3x mb-3 icon-hover"></i>
                            <h4 class="card-title">Room Service</h4>
                            <p class="card-text">Enjoy 24/7 room service with a wide selection of meals and beverages.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 facility-item text-center" data-aos="flip-left" data-aos-duration="1200">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-spa fa-3x mb-3 icon-hover"></i>
                            <h4 class="card-title">Spa Center</h4>
                            <p class="card-text">Relax and rejuvenate at our luxurious spa center with a variety of
                                treatments.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 facility-item text-center" data-aos="flip-left" data-aos-duration="1200">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-briefcase fa-3x mb-3 icon-hover"></i>
                            <h4 class="card-title">Meetings & Conferencing Facilities</h4>
                            <p class="card-text">Fully equipped meeting rooms for conferences and events.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 facility-item text-center" data-aos="flip-left" data-aos-duration="1200">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-parking fa-3x mb-3 icon-hover"></i>
                            <h4 class="card-title">Parking</h4>
                            <p class="card-text">Secure parking available for all our guests.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 facility-item text-center" data-aos="flip-left" data-aos-duration="1200">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-wifi fa-3x mb-3 icon-hover"></i>
                            <h4 class="card-title">Free Wifi Access</h4>
                            <p class="card-text">Stay connected with complimentary high-speed Wi-Fi throughout the
                                hotel.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer text-center">
        <div class="container">
            <!-- Section: Links -->
            <section>
                <div class="row columns">
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">ABOUT US</h5>
                        <p>Welcome to our hotel booking platform! We offer a wide range of accommodations to suit your
                            needs. Experience comfort and luxury with us.</p>
                    </div>

                    <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                        <h5 class="text-uppercase">Quick Links</h5>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#!" class="footer-link" style="margin-left:-1%;"><i
                                        class="fas fa-home"></i>Home</a></li>
                            <li><a href="#!" class="footer-link" style="margin-left:-3%;"><i
                                        class="fas fa-bed"></i>Accommodation</a></li>
                            <li><a href="#!" class="footer-link"><i class="fas fa-book"></i>Booking</a></li>
                            <li><a href="#!" class="footer-link" style="margin-left:-1%;"><i
                                        class="fas fa-phone"></i>Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Customer Service</h5>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#!" class="footer-link"><i class="fas fa-question-circle"></i> FAQs</a></li>
                            <li><a href="#!" class="footer-link"><i class="fas fa-headset"></i> Support</a></li>
                            <li><a href="#!" class="footer-link"><i class="fas fa-shield-alt"></i> Privacy Policy</a>
                            </li>
                            <li><a href="#!" class="footer-link"><i class="fas fa-file-contract"></i> Terms of
                                    Service</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Follow Us</h5>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#!" class="footer-link"><i class="fab fa-facebook"></i> Facebook</a></li>
                            <li><a href="#!" class="footer-link"><i class="fab fa-twitter"></i> Twitter</a></li>
                            <li><a href="#!" class="footer-link"><i class="fab fa-instagram"></i> Instagram</a></li>
                            <li><a href="#!" class="footer-link"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <hr class="mb-2" />
            <!-- Social media icons -->
            <section class="mb-4 text-center">
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-google"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-github"></i></a>
            </section>
            <div class="text-center">© 2020 Copyright: <a class="text-white"
                    href="https://kokebtechnologies.com">Kokebtechnologies.com</a></div>
        </div>
    </footer>

</body>

</html>