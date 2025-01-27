<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/src/download.png">
  <title>Admin Dashboard - Add_Staff</title>

  <!-- External CSS -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  <!-- External JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/Admin.css">
</head>


<body>
  <?php echo view('/Components/Admin_sidebar.php'); ?>
  <section class="home-section">
    <!-- Modal -->
    <div class="main-content">
      <div class="table-responsive">
        <table class="table table-striped table-bordered caption-top" id="Staff_Table">
          <caption class="fw-bold" style="color:#11101d">Registered Staff</caption>
          <thead class="thead-dark">
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Gender</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($stafflist)): ?>
              <?php foreach ($stafflist as $index => $staff): ?>
                <tr>
                  <td><?= esc($index + 1) ?></td> <!-- Incrementing index for row number -->
                  <td><?= esc($staff['first_name']) ?></td> <!-- Staff name -->
                  <td><?= esc($staff['email']) ?></td> <!-- Staff email -->
                  <td><?= esc($staff['phone']) ?></td> <!-- Staff phone -->
                  <td><?= esc($staff['Gender']) ?></td> <!-- Staff gender -->
                  <td>
                    <div class="d-flex gap-2">
                      <!-- View Button -->
                      <a href="javascript:void(0);" class="btn btn-sm viewStaff" data-bs-toggle="modal"
                        data-bs-target="#staffDetailsModal" data-name="<?= esc($staff['first_name']) ?>"
                        data-email="<?= esc($staff['email']) ?>" data-phone="<?= esc($staff['phone']) ?>"
                        data-gender="<?= esc($staff['Gender']) ?>" title="View">

                        <img src="/src/eye.png" width="25" height="25" alt="">
                      </a>
                      <!-- Edit Button -->
                      <a href="javascript:void(0);" class="btn btn-sm editStaff" data-bs-toggle="modal"
                        data-bs-target="#editStaffModal" data-id="<?= esc($staff['id']) ?>"
                        data-name="<?= esc($staff['first_name']) ?>" data-email="<?= esc($staff['email']) ?>"
                        data-phone="<?= esc($staff['phone']) ?>" data-gender="<?= esc($staff['Gender']) ?>" title="Edit">
                        <img src="/src/edit.png" width="25" height="25" alt="">
                      </a>
                      <!-- Delete Button -->
                      <a href="<?= site_url('/Admin/delete_Staff/' . $staff['id']) ?>" class="btn btn-sm"
                        onclick="return confirm('Are you sure you want to delete this contact message?');" title="Delete">
                        <img src="/src/delete.png" alt="Delete" style="width: 25px; height: 25px;">
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center">No Staff found.</td> <!-- No data message -->
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
        <button class="add_staff_btn btn btn-sm rounded-2" id="btns" data-bs-toggle="modal"
          data-bs-target="#addModal">Add Staff</button>
      </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="staffDetailsModal" tabindex="-1" aria-labelledby="staffDetailsModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staffDetailsModalLabel">Staff Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p><strong>name:</strong> <span id="modalname"></span></p>
            <p><strong>Email:</strong> <span id="modalEmail"></span></p>
            <p><strong>Phone:</strong> <span id="modalPhone"></span></p>
            <p><strong>Gender:</strong> <span id="modalGender"></span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editStaffModal" tabindex="-1" aria-labelledby="editStaffModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editStaffModalLabel">Edit Staff Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="editStaffForm" method="POST" action="/Admin/update_staff">
            <div class="modal-body">
              <input type="hidden" name="id" id="editStaffId">
              <div class="mb-3">
                <label for="editname" class="form-label">Name</label>
                <input type="text" class="form-control" id="editname" name="name" required>
              </div>
              <div class="mb-3">
                <label for="editEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="editEmail" name="email" required>
              </div>
              <div class="mb-3">
                <label for="editPhone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="editPhone" name="phone" required>
              </div>
              <div class="mb-3">
                <label for="editGender" class="form-label">Gender</label>
                <select class="form-select" id="editGender" name="gender" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Handle View Modal
      const staffDetailsModal = document.getElementById('staffDetailsModal');
      staffDetailsModal.addEventListener('show.bs.modal', (event) => {
        const button = event.relatedTarget;
        document.getElementById('modalname').textContent = button.getAttribute('data-name');
        document.getElementById('modalEmail').textContent = button.getAttribute('data-email');
        document.getElementById('modalPhone').textContent = button.getAttribute('data-phone');
        document.getElementById('modalGender').textContent = button.getAttribute('data-gender');
      });

      // Handle Edit Modal
      const editStaffModal = document.getElementById('editStaffModal');
      editStaffModal.addEventListener('show.bs.modal', (event) => {
        const button = event.relatedTarget;
        document.getElementById('editStaffId').value = button.getAttribute('data-id');
        document.getElementById('editname').value = button.getAttribute('data-name');
        document.getElementById('editEmail').value = button.getAttribute('data-email');
        document.getElementById('editPhone').value = button.getAttribute('data-phone');
        document.getElementById('editGender').value = button.getAttribute('data-gender');
      });
    });
  </script>
  <div class="modal fade" data-bs-backdrop="static" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Add Staff User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('Admin/registerStaff') ?>" method="post" class="mb-3 row g-3">
            <?= csrf_field(); ?>
            <div class="form-group mb-3 col-md-6">
              <label for="first_name">Full name</label>
              <input type="text" class="form-control" name="first_name" placeholder="Enter Your name" required>
              <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'first_name') : '' ?>
              </span>
            </div>
            <div class="form-group mb-3 col-md-6">
              <label for="phone">Phone</label>
              <input type="tel" id="phone" class="form-control" name="phone" placeholder="Enter Phone" required>
              <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'phone') : '' ?>
              </span>
            </div>
            <div class="form-group mb-3 col-md-6">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
              <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'email') : '' ?>
              </span>
            </div>
            <div class="form-group mb-3 col-md-6">
              <label for="role">Role</label>
              <select class="form-control" name="Role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="Staff">Staff</option>
                <option value="admin">Admin</option>
              </select>
              <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'Role') : '' ?>
              </span>
            </div>

            <div class="form-group mb-3 col-md-6">
              <label for="Gender">Gender</label>
              <select class="form-control" name="Gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <!-- <option value="Other">Other</option> -->
              </select>
              <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'Gender') : '' ?>
              </span>
            </div>
            <div class="form-group mb-3 col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
              <span class="text-danger text-sm">
                <?= isset($validation) ? display_form_errors($validation, 'password') : '' ?>
              </span>
            </div>
            <div class="form-group mb-3 col-md-6">
              <button type="submit" class="btn btn-sm Register_btn btn-block">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#Staff_Table').DataTable();
    });
  </script>
</body>

</html>