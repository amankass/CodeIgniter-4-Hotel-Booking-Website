<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/Login_Signup.css">
    <title>Booking Sign_In</title>
</head>

<body>
    <?php echo view('/Components/Header.php'); ?>
    <!-- Login Header Section -->
    <div class="row justify-content-center">
        <div class="col-md-6 login-container">
            <h4 class="text-center">Sign In</h4>
            <hr>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('fail')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('fail'); ?>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <div id="login-form">
                <form action="<?= base_url('auth/loginUser') ?>" method="post" class="mb-3">
                    <?= csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                        <span
                            class="text-danger"><?= isset($validation) ? display_form_errors($validation, 'email') : '' ?></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your Password"
                            required>
                        <span
                            class="text-danger"><?= isset($validation) ? display_form_errors($validation, 'password') : '' ?></span>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn login_btn btn-custom-success">Sign In</button>
                    </div>
                    <div class="text-start" style="margin-top: -3%;">
                        <span>Don't have an account?</span>
                        <a href="<?= site_url('auth/register'); ?>" style="text-decoration: none;"> Sign Up </a>
                    </div>
                    <div class="text-end forget_link">
                        <a href="#" id="show-forgot-password" style="text-decoration: none;"> Forget Password ?</a>
                    </div>
                </form>
            </div>

            <!-- Forgot Password Form (Initially Hidden) -->
            <div id="forgot-password-form" style="display: none;">
                <!-- <h4 class="text-center">Forgot Password</h4> -->
                <form method="post" action="/auth/forgotPassword" class="mb-3">
                    <?= csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="email">Enter your email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn login_btn">Send OTP</button>
                    </div>
                    <div class="text-end">
                        <a href="#" id="back-to-login" style="text-decoration: none;">Back to Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to toggle between forms
        document.getElementById('show-forgot-password').addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default link behavior
            document.getElementById('login-form').style.display = 'none'; // Hide login form
            document.getElementById('forgot-password-form').style.display = 'block'; // Show forgot password form
        });

        document.getElementById('back-to-login').addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default link behavior
            document.getElementById('forgot-password-form').style.display = 'none'; // Hide forgot password form
            document.getElementById('login-form').style.display = 'block'; // Show login form
        });
    </script>
</body>


</html>