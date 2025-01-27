<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
    <!-- Custom JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/Home.css">
    <link rel="stylesheet" href="/css/Footer.css">
    <title>Booking-Home</title>
</head>

<body>
    <?php echo view('/Components/Header.php'); ?>
    <!-- Hero Section with Carousel -->
    <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Search Section Overlay -->
            <section class="search-section text-white " id="search">
                <div class="container text-center">
                    <h2 class="mb-3">Find Your Perfect Stay</h2>
                    <p class="mb-5">Plan ahead and enjoy your trip with comfort and ease.</p>
                    <!-- Search Form -->
                    <form action="<?= site_url('accommodation/search'); ?>" method="GET"
                        class="row g-3 justify-content-center align-items-center" style="margin-top: -2rem;">
                        <div class="col-md-4">
                            <label for="checkin-date" class="form-label fw-bold">Check In Date</label>
                            <input type="date" id="checkin-date" name="checkin" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="checkout-date" class="form-label fw-bold">Check Out Date</label>
                            <input type="date" id="checkout-date" name="checkout" class="form-control" required>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn search-btn w-100">Search</button>
                        </div>
                    </form>
                </div>
            </section>
            <script>
                // Set today's date as the default value for the Check-In Date field
                document.addEventListener("DOMContentLoaded", function () {
                    const checkinDateInput = document.getElementById("checkin-date");
                    const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
                    if (!checkinDateInput.value) { // Only set the default if no value is already present
                        checkinDateInput.value = today;
                    }
                });
            </script>
            <!-- Carousel Items -->
            <div class="carousel-item active home_slides">
                <img src="/src/homepage1.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption">
                    <h5>Welcome to Our International Hotel</h5>
                    <p>Your First Choice</p>
                    <a href="#about" class="btn btn1">Get Started</a>
                </div>
            </div>
            <div class="carousel-item home_slides">
                <img src="/src/homepage2.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h5>Luxury Accommodation</h5>
                    <p>Experience comfort and elegance.</p>
                    <a href="#accommodation" class="btn btn1">Explore More</a>
                </div>
            </div>
            <div class="carousel-item home_slides">
                <img src="/src/homepage3.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
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
            <div class="text-center mb-4" data-aos="fade-up">
                <h2>About Us</h2>
                <img src="/src/brlinee.png" class="breakline" alt="">
            </div>

            <div class="row align-items-center mein_about_card">
                <div class="col-md-6">
                    <div class="img-wrapper" data-aos="zoom-in">
                        <img src="/src/image10.jpg" class="img-fluid rounded">
                    </div>
                </div>

                <!-- WHO WE ARE heading and paragraphs -->
                <div class="col-md-6 about_card_content">
                    <h2 class="text-center animate__animated animate__fadeInUp" data-aos="fade-up">Who we Are</h2>
                    <p class="animate__animated animate__fadeInUp" data-aos="fade-up">
                        Nestled in the heart of Addis Ababa, our International Hotel combines luxury, comfort, and
                        exceptional
                        hospitality to provide a memorable experience for business and leisure travelers alike. With
                        elegantly
                        furnished rooms, modern facilities, and a dedicated staff, we ensure your stay feels like a home
                        away from home.
                        Whether you're attending a conference, enjoying a romantic getaway, or on a family vacation, we
                        cater to every
                        need with unparalleled service.
                    </p>
                    <p class="animate__animated animate__fadeInUp" data-aos="fade-up">
                        Immerse yourself in the warmth of Ethiopian hospitality as you explore our
                        exquisite dining options, relax at the spa, or unwind by the luxurious pool with
                        stunning city views.
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
    <section id="accommodation" class="py-3 bg-light">
        <div class="card_body">
            <?php
            $isAllAccommodations = isset($isAll) && $isAll; // Assuming you pass a variable $isAll from the controller
            $sectionTitle = $isAllAccommodations ? "ROOMS" : esc($accommodations[0]['room_type']); ?>
            <h2 class="room-title text-center mb-4"><?= $sectionTitle ?></h2>
            <div class="row">
                <?php
                $counter = 0; 
                foreach ($accommodations as $accommodation):
                    ?>
                    <div class="col-12 mb-4" data-aos="fade-right">
                        <div
                            class="card cards shadow-sm border-0 d-flex <?= ($counter % 2 == 0) ? 'flex-column flex-md-row' : 'flex-column flex-md-row-reverse' ?>">
                            <!-- Image Section -->
                            <div class="col-12 col-md-6 p-0 position-relative" data-aos="zoom-in-right">
                                <?php
                                $images = json_decode($accommodation['image'], true); // Decode JSON to array
                                if (!empty($images)):
                                    ?>
                                    <!-- Bootstrap Carousel for multiple images -->
                                    <div id="carousel<?= $accommodation['id'] ?>" class="carousel slide"
                                        data-bs-ride="carousel">
                                        <div class="carousel-inner room_image">
                                            <?php foreach ($images as $index => $imagePath): ?>
                                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                                    <img src="<?= esc($imagePath); ?>" alt="Image"
                                                        style="object-fit: cover; width: 100%;">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <!-- Left and Right Controls positioned on both sides of the carousel -->
                                        <button class="carousel-control-prev Prev_room" type="button"
                                            data-bs-target="#carousel<?= $accommodation['id'] ?>" data-bs-slide="prev"
                                            style="left: 1rem;">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next Next_room" type="button"
                                            data-bs-target="#carousel<?= $accommodation['id'] ?>" data-bs-slide="next"
                                            style="right: 1rem;">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                <?php else: ?>
                                    <p>No images available.</p>
                                <?php endif; ?>
                                <div style="background-color: rgba(128, 0, 0, 0.5); color: white; position: absolute; top: 0; left: 0; 
                                            margin: 0.5rem; padding: 0.3rem 0.6rem; border-radius: 0.25rem; font-size: 0.875rem; 
                                            font-weight: bold; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                    ETB<?= esc($accommodation['price']) ?>/night
                                </div>
                            </div>
                            <!-- Content Section -->
                            <div class="col-12 col-md-6 d-flex flex-column p-4" data-aos="zoom-in-left">
                                <div class="card_body2 d-flex flex-column justify-content-center">
                                    <h5 class="text-center">
                                        <?= esc($accommodation['title']) ?>
                                    </h5>
                                    <img src="/src/brlinee.png" alt="" class="break_image">
                                    <p class="card-text text-muted">
                                        <?= htmlspecialchars_decode($accommodation['content']) ?>
                                    </p>
                                    <div class="d-flex flex-wrap gap-3">
                                        <ul class="list-unstyled">
                                            <li class="mb-3"><i
                                                    class="bi bi-check-circle-fill text-danger me-2"></i><strong>Room
                                                    Type:</strong> <?= esc($accommodation['room_type']) ?></li>
                                            <li class="mb-3"><i
                                                    class="bi bi-check-circle-fill text-danger me-2"></i><strong>Bed
                                                    Type:</strong> <?= esc($accommodation['bed_type']) ?></li>
                                            <li class="mb-3"><i
                                                    class="bi bi-check-circle-fill text-danger me-2"></i><strong>Has
                                                    Jacuzzi:</strong>
                                                <?= esc($accommodation['jacuzzi']) ? 'Yes' : 'No' ?></li>
                                            <li><i class="bi bi-check-circle-fill text-danger me-2"></i><strong>Has
                                                    Balcony:</strong>
                                                <?= esc($accommodation['balcony']) ? 'Yes' : 'No' ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li><i
                                                class="bi bi-check-circle-fill text-danger me-2"></i><strong>Amenities:</strong>
                                            <?= esc($accommodation['amenities']) ?></li>
                                    </ul>
                                    <a href="<?= site_url('/accommodations'); ?>" class="example_d btn mt-auto">
                                        <i class="bi bi-calendar-check me-2"></i>Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $counter++; 
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
                    <a href="Service/restourant" class="btn custom-btn restaurant_btn">Get Started</a>
                </div>
            </div>
            <img src="/src/A.png" alt="Image 2">
            <img src="/src/B.png" alt="Image 3">
            <img src="/src/C.png" alt="Image 4">
            <img src="/src/D.png" alt="Image 5">
            <img src="/src/E.png" alt="Image 6">
            <img src="/src/F.png" alt="Image 7">
            <img src="/src/G.png" alt="Image 8">
        </div>
        <button class="slide_prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="slide_next" onclick="changeSlide(1)">&#10095;</button>
    </div>
    <div class="thumbnail-container">
        <div class="thumbnails" id="thumbnails">
            <img src="/src/A.png" alt="Image 1" onclick="selectSlide(0)">
            <img src="/src/B.png" alt="Image 2" onclick="selectSlide(1)">
            <img src="/src/C.png" alt="Image 3" onclick="selectSlide(2)">
            <img src="/src/D.png" alt="Image 4" onclick="selectSlide(3)">
            <img src="/src/E.png" alt="Image 5" onclick="selectSlide(4)">
            <img src="/src/F.png" alt="Image 6" onclick="selectSlide(5)">
            <img src="/src/G.png" alt="Image 7" onclick="selectSlide(5)">
        </div>
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
        showSlides();
        updateThumbnails();
        setInterval(() => {
            currentSlide++;
            showSlides();
        }, 5000);
    </script>
    <!-- Facilities Section -->
    <section id="facilities" class="facilities-section py-3">
        <div class="container">
            <h2 class="text-center mb-4">Our Facilities</h2>
            <img src="/src/brlinee.png" alt="">
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

    <?php echo view('/Components/Footer.php'); ?>
</body>

</html>