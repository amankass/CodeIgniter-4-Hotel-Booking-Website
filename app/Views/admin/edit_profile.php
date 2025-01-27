<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/src/download.png">
  <title>Profile</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/Admin.css">
</head>


<body>
<?php echo view('/Components/Admin_sidebar.php'); ?>
  <section class="home-section">
    <!-- Dashbourds Container -->
    <div class="container" style="width: 80%;">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card shadow-sm">
            <div class="card-header">
              <h4>Update Profile</h4>
              <a href="<?= site_url('auth/logout'); ?>" class="btn btn-warning logout-btn">Logout</a>
            </div>
            <div class="card-body">
              
              <!-- Add the Update Profile Section -->
              <div class="pform">
                <form action="<?= site_url('Admin/admin_profile_update') ?>" method="post" class="row g-3">
                  <?= csrf_field(); ?>
                  <div class="mb-3 col-md-6 g-4">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <select class="form-select" name="title" id="title" required>
                      <option value="" disabled selected>Choose...</option>
                      <option value="Mr." <?= (esc($user['title']) === 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
                      <option value="Ms." <?= (esc($user['title']) === 'Ms.') ? 'selected' : ''; ?>>Ms.</option>
                      <option value="Miss" <?= (esc($user['title']) === 'Miss') ? 'selected' : ''; ?>>Miss</option>
                      <option value="Mrs." <?= (esc($user['title']) === 'Mrs.') ? 'selected' : ''; ?>>Mrs.</option>
                    </select>
                  </div>

                  <!-- id -->
                  <input type="hidden" class="form-control" name="id" value="<?= esc($user['id']); ?>"
                  required>

                  <!-- First Name -->
                  <div class="mb-3 col-md-6 g-4">
                    <label for="first_name" class="form-label fw-bold">First Name <span
                        style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="first_name" value="<?= esc($user['first_name']); ?>"
                      required>
                  </div>

                  <!-- Middle Name -->
                  <div class="mb-3 col-md-6 g-4">
                    <label for="middle_name" class="form-label fw-bold">Middle Name(optional)</label>
                    <input type="text" class="form-control" name="middle_name"
                      value="<?= esc($user['middle_name']); ?>">
                  </div>

                  <!-- Last Name -->
                  <div class="mb-3 col-md-6 g-4">
                    <label for="last_name" class="form-label fw-bold">Last Name <span
                        style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="last_name" value="<?= esc($user['last_name']); ?>"
                      required>
                  </div>

                  <!-- Gender -->
                  <div class="mb-3 col-md-6">
                    <label for="gender" class="form-label fw-bold">Gender <span style="color: red;">*</span></label>
                    <select class="form-select" id="gender" name="Gender" required >
                      <option value="Male" <?= $user['Gender'] == 'Male' ? 'selected' : '' ?>>Male
                      </option>
                      <option value="Female" <?= $user['Gender'] == 'Female' ? 'selected' : '' ?>>Female
                      </option>
                      <option value="Other" <?= $user['Gender'] == 'Other' ? 'selected' : '' ?>>Other
                      </option>
                    </select>
                  </div>

                  <div class="mb-3 col-md-6 g-4">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= esc($user['email']); ?>" required>
                  </div>
                  <div class="mb-3 col-md-6 g-4">
                    <label for="phone" class="form-label fw-bold">Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?= esc($user['phone']); ?>" required>
                  </div>
                  <div class="mb-3 col-md-6 g-4">
                    <label for="date" class="form-label fw-bold">Birthdate</label>
                    <input type="date" class="form-control" name="date_of_birth" value="<?= esc($user['date_of_birth']); ?>"
                      required>
                  </div>
                  <div class="mb-3 col-md-6 g-4">
                    <label for="nationality" class="form-label fw-bold">Nationality</label>
                    <input type="text" class="form-control" name="nationality" value="<?= esc($user['nationality']); ?>"
                      required>
                  </div>
                  <div class="mb-3 col-md-6 g-4">
                    <label for="country" class="form-label fw-bold">Country</label>
                    <input type="text" class="form-control" name="country" value="<?= esc($user['country']); ?>"
                      required>
                  </div>
                  <div class="mb-3 col-md-6 g-4">
                    <label for="City" class="form-label fw-bold">City</label>
                    <input type="text" class="form-control" name="city" value="<?= esc($user['city']); ?>" required>
                  </div>
                  <div class="mb-3 col-md-6 g-4">
                    <label for="State" class="form-label fw-bold">State</label>
                    <input type="text" class="form-control" name="State" value="<?= esc($user['state']); ?>" required>
                  </div>
                  <div class="Update_btn">
                  <button type="submit" class="btn edit_profile_btn">Update</button>
                  </div>
                </form>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>