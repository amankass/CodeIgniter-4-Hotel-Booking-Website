<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Page Title -->
    <title>Staff Dashboard - Event Messages</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    
    <!-- CSS Libraries -->
    <!-- Boxicons for icons -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/staff.css">
    
    <!-- JavaScript Libraries -->
    <!-- Chart.js for data visualizations -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
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
                    <caption class="fw-bold" style="color:#11101d">Event Messages</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Venue</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($accommodations)): ?>
                            <?php foreach ($accommodations as $index => $event): ?>
                                <tr style="<?= ($event['is_seen'] == 0) ? 'font-weight: bold;' : ''; ?>">
                                    <td><?= esc($index + 1) ?></td> <!-- Incrementing index for row number -->
                                    <td><?= esc($event['first_name'] . ' ' . $event['last_name']) ?></td> <!-- First Name -->
                                    <td><?= esc($event['phone']) ?></td> <!-- Phone -->
                                    <td><?= esc($event['email']) ?></td> <!-- Email -->
                                    <td><?= esc($event['venue']) ?></td> <!-- Venue -->
                                    <td><?= esc(substr($event['message'], 0, 50)) ?>...</td> <!-- Shortened message -->
                                    <td>
                                        <div class="d-flex">
                                            <!-- View Button -->
                                            <a href="javascript:void(0);" class="btn btn-sm viewEvent"
                                                data-id="<?= esc($event['id']) ?>"
                                                data-first-name="<?= esc($event['first_name']) ?>"
                                                data-last-name="<?= esc($event['last_name']) ?>"
                                                data-phone="<?= esc($event['phone']) ?>"
                                                data-email="<?= esc($event['email']) ?>"
                                                data-venue="<?= esc($event['venue']) ?>"
                                                data-message="<?= esc($event['message']) ?>" title="View"
                                                onclick="markAsSeen(<?= $event['id']; ?>)">
                                                <img src="/src/eye.png" width="26" height="26" alt="">
                                            </a>
                                            <!-- Email Icon with mailto link -->
                                            <a href="mailto:<?= urlencode(esc($event['email'])) ?>" class="btn btn-sm"
                                                title="Send Email">
                                                <img src="/src/gmail.png" width="26" height="26" alt="Email">
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="<?= site_url('/StaffController/delete_EventMessage/' . $event['id']) ?>"
                                                class="btn btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this contact message?');"
                                                title="Delete">
                                                <img src="/src/delete.png" width="26" height="26" alt="Delete">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No event messages found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            function markAsSeen(eventId) {
                // Perform AJAX request to update is_seen
                fetch('/Home/markAsSeen', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest' // For recognizing it as an AJAX request
                    },
                    body: JSON.stringify({ id: eventId })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Order marked as seen successfully.');
                        } else {
                            console.error('Failed to mark order as seen:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        </script>
        <!-- Modal Structure -->
        <div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventDetailsLabel">Event Message Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Event message details will be displayed here -->
                        <table class="table table-bordered">
                            <tr>
                                <th>First Name:</th>
                                <td id="modalFirstName"></td>
                            </tr>
                            <tr>
                                <th>Last Name:</th>
                                <td id="modalLastName"></td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td id="modalPhone"></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td id="modalEmail"></td>
                            </tr>
                            <tr>
                                <th>Venue:</th>
                                <td id="modalVenue"></td>
                            </tr>
                            <tr>
                                <th>Message:</th>
                                <td id="modalMessage"></td>
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
            // Modal trigger functionality to show event details
            document.querySelectorAll('.viewEvent').forEach(button => {
                button.addEventListener('click', function () {
                    document.getElementById('modalFirstName').textContent = this.dataset.firstName;
                    document.getElementById('modalLastName').textContent = this.dataset.lastName;
                    document.getElementById('modalPhone').textContent = this.dataset.phone;
                    document.getElementById('modalEmail').textContent = this.dataset.email;
                    document.getElementById('modalVenue').textContent = this.dataset.venue;
                    document.getElementById('modalMessage').textContent = this.dataset.message;
                    // Show the modal
                    const modal = new bootstrap.Modal(document.getElementById('eventDetailsModal'));
                    modal.show();
                });
            });
            // Refresh page when modal is closed
            document.getElementById('eventDetailsModal').addEventListener('hidden.bs.modal', function () {
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