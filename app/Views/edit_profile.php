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
    <link rel="stylesheet" href="/css/Footer.css">
    <link rel="stylesheet" href="/css/User_Dashbourd.css">
</head>

<body>
    <?php echo view('/Components/Header.php'); ?>
    <!-- Dashbourds Container -->
    <div class="container Profile_Container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm Profile_card">
                    <div class="Profile_card_header">
                        <h4>Update Profile</h4>
                        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-warning Logout_btn">Logout</a>
                        
                    </div>
                    <div class="card-body">
                        
                        <div class="profile_form">
                            <form id="updateForm" method="post" action="<?= site_url('auth/update'); ?>"
                                class="row g-3">
                                <?= csrf_field(); ?>
                                <!-- Title -->
                                <div class="mb-3 col-md-6">
                                    <label for="title" class="form-label fw-bold">Title <span
                                            style="color: red;">*</span></label>
                                    <select class="form-select" name="title" id="title" required>
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="Mr." <?= (esc($user['title']) === 'Mr.') ? 'selected' : ''; ?>>Mr.
                                        </option>
                                        <option value="Ms." <?= (esc($user['title']) === 'Ms.') ? 'selected' : ''; ?>>Ms.
                                        </option>
                                        <option value="Miss" <?= (esc($user['title']) === 'Miss') ? 'selected' : ''; ?>>
                                            Miss</option>
                                        <option value="Mrs." <?= (esc($user['title']) === 'Mrs.') ? 'selected' : ''; ?>>
                                            Mrs.</option>
                                    </select>
                                </div>
                                <!-- First Name -->
                                <div class="mb-3 col-md-6">
                                    <label for="first_name" class="form-label fw-bold">First Name <span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="first_name"
                                        value="<?= esc($user['first_name']); ?>" required>
                                </div>

                                <!-- Middle Name -->
                                <div class="mb-3 col-md-6">
                                    <label for="middle_name" class="form-label fw-bold">Middle Name(optional)</label>
                                    <input type="text" class="form-control" name="middle_name"
                                        value="<?= esc($user['middle_name']); ?>">
                                </div>

                                <!-- Last Name -->
                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label fw-bold">Last Name <span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="last_name"
                                        value="<?= esc($user['last_name']); ?>" required>
                                </div>

                                <!-- Gender -->
                                <div class="mb-3 col-md-6">
                                    <label for="gender" class="form-label fw-bold">Gender <span
                                            style="color: red;">*</span></label>
                                    <select class="form-select" id="gender" name="Gender" required>
                                        <option value="Male" <?= $user['Gender'] == 'Male' ? 'selected' : '' ?>>Male
                                        </option>
                                        <option value="Female" <?= $user['Gender'] == 'Female' ? 'selected' : '' ?>>Female
                                        </option>
                                        <option value="Other" <?= $user['Gender'] == 'Other' ? 'selected' : '' ?>>Other
                                        </option>
                                    </select>
                                </div>

                                <!-- Email -->
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label fw-bold">Email <span
                                            style="color: red;">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                        value="<?= esc($user['email']); ?>" required>
                                </div>

                                <!-- Phone -->
                                <div class="mb-3 col-md-6">
                                    <label for="phone" class="form-label fw-bold">Phone <span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="phone"
                                        value="<?= esc($user['phone']); ?>" required>
                                </div>

                                <!-- Birthdate -->
                                <div class="mb-3 col-md-6">
                                    <label for="date_of_birth" class="form-label fw-bold">Birthdate <span
                                            style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="date_of_birth"
                                        value="<?= esc($user['date_of_birth']); ?>" required>
                                </div>

                                <!-- Nationality -->
                                <div class="mb-3 col-md-6">
                                    <label for="nationality" class="form-label fw-bold">Nationality <span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nationality"
                                        value="<?= esc($user['nationality']); ?>" required>
                                </div>

                                <!-- Country -->
                                <div class="mb-3 col-md-6">
                                    <label for="country" class="form-label fw-bold">Country <span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="country"
                                        value="<?= esc($user['country']); ?>" required>
                                </div>

                                <!-- City -->
                                <div class="mb-3 col-md-6">
                                    <label for="city" class="form-label fw-bold">City</label>
                                    <input type="text" class="form-control" name="city"
                                        value="<?= esc($user['city']); ?>">
                                </div>
                                <!-- State -->
                                <div class="mb-3 col-md-6">
                                    <label for="State" class="form-label fw-bold">State</label>
                                    <input type="text" class="form-control" name="State"
                                        value="<?= esc($user['state']); ?>">
                                </div>
                                <!-- Hidden User ID -->
                                <input type="hidden" name="id" value="<?= esc($user['id']); ?>">
                                <!-- Submit Button -->
                                <div class="Profile_buttons col-md-12 text-center">
                                    <button type="submit" class="btn update_btn">Update</button>
                                    <!-- Changed to submit button -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php echo view('/Components/Footer.php'); ?>

</html>