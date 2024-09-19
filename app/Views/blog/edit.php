<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <title>Edit Blog Post</title>
    <style>
    .card-header {
        background-color: #040720;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        display: flex;
        justify-content: space-between;
    }

    .card-header h2 {
        color: antiquewhite;
    }

    .btn {
        background-color: #040720;
        border-color: #007bff;
        color: #f8f9fa;
    }

    .btn:hover {
        background-color: #040720;
        color: #FFA500;
        text-decoration: wavy;
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header text-dark">
                        <h2 class="mb-10">EDIT BLOG POST</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('blog/update/' . $blog['id']) ?>" method="post"
                            enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="<?= esc($blog['title']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control MySummernote" id="content" name="content" rows="6"
                                    required><?= htmlspecialchars_decode($blog['content']) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Current Image</label><br>
                                <?php if (!empty($blog['image'])): ?>
                                <img src="<?= base_url('uploads/' . esc($blog['image'])) ?>" alt="Current Blog Image"
                                    class="img-fluid" style="max-width: 100%; height: auto;">
                                <?php else: ?>
                                <p>No image uploaded.</p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload New Image (optional)</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn">Update Post</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>