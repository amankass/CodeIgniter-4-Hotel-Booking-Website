<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant and Bar</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/src/download.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />

    <!-- AOS (Animate on Scroll) CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="/css/Restorant_Event.css">
    <link rel="stylesheet" href="/css/Footer.css">

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS (Animate on Scroll) JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
    <?php echo view('/Components/Header.php'); ?>
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

<div class="slider">
    <div class="slides restourant_slides">
        <div class="custom-carousel-item">
            <img src="/src/Res12.png" alt="Image 1">
            <div class="custom-carousel-caption">
                <h5>Restaurants and Bar</h5>
                <a href="#explor" class="Explore_btn">Explore More</a>
            </div>
        </div>
        <div class="custom-carousel-item">
            <img src="/src/Res10.png" alt="Image 2">
            <div class="custom-carousel-caption">
                <h5>Restaurants and Bar</h5>
                <a href="#explor" class="Explore_btn">Explore More</a>
            </div>
        </div>
        <div class="custom-carousel-item">
            <img src="/src/Res12.png" alt="Image 3">
            <div class="custom-carousel-caption">
                <h5>Restaurants and Bar</h5>
                <a href="#explor" class="Explore_btn">Explore More</a>
            </div>
        </div>
    </div>

    <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
    <button class="next" onclick="changeSlide(1)">&#10095;</button>
</div>

<script>
    let currentSlide = 0;

    // Initialize the slider
    function showSlides() {
        const slides = document.querySelectorAll('.custom-carousel-item');
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

    // Initial call to show the first slide
    showSlides();

    // Optional: Automatically change slides every 5 seconds
    setInterval(() => {
        currentSlide++;
        showSlides();
    }, 3000);
</script>


    <!-- Description Section -->
    <section class="py-5" id="explor">
        <div class="container top_header">
            <h2 class="text-center mb-4">Restaurant and Bar</h2>
            <img src="/src/brlinee.png" alt="">
            <p class="text">
                Discover a world of flavors at our hotel in Addis Ababa, where each dish and drink is crafted to
                captivate your senses and leave a lasting impression.
                Begin your culinary exploration at our Signature Restaurant, blending authentic Ethiopian flair with the
                finest international cuisine, served fresh every day from breakfast to dinner.
                Elevate your experience at the Sky Bar, located on the rooftop with sweeping views over Addis Ababa's
                vibrant cityscape.
            </p>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="menu-section py-5">
        <div class="container">
            <div class="row">
                <!-- Fine Dining Restaurant Card -->
                <div class="col-12 mb-5 cardsss">
                    <div class="card shadow p-1 rounded border-0 d-flex flex-row restorant_card">
                        <div class="col-md-6 p-0 position-relative">
                            <div id="fineDiningCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="/src/Res8.png" class="img-fluid" alt="Coffee Lounge"
                                            style="object-fit: cover; height: 450px;">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/src/Res9.png" class="img-fluid" alt="Coffee Lounge 2"
                                            style="object-fit: cover; height: 450px;">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/src/Res10.png" class="img-fluid" alt="Coffee Lounge 3"
                                            style="object-fit: cover; height: 450px;">
                                    </div>
                                </div>
                                <button class="carousel-control-prev Privious_btn" type="button"
                                    data-bs-target="#fineDiningCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next Next_btn" type="button"
                                    data-bs-target="#fineDiningCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex flex-column p-4 fonts">
                            <div class="card-body d-flex flex-column" style="margin-top: -1rem;">
                                <h5 class="card-title fw-bold">Gourmet Experience</h5>
                                <p class="card-text">
                                    Indulge in an elegant fine dining experience with a curated menu that merges local
                                    flavors and international gourmet techniques, crafted to perfection by our renowned
                                    chefs.
                                </p>
                                <!-- Amenities Section -->
                                <div class="row mt-3 buletes">
                                    <!-- Left Column -->
                                    <div class="col-md-6 d-flex flex-column align-items-start">
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🍷</span> Premium Wine Selection
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">⭐</span> Michelin-level Service
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🎼</span> Live Classical Music
                                        </div>
                                    </div>
                                    <!-- Right Column -->
                                    <div class="col-md-6 d-flex flex-column align-items-start">
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🍽️</span> Seasonal Menu
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🌟</span> Chef's Specials
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🧀</span> Cheese Pairing Options
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 22222222222222222222 -->
                <div class="col-12 mb-5">
                    <div class="card shadow p-1 rounded border-0 d-flex flex-row-reverse restorant_cardN">
                        <div class="col-md-6 p-0 position-relative">
                            <div id="rooftopBarCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="/src/Res4.png" class="img-fluid" alt="Coffee Lounge"
                                            style="object-fit: cover; height: 450px;">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/src/Res5.png" class="img-fluid" alt="Coffee Lounge 2"
                                            style="object-fit: cover; height: 450px;">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/src/Res6.png" class="img-fluid" alt="Coffee Lounge 3"
                                            style="object-fit: cover; height: 450px;">
                                    </div>
                                </div>
                                <button class="carousel-control-prev Privious_btn" type="button"
                                    data-bs-target="#rooftopBarCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next Next_btn" type="button"
                                    data-bs-target="#rooftopBarCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex flex-column p-4">
                            <div class="card-body d-flex flex-column" style="margin-top: -1rem;">
                                <h5 class="card-title fw-bold">Skyline Lounge</h5>
                                <p class="card-text">
                                    Escape to our rooftop bar, where handcrafted cocktails meet panoramic views of Addis
                                    Ababa. Experience the vibrant atmosphere as you sip and savor in style.
                                </p>
                                <!-- Amenities Section -->
                                <div class="row mt-3">
                                    <!-- Left Column -->
                                    <div class="col-md-6 d-flex flex-column align-items-start">
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🍸</span> Signature Cocktails
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🌆</span> Cityscape Views
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🎶</span> DJ & Live Music
                                        </div>
                                    </div>
                                    <!-- Right Column -->
                                    <div class="col-md-6 d-flex flex-column align-items-start">
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🌌</span> Stargazing Nights
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🔥</span> Fire Pit Seating
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🍴</span> Tapas & Small Plates
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3333333333333 -->
                <div class="col-12 mb-5">
                    <div class="card shadow p-1 rounded border-0 d-flex flex-row restorant_cardM">
                        <div class="col-md-6 p-0 position-relative">
                            <div id="coffeeLoungeCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="/src/Res3.png" class="img-fluid" alt="Coffee Lounge"
                                            style="object-fit: cover; height: 450px;">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/src/Res11.png" class="img-fluid" alt="Coffee Lounge 2"
                                            style="object-fit: cover; height: 450px;">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/src/Res2.png" class="img-fluid" alt="Coffee Lounge 3"
                                            style="object-fit: cover; height: 450px;">
                                    </div>
                                </div>
                                <button class="carousel-control-prev Privious_btn " type="button"
                                    data-bs-target="#coffeeLoungeCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next Next_btn" type="button"
                                    data-bs-target="#coffeeLoungeCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex flex-column p-4">
                            <div class="card-body d-flex flex-column" style="margin-top: -1rem;">
                                <h5 class="card-title fw-bold">Arada Coffee Lounge</h5>
                                <p class="card-text">
                                    Start your day or unwind in the evening at Arada Coffee Lounge, where rich Ethiopian
                                    coffee and freshly baked pastries await to satisfy your cravings.
                                </p>
                                <!-- Amenities Section -->
                                <div class="row mt-2">
                                    <!-- Left Column -->
                                    <div class="col-md-6 d-flex flex-column align-items-start">
                                        <!-- Align icons and text -->
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">☕</span> Ethiopian coffee Specialties
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🍰</span> Fresh Pastries & Cakes
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">📶</span> Free Wi-Fi
                                        </div>
                                    </div>
                                    <!-- Right Column -->
                                    <div class="col-md-6 d-flex flex-column align-items-start">
                                        <!-- Align icons and text -->
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">📚</span> Cozy Reading Area
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">💻</span> Workspace Friendly
                                        </div>
                                        <div class="d-flex align-items-center mb-3 fw-bold">
                                            <span class="icon me-2">🌿</span> Outdoor Seating
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to handle scroll events
        function handleScroll() {
            const cards = document.querySelectorAll('.card-container');
            const windowHeight = window.innerHeight;

            cards.forEach(card => {
                const cardTop = card.getBoundingClientRect().top;

                // Check if the card is in the viewport
                if (cardTop < windowHeight * 0.8) { // Trigger when card is within 80% of viewport height
                    card.querySelector('.card').classList.add('visible'); // Add visible class to animate
                }
            });
        }

        // Attach scroll event listener
        window.addEventListener('scroll', handleScroll);

        // Initial check in case cards are already in view on page load
        handleScroll();
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <?php echo view('/Components/Footer.php'); ?>
</body>

</html>