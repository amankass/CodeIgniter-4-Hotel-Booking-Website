<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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
    <title>User Dashboard</title>
    <link rel="stylesheet" href="/css/User_Dashbourd.css">
    <link rel="stylesheet" href="/css/Footer.css">

</head>

<body>
    <?php echo view('/Components/Header.php') ?>
    <!-- Dashbourds Container -->
    <section class="Profile">
        <div class="container Profile_Container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-sm Profile_card">
                        <div class="cover-photo-container position-relative">
                            <!-- Cover Photo -->
                            <img src="<?= base_url('uploads/' . (!empty($cover_photo) ? esc($cover_photo) : 'default-cover.jpg')); ?>"
                                alt="Cover Photo" class="cover-photo w-100"
                                style="height: 200px; object-fit: cover; border-radius: 10px;">
                            <!-- Camera Icon -->
                            <div class="camera-icon position-absolute" style="top: 10px; right: 10px; cursor: pointer;">
                                <i class="fas fa-camera fa-lg text-white"
                                    style="background-color: rgba(0, 0, 0, 0.6); padding: 10px; border-radius: 50%;"></i>
                            </div>
                            <!-- Hidden File Input -->
                            <form action="<?= site_url('/auth/cover_upload'); ?>" method="post"
                                enctype="multipart/form-data" id="coverUploadForm">
                                <?= csrf_field(); ?>
                                <input type="file" name="cover_photo" id="coverPhotoInput" class="d-none"
                                    accept="image/*" required>
                            </form>
                        </div>

                        <!-- JavaScript for Changing Cover Photo -->
                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                const cameraIcon = document.querySelector('.camera-icon');
                                const coverPhotoInput = document.getElementById('coverPhotoInput');

                                // Click event for camera icon
                                cameraIcon.addEventListener('click', () => {
                                    coverPhotoInput.click(); // Open file input dialog
                                });

                                // Automatically submit the form on file selection
                                coverPhotoInput.addEventListener('change', () => {
                                    document.getElementById('coverUploadForm').submit();
                                });
                            });
                        </script>

                        <div class="card-body">
                            <div class="Profile_image">
                                <?php if (!empty($avatar)): ?>
                                    <!-- Display user avatar if available -->
                                    <img src="<?= base_url('uploads/' . esc($avatar)); ?>" alt="User Avatar"
                                        class="rounded-circle img-fluid profile-avatar clickable-profile-picture"
                                        style="width: 150px; height: 150px;">
                                    <!-- User Title and Name Display -->
                                    <h5 class="my-2" style="font-size: 1.5rem; font-weight: 600;">
                                        <?= esc($user['title']) . ' ' . esc($user['first_name']) . ' ' . esc($user['middle_name']); ?>
                                    </h5>
                                    <p class="text-muted mb-1" style="margin: 0;">Hotel Client</p>
                                    <a href="<?= site_url('/edit_profile') ?>" class="btn edit_btn">Edit Profile</a>

                                <?php else: ?>
                                    <!-- Placeholder for avatar when not available -->
                                    <div class="placeholder-profile-picture rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 100px; height: 100px; background-color: #f0f0f0; cursor: pointer;">
                                        <i class="fas fa-user-circle fa-3x animated rotate-infinite"></i>
                                    </div>
                                <?php endif; ?>

                                <!-- Hidden file input for avatar upload -->
                                <form action="<?= site_url('auth/upload'); ?>" method="post"
                                    enctype="multipart/form-data" id="profileUploadForm">
                                    <?= csrf_field(); ?>
                                    <input type="file" name="avatar" id="avatarInput" class="d-none" accept="image/*"
                                        required>
                                </form>
                            </div>

                            <!-- JavaScript for Avatar Upload -->
                            <script>
                                document.addEventListener('DOMContentLoaded', () => {
                                    const avatarInput = document.getElementById('avatarInput');
                                    const profilePicture = document.querySelector('.clickable-profile-picture');
                                    const placeholder = document.querySelector('.placeholder-profile-picture');

                                    // Click event for profile picture or placeholder
                                    [profilePicture, placeholder].forEach(element => {
                                        if (element) {
                                            element.addEventListener('click', () => avatarInput.click());
                                        }
                                    });

                                    // Automatically submit the form on file selection
                                    avatarInput.addEventListener('change', () => {
                                        document.getElementById('profileUploadForm').submit();
                                    });
                                });
                            </script>
                            <!-- Add the Update Profile Section -->
                            <div class="profile_form2">
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0 fw-bold">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= esc($user['email']); ?></p>
                                        <!-- Displaying email -->
                                    </div>
                                </div>
                                <hr>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0 fw-bold">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= esc($user['phone']); ?></p>
                                        <!-- Displaying phone -->
                                    </div>
                                </div>
                                <hr>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0 fw-bold">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= esc($user['Gender']); ?></p>
                                        <!-- Displaying Gender -->
                                    </div>
                                </div>
                                <hr>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0 fw-bold">BirthDate</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= esc($user['date_of_birth']); ?></p>
                                        <!-- Displaying date_of_birth -->
                                    </div>
                                </div>
                                <hr>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0 fw-bold">Nationality</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= esc($user['nationality']); ?></p>
                                        <!-- Displaying nationality -->
                                    </div>
                                </div>
                                <hr>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0 fw-bold">Country</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= esc($user['country']); ?></p>
                                        <!-- Displaying Country -->
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0 fw-bold">City</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= esc($user['city']); ?></p>
                                        <!-- Displaying city -->
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0 fw-bold">State</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= esc($user['state']); ?></p>
                                        <!-- Displaying Country -->
                                    </div>
                                </div>
                                <hr>
                                <!-- Hidden User ID -->
                                <input type="hidden" name="id" value="<?= esc($user['id']); ?>">
                                <!-- Submit Button -->
                                <div class="Profile_buttons col-md-12 text-center">
                                    <button type="button" class="btn book_history_btn" id="bookingHistoryBtn">Booking
                                        History</button>
                                </div>


                                <!-- Booking History Section -->
                                <div id="bookingHistory" style="display: none; margin-top: 20px;">
                                    <h5>Your Booking History</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Booked Number</th>
                                                <th>Check-In</th>
                                                <th>Check-Out</th>
                                                <th>Adults</th>
                                                <th>Children</th>
                                                <th>Guests</th>
                                                <th>Total Price</th>
                                                <th>Booked date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bookingHistoryBody">
                                            <!-- Booking history will be dynamically injected here -->
                                        </tbody>
                                    </table>
                                </div>
                                <script>
                                    document.getElementById('bookingHistoryBtn').addEventListener('click', function () {
                                        const bookingHistorySection = document.getElementById('bookingHistory');
                                        const bookingHistoryBody = document.getElementById('bookingHistoryBody');

                                        // Check if the booking history section is currently displayed
                                        if (bookingHistorySection.style.display === 'block') {
                                            // Hide the booking history
                                            bookingHistorySection.style.display = 'none';
                                            // Change button text back to "Booking History"
                                            this.textContent = 'Booking History';
                                        } else {
                                            // Clear previous booking history
                                            bookingHistoryBody.innerHTML = '';

                                            // Fetch booking history
                                            fetch('<?= site_url('auth/booking-history') ?>')
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.error) {
                                                        bookingHistoryBody.innerHTML = `
                        <tr>
                            <td colspan="8" class="text-center text-danger">${data.error}</td>
                        </tr>`;
                                                    } else if (data.length > 0) {
                                                        data.forEach((booking, index) => {
                                                            const row = document.createElement('tr');
                                                            row.innerHTML = `
                            <td>${index + 1}</td> <!-- Displaying sequential booked number -->
                            <td>${booking.check_in}</td>
                            <td>${booking.check_out}</td>
                            <td>${booking.adults}</td>
                            <td>${booking.children}</td>
                            <td>${booking.number_of_guests}</td>
                            <td>${booking.total_price}</td>
                            <td>${booking.created_at}</td>`;
                                                            bookingHistoryBody.appendChild(row);
                                                        });
                                                    } else {
                                                        const row = document.createElement('tr');
                                                        row.innerHTML = `
                        <td colspan="8" class="text-center">No booking history available.</td>`;
                                                        bookingHistoryBody.appendChild(row);
                                                    }

                                                    // Show the section and change button text to "Show Less"
                                                    bookingHistorySection.style.display = 'block';
                                                    this.textContent = 'Show Less'; // Change button text
                                                })
                                                .catch(error => {
                                                    console.error('Error fetching booking history:', error);
                                                });
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<?php echo view('/Components/Footer.php'); ?>

</html>