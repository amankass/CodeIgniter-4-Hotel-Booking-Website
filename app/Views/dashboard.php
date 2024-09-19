<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>User Dashboard</title>
    <style>
    body {
        background-color: #f4f6f9;
        padding-top: 50px;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-top: 5%;
    }

    .card-header {
        background-color: #040720;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        display: flex;
        margin-top: 0%;
        justify-content: space-between;
        align-items: center;
    }

    .card-header h4 {
        margin: 0;
        color: #f4f6f9;
    }

    .card-body h5 {
        color: #040720;
    }

    .form1 {
        margin-top: -35px;
    }

    .btn-custom {
        margin-top: 15px;
        border-radius: 30px;
        padding: 10px 20px;
    }

    .btn-custom2 {
        margin-top: 15px;
        border-radius: 30px;
        padding: 10px 20px;
    }

    .btn-custom-success {
        background-color: #040720;
        border-color: #28a745;
        color: #f4f6f9;
    }

    .btn-custom-danger {
        background-color: #040720;
        border-color: #28a745;
        color: #f4f6f9;
    }

    .btn-custom:hover {
        color: #FFA500;
        background-color: #040720;
        text-decoration: wavy;
    }

    .btn-custom2:hover {
        color: #FFA500;
        background-color: #040720;
        text-decoration: wavy;
    }

    .button-group {
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
    }

    .button-group2 {
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
    }

    .alert {
        display: none;
        transition: opacity 0.5s ease;
    }

    .alert.show {
        display: block;
        opacity: 1;
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
                        <a class="nav-link text-white" aria-current="page" href="/">Home</a>
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
<!-- Dashbourds Container -->
    <div class="container" style="margin-top: 35px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4>User Dashboard</h4>
                        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-custom btn-custom-danger">Logout</a>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info text-center show" id="welcomeAlert">
                            Welcome, <?= esc($user_name); ?>!
                        </div>
                        <h5 class="text-center fw-bold">USER DETAIL</h5>
                        <?php if (!empty($avatar)): ?>
                        <img src="<?= base_url('uploads/' . esc($avatar)); ?>" alt="Profile Picture"
                            class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                        <?php else: ?>
                        <p class="text-center">No profile picture uploaded.</p>
                        <?php endif; ?>
                        <h5 class="mt-4 text-left">Profile Picture</h5>
                        <div class="list-group mb-4">
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-3 fw-bold">User ID:</div>
                                    <div class="col-9"><?= esc($user_id); ?></div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-3 fw-bold">Name:</div>
                                    <div class="col-9"><?= esc($user_name); ?></div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-3 fw-bold">Email:</div>
                                    <div class="col-9"><?= esc($user_email); ?></div>
                                </div>
                            </div>
                        </div>
                <!-- Listing odf Users Privios Posts -->
                        <h5>Your Blog Posts</h5>
                        <div class="list-group mb-4">
                            <?php foreach ($user_blogs as $blog): ?>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-9">
                                        <strong><?= esc($blog['title']); ?></strong><br>
                                        <small>Created on: <?= esc($blog['created_at']); ?></small>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="<?= site_url('blog/edit/' . $blog['id']); ?>"
                                            class="btn btn-primary btn-sm" style="margin-top: 5px;">Edit</a>
                                        <form action="<?= site_url('blog/delete/' . $blog['id']); ?>" method="post"
                                            style="display:inline;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm" style="margin-top: 5px;">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <!-- Upload Profile Photo -->
                        <h5>Upload Profile Picture</h5>
                        <div class="button-group d-flex justify-content-between align-items-center mb-4">
                            <form action="<?= site_url('auth/upload'); ?>" method="post" enctype="multipart/form-data"
                                class="me-2">
                                <?= csrf_field(); ?>
                                <div class="form1">
                                    <input type="file" name="avatar" class="form-control" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-custom btn-custom-success">Upload</button>
                            </form>
                            <div class="button-group2 d-flex justify-content-between align-items-center mb-4">
                                <a href="<?= site_url('blog/create'); ?>"
                                    class="btn btn-custom2 btn-custom-danger">Create Blog</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Function to hide the alert after a few seconds
    setTimeout(function() {
        var alert = document.getElementById('welcomeAlert');
        alert.classList.remove('show'); // Remove the show class
        alert.style.opacity = '0'; // Fade out effect
    }, 1500); // Adjust the time (1500)
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>