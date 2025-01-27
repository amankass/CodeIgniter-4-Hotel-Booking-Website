<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Website</title>
    <link rel="stylesheet" href="/css/Header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
     <!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-NEW_HASH_HERE" crossorigin="anonymous"></script>
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
                <span class="navbar-text d-flex align-items-center">
                    <i class="fas fa-user-alt me-1"></i>
                    <a href="<?= site_url('/dashboard'); ?>" class="nav-link p-0 me-2">Profile</a>
                    <a href="<?= site_url('auth/logout'); ?>" class="nav-link p-0">Logout</a>
                </span>
            <?php else: ?>
                <!-- Login | SignUp for Guests -->
                <span class="navbar-text d-flex align-items-center">
                    <i class="fas fa-user-alt me-1"></i>
                    <a href="<?= site_url('auth/'); ?>" class="nav-link p-0">Login&nbsp;</a>|&nbsp;
                    <a href="<?= site_url('auth/register'); ?>" class="nav-link p-0">SignUp</a>
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
                            <li><a class="dropdown-item" href="<?= site_url('Service/restourant') ?>">Restaurant and
                                    Bar</a></li>
                            <hr style="color: #f0f4f8; margin-top:2px; margin-bottom: 0px">
                            <li><a class="dropdown-item" href="<?= site_url('Service/event') ?>">Events</a></li>
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

</body>

</html>
