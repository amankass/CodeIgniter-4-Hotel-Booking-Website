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
    <title>Payment</title>
</head>

<body style="padding-top: 2.92rem;">
    <?php echo view('/Components/Header.php'); ?>

    <!-- Payment Methods Selection -->
    <div class="container" style="margin-top: 1rem; ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color: #800000;">
                        <h4>Select Payment Method</h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="row">
                            <!-- Payment Method Cards -->
                            <div class="col-4">
                                <div class="card payment-card" id="chapaCard" style="cursor: pointer;">
                                    <img src="/src/chapa.png" class="card-img-top" alt="Chapa" style="width: full; " />
                                    <div class="card-body">
                                        <p class="card-text text-center">CHAPA</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card payment-card" id="paypalCard" style="cursor: pointer;">
                                    <img src="/src/telebir.png" class="card-img-top" alt="PayPal" />
                                    <div class="card-body">
                                        <p class="card-text text-center">TELE BIRR</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="continuePayment" class="btn btn-primary w-100 mt-4"
                            style="background-color: #800000;" disabled>Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Chapa Payment Form -->
    <div class="container" id="chapaPaymentSection" style="margin-top: 2rem; display: none;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color: #800000;">
                        <h4>Chapa Payment Form</h4>
                    </div>
                    <div class="card-body">

                        <form id="paymentForm" method="POST" action="/bookings/Store_Payment">
                            <!-- User Input Form -->
                            <input type="hidden" class="form-control" id="id" name="userid"
                                value="<?= isset($user['id']) ? $user['id'] : '' ?>" placeholder="Enter your email"
                                required />
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="full_name"
                                    value="<?= isset($user['first_name']) ? $user['first_name'] : '' ?>"
                                    placeholder="Enter your full name" required readonly />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= isset($user['email']) ? $user['email'] : '' ?>"
                                    placeholder="Enter your email" required readonly />
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" class="form-control" id="amount" name="total_price"
                                    value="<?= isset($total_price) ? $total_price : '' ?>"
                                    placeholder="Enter the amount" required readonly />
                            </div>
                            <button type="button" id="payNowBtn" class="btn btn-primary w-100"
                                style="background-color: #800000;">Pay Now</button>
                        </form>
                        <!-- Hidden Chapa Form -->
                        <form id="chapaForm" method="POST" action="https://api.chapa.co/v1/hosted/pay"
                            style="display: none;">
                            <input type="hidden" name="public_key"
                                value="CHAPUBK_TEST-RcLyadAhbrplZDZMwvHFSTq2ICkILM8d" />
                            <input type="hidden" name="tx_ref" value="negade-tx-17660989" />
                            <input type="hidden" name="amount" id="chapaAmount" />
                            <input type="hidden" name="currency" value="ETB" />
                            <input type="hidden" name="email" id="chapaEmail" />
                            <input type="hidden" name="first_name" id="chapaFirstName" />
                            <input type="hidden" name="last_name" id="chapaLastName" />
                            <input type="hidden" name="title" value="Let us do this" />
                            <input type="hidden" name="description" value="Paying with Confidence with cha" />
                            <input type="hidden" name="logo" value="https://chapa.link/asset/images/chapa_swirl.svg" />
                            <input type="hidden" name="callback_url" value="https://example.com/callbackurl" />
                            <input type="hidden" name="return_url" value="https://example.com/returnurl" />
                            <input type="hidden" name="meta[title]" value="test" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedMethod = '';
        // Add click listeners to payment method cards
        document.querySelectorAll('.payment-card').forEach(card => {
            card.addEventListener('click', function () {
                // Remove active class from all cards
                document.querySelectorAll('.payment-card').forEach(c => c.classList.remove('border-primary'));

                // Highlight selected card
                this.classList.add('border-primary');
                // Enable continue button
                document.getElementById('continuePayment').disabled = false;
                // Set selected method
                selectedMethod = this.id.replace('Card', '');
            });
        });
        // Continue button logic
        document.getElementById('continuePayment').addEventListener('click', function () {
            if (selectedMethod === 'chapa') {
                document.getElementById('chapaPaymentSection').style.display = 'block';
                window.scrollTo({ top: document.getElementById('chapaPaymentSection').offsetTop, behavior: 'smooth' });
            } else {
                alert(`${selectedMethod} is not supported yet.`);
            }
        });
        document.getElementById('payNowBtn').addEventListener('click', function () {
            // Get values from Payment Form
            const fullName = document.getElementById('fullName').value.trim();
            const email = document.getElementById('email').value.trim();
            const amount = document.getElementById('amount').value.trim();
            const userId = document.getElementById('id').value.trim(); // Fetch the id value

            if (!fullName || !email || !amount || !userId) {
                alert('Please fill in all required fields.');
                return;
            }

            // Split full name into first and last name
            const nameParts = fullName.split(' ');
            const firstName = nameParts[0];
            const lastName = nameParts.slice(1).join(' ') || 'N/A';

            // Perform an AJAX request to store payment information
            fetch('/bookings/Store_Payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    full_name: fullName,
                    email: email,
                    amount: amount,
                    user_id: userId, // Include the user ID
                }),
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error('Failed to store payment information.');
                    }
                    return response.json(); // Assuming your server responds with JSON
                })
                .then((data) => {
                    console.log('Payment information stored successfully.');
                    // Populate Chapa Form
                    document.getElementById('chapaFirstName').value = firstName;
                    document.getElementById('chapaLastName').value = lastName;
                    document.getElementById('chapaEmail').value = email;
                    document.getElementById('chapaAmount').value = amount;

                    // Submit the Chapa Form
                    document.getElementById('chapaForm').submit();
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert('Failed to process payment. Please try again.');
                });
        });

    </script>
</body>

</html>