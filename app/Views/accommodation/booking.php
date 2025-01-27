<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/src/download.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6oIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- AOS (Animate on Scroll) CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- International Telephone Input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <!-- Custom Styles -->
    <link rel="stylesheet" href="/css/Booking.css">

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3sf4jt9OHNhc3qe0YCHztl46CIpkjW2mrpTw6fRjG"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>


<body>
    <?php echo view('/Components/Header.php'); ?>
    <!-- Upper Header -->
    <div class="container">
        <div class="booking-container">
            <h2>Book Your Stay</h2>
            <!-- Flash Messages -->
            <?php
            if (!empty(session()->getFlashData('success'))) {
                ?>
                <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                    <?=
                        session()->getFlashData('success')
                        ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            } else if (!empty(session()->getFlashData('fail'))) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                    <?=
                        session()->getFlashData('fail')
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
            }
            ?>
            <div class="stepper-wrapper">
                <a href="<?= site_url('/accommodations') ?>" class="stepper-item completed"
                    title="Want to change Arrival date?">
                    <div class="step-counter">1</div>
                    <div class="step-name">Select Rooms</div>
                </a>
                <a href="#step-1" class="stepper-item active" id="step2" title="Want to change Booking Detail?">
                    <div class="step-counter">2</div>
                    <div class="step-name">Fill Booking Detail</div>
                </a>
                <a href="#step-2" class="stepper-item" id="step3" title="Want to change Personal Detail?">
                    <div class="step-counter">3</div>
                    <div class="step-name">Fill Personal Detail</div>
                </a>
                <div class="stepper-item">
                    <div class="step-counter">4</div>
                    <div class="step-name">Pay and Enjoy</div>
                </div>
            </div>
            <!-- Step 1: Accommodation Photo Card with Date Selection -->
            <form action="<?= site_url('bookings/submit'); ?>" method="POST">
                <div id="step-1" class="step active">
                    <h4 class="text-center mb-4">Enter Reservation Details</h4>
                    <div class="photo-card">
                        <img src="/src/image1.jpg" alt="Hotel Image">
                        <div style="background-color: rgba(128, 0, 0, 0.5); color: white; position: absolute; top: 0; left: 0; 
                                            margin: 0.5rem; padding: 0.6rem 0.6rem; border-radius: 0.25rem; font-size: 0.975rem; 
                                            font-weight: bold; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            ETB <?= esc($accommodation['price']) ?>/night
                        </div>
                        <div class="date-selection">
                            <label for="check_in" class="form-label fw-bold">Check-In Date:</label>
                            <input type="date" id="check_in" name="check_in" class="mb-2 form-control"
                                value="<?= isset($_GET['checkin']) ? $_GET['checkin'] : ''; ?>" required>

                            <label for="check_out" class="form-label mt-2 fw-bold">Check-Out Date:</label>
                            <input type="date" id="check_out" name="check_out" class="mb-3 form-control"
                                value="<?= isset($_GET['checkout']) ? $_GET['checkout'] : ''; ?>" required>

                            <input type="hidden" name="total_price" id="room_price"
                                value="<?= esc($accommodation['price']); ?>">
                            <input type="hidden" name="accommodation_id" value="<?= esc($accommodation['id']); ?>">
                            <!-- Number of Adults Input -->
                            <div class="mb-3 fw-bold">
                                <label for="adults" class="form-label">Number of Adults:</label>
                                <input type="number" id="adults" name="adults" class="form-control" value="0" min="1"
                                    max="3">
                            </div>
                            <!-- Number of Children Input -->
                            <div class="mb-3 fw-bold">
                                <label for="children" class="form-label">Number of Children:</label>
                                <input type="number" id="children" name="children" class="form-control" value="0"
                                    min="0" max="2">
                            </div>
                            <div class="mb-3 fw-bold">
                                <label for="child_age" class="form-label">Age of Children:</label>
                                <input type="number" id="child_age" name="child_age" value="0" class="form-control"
                                    minlength="0" maxlength="7">
                            </div>
                            <!-- Display Total Price -->
                            <div id="total_price_display" class="mt-3">
                                <h5>Total Price: ETB <span id="totalPriceView"></span>
                                    <input type="hidden" id="total_price" name="total_price" value="0.00">
                                </h5>
                            </div>
                            <button id="nextStep1" type="button" class="btn btn-next w-100">Proceed to Booking
                                &#8594;</button>
                        </div>
                    </div>
                </div>
                <script>
                    function calculateTotalPrice() {
                        const checkInInput = document.getElementById("check_in");
                        const checkOutInput = document.getElementById("check_out");
                        const roomPrice = parseFloat(document.getElementById("room_price").value);
                        const totalPriceInput = document.getElementById("total_price");
                        const totalPriceView = document.getElementById("totalPriceView");
                        const checkInDate = new Date(checkInInput.value);
                        const checkOutDate = new Date(checkOutInput.value);
                        // Ensure both dates are selected
                        if (checkInInput.value && checkOutInput.value) {
                            const timeDifference = checkOutDate - checkInDate;
                            const days = Math.ceil(timeDifference / (1000 * 3600 * 24));
                            // Calculate total price only if days > 0 (valid date range)
                            if (days > 0) {
                                const totalPrice = days * roomPrice;
                                totalPriceInput.value = totalPrice.toFixed(2); // Set input value
                                totalPriceView.textContent = totalPrice.toFixed(2); // Set span text
                            } else {
                                totalPriceInput.value = "0.00"; // Reset input value for invalid date range
                                totalPriceView.textContent = "0.00"; // Reset span text
                            }
                        } else {
                            totalPriceInput.value = "0.00"; // Reset input value when dates are not selected
                            totalPriceView.textContent = "0.00"; // Reset span text
                        }
                    }
                    // Call calculateTotalPrice on page load if dates are set in the inputs
                    window.onload = function () {
                        calculateTotalPrice();
                    };
                    // Also recalculate when dates are manually changed by the user
                    document.getElementById("check_in").addEventListener("change", calculateTotalPrice);
                    document.getElementById("check_out").addEventListener("change", calculateTotalPrice);
                </script>
                <script>
                    // Set today's date as the minimum selectable date and default value for check-in
                    const today = new Date();
                    const formattedDate = today.toISOString().split('T')[0];
                    const checkInInput = document.getElementById("check_in");
                    const checkOutInput = document.getElementById("check_out");
                    checkInInput.setAttribute("min", formattedDate);
                    checkInInput.value = formattedDate; // Set default value to today
                    checkOutInput.setAttribute("min", formattedDate); // Optional: Set check-out min to today
                </script>
                <!-- Step 2: Booking Form -->
                <div id="step-2" class="step">
                    <div class="row justify-content-center">
                        <h4 class="text-center mb-4 text-uppercase fw-bold">Complete Personal Information Form</h4>
                        <!-- Title Dropdown -->
                        <div class="form-group mb-3 col-md-6">
                            <label for="title" class="fw-bold">Title <span style="color: red;">*</span></label>
                            <select class="form-select" name="title" id="title">
                                <option value="" <?= !isset($user['title']) || empty($user['title']) ? 'selected' : '' ?>>Choose...</option>
                                <option value="Mr." <?= isset($user['title']) && $user['title'] == 'Mr.' ? 'selected' : '' ?>>Mr.</option>
                                <option value="Ms." <?= isset($user['title']) && $user['title'] == 'Ms.' ? 'selected' : '' ?>>Ms.</option>
                                <option value="Miss" <?= isset($user['title']) && $user['title'] == 'Miss' ? 'selected' : '' ?>>Miss</option>
                                <option value="Mrs." <?= isset($user['title']) && $user['title'] == 'Mrs.' ? 'selected' : '' ?>>Mrs.</option>
                                <option value="Other." <?= isset($user['title']) && $user['title'] == 'Other.' ? 'selected' : '' ?>>Other</option>
                            </select>
                            <span class="text-danger text-sm">
                                <?= isset($validation) ? display_form_errors($validation, 'title') : '' ?>
                            </span>
                        </div>
                        <!-- Full Name -->
                        <div class="form-group mb-3 col-md-6">
                            <label for="first_name" class="fw-bold">First Name <span
                                    style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="first_name" placeholder="Enter Your Name"
                                value="<?= isset($user['first_name']) ? htmlspecialchars($user['first_name']) : '' ?>">
                            <span class="text-danger text-sm">
                                <?= isset($validation) ? display_form_errors($validation, 'first_name') : '' ?>
                            </span>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="middle_name" class="fw-bold">Middle Name (optional)</span></label>
                            <input type="text" class="form-control" name="middle_name" placeholder="Enter Your Name"
                                value="<?= isset($user['middle_name']) ? htmlspecialchars($user['middle_name']) : '' ?>">
                            <span class="text-danger text-sm">
                                <?= isset($validation) ? display_form_errors($validation, 'name') : '' ?>
                            </span>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="last_name" class="fw-bold">Last Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="last_name" placeholder="Enter Your Name"
                                value="<?= isset($user['last_name']) ? htmlspecialchars($user['last_name']) : '' ?>">
                            <span class="text-danger text-sm">
                                <?= isset($validation) ? display_form_errors($validation, 'last_name') : '' ?>
                            </span>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="gender" class="fw-bold">Gender <span style="color: red;">*</span></label>
                            <select class="form-control form-select" name="Gender" id="gender">
                                <option value="" <?= !isset($user['Gender']) || empty($user['Gender']) ? 'selected' : '' ?> selected>Select Gender</option>
                                <option value="Male" <?= isset($user['Gender']) && $user['Gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= isset($user['Gender']) && $user['Gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                            </select>
                            <span class="text-danger text-sm">
                                <?= isset($validation) ? display_form_errors($validation, 'Gender') : '' ?>
                            </span>
                        </div>

                        <!-- Phone -->
                        <div class="form-group mb-3 col-md-6">
                            <label for="phone" style="display: block; margin-bottom: 0px;" class="fw-bold">Phone <span
                                    style="color: red;">*</span></label>
                            <input type="tel" id="phone" class="form-control" name="phone" placeholder="Enter Phone"
                                value="<?= isset($user['phone']) ? htmlspecialchars($user['phone']) : '' ?>">
                            <span class="text-danger text-sm">
                                <?= isset($validation) ? display_form_errors($validation, 'phone') : '' ?>
                            </span>
                        </div>
                        <!-- Email -->
                        <div class="form-group mb-3 col-md-6">
                            <label for="email" class="fw-bold">Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Your Email"
                                value="<?= isset($user['email']) ? htmlspecialchars($user['email']) : '' ?>">
                            <span class="text-danger text-sm">
                                <?= isset($validation) ? display_form_errors($validation, 'email') : '' ?>
                            </span>
                        </div>
                        <!-- Nationality Dropdown -->
                        <div class="form-group mb-3 col-md-6">
                            <label for="nationality" class="fw-bold">Nationality</span></label>
                            <select class="form-select" name="nationality" id="nationality">
                                <option value="" <?= empty($user['nationality']) ? 'selected' : '' ?>>Please select one
                                </option>
                                <option value="afghan" <?= isset($user['nationality']) && $user['nationality'] == 'afghan' ? 'selected' : '' ?>>Afghan</option>
                                <option value="albanian" <?= isset($user['nationality']) && $user['nationality'] == 'albanian' ? 'selected' : '' ?>>Albanian</option>
                                <option value="algerian" <?= isset($user['nationality']) && $user['nationality'] == 'algerian' ? 'selected' : '' ?>>Algerian</option>
                                <option value="zimbabwean" <?= isset($user['nationality']) && $user['nationality'] == 'zimbabwean' ? 'selected' : '' ?>>Zimbabwean</option>
                                <option value="Ethiopian" <?= isset($user['nationality']) && $user['nationality'] == 'Ethiopian' ? 'selected' : '' ?>>Ethiopian</option>
                            </select>
                            <span class="text-danger text-sm">
                                <?= isset($validation) ? display_form_errors($validation, 'nationality') : '' ?>
                            </span>
                        </div>
                        <!-- Current Address -->
                        <div class="form-group mb-3 col-md-6">
                            <label for="country" class="fw-bold">Residential City</label>
                            <input type="text" class="form-control" id="country" name="country"
                                value="<?= isset($user['country']) ? esc($user['country']) : '' ?>"
                                autocomplete="country" placeholder="Enter current residential City">
                            <span class="text-danger text-sm">
                                <?= isset($validation) ? display_form_errors($validation, 'country') : '' ?>
                            </span>
                        </div>
                        <!-- Phone Number Script -->
                        <script>
                            const phoneInputField = document.querySelector("#phone");
                            const phoneInput = window.intlTelInput(phoneInputField, {
                                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                            });
                        </script>
                        <!-- Submit Button -->
                        <div class="two_buttons">
                            <button type="submit" class="btn book_submit_btn">Submit Booking</button>
                            <button id="backStep1" type="button" class="btn book_submit_btn">&#8592; Back to
                                Booking</button>
                        </div>
                        <script>
                            document.getElementById('nextStep1').addEventListener('click', function () {
                                // Move from Step 1 to Step 2
                                document.getElementById('step-1').classList.remove('active');
                                document.getElementById('step2').classList.remove('active');
                                document.getElementById('step2').classList.add('completed');
                                document.getElementById('step-2').classList.add('active');
                                document.getElementById('step3').classList.add('active');
                            });
                            document.getElementById('backStep1').addEventListener('click', function () {
                                // Move from Step 2 back to Step 1
                                document.getElementById('step-2').classList.remove('active');
                                document.getElementById('step3').classList.remove('active');
                                document.getElementById('step-1').classList.add('active');
                                document.getElementById('step2').classList.add('active');
                                // Optionally reset form fields in Step 2 if needed
                            });
                        </script>
                    </div>
                </div>
            </form>
            <?php if (session()->getFlashdata('success')): ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: '<?= session()->getFlashdata('success') ?>',
                            timer: 4000,
                            showConfirmButton: false
                        });
                    });
                </script>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>