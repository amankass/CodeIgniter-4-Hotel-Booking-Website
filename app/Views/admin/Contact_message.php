<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/src/download.png">
  <title>Admin Dashboard - Contact Messages</title>
  <!-- Bootstrap CSS -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Bootstrap JS (Make sure it's the right version for your Bootstrap CSS) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/Admin.css">
</head>

<body>
<?php echo view('/Components/Admin_sidebar.php'); ?>
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
        <caption class="fw-bold" style="color:#11101d">Contact Messages</caption>
          <thead class="thead-dark">
            <tr>
              <th>No.</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Message</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($accommodations)): ?>
              <?php foreach ($accommodations as $index => $contact): ?>
                <tr style="<?= ($contact['is_seen'] == 0) ? 'font-weight: bold;' : ''; ?>">
                  <td><?= esc($index + 1) ?></td> <!-- Incremented index for row number -->
                  <td><?= esc($contact['full_name']) ?></td> <!-- Full Name -->
                  <td><?= esc($contact['email']) ?></td> <!-- Email -->
                  <td><?= esc($contact['subject']) ?></td> <!-- Subject -->
                  <td><?= esc(substr($contact['message'], 0, 30)) ?>...</td> <!-- Shortened message -->
                  <td>
                    <div class="d-flex">
                    <a href="javascript:void(0);" class="btn btn-sm viewContact" data-id="<?= esc($contact['id']) ?>"
                      data-full-name="<?= esc($contact['full_name']) ?>" data-email="<?= esc($contact['email']) ?>"
                      data-subject="<?= esc($contact['subject']) ?>" data-message="<?= esc($contact['message']) ?>"
                      title="View"
                      onclick="markAsSeen2(<?= $contact['id']; ?>)">
                      <img src="/src/eye.png" width="26" height="26" alt="View">
                    </a>
                    <!-- Email Icon with mailto link -->
                    <a href="mailto:<?= urlencode(esc($contact['email'])) ?>" class="btn btn-sm" title="Send Email">
                      <img src="/src/gmail.png" width="26" height="26" alt="Email">
                    </a>
                    <!-- Delete Button -->
                    <a href="<?= site_url('/Admin/delete_ContactMessage/' . $contact['id']) ?>" class="btn btn-sm"
                      onclick="return confirm('Are you sure you want to delete this contact message?');" title="Delete">
                      <img src="/src/delete.png" width="26" height="26" alt="Delete">
                    </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="4" class="text-center">No contact messages found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    <script>
        function markAsSeen2(contactId) {
            // Perform AJAX request to update is_seen
            fetch('/Home/markAsSeen2', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest' // For recognizing it as an AJAX request
                },
                body: JSON.stringify({ id: contactId })
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
    <div class="modal fade" id="contactDetailsModal" tabindex="-1" aria-labelledby="contactDetailsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactDetailsLabel">Contact Message Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Contact message details will be displayed here -->
        <table class="table table-bordered">
          <tr>
            <th>Full Name:</th>
            <td id="modalFullName"></td>
          </tr>
          <tr>
            <th>Email:</th>
            <td id="modalEmail"></td>
          </tr>
          <tr>
            <th>Subject:</th>
            <td id="modalSubject"></td>
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
</section>
<script>
// Modal trigger functionality to show contact details
document.querySelectorAll('.viewContact').forEach(button => {
  button.addEventListener('click', function () {
    document.getElementById('modalFullName').textContent = this.dataset.fullName;
    document.getElementById('modalEmail').textContent = this.dataset.email;
    document.getElementById('modalSubject').textContent = this.dataset.subject;
    document.getElementById('modalMessage').textContent = this.dataset.message;

    // Show the modal
    const modal = new bootstrap.Modal(document.getElementById('contactDetailsModal')); // Update here
    modal.show();
  });
});

// Refresh page when modal is closed
document.getElementById('contactDetailsModal').addEventListener('hidden.bs.modal', function () {
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