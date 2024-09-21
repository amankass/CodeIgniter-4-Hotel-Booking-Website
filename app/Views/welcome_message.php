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
    <title>Booking</title>
    <style>
    body {
        background-color: #f8f9fa;
        padding-top: 50px;
    }

    
#Tonav2{
    height: 70px;
}
        .navbar {
            background-color: #800000;
            height: 48px;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #FFD700;
        }

        .nav-link {
            color: #ffffff;
            font-weight: 500;
        }

        .navbar-brand:hover,
        .nav-link:hover {
            color: #FFA500;
        }

        /* Upper Nav Styling */
        .upper-nav {
            background-color: #800000;
            color: #f8f9fa;
            padding-top: 0px;
            padding-bottom: 10px;
            margin-top: 0%;
            justify-content: center;
        }

        .upper-nav .navbar-text {
            color: #f8f9fa;
            font-size: 14px;
        }

        .upper-nav a {
            color: #f8f9fa;
            text-decoration: none;
        }

    .book-btn {
        /* border: 2px solid transparent; No border initially */
        transition: border-color 0.3s ease; /* Smooth transition */
        background: url(klematis.jpg) repeat;
        border: 2px solid white;
        width: 150px;
        color: #f0f4f8;
       font-weight: bold;
    }

    .book-btn:hover {
        border-color: white; /* Blue border on hover */
        background-color: #FFA500;
    }

    .carousel-item img {
    height: 750px; /* Adjust height as needed */
    object-fit: cover; /* Ensures images cover the area without distortion */
}

    /* Hover dropdown effect */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0; /* Adjusts the dropdown position */
    }

    .navbar .nav-link:hover,
    .dropdown-menu .dropdown-item:hover {
        color: #FFA500; /* Orange hover effect */
        background-color: transparent;
    }

    /* Dropdown Menu Styling */
    .dropdown-menu {
        background-color: #800000; /* Match navbar background */
        border: none; /* Remove default border */
    }

    .dropdown-item {
        color: #ffffff;
    }

    /* Dropdown hover effect */
    .dropdown-item:hover {
        background-color: transparent;
        color: #FFA500; /* Same hover effect as navbar items */
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
        background-color: #040720;
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
        background-color: #040720;
        color: white;
        padding: 20px 0;
    }

    .btn-primary {
        background-color: #040720;
        color: white;
    }

    i {
        transition: color 0.3s ease, transform 0.3s ease;
    }

    i:hover {
        color: #FFA500;
        transform: scale(1.2);
    }

    .carousel-item img {
    height: 750px; /* Adjust height as needed */
    object-fit: cover; /* Ensures images cover the area without distortion */
}

       /* About Section */
.about-section {
    background-color: #f0f4f8; /* Light background for contrast */
    padding: 50px 0;
}

.about-section h2 {
    font-size: 36px;
    font-weight: bold;
    color: #040720;
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

/* Facilities Section */
.facilities-section {
    background-color: #ffffff;
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
    height: 100%; /* Ensures all cards are the same height */
}

.facility-item .card-body {
    padding: 20px; /* Adjust padding as needed */
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
    color: #F6E96B; /* Smooth yellow color */
    transition: color 1s ease;
}

.facility-item .card:hover .card-body i {
    color: #982b1c; /* Change color on hover */
}
.ms-auto{
    margin-right: 0%;
    display: flex;
    gap: 10px;
    margin-top: 20px;
}
    </style>
</head>

<body>

  <!-- Upper Nav: Hotel Name, Location, and Email -->
  <nav id="Tonav" class="navbar navbar-expand-lg fixed-top upper-nav">
        <div class="container">
            <a class="navbar-brand" href="/">HOTEL</a>
            <div class="ms-auto">
                <span class="navbar-text me-3 d-flex">
                    <i class="fas fa-map-marker-alt mt-1"></i><a href="#" class="nav-link">&nbsp;  Addis Ababa, Ethiopia</a>
                </span>
                <span class="navbar-text d-flex">
                    <i class="fas fa-envelope mt-1"></i><a href="#" class="nav-link">&nbsp;  info@ayahotel.com</a> 
                </span>
                <span class="navbar-text d-flex">
                    <i class="fas fa-user-alt mt-1"></i><a href="auth/register" class="nav-link">&nbsp;  Login | SignUp</a>
                </span>
            </div>
        </div>
    </nav>
  <!-- Lower Nav: Centered Menu Items -->
<nav id="Tonav2" class="navbar navbar-expand-lg navbar-light fixed-top mt-5">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto gap-5">
                <li class="nav-item">
                    <a class="nav-link" href="/">HOME</a>
                </li>
                <!-- Accommodation with Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="accommodationDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        ACCOMMODATION
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="accommodationDropdown">
                        <li><a class="dropdown-item" href="accommodation/standard">Standard Room</a></li>
                        <li><a class="dropdown-item" href="accommodation/Premium">Premium Room</a></li>
                        <li><a class="dropdown-item" href="accommodation/Family">Family Room</a></li>
                        <li><a class="dropdown-item" href="accommodation/Executive">Executive Room</a></li>
                        <li><a class="dropdown-item" href="accommodation/Presidential">Presidential Room</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a  class="nav-link dropdown-toggle" href="#" id="accommodationDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    SERVICES</a>
                    <ul class="dropdown-menu" aria-labelledby="accommodationDropdown">
                        <li><a class="dropdown-item" href="#">Restaurant and Bar</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Recreation</a></li> -->
                        <li><a class="dropdown-item" href="#">Events</a></li>
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
        <!-- Book button aligned to the center -->
        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-warning book-btn">BOOK NOW</a>
        </div>
    </div>
</nav>
<script>
        const topnav =document.getElementById('Tonav');
        window.addEventListener('scroll', ()=>{
let scrollposion =window.scrollY;
if(scrollposion>100){
    topnav.style.opacity='0.5';
}else{
    topnav.style.opacity='1';
}
  });

        const topnav2 =document.getElementById('Tonav2');
        window.addEventListener('scroll', ()=>{
let scrollposion =window.scrollY;
if(scrollposion>100){
    topnav2.style.opacity='0.5';
}else{
    topnav2.style.opacity='1';
}
  });
    </script>

























    <!-- Header Section
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Kokeb Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/blog">Blog</a>
                    </li>
                    <?php if (session()->get('logged_in')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('/dashboard'); ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('auth/logout'); ?>">Logout</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('auth/register'); ?>">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('auth'); ?>">Login</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav> -->

<!-- Hero Section with Carousel -->
<div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/src/image3.jpg" class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
    <h5>Welcome to Our International Hotel</h5>
    <p>Your First Choice</p>
    <a href="#about" class="btn btn-primary btn-lg">Get Started</a>
</div>
        </div>
        <div class="carousel-item">
            <img src="/src/image2.jpg" class="d-block w-100" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Luxury Accommodation</h5>
                <p>Experience comfort and elegance.</p>
                <a href="#" class="btn btn-primary btn-lg">Explore More</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/src/image1.jpg" class="d-block w-100" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Exceptional Services</h5>
                <p>We cater to all your needs.</p>
                <a href="#" class="btn btn-primary btn-lg">Discover Our Services</a>
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
</section>

<script>
    AOS.init();
</script>

<!-- About Section -->
<section id="about" class="about-section py-5">
    <div class="container">
        <h2 class="text-center mb-4" data-aos="fade-up">About Our International Hotel</h2>
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="img-wrapper" data-aos="zoom-in">
                    <img src="/src/A8.jpg" class="img-fluid rounded" alt="About Aya International Hotel">
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="animate__animated animate__fadeInUp" data-aos="fade-up">Welcome to Our International Hotel</h3>
                <p class="animate__animated animate__fadeInUp" data-aos="fade-up">
                    Nestled in the heart of Addis Ababa, our International Hotel offers a unique blend of luxury, comfort, and hospitality. Our hotel is designed to provide an exceptional experience for both business and leisure travelers. With elegantly furnished rooms, state-of-the-art facilities, and a dedicated staff, we ensure that your stay with us is memorable and enjoyable.
                </p>
                <p class="animate__animated animate__fadeInUp" data-aos="fade-up">
                    At this International Hotel, we believe in creating a home away from home. Our commitment to excellence is reflected in every aspect of our service. Whether you are here for a conference, a romantic getaway, or a family vacation, we cater to every need. Enjoy our exquisite dining options, unwind at our spa, or take a dip in our luxurious pool while soaking in the stunning views of the city.
                </p>
                <p class="animate__animated animate__fadeInUp" data-aos="fade-up">
                    Join us at this International Hotel, where we prioritize your comfort and satisfaction. Experience the warmth of Ethiopian hospitality and make unforgettable memories with us.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Facilities Section -->
<section id="facilities" class="facilities-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Our Facilities</h2>
        <div class="row">
            <div class="col-md-3 facility-item text-center">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-film fa-3x mb-3 icon-hover"></i>
                        <h4 class="card-title">Cinema</h4>
                        <p class="card-text">Enjoy the latest movies in our state-of-the-art cinema room.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 facility-item text-center">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-utensils fa-3x mb-3 icon-hover"></i>
                        <h4 class="card-title">Restaurant & Bar</h4>
                        <p class="card-text">Savor delicious meals and refreshing drinks at our on-site restaurant and bar.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 facility-item text-center">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-plane fa-3x mb-3 icon-hover"></i>
                        <h4 class="card-title">Airport Transfer Booking</h4>
                        <p class="card-text">Convenient airport transfer services for a hassle-free travel experience.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 facility-item text-center">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-concierge-bell fa-3x mb-3 icon-hover"></i>
                        <h4 class="card-title">Room Service</h4>
                        <p class="card-text">Enjoy 24/7 room service with a wide selection of meals and beverages.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 facility-item text-center">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-spa fa-3x mb-3 icon-hover"></i>
                        <h4 class="card-title">Spa Center</h4>
                        <p class="card-text">Relax and rejuvenate at our luxurious spa center with a variety of treatments.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 facility-item text-center">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-briefcase fa-3x mb-3 icon-hover"></i>
                        <h4 class="card-title">Meetings & Conferencing Facilities</h4>
                        <p class="card-text">Fully equipped meeting rooms for conferences and events.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 facility-item text-center">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-parking fa-3x mb-3 icon-hover"></i>
                        <h4 class="card-title">Parking</h4>
                        <p class="card-text">Secure parking available for all our guests.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 facility-item text-center">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-wifi fa-3x mb-3 icon-hover"></i>
                        <h4 class="card-title">Free Wifi Access</h4>
                        <p class="card-text">Stay connected with complimentary high-speed Wi-Fi throughout the hotel.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <footer class="footer text-center">
        <div class="container">
            <p>&copy; 2024 Kokeb Tech. All rights reserved.</p>
            <p><a href="#" class="text-white">Privacy Policy</a> | <a href="#" class="text-white">Terms of Service</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
