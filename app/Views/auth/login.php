<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Kokeb Tech - Sign In</title>
    <style>
    body {
        background-color: #f8f9fa;
    }

    .login-container {
        width: 450px;
        margin-top: 50px;
        padding: 30px;
        border-radius: 8px;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .btn-info {
        background-color: #040720;
        border-color: #007bff;
        color: #f8f9fa;
    }

    .btn-info:hover {
        background-color: #040720;
        color: #FFA500;
        text-decoration: wavy;
        text-decoration: underline;
    }

    .navbar {
        background-color: #040720;
        padding: 0.5rem 1rem;
    }

    .navbar-brand {
        font-size: 24px;
        font-weight: bold;
        color: white;
    }

    .nav-link {
        color: white;
        font-weight: 500;
    }

    .nav-link:hover {
        color: #ffcc00;
    }
    </style>
</head>

<body>

    <!-- Login Header Section -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand text-white" href="/">Kokeb Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= site_url('auth/register'); ?>">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('auth'); ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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
                    <button type="submit" class="btn btn-info btn-block">Sign In</button>
                </div>
            </form>

            <div class="text-center">
                <span>Don't have an account?</span>
                <a href="<?= site_url('auth/register'); ?>"> Sign Up </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>