<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <title>Create Blog Post</title>
    <style>
        .card-header {
            background-color: #040720;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            display: flex;
            justify-content: space-between;
        }
        .card-header h2 {
            text-align: center;
            margin: 0;
            color: #f4f6f9;
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

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 class="mb-0">CREATE BLOG POST</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('blog/store') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <label 
                                for="title" 
                                class="form-label">Title</label>
                                <input 
                                type="text" 
                                class="form-control" 
                                id="title" 
                                name="title" 
                                placeholder="Enter the title" 
                                required>
                            </div>
                            <div class="mb-3">
                                <label 
                                for="content" 
                                class="form-label">Content</label>
                                <textarea 
                                class="form-control MySummernote" 
                                id="content" 
                                name="content" 
                                rows="6" 
                                placeholder="Enter the blog content" 
                                required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input 
                                type="file" 
                                class="form-control" 
                                id="image" 
                                name="image" 
                                accept="image/*">
                            </div>
                            <div class="text-end">
                                <button 
                                type="submit" 
                                class="btn btn-info">Publish Post</button>
                            </div>
                        </form>
                    </div>
                    
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $(".MySummernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
</script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>