<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/src/download.png">
  <title>Admin Dashboard - Booked Accommodations</title>

  <!-- External CSS -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

  <!-- External JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/Admin.css">
</head>


<body>
  <?php echo view('/Components/Admin_sidebar.php'); ?>
  <section class="home-section">
    <section id="accommodation">
      <div class="container my-3">
        <?php
        if (!empty(session()->getFlashData('success'))) {
          ?>
          <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
            <?=
              session()->getFlashData('success')
              ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php
        } else if (!empty(session()->getFlashData('fail'))) {
          ?>
            <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
            <?=
              session()->getFlashData('fail')
              ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
        }
        ?>
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <div class="card shadow-sm">
              <div class="card-header">
                <h2 class="mb-0">Add New Rooms</h2>
              </div>
              <div class="card-body">
                <form action="<?= site_url('accommodation/store') ?>" method="post" enctype="multipart/form-data"
                  class="row">
                  <?= csrf_field(); ?>
                  <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title"
                      required>
                  </div>
                  <div class="mb-3">
                    <label for="content" class="form-label fw-bold">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="6"
                      placeholder="Enter the Accomodation Detail" required></textarea>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="room_type" class="form-label fw-bold">Room Type</label>
                    <select class="form-control" id="room_type" name="room_type" required>
                      <option value="">-- Select Room Type --</option>
                      <option value="Standard Room">Standard Room</option>
                      <option value="Premium Room">Premium Room</option>
                      <option value="Family Room">Family Room</option>
                      <option value="Executive Room">Executive Room</option>
                      <option value="Presidential Room">Presidential Room</option>
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="price" class="form-label fw-bold">Price/Night</label>
                    <input type="Number" class="form-control" id="price" name="price" placeholder="Enter Price"
                      required>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="floor_number" class="form-label fw-bold">Floor Number</label>
                    <input type="number" class="form-control" id="floor_number" name="floor_number"
                      placeholder="Enter floor number">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="Room_Number" class="form-label fw-bold">Room Number</label>
                    <input type="number" class="form-control" id="Room_Number" name="Room_Number"
                      placeholder="Enter Room number">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="bed_type" class="form-label fw-bold">Bed Type</label>
                    <select class="form-control" id="bed_type" name="bed_type" required>
                      <option value="">-- Select Bed Type --</option>
                      <option value="Single">Single</option>
                      <option value="Double">Double</option>
                      <option value="Queen">Queen</option>
                      <option value="King">King</option>
                      <option value="Twin">Twin</option>
                      <option value="Bunk Bed">Bunk Bed</option>
                      <option value="Sofa Bed">Sofa Bed</option>
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="room_view" class="form-label fw-bold">Room View</label>
                    <select class="form-control" id="room_view" name="room_view">
                      <option value="">-- Select Room View --</option>
                      <option value="Ocean View">Ocean View</option>
                      <option value="City View">City View</option>
                      <option value="Garden View">Garden View</option>
                      <option value="Mountain View">Mountain View</option>
                      <option value="Pool View">Pool View</option>
                      <option value="Courtyard View">Courtyard View</option>
                    </select>
                  </div>
                  <div class="col-md-6" style="display: flex; gap: 15px; align-items: center; margin-top: 1rem;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="balcony" name="balcony">
                      <label class="form-check-label fw-bold" for="balcony">Balcony</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="jacuzzi" name="jacuzzi">
                      <label class="form-check-label fw-bold" for="jacuzzi">Jacuzzi</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="has_lounge_area" name="has_lounge_area">
                      <label class="form-check-label fw-bold" for="has_lounge_area">Lounge Area</label>
                    </div>
                  </div>
                  <div class="mb-3" style="margin-top: 15px;">
                    <label for="amenities" class="form-label fw-bold">Amenities</label>
                    <textarea class="form-control" id="amenities" name="amenities" rows="3"
                      placeholder="Enter amenities"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Images</label>
                    <input type="file" class="form-control" id="image" name="image[]" accept="image/*" multiple>
                  </div>
                  <div class="text-end">
                    <button type="submit" class="btn btn-info fw-bold">Add Room</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
          $(document).ready(function () {
            $(".MySummernote").summernote();
            $('.dropdown-toggle').dropdown();
          });
        </script>
      </div>
    </section>
  </section>
</body>

</html>