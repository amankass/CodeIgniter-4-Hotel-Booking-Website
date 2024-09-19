<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($blog['title']) ?></title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
        padding-top: 60px;
    }

    h1 {
        font-size: 2.5rem;
        color: #040720;
        margin-bottom: 20px;
        font-family: 'Roboto', sans-serif;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        display: flex;
        /* Ensure the container uses flexbox */
    }

    h1 {
        font-size: 2.5rem;
        color: #040720;
        margin-bottom: 20px;
        font-family: 'Roboto', sans-serif;
    }

    .text-muted {
        color: #999;
    }

    img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .btn-secondary {
        background-color: #040720;
        border-color: #007bff;
        color: #f8f9fa;
        border-radius: 5px;
        padding: 10px 20px;
        transition: background-color 0.3s;
    }

    .btn-secondary:hover {
        background-color: #0056b3;
        color: #FFA500;
        text-decoration: underline;
    }

    .col-md-8 {
        flex: 0 0 70%;
        max-width: 70%;
    }

    .recommended-posts {
        flex: 1;
        max-width: 30%;
        margin-left: 20px;
        margin-top: 3%;
    }

    .recommended-posts .card {
        margin-bottom: 20px;
        transition: transform 0.3s, box-shadow 0.3s;
        display: none;
    }

    .recommended-posts .card:first-child,
    .recommended-posts .card:nth-child(2) {
        display: block;
    }

    .recommended-posts .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .recommended-posts .card img {
        transition: transform 0.3s ease;
        height: 150px;
    }

    .recommended-posts .card:hover img {
        transform: scale(1.05);
    }

    .recommended-posts h3 {
        font-size: 1.8rem;
        color: #040720;
        margin-bottom: 15px;
        margin-left: 3%;
    }

    .recommended-posts .card {
        margin-bottom: 20px;
        width: 300px;
    }

    .card-title {
        font-size: 1rem;
        margin-bottom: 10px;
        color: #040720;
        font-weight: bold;
        font-family: 'Roboto', sans-serif;
    }

    .navbar {
        background-color: #040720;
        padding: 8px 100px;
    }

    .navbar-brand {
        font-size: 24px;
        font-weight: bold;
        color: #f8f9fa;
    }

    .navbar-brand:hover {
        text-decoration: wavy;
        color: #FFA500;
    }

    .navbar-nav .nav-link {
        color: white;
        font-weight: 500;
    }

    .card-text {
        font-size: 1.2rem;
        /* Increase the font size */
    }

    .navbar-nav .nav-link:hover {
        text-decoration: wavy;
        color: #FFA500;
    }

    .text {
        text-align: center;
        color: #040720;
        font-weight: bold;
    }

    .line {
        align-self: center;
        width: 100px;
        margin: 20px auto;
        background-color: #FF0000;
        color: red;
        height: 5px;
        border: none;
    }

    .likes-section .btn-link {
        color: #dc3545;
    }

    .likes-section .btn-link:hover {
        color: #b02a37;
    }

    .comments-section .fa-heart,
    .comments-section .fa-comments,
    .comments-section .fa-user,
    .comments-section .fa-comment,
    .comments-section .fa-paper-plane {
        margin-right: 0.5rem;
    }


    @media (max-width: 760px) {
        .container {
            padding: 10px;
        }

        .col-md-8,
        .col-md-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .recommended-posts {
            align-self: center;
            margin-top: 20px;

        }

        .navbar {
            padding: 8px 20px;
        }

        .navbar-brand {
            font-size: 20px;
        }

        .navbar-nav .nav-link {
            font-size: 14px;
        }

        h1 {
            font-size: 2rem;
        }

        .recommended-posts h3 {
            font-size: 1.5rem;
        }

        .card-title {
            font-size: 0.9rem;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Kokeb Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/blog">Blog</a>
                    </li>
                    <?php if (session()->get('logged_in')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('/dashboard'); ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('auth/logout'); ?>">Logout</a>
                    </li>
                    <?php else : ?>
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
    <?php
    function character_limiter($str, $limit)
    {
        return (strlen($str) > $limit) ? substr($str, 0, $limit) . '...' : $str;
    }
    ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <h1 class="text"><?= esc($blog['title']) ?></h1>
                <hr class="line">
                <?php if (!empty($blog['image'])) : ?>
                <img src="<?= base_url('uploads/' . esc($blog['image'])) ?>" alt="Blog Image" class="img-fluid mb-4">
                <?php endif; ?>
                <p class="card-text"><small>Created on: <?= esc($blog['created_at']) ?></small></p>
                <div class="card-text">
                    <?= htmlspecialchars_decode($blog['content']) ?>
                </div>
                <div class="text-center mt-4">
                    <a href="<?= site_url('blog') ?>" class="btn btn-secondary">Back to Blog</a>
                </div>
                <!-- Like Section -->
                <div class="likes-section mt-4">
                    <form id="likeForm" action="<?= site_url('blog/like/' . $blog['id']) ?>" method="post"
                        onsubmit="return checkLogin()">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn btn-link text-danger p-0">
                            <i class="fas fa-heart"></i> <?= count($likes) ?>
                        </button>
                    </form>
                </div>
                <!-- Comments Section -->
                <div class="comments-section mt-4">
                    <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <p>
                            <strong>
                                <i class="fas fa-user"></i> <?= esc($comment['user_id']) ?>:
                            </strong>
                            <?= esc($comment['content']) ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                    <form id="commentForm" action="<?= site_url('blog/comment/' . $blog['id']) ?>" method="post"
                        onsubmit="return checkLogin()">
                        <?= csrf_field(); ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-comment"></i>
                            </span>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary">
                            <i class="fas fa-paper-plane"></i> Post Comment
                        </button>
                    </form>
                </div>
                <!-- Modal for Login Required -->
                <div class="modal fade" id="loginRequiredModal" tabindex="-1" aria-labelledby="loginRequiredModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loginRequiredModalLabel">Login Required</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                You must be logged in to like or comment on this post.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="<?= site_url('auth') ?>" class="btn btn-primary">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recommended Posts Section -->
            <div class="col-md-4 recommended-posts">
                <h3>Recommended Posts</h3>
                <?php foreach ($relatedBlogs as $relatedBlog) : ?>
                <div class="card">
                    <?php if (!empty($relatedBlog['image'])) : ?>
                    <img src="<?= base_url('uploads/' . esc($relatedBlog['image'])) ?>" class="card-img-top"
                        alt="<?= esc($relatedBlog['title']) ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($relatedBlog['title']) ?></h5>
                        <p class="card-text">
                            <?= htmlspecialchars_decode (character_limiter ($relatedBlog['content'],100))?>
                        </p>
                        <a href="<?= site_url('blog/view/' . esc($relatedBlog['id'])) ?>" class="btn btn-secondary">Read
                            More</a>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="text-center">
                    <button id="loadMoreBtn" class="btn btn-secondary mt-3">Load More</button>
                    <button id="showLessBtn" class="btn btn-secondary mt-3" style="display:none;">Show Less</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    function checkLogin() {
        const isLoggedIn = <?= json_encode(session()->get('logged_in')) ?>;
        if (!isLoggedIn) {
            const modal = new bootstrap.Modal(document.getElementById('loginRequiredModal'));
            modal.show();
            return false;
        }
        return true;
    }
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const cards = document.querySelectorAll(".recommended-posts .card");
        const loadMoreBtn = document.getElementById("loadMoreBtn");
        const showLessBtn = document.getElementById("showLessBtn");
        let visibleCount = 2; // Number of initially visible cards
        const increment = 2; // Number of cards to show with each click
        // Function to update the visibility of cards
        function updateCardVisibility() {
            cards.forEach((card, index) => {
                if (index < visibleCount) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }
        // Initial visibility setup
        updateCardVisibility();
        loadMoreBtn.addEventListener("click", function() {
            visibleCount += increment; // Increase visible count by the increment
            if (visibleCount >= cards.length) {
                visibleCount = cards.length; // Ensure it doesn't exceed total cards
                loadMoreBtn.style.display = "none";
            } // Hide "Load More" when all cards are visible
            updateCardVisibility();
            showLessBtn.style.display = "inline-block"; // Show "Show Less" button
        });
        showLessBtn.addEventListener("click", function() {
            visibleCount = 2; // Reset visible count to the initial number
            updateCardVisibility();
            loadMoreBtn.style.display = "inline-block"; // Show "Load More" button again
            showLessBtn.style.display = "none"; // Hide "Show Less" button
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>