<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/src/download.png">
  <title>Admin Dashboard - All Rooms</title>
  <!-- Bootstrap CSS -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/src/download.png">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <!-- Include jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/css/staff.css">
</head>

<body>
  <?php echo view('/Components/staff_sidibar.php'); ?>
  <section class="home-section">
    <div class="main-content">
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
      <?php endif; ?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered caption-top" id="accommodation_table">
          <caption class="fw-bold" style="color:#11101d">Rooms List</caption>
          <thead class="thead-dark">
            <tr>
              <th>No.</th>
              <th>Room Type</th>
              <th>Bed Type</th>
              <th>Price</th>
              <th>Lounge Area</th>
              <th>Floor View</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($accommodations) && is_array($accommodations)): ?>
              <?php foreach ($accommodations as $index => $accommodation): ?>
                <tr>
                  <td><?= esc($index + 1) ?></td>
                  <!-- <td>
                    <?php
                    $images = json_decode($accommodation['image']); // Decode JSON
                    if (!empty($images)): ?>
                      <img src="<?= esc($images[0]) ?>" alt="<?= esc($accommodation['title']) ?>" class="img-thumbnail"
                        style="max-width: 100px;">
                    <?php endif; ?>
                  </td> -->
                  <!-- <td><?= esc($accommodation['title']) ?></td> -->
                  <td><?= esc($accommodation['room_type']) ?></td>
                  <td><?= esc($accommodation['bed_type']) ?></td>
                  <td>ETB <?= esc($accommodation['price']) ?></td>
                  <td><?= esc($accommodation['has_lounge_area']) ? 'Yes' : 'No' ?></td>
                  <td><?= esc($accommodation['room_view']) ?></td>
                  <td>
                    <div class="action-buttons d-flex gap-2">
                      <!-- Update button -->
                      <a href="<?= site_url('/staff/staff_update_accom/' . $accommodation['id']) ?>"
                        class="btn btn-warning btn-sm">Update</a>
                      <!-- Delete button -->
                      <form action="<?= site_url('accommodation/delete/' . $accommodation['id']) ?>" method="post"
                        onsubmit="return confirm('Are you sure?');">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                      <!-- View button to open modal -->
                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#viewModal<?= $accommodation['id'] ?>">View</button>
                      <!-- Modal -->
                      <div class="modal fade" id="viewModal<?= $accommodation['id'] ?>" tabindex="-1" role="dialog"
                        aria-labelledby="viewModalLabel<?= $accommodation['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="viewModalLabel<?= $accommodation['id'] ?>">
                                <?= esc($accommodation['title']) ?>
                              </h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <!-- Carousel -->
                              <div id="carousel<?= $accommodation['id'] ?>" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                  <?php
                                  $images = json_decode($accommodation['image']); // Decode JSON
                                  foreach ($images as $index => $image): ?>
                                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                      <img src="<?= esc($image) ?>" alt="<?= esc($accommodation['title']) ?>"
                                        class="d-block w-100 img-fluid mb-3">
                                    </div>
                                  <?php endforeach; ?>
                                </div>
                                <a class="carousel-control-prev" href="#carousel<?= $accommodation['id'] ?>" role="button"
                                  data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <!-- <span class="sr-only">Previous</span> -->
                                </a>
                                <a class="carousel-control-next" href="#carousel<?= $accommodation['id'] ?>" role="button"
                                  data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <!-- <span class="sr-only">Next</span> -->
                                </a>
                              </div>
                              <!-- Accommodation Details -->
                              <p><strong>Price:</strong> ETB<?= esc($accommodation['price']) ?></p>
                              <p><strong>Title:</strong> <?= esc($accommodation['title']) ?></p>
                              <p><strong>Amenities:</strong> <?= esc($accommodation['amenities']) ?></p>
                              <p><strong>Content:</strong> <?= htmlspecialchars_decode($accommodation['content']) ?></p>
                              <p><strong>Room Type:</strong> <?= esc($accommodation['room_type']) ?></p>
                              <p><strong>Bed Type:</strong> <?= esc($accommodation['bed_type']) ?></p>
                              <p><strong>Lounge Area:</strong> <?= $accommodation['has_lounge_area'] ? 'Yes' : 'No' ?></p>
                              <p><strong>Floor Number:</strong> <?= esc($accommodation['floor_number']) ?></p>
                              <p><strong>Room Number:</strong> <?= esc($accommodation['Room_Number']) ?></p>
                              <p><strong>No of Room:</strong> <?= esc($accommodation['room_quantity']) ?></p>
                              <p><strong>Floor View:</strong> <?= esc($accommodation['room_view']) ?></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="9" class="text-center">No accommodations found.</td>
                <!-- Adjusted colspan to match columns -->
              </tr>
            <?php endif; ?>
          </tbody>
          <a href="<?= site_url('Admin/Add_Room') ?>" class="btn btn-primary mb-3">Add New</a>
        </table>
      </div>
    </div>
    </div>
    <!-- Include Bootstrap JS and jQuery if not already included -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#accommodation_table').DataTable();
    });
  </script>
</body>

</html>