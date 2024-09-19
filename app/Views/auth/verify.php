<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Verify OTP</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Verify Your Email</h2>
        <form action="<?= site_url('auth/verifyOtp'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="otp" class="form-label">Enter OTP</label>
                <input type="text" name="otp" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Verify</button>
        </form>
    </div>
</body>

</html>