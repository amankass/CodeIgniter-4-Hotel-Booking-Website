<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/src/download.png">
  <title>Staff Dashboard</title>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

  <!-- Summernote CSS -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/staff.css">
</head>


<body>
  <?php echo view('/Components/staff_sidibar.php'); ?>
  <section class="home-section">
    <div class="content card_content" id="contents">
      <div class="dashboard-cards">
        <!-- Booked Card -->
        <a href="<?= site_url('staff/staff_booked') ?>" style="text-decoration: none;">
          <div class="card">
            <div class="card-header">
              BOOKED
              <?php if ($totalbook > 0): ?>
                <span class="badge bg-danger mt-2"><?= $totalbook ?></span>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <h5 class="card-title">New Bookings &nbsp; &nbsp; &nbsp; &nbsp;<?= $totalbook ?></h5>
              <img src="/src/booking.png" style="width:55px; height:45px; margin-left:30%;" alt="">
            </div>
          </div>
        </a>
        <!-- Event Hall Card -->
        <a href="<?= site_url('staff/staff_event_message') ?>" style="text-decoration: none;">
          <div class="card top_cards">
            <div class="card-header">
              EVENT HALL MESSAGE
              <?php if ($event_hall_message > 0): ?>
                <span class="badge bg-danger mt-2"><?= $event_hall_message ?></span>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <h5 class="card-title">New Hall Message&nbsp;&nbsp; &nbsp;<?= $event_hall_message ?></h5>
              <img src="/src/event.png" style="width:55px; height:45px; margin-left:30%;" alt="">
            </div>
          </div>
        </a>
        <!-- Staffs Card -->
        <a href="<?= site_url('staff/staff_Contact_message') ?>" style="text-decoration: none;">
          <div class="card top_cards">
            <div class="card-header">
              CONTACT MESSAGE
              <?php if ($contacts_message > 0): ?>
                <span class="badge bg-danger mt-2"><?= $contacts_message ?></span>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <h5 class="card-title">New Contact Message &nbsp; &nbsp; &nbsp;<?= $contacts_message ?></h5>
              <img src="/src/book.png" style="width:55px; height:45px; margin-left:30%;" alt="">
            </div>
          </div>
        </a>

        <!-- Clients Card -->
        <a href="<?= site_url('staff/staff_userlist') ?>" style="text-decoration: none;">
          <div class="card top_cards">
            <div class="card-header">
              REGISTERED USERS
              <?php if ($totalclient > 0): ?>
                <span class="badge bg-danger mt-2"><?= $totalclient ?></span>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <h5 class="card-title">Registered Users &nbsp;&nbsp;&nbsp;&nbsp;<?= $totalclient ?></h5>
              <img src="/src/public-relation.png" style="width:55px; height:45px; margin-left:30%;" alt="">
            </div>
          </div>
        </a>
        <!-- Users Card -->
        <a href="<?= site_url('staff/staff_unregistered_clientList') ?>" style="text-decoration: none;">
          <div class="card top_cards">
            <div class="card-header">
              UNREGISTERED USERS
              <?php if ($Unregistered_User > 0): ?>
                <span class="badge bg-danger mt-2"><?= $Unregistered_User ?></span>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <h5 class="card-title">Unregistered Users &nbsp; &nbsp; &nbsp;<?= $Unregistered_User ?></h5>
              <img src="/src/view.png" style="width:55px; height:45px; margin-left:30%;" alt="">
            </div>
          </div>
        </a>
      </div>
    </div>
    <!-- Graphs Section -->
    <div class="chart-container">
      <canvas id="bookingsChart"></canvas>
      <canvas id="Clientchart"></canvas>
    </div>

    <div class="table-responsive home-table" style="width: 70rem; margin-left: 10%; margin-top: 5%;">
      <table class="table table-striped table-bordered caption-top" id="Event_Table">
        <caption class="fw-bold" style="color:#11101d">Event Messages</caption>
        <thead class="thead-dark">
          <tr>
            <th>No.</th>
            <th>Full Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Venue</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($event_message)): ?>
            <?php foreach ($event_message as $index => $event): ?>
              <tr style="<?= ($event['is_seen'] == 0) ? 'font-weight: bold;' : ''; ?>">
                <td><?= esc($index + 1) ?></td> <!-- Incrementing index for row number -->
                <td><?= esc($event['first_name'] . ' ' . $event['last_name']) ?></td> <!-- First Name -->
                <td><?= esc($event['phone']) ?></td> <!-- Phone -->
                <td><?= esc($event['email']) ?></td> <!-- Email -->
                <td><?= esc($event['venue']) ?></td> <!-- Venue -->
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

    <footer style="margin-top: 3rem;">
      <p style="text-align: center; color: #969292;">All rigth reserved&copy;2024</p>
    </footer>
    <script>
      async function fetchOrdersData() {
        try {
          const response = await fetch('/Admin/chartdatas');
          const json = await response.json();
          const labels = json.labels; // Labels for the current week
          const data = {
            labels: labels,
            datasets: [{
              label: 'Weekly User Booking',
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1,
              data: json.data, // Data for the current week
            }]
          };
          const config = {
            type: 'bar',  // Change to 'line' for a line chart
            data: data,
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              },
              responsive: true,
              maintainAspectRatio: false,
            }
          };
          // Render the chart
          const userOrdersChart = new Chart(
            document.getElementById('bookingsChart'),
            config
          );
        } catch (error) {
          console.error('Error fetching orders data:', error);
        }
      }
      // Call the function to fetch and render data
      fetchOrdersData();
      const registeredUserCount = <?= json_encode($totalclient); ?>;
      const unregisteredUserCount = <?= json_encode($Unregistered_User); ?>;
      // Check-In and Check-Out Chart - Updated to Registered vs. Unregistered Users
      const clientCTx = document.getElementById('Clientchart').getContext('2d');
      const Clientchart = new Chart(clientCTx, {
        type: 'pie',
        data: {
          labels: ['Registered Users', 'Unregistered Users'],
          datasets: [{
            data: [registeredUserCount, unregisteredUserCount],
            backgroundColor: ['rgba(40, 167, 69, 0.7)', 'rgba(255, 193, 7, 0.7)'],
            borderColor: ['rgba(40, 167, 69, 1)', 'rgba(255, 193, 7, 1)'],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
          }
        }
      });
    </script>
  </section>
</body>

</html>