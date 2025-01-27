<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Page Title -->
    <title>Staff Dashboard - Booked Rooms</title>
    
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
      <div class="table-responsive">
        <!-- Active Bookings Table -->
        <table class="table table-striped table-bordered caption-top" id="booking_table">
          <caption class="fw-bold" style="color:#11101d">Active Rooms List</caption>
          <thead class="thead-dark">
            <tr>
              <th>No.</th>
              <th>Room Type</th>
              <th>Customer Name</th>
              <th>Check-In Date</th>
              <th>Check-Out Date</th>
              <th>Total Price</th>
              <th>Room Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $activeIndex = 1; // Initialize active index
            if (!empty($bookedAccommodations)):
              foreach ($bookedAccommodations as $booking):
                if ($booking['status'] != 'Checked Out'): ?>
                  <tr style="<?= ($booking['is_seen'] == 0) ? 'font-weight: bold;' : ''; ?>">
                    <td><?= esc($activeIndex++) ?></td> <!-- Increment active index -->
                    <!-- <td><?= esc($booking['title']) ?></td> -->
                    <td><?= esc($booking['room_type']) ?></td>
                    <!-- <td>ETB<?= esc($booking['price']) ?></td> -->
                    <td><?= esc($booking['customer_name']) ?></td>
                    <td><?= esc($booking['check_in']) ?></td>
                    <td><?= esc($booking['check_out']) ?></td>
                    <td><?= esc($booking['total_price']) ?></td>
                    <td>
                      <?php if ($booking['status'] == 'Checked In'): ?>
                        <span
                          style="background: rgb(19, 138, 8); color: white; padding: 10px; border-radius: 6px; margin:auto; font-size:11px; font-weight:bold;">
                          <?= esc($booking['status']) ?>
                        </span>
                      <?php else: ?>
                        <span
                          style="background: rgb(105, 103, 64); color: white; padding: 10px; border-radius: 6px; margin:auto; font-size:11px; font-weight:bold;">
                          <?= esc($booking['status']) ?>
                        </span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div style="display: flex; align-items: center;"> <!-- Flex container for horizontal alignment -->
                        <?php if ($booking['status'] == 'Booked'): ?>
                          <a href="<?= base_url('bookings/checkin/' . $booking['id']) ?>" class="btn btn-sm" title="Checked In"
                            onclick="return confirm('Are you sure you want to Check-In this booking?');">
                            <img src="/src/check.png" width="25" height="25" alt="">
                          </a>

                        <?php elseif ($booking['status'] == 'Checked In'): ?>
                          <a href="<?= base_url('bookings/checkout/' . $booking['id']) ?>" class="btn btn-sm"
                            title="Checked Out" onclick="return confirm('Are you sure you want to Check-Out this booking?');">
                            <img src="/src/log-out.png" width="25" height="25" alt="">
                          </a>
                        <?php endif; ?>
                        <!-- Always Display View Button -->
                        <a href="<?= base_url('/staff/edit_booking/' . $booking['id']) ?>" class="btn btn-sm"
                          title="Edit Booking" onclick="return confirm('Are you sure you want to Edit this booking?');">
                          <img src="/src/edit.png" width="25" height="25" alt="">
                        </a>
                        <a href="javascript:void(0);" class="btn btn-sm viewBooking"
                          data-title="<?= esc($booking['title']) ?>" 
                          data-room-type="<?= esc($booking['room_type']) ?>"
                          data-price="<?= esc($booking['price']) ?>"
                          data-customer-name="<?= esc($booking['customer_name']) ?>"
                          data-created_at="<?= esc($booking['created_at']) ?>"
                          data-customer_email="<?= esc($booking['customer_email']) ?>"
                          data-customer_phone="<?= esc($booking['customer_phone']) ?>"
                          data-customer_country="<?= esc($booking['customer_country']) ?>"
                          data-customer_nationality="<?= esc($booking['customer_nationality']) ?>"
                          data-number_of_guests="<?= esc($booking['number_of_guests']) ?>"
                          data-adults="<?= esc($booking['adults']) ?>" 
                          data-children="<?= esc($booking['children']) ?>"
                          data-account="<?= esc($booking['account'] == 1 ? 'Yes' : 'No') ?>"
                          data-child_age="<?= esc($booking['child_age']) ?>" 
                          data-check-in="<?= esc($booking['check_in']) ?>"
                          data-check-out="<?= esc($booking['check_out']) ?>"
                          data-payment_status="<?= esc($booking['payment_status']) ?>"
                          data-paid_with="<?= esc($booking['paid_with']) ?>" 
                          data-total-price="<?= esc($booking['total_price']) ?>" 
                          data-status="<?= esc($booking['status']) ?>"
                          title="View" onclick="markAsSeen3(<?= $booking['id']; ?>)">
                          <img src="/src/eye.png" width="25" height="25" alt="">
                        </a>
                        <!-- Delete Button -->
                        <a href="<?= site_url('/bookings/delete_Booked/' . $booking['id']) ?>" class="btn btn-sm"
                          onclick="return confirm('Are you sure you want to delete this contact message?');" title="Delete">
                          <img src="/src/delete.png" alt="Delete" style="width: 25px; height: 25px;">
                        </a>
                      </div> <!-- End of flex container -->
                    </td>
                  </tr>
                <?php endif;
              endforeach;
            else: ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <script>
        function markAsSeen3(bookingId) {
          // Perform AJAX request to update is_seen
          fetch('/Home/markAsSeen3', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-Requested-With': 'XMLHttpRequest' // For recognizing it as an AJAX request
            },
            body: JSON.stringify({ id: bookingId })
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

      <br><br>
      <div class="table-responsive">
        <!-- Checked Out Bookings Table -->
        <table class="table table-striped table-bordered caption-top" id="checked_out_booking_table">
          <caption class="fw-bold" style="color:#11101d">Checked Out Rooms List</caption>
          <thead class="thead-dark">
            <tr>
              <th>No.</th>
              <th>Room Type</th>
              <th>Customer Name</th>
              <th>Check-In Date</th>
              <th>Check-Out Date</th>
              <th>Total Price</th>
              <th>Room Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $checkedOutIndex = 1; // Initialize checked out index
            if (!empty($bookedAccommodations)):
              foreach ($bookedAccommodations as $booking):
                if ($booking['status'] == 'Checked Out'): ?>
                  <tr>
                    <td><?= esc($checkedOutIndex++) ?></td> <!-- Increment checked out index -->
                    <!-- <td><?= esc($booking['title']) ?></td> -->
                    <td><?= esc($booking['room_type']) ?></td>
                    <!-- <td>$<?= esc($booking['price']) ?></td> -->
                    <td><?= esc($booking['customer_name']) ?></td>
                    <td><?= esc($booking['check_in']) ?></td>
                    <td><?= esc($booking['check_out']) ?></td>
                    <td><?= esc($booking['total_price']) ?></td>
                    <td><span
                        style="background: rgb(255, 0, 0); color: white; padding: 10px; border-radius: 6px; margin:auto; font-size:11px; font-weight:bold;">
                        <?= esc($booking['status']) ?></span></td>

                    <td>
                      <div class="d-flex">
                        <a href="javascript:void(0);" class="btn btn-sm viewBooking"
                          data-title="<?= esc($booking['title']) ?>" 
                          data-room-type="<?= esc($booking['room_type']) ?>"
                          data-price="<?= esc($booking['price']) ?>"
                          data-customer-name="<?= esc($booking['customer_name']) ?>"
                          data-customer_email="<?= esc($booking['customer_email']) ?>"
                          data-customer_phone="<?= esc($booking['customer_phone']) ?>"
                          data-customer_country="<?= esc($booking['customer_country']) ?>"
                          data-customer_nationality="<?= esc($booking['customer_nationality']) ?>"
                          data-number_of_guests="<?= esc($booking['number_of_guests']) ?>"
                          data-adults="<?= esc($booking['adults']) ?>" 
                          data-children="<?= esc($booking['children']) ?>"
                          data-account="<?= esc($booking['account'] == 1 ? 'Yes' : 'No') ?>"
                          data-child_age="<?= esc($booking['child_age']) ?>" 
                          data-check-in="<?= esc($booking['check_in']) ?>"
                          data-check-out="<?= esc($booking['check_out']) ?>"
                          data-payment_status="<?= esc($booking['payment_status']) ?>"
                          data-paid_with="<?= esc($booking['paid_with']) ?>"
                          data-total-price="<?= esc($booking['total_price']) ?>" 
                          data-status="<?= esc($booking['status']) ?>"
                          title="View">
                          <img src="/src/eye.png" alt="" style="width: 25px; height: 25px;">
                        </a>
                        <!-- Delete Button -->
                        <a href="<?= site_url('/bookings/delete_Booked/' . $booking['id']) ?>" class="btn btn-sm"
                          onclick="return confirm('Are you sure you want to delete this contact message?');" title="Delete">
                          <img src="/src/delete.png" alt="Delete" style="width: 25px; height: 25px;">
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endif;
              endforeach;
            else: ?>

            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Modal Structure -->
    <div class="modal fade" id="bookingDetailsModal" tabindex="-1" aria-labelledby="bookingDetailsLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bookingDetailsLabel">Booking Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Booking details will be displayed here -->
            <table class="table table-bordered">
              <tr>
                <th>Has Account:</th>
                <td id="modalhasAccount"></td>
              </tr>
              <tr>
                <th>Booked Date:</th>
                <td id="modalbookeddate"></td>
              </tr>
              <tr>
                <th>Customer Name:</th>
                <td id="modalCustomerName"></td>
              </tr>
              <tr>
                <th>Customer Email:</th>
                <td id="modalCustomerEmail"></td>
              </tr>
              <tr>
                <th>Customer Phone:</th>
                <td id="customer_phone"></td>
              </tr>
              <tr>
                <th>Customer Country:</th>
                <td id="customer_country"></td>
              </tr>
              <tr>
                <th>Customer Nationality:</th>
                <td id="customer_nationality"></td>
              </tr>
              <tr>
                <th>Room Title:</th>
                <td id="modalRoomTitle"></td>
              </tr>
              <tr>
                <th>Room Type:</th>
                <td id="modalRoomType"></td>
              </tr>
              <tr>
                <th>Price Per Night:</th>
                <td id="modalPricePerNight"></td>
              </tr>
              <tr>
                <th>Guest Number:</th>
                <td id="modalnumber_of_guests"></td>
              </tr>
              <tr>
                <th>Adult:</th>
                <td id="modaladults"></td>
              </tr>
              <tr>
                <th>Child:</th>
                <td id="modalchildren"></td>
              </tr>
              <tr>
                <th>Child Age:</th>
                <td id="modalchild_age"></td>
              </tr>
              <tr>
                <th>Check-In:</th>
                <td id="modalCheckIn"></td>
              </tr>
              <tr>
                <th>Check-Out Date:</th>
                <td id="modalCheckOut"></td>
              </tr>
              <tr>
                <th>Payment Status</th>
                <td id="modalpayment_status"></td>
              </tr>
              <tr>
                <th>Payment Done by</th>
                <td id="modalpaid_with"></td>
              </tr>
              <tr>
                <th>Total Price:</th>
                <td id="modalTotalPrice"></td>
              </tr>
              <tr>
                <th>Status:</th>
                <td id="modalStatus"></td>
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
      document.addEventListener('DOMContentLoaded', function () {
        // When the view button is clicked
        document.querySelectorAll('.viewBooking').forEach(function (button) {
          button.addEventListener('click', function () {
            // Get booking data from data attributes
            var roomTitle = this.getAttribute('data-title');
            var roomType = this.getAttribute('data-room-type');
            var created_at = this.getAttribute('data-created_at');
            var pricePerNight = this.getAttribute('data-price');
            var customerName = this.getAttribute('data-customer-name');
            var customer_email = this.getAttribute('data-customer_email');
            var customer_phone = this.getAttribute('data-customer_phone');
            var customer_country = this.getAttribute('data-customer_country');
            var customer_nationality = this.getAttribute('data-customer_nationality');
            var number_of_guests = this.getAttribute('data-number_of_guests');
            var children = this.getAttribute('data-children');
            var child_age = this.getAttribute('data-child_age');
            var adults = this.getAttribute('data-adults');
            var account = this.getAttribute('data-account');
            var checkIn = this.getAttribute('data-check-in');
            var checkOut = this.getAttribute('data-check-out');
            var payment_status = this.getAttribute('data-payment_status');
            var paid_with = this.getAttribute('data-paid_with');
            var totalPrice = this.getAttribute('data-total-price');
            var status = this.getAttribute('data-status');

            // Populate modal with booking data
            document.getElementById('modalhasAccount').textContent = account;
            document.getElementById('modalbookeddate').textContent = created_at;
            document.getElementById('modalCustomerName').textContent = customerName;
            document.getElementById('modalCustomerEmail').textContent = customer_email;
            document.getElementById('customer_phone').textContent = customer_phone;
            document.getElementById('customer_country').textContent = customer_country;
            document.getElementById('customer_nationality').textContent = customer_nationality;
            document.getElementById('modalRoomTitle').textContent = roomTitle;
            document.getElementById('modalRoomType').textContent = roomType;
            document.getElementById('modalPricePerNight').textContent = 'ETB ' + pricePerNight;
            document.getElementById('modalnumber_of_guests').textContent = 'Total Number of Guest:  ' + number_of_guests;
            document.getElementById('modaladults').textContent = 'Total Number of Adult:  ' + adults;
            document.getElementById('modalchildren').textContent = 'Age of Child:  ' + child_age;
            document.getElementById('modalchild_age').textContent = 'Total Number of Child:  ' + children;
            document.getElementById('modalCheckIn').textContent = checkIn;
            document.getElementById('modalCheckOut').textContent = checkOut;
            document.getElementById('modalpayment_status').textContent = payment_status;
            document.getElementById('modalpaid_with').textContent = paid_with;
            document.getElementById('modalTotalPrice').textContent = 'ETB  ' + totalPrice;
            document.getElementById('modalStatus').textContent = status;
            // Show the modal
            var modal = new bootstrap.Modal(document.getElementById('bookingDetailsModal'));
            modal.show();
          });
        });
      });
      // Refresh page when modal is closed
      document.getElementById('bookingDetailsModal').addEventListener('hidden.bs.modal', function () {
        location.reload(); // Refresh the page
      });
    </script>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#booking_table').DataTable();
    });
  </script>
  <script>
    $(document).ready(function () {
      $('#checked_out_booking_table').DataTable();
    });
  </script>

</body>

</html>