<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Booked Room</title>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="shortcut icon" type="image/png" href="/src/download.png">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Bootstrap JS (Make sure it's the right version for your Bootstrap CSS) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/css/Admin.css">
</head>

<body>
  <?php echo view('/Components/Admin_sidebar.php'); ?>
  <section class="home-section">
    <section id="booking-edit">
      <div class="container my-3">
        <div class="row justify-content-center">
          <div class="col-lg-11" style="margin-left: 2rem;">
            <div class="card shadow-sm">
              <div class="card shadow-sm">
                <div class="card-header text-center">
                  <h4 class="mb-0 fw-bold">Edit User Infomation</h4>
                </div>
                <div class="card-body">
                  <form action="<?= site_url('/bookings/update_booking/' . $booking['id']) ?>" method="post"
                    class="row">
                    <?= csrf_field(); ?>
                    <div class="mb-3 col-md-4">
                      <label for="title" class="form-label fw-bold">Title</label>
                      <input type="text" class="form-control" id="title" name="title" value="<?= esc($user['title']) ?>"
                        required>
                    </div>
                    <div class="mb-3 col-md-4">
                      <label for="first_name" class="form-label fw-bold">First Name</label>
                      <input type="text" class="form-control" id="first_name" name="first_name"
                        value="<?= esc($user['first_name']) ?>" required>
                    </div>
                    <div class="mb-3 col-md-4">
                      <label for="middle_name" class="form-label fw-bold">Middle Name</label>
                      <input type="text" class="form-control" id="middle_name" name="middle_name"
                        value="<?= esc($user['middle_name']) ?>">
                    </div>
                    <div class="mb-3 col-md-4">
                      <label for="last_name" class="form-label fw-bold">Last Name</label>
                      <input type="text" class="form-control" id="last_name" name="last_name"
                        value="<?= esc($user['last_name']) ?>" required>
                    </div>
                    <div class="mb-3 col-md-4">
                      <label for="email" class="form-label fw-bold">Email</label>
                      <input type="email" class="form-control" id="email" name="email"
                        value="<?= esc($user['email']) ?>" required>
                    </div>
                    <div class="mb-3 col-md-4">
                      <label for="phone" class="form-label fw-bold">Phone</label>
                      <input type="tel" class="form-control" id="phone" name="phone" value="<?= esc($user['phone']) ?>"
                        required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="gender" class="form-label fw-bold">Gender</label>
                      <select class="form-control" id="gender" name="Gender" required>
                        <option value="Male" <?= $user['Gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= $user['Gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                        <option value="Other" <?= $user['Gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                      </select>
                    </div>
                    <!-- Nationality Display -->
                    <div class="mb-3 col-md-6">
                      <label for="nationality" class="form-label fw-bold">Nationality <span
                          style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="nationality" name="nationality"
                        value="<?= isset($user['nationality']) ? ucfirst($user['nationality']) : 'Not provided' ?>"
                        readonly>
                    </div>

                    <!-- Country Display -->
                    <div class="mb-3 col-md-6">
                      <label for="country" class="form-label fw-bold">Current Adress</label>
                      <input type="text" class="form-control" id="country" name="country"
                        value="<?= isset($user['country']) ? ucfirst($user['country']) : 'Not provided' ?>" readonly>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="date_of_birth" class="fw-bold form-label">Date of Birth <span
                          style="color: red;">*</span></label>
                      <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                        value="<?= isset($user['date_of_birth']) ? esc($user['date_of_birth']) : '' ?>" required>
                      <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'date_of_birth') : '' ?>
                      </span>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                      <label for="state" class="fw-bold form-label">State <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="state" name="state"
                        value="<?= isset($user['state']) ? esc($user['state']) : '' ?>" required>
                      <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'state') : '' ?>
                      </span>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                      <label for="city" class="fw-bold form-label">City <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="city" name="city"
                        value="<?= isset($user['city']) ? esc($user['city']) : '' ?>" required>
                      <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'city') : '' ?>
                      </span>
                    </div>

                    <div class="form-group mb-3 col-md-6">
                    <label for="id_type" class="fw-bold form-label">ID Type <span style="color: red;">*</span></label>
                    <select class="form-control" id="id_type" name="id_type" required>
                      <option value="" disabled selected>Select ID Type</option>
                      <option value="Passport Id" <?= isset($user['id_type']) && $user['id_type'] == 'Passport Id' ? 'selected' : '' ?>>Passport Id</option>
                      <option value="Kebele Id" <?= isset($user['id_type']) && $user['id_type'] == 'Kebele Id' ? 'selected' : '' ?>>Kebele Id</option>
                      <option value="Driving License Id" <?= isset($user['id_type']) && $user['id_type'] == 'Driving License Id' ? 'selected' : '' ?>>Driving License Id</option>
                      <option value="National Id" <?= isset($user['id_type']) && $user['id_type'] == 'National Id' ? 'selected' : '' ?>>National Id</option>
                    </select>
                    <span class="text-danger text-sm">
                      <?= isset($validation) ? display_form_errors($validation, 'id_type') : '' ?>
                    </span>
                  </div>

                  <div class="form-group mb-3 col-md-6">
                    <label for="id_number" class="fw-bold form-label">ID Number <span
                        style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="id_number" name="id_number"
                      value="<?= isset($user['id_number']) ? esc($user['id_number']) : '' ?>" required>
                    <span class="text-danger text-sm">
                      <?= isset($validation) ? display_form_errors($validation, 'id_number') : '' ?>
                    </span>
                  </div>
                    <div class="card-header text-center">
                      <h4 class="mb-0 fw-bold">Edit Booking Infomation</h4>
                    </div>
                    <div class="mb-1">
                      <!-- <label for="user_id" class="form-label">User ID</label> -->
                      <input type="hidden" class="form-control" id="user_id" name="user_id"
                        value="<?= esc($booking['user_id']) ?>" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <!-- <label for="accommodation_id" class="form-label">Accommodation ID</label> -->
                      <input type="hidden" class="form-control" id="accommodation_id" name="accommodation_id"
                        value="<?= esc($booking['accommodation_id']) ?>" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <!-- <label for="booking_id" class="form-label">Booking ID</label> -->
                      <input type="hidden" class="form-control" id="booking_id" name="booking_id"
                        value="<?= esc($booking['id']) ?>" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="check_in" class="form-label fw-bold">Check-In Date</label>
                      <input type="date" class="form-control" id="check_in" name="check_in"
                        value="<?= esc($booking['check_in']) ?>" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="check_out" class="form-label fw-bold">Check-Out Date</label>
                      <input type="date" class="form-control" id="check_out" name="check_out"
                        value="<?= esc($booking['check_out']) ?>" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="number_of_guests" class="form-label fw-bold">Number of Guests</label>
                      <input type="number" class="form-control" id="number_of_guests" name="number_of_guests"
                        value="<?= esc($booking['number_of_guests']) ?>" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="adults" class="form-label fw-bold">Number of Adults</label>
                      <input type="number" class="form-control" id="adults" name="adults"
                        value="<?= esc($booking['adults']) ?>" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="children" class="form-label fw-bold">Number of Children</label>
                      <input type="number" class="form-control" id="children" name="children"
                        value="<?= esc($booking['children']) ?>" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="account" class="form-label fw-bold">Account</label>
                      <input type="text" class="form-control" id="account" name="account"
                        value="<?= esc($booking['account'] == 1 ? 'Yes' : 'No') ?>" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="child_age" class="form-label fw-bold">Child Age</label>
                      <input type="text" class="form-control" id="child_age" name="child_age"
                        value="<?= esc($booking['child_age']) ?>" required>
                    </div>
                    <div class="mb-3 col-md-6">
                    <label for="payment_status" class="form-label fw-bold">Payment Status</label>
                    <input type="text" class="form-control" id="payment_status" name="payment_status"
                      value="<?= esc($booking['payment_status']) ?>" readonly>
                  </div>
                    <div class="mb-3 col-md-6">
                      <label for="total_price" class="form-label fw-bold">Total Price</label>
                      <input type="number" class="form-control" id="total_price" name="total_price"
                        value="<?= esc($booking['total_price']) ?>" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                    <label for="price" class="form-label fw-bold">Price per Night</label>
                    <input type="number" class="form-control" id="price" name="price">
                  </div>
                  
                  <div class="mb-3 col-md-6">
                    <label for="addfee" class="form-label fw-bold">Supplementary Charge</label>
                    <input type="number" class="form-control" id="addfee" name="addfee"
                      value="<?= esc($booking['additional_fee']) ?>" readonly>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="addfee" class="form-label fw-bold">Refund Fee</label>
                    <input type="number" class="form-control" id="refundfee" name="addfee"
                      value="<?= esc($booking['refund_fee'] < 0 ? $booking['refund_fee'] : 0) ?>" readonly>
                  </div>

                    <div class="mb-3 col-md-6">
                      <label for="status" class="form-label fw-bold">Status</label>
                      <select class="form-control" id="status" name="status" required>
                        <option value="Booked" <?= $booking['status'] == 'Booked' ? 'selected' : '' ?>>Booked</option>
                        <option value="Checked In" <?= $booking['status'] == 'Checked In' ? 'selected' : '' ?>>Checked In
                        </option>
                        <option value="Checked Out" <?= $booking['status'] == 'Checked Out' ? 'selected' : '' ?>>Checked Out
                        </option>
                      </select>
                    </div>
                    <div class="text-center">
                      <a href="<?= site_url('/staff/staff_booked') ?>" class="btn btn-secondary"
                        style="font-weight: bold;">Back</a>
                      <button type="submit" class="btn btn-warning" style="font-weight: bold;">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
</body>

</html>