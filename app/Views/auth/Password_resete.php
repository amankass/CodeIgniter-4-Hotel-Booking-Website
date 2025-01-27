<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/Login_Signup.css">
    <title>Booking Resete password</title>
</head>

<body>
    <?php echo view('/Components/Header.php'); ?>
    <!-- Login Header Section -->
    <div class="row justify-content-center">
        <div class="col-md-6 login-container">
            <h4 class="text-center">Reset Password</h4>
            <hr>
            <!-- Display Success Message -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <!-- Display Failure Message -->
            <?php if (session()->getFlashdata('fail')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('fail'); ?>
                </div>
            <?php endif; ?>

            <!-- Reset Password Form -->
            <form action="<?= base_url('/auth/resetPassword') ?>" method="post" class="mb-3">
                <?= csrf_field(); ?>
                <!-- Reset Code Field -->
                <div class="form-group mb-3">
                    <label for="resetCode">Reset Code</label>
                    <input type="text" class="form-control" name="resetCode" placeholder="Enter Reset Code" required>
                    <span
                        class="text-danger"><?= isset($validation) ? display_form_errors($validation, 'resetCode') : '' ?></span>
                </div>

                <!-- New Password Field -->
                <div class="form-group mb-3">
                    <label for="newPassword">New Password</label>
                    <input type="password" class="form-control" name="newPassword" placeholder="Enter New Password"
                        required>
                    <span
                        class="text-danger"><?= isset($validation) ? display_form_errors($validation, 'newPassword') : '' ?></span>
                </div>

                <!-- Confirm Password Field -->
                <div class="form-group mb-3">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword"
                        placeholder="Confirm New Password" required>
                    <span
                        class="text-danger"><?= isset($validation) ? display_form_errors($validation, 'confirmPassword') : '' ?></span>
                </div>

                <!-- Submit Button -->
                <div class="form-group mb-3">
                    <button type="submit" class="btn login_btn btn-custom-success">Reset Password</button>
                </div>

            </form>
        </div>
    </div>


</body>


</html>