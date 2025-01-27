<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant and Bar</title>
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
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/Restorant_Event.css">
    <link rel="stylesheet" href="/css/Footer.css">
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
            <img src="/src/image3.jpg" alt="Image 1">
            <div class="custom-carousel-caption">
                <h5>Meetings & Conferences</h5>
                <a href="#explor" class="Explore_btn">Explore More</a>
            </div>
            </div>
        </div>
    </div>
    <!-- Description Section -->
    <section class="py-5" id="explor">
        <div class="container top_header">
            <h2 class="text-center mb-4">Meetings & Conferences</h2>
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

    <section class="seating-arrangement-section" style="margin-top: -3%;">
        <div class="container">
            <h2 class="text-center mb-4">Seat Arrangements for Meetings & Conferences</h2>
            <img src="/src/brlinee.png" alt="" style="width: 11rem; margin-left: 43%; margin-top:-3rem;">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Event Venue</th>
                        <th>Boardroom</th>
                        <th>Class Arrangement</th>
                        <th>Round Table Layout</th>
                        <th>Theatre</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>WEEDING ROOM</td>
                        <td>-</td>
                        <td>100</td>
                        <td>300</td>
                        <td>600</td>
                    </tr>
                    <tr>
                        <td>SHENGO</td>
                        <td>20</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>MAYOR 3 HALL</td>
                        <td>50</td>
                        <td>50</td>
                        <td>38</td>
                        <td>84</td>
                    </tr>
                    <tr>
                        <td>CITY HALL</td>
                        <td>50</td>
                        <td>40</td>
                        <td>72</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>ARADA</td>
                        <td>45</td>
                        <td>30</td>
                        <td>35</td>
                        <td>60</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>



    <!-- Toast Notification -->
    <!-- Toast Notification -->
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="successToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header" style="background-color: #28a745; color: white;">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Your message has been sent successfully we will email for you.
            </div>
        </div>
    </div>

    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form id="contactForm" action="<?= base_url('Home/eventcontact') ?>" method="post">
                        <?= csrf_field(); ?>
                        <!-- First Name -->
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="firstName" required>
                        </div>
                        <!-- Last Name -->
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="lastName" required>
                        </div>
                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" id="phone" required>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <!-- Message -->
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea type="text" class="form-control" name="message" id="message" required></textarea>
                        </div>
                        <!-- Venue Dropdown -->
                        <div class="mb-5">
                            <label for="venue" class="form-label">Select Venue</label>
                            <select class="form-select" name="venue" id="venue" required>
                                <option value="BALLROOM">WEEDING ROOM</option>
                                <option value="SHENGO">SHENGO</option>
                                <option value="MAYOR 3 HALL">MAYOR 3 HALL</option>
                                <option value="CITY HALL">CITY HALL</option>
                                <option value="ARADA">ARADA</option>
                            </select>
                        </div>
                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="btn Submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Use AJAX to submit the form
            var formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success toast
                        var toastEl = document.getElementById('successToast');
                        var toast = new bootstrap.Toast(toastEl);
                        toast.show();

                        // Close the modal
                        var contactModal = bootstrap.Modal.getInstance(document.getElementById('contactModal'));
                        contactModal.hide();

                        // Reload the page after a short delay (e.g., 2 seconds)
                        setTimeout(function () {
                            location.reload(); // Reload the current page
                        }, 1500); // Delay in milliseconds
                    } else {
                        // Handle errors
                        console.error(data.errors);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>

    <section class="event-venue-section py-5">
        <div id="eventVenueCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/src/image01.jpg" class="d-block w-100" alt="Event Venue"
                        style="height: 35rem; object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <h3 class="text-white">WEEDING ROOM</h3>
                        <p class="text-white">Join us for unforgettable experiences in our versatile event spaces.</p>
                        <a href="#contact" class="btn custom-btn Continue_btn" data-bs-toggle="modal"
                            data-bs-target="#contactModal">Contact Us</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/src/Shango.png" class="d-block w-100" alt="Event Venue 2"
                        style="height: 35rem; object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <h3 class="text-white">SHENGO</h3>
                        <p class="text-white">Explore our beautiful settings designed for every occasion.</p>
                        <a href="#contact" class="btn custom-btn Continue_btn" data-bs-toggle="modal"
                            data-bs-target="#contactModal">Contact Us</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/src/image03.jpg" class="d-block w-100" alt="Event Venue 3"
                        style="height: 35rem; object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <h3 class="text-white">MAYOR 3 HALL</h3>
                        <p class="text-white">Let us help you create lasting memories in our exquisite venues.</p>
                        <a href="#contact" class="btn custom-btn Continue_btn" data-bs-toggle="modal"
                            data-bs-target="#contactModal">Contact Us</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/src/image03.jpg" class="d-block w-100" alt="Event Venue 3"
                        style="height: 35rem; object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <h3 class="text-white">CITY HALL</h3>
                        <p class="text-white">Let us help you create lasting memories in our exquisite venues.</p>
                        <a href="#contact" class="btn custom-btn Continue_btn" data-bs-toggle="modal"
                            data-bs-target="#contactModal">Contact Us</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/src/image03.jpg" class="d-block w-100" alt="Event Venue 3"
                        style="height: 35rem; object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <h3 class="text-white">ARADA</h3>
                        <p class="text-white">Let us help you create lasting memories in our exquisite venues.</p>
                        <a href="#contact" class="btn custom-btn Continue_btn" data-bs-toggle="modal"
                            data-bs-target="#contactModal">Contact Us</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#eventVenueCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#eventVenueCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php echo view('/Components/Footer.php'); ?>
</body>

</html>