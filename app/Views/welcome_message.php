<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Kokeb Tech - Home</title>
    <style>
    body {
        background-color: #f8f9fa;
        padding-top: 50px;
    }

    .navbar {
        background-color: #040720;
    }

    .navbar-brand {
        font-size: 24px;
        font-weight: bold;
        color: #f8f9fa;
    }

    .nav-link {
        color: white;
        font-weight: 500;
    }

    .navbar-brand:hover {
        text-decoration: wavy;
        color: #FFA500;
    }

    .nav-link:hover {
        text-decoration: wavy;
        color: #FFA500;
    }

    .hero {
        background-image: url('hero-bg.jpg');
        background-size: cover;
        background-position: center;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }

    .hero h1 {
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #040720;
    }

    .hero p {
        font-size: 24px;
        margin-bottom: 30px;
        color: #040720;
    }

    .btn-primary {
        background-color: #040720;
        border-color: #007bff;
        color: #f8f9fa;
    }

    .btn-primary:hover {
        background-color: #040720;
        color: #FFA500;
        text-decoration: wavy;
        text-decoration: underline;
    }

    .features {
        padding: 50px 0;
    }

    .feature-item {
        text-align: center;
        margin-bottom: 30px;
        color: #040720;
    }

    .feature-item i {
        font-size: 48px;
        color: #007bff;
        margin-bottom: 20px;
    }

    .feature-item h3 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .footer {
        background-color: #040720;
        color: white;
        padding: 20px 0;
    }

    .btn-primary {
        background-color: #040720;
        color: white;
    }

    i {
        transition: color 0.3s ease, transform 0.3s ease;
    }

    i:hover {
        color: #FFA500;
        transform: scale(1.2);
    }
    </style>
</head>

<body>
    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Kokeb Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/blog">Blog</a>
                    </li>
                    <?php if (session()->get('logged_in')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('/dashboard'); ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('auth/logout'); ?>">Logout</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('auth/register'); ?>">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('auth'); ?>">Login</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero">
        <div class="container text-center">
            <h1>Welcome to Kokeb Tech</h1>
            <p>Your partner in innovative tech solutions</p>
            <a href="<?= site_url('auth/register'); ?>" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </div>
    <div class="features">
        <div class="container">
            <h2 class="text-center mb-5">Our Services</h2>
            <div class="row">
                <div class="col-md-4 feature-item">
                    <i class="fas fa-code"></i>
                    <h3>Custom Development</h3>
                    <p>We create tailored solutions to meet your unique needs.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <i class="fas fa-chart-line"></i>
                    <h3>Data Analytics</h3>
                    <p>Gain valuable insights from your data with our analytics tools.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <i class="fas fa-mobile-alt"></i>
                    <h3>Mobile Apps</h3>
                    <p>Reach your customers on the go with our mobile app development.</p>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        <div class="container">
            <p>&copy; 2024 Kokeb Tech. All rights reserved.</p>
            <p><a href="#" class="text-white">Privacy Policy</a> | <a href="#" class="text-white">Terms of Service</a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>