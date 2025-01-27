<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/Gallery_Contact.css">
    <link rel="stylesheet" href="/css/Footer.css">
    <title>Contact Us</title>
</head>

<body>
    <?php echo view('/Components/Header.php'); ?>
    <div class="slider">
        <div class="slides restourant_slides">
            <div class="custom-carousel-item">
            <img src="/src/image2.jpg" alt="Image 1">
            <div class="custom-carousel-caption">
                <h5>GET IN TOUCH</h5>
                <a href="#explor" class="Explore_btn">Explore More</a>
            </div>
            </div>
        </div>
    </div>

    <?php
    if (!empty(session()->getFlashData('success'))) {
        ?>
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="/images/icon.png" width="20" height="20" class="rounded me-2" alt="...">
                    <strong class="me-auto">International Hotel</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <p class="fw-bold"> <?= session()->getFlashData('success') ?>
                        <img src="/images/checkmark.png" width="25" height="25" class="ms-1">
                    </p>

                    <div class="progress mt-1">
                        <div class="progress-bar bg-success" id="toastProgressBar" role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else if (!empty(session()->getFlashData('erorr'))) {
        ?>
            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="/images/icon.png" width="20" height="20" class="rounded me-2" alt="...">
                        <strong class="me-auto">International Hotel</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <p class="fw-bold"> <?= session()->getFlashData('erorr') ?>
                            <img src="/images/wrong.png" width="25" height="25" class="ms-1">
                        </p>
                        <div class="progress mt-1">
                            <div class="progress-bar bg-danger" id="toastProgressBar" role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    ?>

    <script>
        // Initialize the toast and progress bar
        document.addEventListener("DOMContentLoaded", function () {
            var toastElement = document.getElementById("liveToast");
            if (toastElement) {
                var toast = new bootstrap.Toast(toastElement, { delay: 5000 }); // Duration of the toast in milliseconds (5 seconds here)
                toast.show();

                // Animate the progress bar
                var progressBar = document.getElementById("toastProgressBar");
                progressBar.style.width = "100%";
                progressBar.style.transition = "width 5s linear"; // Match the toast duration

                // Start countdown animation
                setTimeout(() => {
                    progressBar.style.width = "0%";
                }, 0);
            }
        });
    </script>

    <!-- Contact Form and Info Section -->
    <section class="contact-section py-5">
        <div class="container">
            <div class="row">
                <!-- Contact Form -->
                <div class="col-md-6" data-aos="fade-right">
                    <div class="contact-form">
                        <h3 class="mb-4 fw-bold" style="font-family: Times New Roman, Times, serif;">CONTACT US</h3>
                        <form id="contactForm" action="<?= base_url('Home/contact') ?>" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">FULL NAME</label>
                                <input type="text" class="form-control" id="name" name="full_name"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">EMAIL</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="name@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label fw-bold">SUBJECT</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label fw-bold">MESSAGE</label>
                                <textarea class="form-control" id="message" name="message" rows="5"
                                    placeholder="Write your message here..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-info send_btn">SEND</button>
                        </form>
                    </div>
                </div>
                <!-- Contact Information -->
                <div class="col-md-6" data-aos="fade-left">
                    <div class="shadow rounded bg-gray">
                        <div class="contact-info" data-aos="fade-left">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7491.223225082862!2d38.84012995841478!3d9.009943772675943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b8599d7d79377%3A0x2dd7aafdaac3b76e!2skokeb%20technologies!5e1!3m2!1sen!2set!4v1726288499722!5m2!1sen!2set"
                                width="535" height="578" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <?php echo view('/Components/Footer.php'); ?>
</body>

</html>