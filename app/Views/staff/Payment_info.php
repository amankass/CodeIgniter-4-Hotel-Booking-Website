<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Staff Dashboard - Payment Information</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/src/download.png">

    <!-- CSS Libraries -->
    <!-- Boxicons for icons -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/staff.css">

    <!-- JavaScript Libraries -->
    <!-- Chart.js for visualizations -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jQuery (required by some libraries) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body>
    <?php echo view('/Components/staff_sidibar.php'); ?>
    <section class="home-section">
        <!-- Main Content -->
        <div class="main-content">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered caption-top" id="Event_Table">
                    <caption class="fw-bold" style="color:#11101d">Payment Records</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($payments)): ?>
                            <?php foreach ($payments as $index => $payment): ?>
                                <tr>
                                    <td><?= esc($index + 1) ?></td> <!-- Incremented index for row number -->
                                    <td><?= esc($payment['full_name']) ?></td> <!-- Full Name -->
                                    <td><?= esc($payment['email']) ?></td> <!-- Email -->
                                    <td><?= esc($payment['amount']) ?></td> <!-- Amount -->
                                    <td><?= esc(date('Y-m-d H:i:s', strtotime($payment['create_at']))) ?></td>
                                    <!-- Created At -->
                                    <td>
                                        <div class="d-flex">
                                            <!-- View Button -->
                                            <a href="javascript:void(0);" class="btn btn-sm viewPayment"
                                                data-id="<?= esc($payment['id']) ?>"
                                                data-full-name="<?= esc($payment['full_name']) ?>"
                                                data-email="<?= esc($payment['email']) ?>"
                                                data-amount="<?= esc($payment['amount']) ?>"
                                                data-created-at="<?= esc($payment['create_at']) ?>" title="View">
                                                <img src="/src/eye.png" width="26" height="26" alt="View">
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="<?= site_url('/StaffController/delete_Payment/' . $payment['id']) ?>"
                                                class="btn btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this payment record?');"
                                                title="Delete">
                                                <img src="/src/delete.png" width="26" height="26" alt="Delete">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No payment records found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal Structure -->
            <div class="modal fade" id="paymentDetailsModal" tabindex="-1" aria-labelledby="paymentDetailsLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="paymentDetailsLabel">Payment Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label=""></button>
                        </div>
                        <div class="modal-body">
                            <!-- Payment details will be displayed here -->
                            <table class="table table-bordered">
                                <tr>
                                    <th>Full Name:</th>
                                    <td id="modalPaymentFullName"></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td id="modalPaymentEmail"></td>
                                </tr>
                                <tr>
                                    <th>Amount:</th>
                                    <td id="modalPaymentAmount"></td>
                                </tr>
                                <tr>
                                    <th>Created At:</th>
                                    <td id="modalPaymentCreatedAt"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Modal trigger functionality to show payment details
                document.querySelectorAll('.viewPayment').forEach(button => {
                    button.addEventListener('click', function () {
                        document.getElementById('modalPaymentFullName').textContent = this.dataset.fullName;
                        document.getElementById('modalPaymentEmail').textContent = this.dataset.email;
                        document.getElementById('modalPaymentAmount').textContent = this.dataset.amount;
                        document.getElementById('modalPaymentCreatedAt').textContent = this.dataset.createdAt;
                        // Show the modal
                        const modal = new bootstrap.Modal(document.getElementById('paymentDetailsModal'));
                        modal.show();
                    });
                });
                // Refresh page when modal is closed
                document.getElementById('paymentDetailsModal').addEventListener('hidden.bs.modal', function () {
                    location.reload(); // Refresh the page
                });
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <!-- DataTables JS -->
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#Event_Table').DataTable();
                });
            </script>
</body>

</html>