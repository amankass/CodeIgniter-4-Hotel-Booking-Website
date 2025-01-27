<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/Login_Signup.css">
    <title>Verify Otp</title>
</head>

<body>
    <?php echo view('/Components/Header.php'); ?>
    <div class="container mt-5 d-flex justify-content-center align-items-center">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4">Verify Your Email</h3>
        <form action="<?= site_url('auth/verifyOtp'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="otp" class="form-label fw-bold">Enter OTP</label>
                <input 
                    type="text" 
                    name="otp" 
                    id="otp" 
                    class="form-control" 
                    placeholder="Enter the 6-digit code" 
                    required 
                    maxlength="6" 
                    pattern="\d{6}">
                <div class="form-text">Please enter the OTP sent to your email.</div>
            </div>
            <button type="submit" class="btn login_btn ">Verify</button>
        </form>
    </div>
</div>

</body>

</html>