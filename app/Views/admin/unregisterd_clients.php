<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <title>Admin Dashboard - Unregistered User</title>

    <!-- External CSS -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- External JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/Admin.css">
</head>


<body>
    <?php echo view('/Components/Admin_sidebar.php'); ?>
    <section class="home-section">
        <!-- Main Content -->
        <div class="main-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered caption-top" id="Unregistered_user_Table">
                    <caption class="fw-bold" style="color:#11101d">UnRegistered User</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Birth Date</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Nationality</th>
                            <th>City</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($Unregistered_User)): ?>
                            <?php foreach ($Unregistered_User as $index => $users): ?>
                                <td><?= esc($index + 1) ?></td> <!-- Incrementing index for row number -->
                                <td><?= esc($users['title']) ?></td>
                                <td><?= esc($users['first_name']) ?></td> <!-- User title -->
                                <td><?= esc($users['date_of_birth']) ?></td> <!-- User title -->
                                <td><?= esc($users['email']) ?></td> <!-- Room type -->
                                <td><?= esc($users['phone']) ?></td> <!-- Price per night -->
                                <td><?= esc($users['nationality']) ?></td> <!-- Price per night -->
                                <td><?= esc($users['city']) ?></td> <!-- Price per night -->
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-sm viewContact" data-bs-toggle="modal"
                                            data-bs-target="#userDetailsModal" data-title="<?= esc($users['title']) ?>"
                                            data-bs-target="#userDetailsModal" data-name="<?= esc($users['first_name']) ?>"
                                            data-birthdate="<?= esc($users['date_of_birth']) ?>"
                                            data-email="<?= esc($users['email']) ?>" data-phone="<?= esc($users['phone']) ?>"
                                            data-nationality="<?= esc($users['nationality']) ?>"
                                            data-country="<?= esc($users['country']) ?>"
                                            data-state="<?= esc($users['state']) ?>" data-city="<?= esc($users['city']) ?>"
                                            data-streetaddress="<?= esc($users['street_address']) ?>"
                                            data-postalcode="<?= esc($users['postal_code']) ?>" title="View">
                                            <img src="/src/eye.png" width="26" height="26" alt="View">
                                        </a>
                                        <!-- Email Icon with mailto link -->
                                        <a href="mailto:<?= urlencode(esc($users['email'])) ?>" class="btn btn-sm"
                                            title="Send Email">
                                            <img src="/src/gmail.png" width="26" height="26" alt="Email">
                                        </a>
                                        <!-- Delete Button -->
                                        <a href="<?= site_url('/Admin/delete_UnregisteredUser/' . $users['id']) ?>"
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
                                <td colspan="8" class="text-center">No User found.</td> <!-- No data message -->
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDetailsModalLabel">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Title:</strong> <span id="modalTitle"></span></p>
                    <p><strong>Name:</strong> <span id="modalName"></span></p>
                    <p><strong>Birth Date:</strong> <span id="modalBirthDate"></span></p>
                    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                    <p><strong>Phone:</strong> <span id="modalPhone"></span></p>
                    <p><strong>Nationality:</strong> <span id="modalNationality"></span></p>
                    <p><strong>Country:</strong> <span id="modalCountry"></span></p>
                    <p><strong>State:</strong> <span id="modalState"></span></p>
                    <p><strong>City:</strong> <span id="modalCity"></span></p>
                    <p><strong>Street Address:</strong> <span id="modalStreetAddress"></span></p>
                    <p><strong>Postal Code:</strong> <span id="modalPostalCode"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const userDetailsModal = document.getElementById('userDetailsModal');
            userDetailsModal.addEventListener('show.bs.modal', (event) => {
                const button = event.relatedTarget; // Button that triggered the modal
                // Extract data-* attributes
                const title = button.getAttribute('data-title');
                const name = button.getAttribute('data-name');
                const birthDate = button.getAttribute('data-birthdate');
                const email = button.getAttribute('data-email');
                const phone = button.getAttribute('data-phone');
                const nationality = button.getAttribute('data-nationality');
                const country = button.getAttribute('data-country');
                const state = button.getAttribute('data-state');
                const city = button.getAttribute('data-city');
                const streetAddress = button.getAttribute('data-streetaddress');
                const postalCode = button.getAttribute('data-postalcode');

                // Populate the modal
                document.getElementById('modalTitle').textContent = title;
                document.getElementById('modalName').textContent = name;
                document.getElementById('modalBirthDate').textContent = birthDate;
                document.getElementById('modalEmail').textContent = email;
                document.getElementById('modalPhone').textContent = phone;
                document.getElementById('modalNationality').textContent = nationality;
                document.getElementById('modalCountry').textContent = country;
                document.getElementById('modalState').textContent = state;
                document.getElementById('modalCity').textContent = city;
                document.getElementById('modalStreetAddress').textContent = streetAddress;
                document.getElementById('modalPostalCode').textContent = postalCode;
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#Unregistered_user_Table').DataTable();
        });
    </script>
</body>

</html>