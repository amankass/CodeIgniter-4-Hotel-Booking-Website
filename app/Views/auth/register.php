<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/Login_Signup.css">
        <title>Booking SignUp</title>
</head>

<body>
<?php echo view('/Components/Header.php'); ?>
    <div class="row justify-content-center signup_ui">
        <div class="col-md-6 registration-container">
            <h4 class="text-center">Sign Up</h4>
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
<form action="<?= base_url('auth/registerUser') ?>" method="post" class="mb-3 row g-3">
                <?= csrf_field(); ?>
                <div class="form-group mb-3 col-md-6">
                    <label for="first_name">First Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="first_name" placeholder="Enter first Name" required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'first_name') : '' ?>
                    </span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="middle_name">Middle Name(optional)</label>
                    <input type="text" class="form-control" name="middle_name" placeholder="Enter middle Name" >
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'middle_name') : '' ?>
                    </span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="last_name">Last Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="last_name" placeholder="Enter last Name" required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'last_name') : '' ?>
                    </span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="phone">Phone<span style="color: red;">*</span></label>
                    <input type="tel" id="phone" class="form-control" name="phone" placeholder="Enter Phone" required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'phone') : '' ?>
                    </span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="email">Email<span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'email') : '' ?>
                    </span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="password">Password<span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password"
                        required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'password') : '' ?>
                    </span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <button type="submit" class="btn signup_btn btn-block">Sign Up</button>
                </div>
            </form>
            <div class="text-start">
                <span>I already have an account:</span>
                <a href="<?= site_url('auth'); ?>"> Login </a>
            </div>
        </div>
    </div>
</body>
</html>