<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmation</h1>
    <?php if (isset($successMessage)): ?>
        <p><?= esc($successMessage) ?></p>
    <?php else: ?>
        <p>Your booking was successful!</p>
    <?php endif; ?>
    
    <a href="/accommodations">Back to Accommodations</a>
</body>
</html>
