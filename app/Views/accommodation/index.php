<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="/css/Accomodation_Booking.css">
    <link rel="stylesheet" href="/css/Footer.css">
    <title>Booknow</title>
    <style>
        @keyframes moveText {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        @keyframes moveText2 {

            /* Fixed the name here */
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }
    </style>

</head>

<body>
    <?php echo view('/Components/Header.php'); ?>
    <!-- Accommodation Section -->
    <!-- Full-Width Search Section -->
    <section class="search-section text-white" id="search">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">Find Your Perfect Stay
            </h2>
            <p class="mb-5">Plan ahead and enjoy your trip with comfort and ease.</p>
            <!-- Search Form -->
            <form action="<?= site_url('accommodation/search'); ?>" method="GET"
                class="row g-3 justify-content-center align-items-center" style="margin-top: -2rem;">
                <div class="col-md-4">
                    <label for="checkin-date" class="form-label fw-bold">Check In Date</label>
                    <input type="date" id="checkin-date" name="checkin" class="form-control" required
                        value="<?= isset($_GET['checkin']) ? htmlspecialchars($_GET['checkin']) : '' ?>">
                </div>
                <div class="col-md-4">
                    <label for="checkout-date" class="form-label fw-bold">Check Out Date</label>
                    <input type="date" id="checkout-date" name="checkout" class="form-control" required
                        value="<?= isset($_GET['checkout']) ? htmlspecialchars($_GET['checkout']) : '' ?>">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn search-btn w-100">Search</button>
                </div>
            </form>
        </div>
    </section>
    <script>
        // Automatically set today's date as the default value for the Check-In Date field
        document.addEventListener("DOMContentLoaded", function () {
            const checkinDateInput = document.getElementById("checkin-date");
            const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
            if (!checkinDateInput.value) { // Only set the default if no value is already present
                checkinDateInput.value = today;
            }
        });
    </script>
    <section class="py-3 bg-light">
        <div class="card_body">
            <div class="row">
                <?php
                $counter = 0; // Initialize a counter variable
                foreach ($accommodations as $accommodation): ?>
                    <div class="col-12 mb-4" data-aos="fade-right">
                        <div class="card cards shadow-sm border-0 d-flex <?= ($counter % 2 == 0) ? 'flex-column flex-md-row' : 'flex-column flex-md-row-reverse' ?>">
                            <!-- Image Section -->
                            <div class="col-12 col-md-6 p-0 position-relative" data-aos="zoom-in-right">
                                <?php
                                $images = json_decode($accommodation['image'], true); // Decode JSON to array
                                if (!empty($images)):
                                    ?>
                                    <!-- Bootstrap Carousel for multiple images -->
                                    <div id="carousel<?= $accommodation['id'] ?>" class="carousel slide h-100"
                                        data-bs-ride="carousel">
                                        <div class="carousel-inner room_image">
                                            <?php foreach ($images as $index => $imagePath): ?>
                                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                                    <img src="<?= esc($imagePath); ?>"  alt="Image"
                                                        style="object-fit: cover; width: 100%;">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <!-- Left and Right Controls -->
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carousel<?= $accommodation['id'] ?>" data-bs-slide="prev"
                                            style="left: 1rem;">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
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
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <h5 class="text-center">
                                        <?= esc($accommodation['title']) ?>
                                    </h5>
                                    <img class="break_image" src="/src/brlinee.png" alt="" >
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
                                    <input type="hidden" id="checkin" name="checkin"
                                        value="<?= isset($_GET['checkin']) ? $_GET['checkin'] : ''; ?>">
                                    <input type="hidden" id="checkout" name="checkout"
                                        value="<?= isset($_GET['checkout']) ? $_GET['checkout'] : ''; ?>">
                                    <a class="bookNowLink btn mt-auto example_d"
                                        data-id="<?= esc($accommodation['id']); ?>">
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
    </section>
    <!-- Book Now Modal -->


    <div class="modal fade" id="bookNowModal" tabindex="-1" aria-labelledby="bookNowModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mt-5" style="max-width: 650px;">
            <div class="modal-content"
                style="background: url('https://example.com/background-image.jpg') center/cover; color: white; border-radius: 10px; overflow: hidden; height: 500px;">
                <div class="modal-header" style="background-color: rgba(0, 0, 0, 0.6);">
                    <h5 class="modal-title" id="bookNowModalLabel"
                        style="font-weight: bold; text-transform:uppercase; margin-left: 33%;">Complete Your Booking
                    </h5>
                    <button type="button" id="closeModalButton" class="btn-close btn-close-white"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: rgba(0, 0, 0, 0.5); padding: 30px;">
                    <div class="text-center mb-4">
                        <h6 style="font-weight: bold; text-transform:uppercase; font-size: 22px;">Unlock Exclusive Deals
                            and Discounts!</h6>
                        <p style="font-size: 14px;">Sign up today and enjoy a personalized booking experience.</p>
                    </div>
                    <div class="d-grid gap-3">
                        <!-- Continue as Guest -->
                        <button id="continueAsGuest" class="btn btn-outline-light fw-bold">
                            Continue as Guest
                        </button>
                        <!-- Sign Up -->
                        <button id="signUpButton" class="btn btn-outline-light fw-bold">
                            Sign Up
                        </button>
                    </div>
                    <!-- Advertisement Text -->
                    <div style="height: 30px; overflow: hidden; position: relative; margin-top: 5%;">
                        <p id="advertText"
                            style="position: absolute; white-space: nowrap; color: #80000; text-transform:uppercase; font-weight: bold; animation: moveText 10s linear infinite;">
                            📢 Get up to 50% off on your first booking! Limited-time offer!
                        </p>
                    </div>
                    <div style="height: 30px; overflow: hidden; position: relative; margin-top: 4%;">
                        <p id="advertText2"
                            style="position: absolute; white-space: nowrap; color: #80000; text-transform:uppercase; font-weight: bold; animation: moveText2 10s linear infinite;">
                            📢 Enjoy exclusive perks when you sign up today!
                        </p>
                    </div>
                </div>
                <div class="modal-footer" style="background-color: rgba(0, 0, 0, 0.6); text-align: center;">
                    <small style="color: #ccc;">
                        By signing up, you agree to our
                        <a href="#" id="termsLink" style="color: #ffd700; text-decoration: underline;">Terms &
                            Conditions</a>.
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms and Conditions Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms & Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please read and accept our Terms & Conditions to continue:</p>
                    <div
                        style="max-height: 150px; overflow-y: auto; border: 1px solid #ccc; padding: 10px; border-radius: 5px; background-color: #f9f9f9;">
                        <p>
                            1. By using this service, you agree to comply with all applicable laws and regulations.
                            <br>
                            2. Your booking details must be accurate, and any incorrect information may result in
                            cancellation.
                            <br>
                            3. Payments made are non-refundable unless otherwise stated in the cancellation policy.
                            <br>
                            4. The company reserves the right to amend terms or discontinue the service at any time
                            without prior notice.
                            <br>
                            5. Users must respect other guests and the property, and any damages caused will be charged
                            to the user responsible.
                        </p>
                    </div>
                    <label class="mt-3">
                        <input type="checkbox" id="acceptTerms"> I agree to the Terms & Conditions
                    </label>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const termsLink = document.getElementById("termsLink");
            const termsModal = new bootstrap.Modal(document.getElementById("termsModal"));
            const acceptTermsCheckbox = document.getElementById("acceptTerms");
            const bookNowModal = new bootstrap.Modal(document.getElementById("bookNowModal"));

            // Show Terms & Conditions modal when link is clicked
            termsLink.addEventListener("click", function (event) {
                event.preventDefault();
                termsModal.show();
            });

            // Close Terms & Conditions modal and return to the main modal when checkbox is checked
            acceptTermsCheckbox.addEventListener("change", function () {
                if (this.checked) {
                    termsModal.hide();
                    bookNowModal.show();
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const closeModalButton = document.getElementById("closeModalButton");

            closeModalButton.addEventListener("click", function () {
                // Refresh the page
                location.reload();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bookNowLinks = document.querySelectorAll('.bookNowLink'); // Select all "Book Now" links
            const bookNowModal = new bootstrap.Modal(document.getElementById('bookNowModal')); // Bootstrap modal instance

            bookNowLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault(); // Prevent default link behavior
                    const cardBody = this.closest('.card-body'); // Find the closest .card-body container
                    if (!cardBody) {
                        console.error("Card body not found for this booking button.");
                        return;
                    }

                    // Get check-in and check-out input elements
                    const checkInInput = cardBody.querySelector('input[name="checkin"]');
                    const checkOutInput = cardBody.querySelector('input[name="checkout"]');

                    // Check if check-in and check-out inputs are found
                    if (!checkInInput || !checkOutInput) {
                        console.error("Check-in or check-out input field is missing.");
                        alert("Please select check-in and check-out dates.");
                        return;
                    }

                    const checkIn = checkInInput.value; // Get check-in date
                    const checkOut = checkOutInput.value; // Get check-out date

                    // Validate that both dates are selected
                    if (!checkIn || !checkOut) {
                        alert("Please select both check-in and check-out dates before proceeding.");
                        return;
                    }

                    // Retrieve accommodation ID from the data attribute
                    const accommodationId = this.getAttribute('data-id');
                    if (!accommodationId) {
                        console.error("Accommodation ID missing.");
                        return;
                    }

                    // Check if user session data exists (indicating user is logged in)
                    const userLoggedIn = <?= json_encode(session()->get('logged_in')) ?>; // Fetch session status

                    if (userLoggedIn) {
                        // User is logged in, redirect directly to the booking form
                        const url = `<?= site_url('bookings/form/'); ?>${accommodationId}?checkin=${encodeURIComponent(checkIn)}&checkout=${encodeURIComponent(checkOut)}`;
                        window.location.href = url; // Redirect to booking form
                    } else {
                        // Save data to modal for later use
                        bookNowModal._checkIn = checkIn;
                        bookNowModal._checkOut = checkOut;
                        bookNowModal._accommodationId = accommodationId;

                        // Show the modal
                        bookNowModal.show();
                    }
                });
            });

            // Handle Continue as Guest
            document.getElementById('continueAsGuest').addEventListener('click', function () {
                const checkIn = bookNowModal._checkIn;
                const checkOut = bookNowModal._checkOut;
                const accommodationId = bookNowModal._accommodationId;

                if (checkIn && checkOut && accommodationId) {
                    const url = `<?= site_url('bookings/form/'); ?>${accommodationId}?checkin=${encodeURIComponent(checkIn)}&checkout=${encodeURIComponent(checkOut)}`;
                    window.location.href = url; // Redirect to booking form
                } else {
                    alert("Missing Check-in and Check-out data. Please try again.");
                }
            });

            // Handle Sign Up
            document.getElementById('signUpButton').addEventListener('click', function () {
                const url = `<?= site_url('auth/register'); ?>`; // Redirect to sign-up page
                window.location.href = url;
            });
        });
    </script>

    <?php echo view('/Components/Footer.php'); ?>
</body>

</html>