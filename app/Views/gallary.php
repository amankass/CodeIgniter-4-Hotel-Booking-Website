<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Lightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Gallery</title>
    <link rel="stylesheet" href="/css/Gallery_Contact.css">
    <link rel="stylesheet" href="/css/Footer.css">
</head>

<body>
    <?php echo view('/Components/Header.php'); ?>
    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <h1 class="gallery-title">Our Gallery</h1>
            <div class="row gy-4">
                <!-- Gallery item -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="/src/image1.jpg" data-toggle="lightbox" data-gallery="gallery" class="gallery-item">
                        <img src="/src/image1.jpg" alt="Gallery Image 1" class="img-fluid">
                        <div class="gallery-caption">
                            <p>Beautiful Scenery</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="/src/image2.jpg" data-toggle="lightbox" data-gallery="gallery" class="gallery-item">
                        <img src="/src/image2.jpg" alt="Gallery Image 2" class="img-fluid">
                        <div class="gallery-caption">
                            <p>Luxurious Accommodation</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="/src/image3.jpg" data-toggle="lightbox" data-gallery="gallery" class="gallery-item">
                        <img src="/src/image3.jpg" alt="Gallery Image 3" class="img-fluid">
                        <div class="gallery-caption">
                            <p>Stunning Views</p>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="/src/image4.jpg" data-toggle="lightbox" data-gallery="gallery" class="gallery-item">
                        <img src="/src/image4.jpg" alt="Gallery Image 4" class="img-fluid">
                        <div class="gallery-caption">
                            <p>Peaceful Environment</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="/src/image5.jpg" data-toggle="lightbox" data-gallery="gallery" class="gallery-item">
                        <img src="/src/image5.jpg" alt="Gallery Image 5" class="img-fluid">
                        <div class="gallery-caption">
                            <p>Relax and Unwind</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="/src/image6.jpg" data-toggle="lightbox" data-gallery="gallery" class="gallery-item">
                        <img src="/src/image1.jpg" alt="Gallery Image 6" class="img-fluid">
                        <div class="gallery-caption">
                            <p>Premium Facilities</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="/src/image4.jpg" data-toggle="lightbox" data-gallery="gallery" class="gallery-item">
                        <img src="/src/image1.jpg" alt="Gallery Image 4" class="img-fluid">
                        <div class="gallery-caption">
                            <p>Peaceful Environment</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="/src/image5.jpg" data-toggle="lightbox" data-gallery="gallery" class="gallery-item">
                        <img src="/src/image1.jpg" alt="Gallery Image 5" class="img-fluid">
                        <div class="gallery-caption">
                            <p>Relax and Unwind</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="/src/image6.jpg" data-toggle="lightbox" data-gallery="gallery" class="gallery-item">
                        <img src="/src/image1.jpg" alt="Gallery Image 6" class="img-fluid">
                        <div class="gallery-caption">
                            <p>Premium Facilities</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="Gallery Image" id="lightboxImage" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <?php echo view('/Components/Footer.php'); ?>
</body>

</html>