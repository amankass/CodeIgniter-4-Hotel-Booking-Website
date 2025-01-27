<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Accommodation</title>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/src/download.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Bootstrap JS (Make sure it's the right version for your Bootstrap CSS) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/css/Admin.css">
</head>

<body>
<?php echo view('/Components/Admin_sidebar.php'); ?>
  <section class="home-section">
  <section id="accommodation">
    <div class="container my-3">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="card shadow-sm">
            <div class="card-header">
              <h2 class="mb-0">Edit Room Detail</h2>
            </div>
            <div class="card-body">
              <form action="<?= site_url('accommodation/update/' . $accommodation['id']) ?>" method="post"
                enctype="multipart/form-data" class="row">
                <?= csrf_field(); ?>
                <div class="mb-3">
                  <label for="title" class="form-label fw-bold">Title</label>
                  <input type="text" class="form-control" id="title" name="title"
                    value="<?= esc($accommodation['title']) ?>" placeholder="Enter the title" required>
                </div>
                <div class="mb-3">
                  <label for="content" class="form-label fw-bold">Content</label>
                  <textarea class="form-control" id="content" name="content" rows="6" placeholder="Enter the content"
                    required><?= esc($accommodation['content']) ?></textarea>
                </div>
                <!-- Select Fields -->
                <div class="mb-3 col-md-6">
                  <label for="room_type" class="form-label fw-bold">Room Type</label>
                  <select class="form-control" id="room_type" name="room_type" required>
                    <option value="">-- Select Room Type --</option>
                    <?php
                    $roomTypes = ['Standard Room', 'Premium Room', 'Family Room', 'Executive Room', 'Presidential Room'];
                    foreach ($roomTypes as $type): ?>
                      <option value="<?= esc($type) ?>" <?= ($type == $accommodation['room_type']) ? 'selected' : '' ?>>
                        <?= esc($type) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="price" class="form-label fw-bold">Price/Night</label>
                  <input type="number" class="form-control" id="price" name="price"
                    value="<?= esc($accommodation['price']) ?>" placeholder="Enter Price" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="floor_number" class="form-label fw-bold">Floor Number</label>
                  <input type="number" class="form-control" id="floor_number" name="floor_number"
                    value="<?= esc($accommodation['floor_number']) ?>" placeholder="Enter floor number">
                </div>
                <div class="mb-3 col-md-6">
                  <label for="Room_Number" class="form-label fw-bold">Room Number</label>
                  <input type="number" class="form-control" id="Room_Number" name="Room_Number"
                    value="<?= esc($accommodation['Room_Number']) ?>" placeholder="Enter floor number">
                </div>
                <!-- <div class="mb-3 col-md-6">
                    <label for="room_quantity" class="form-label fw-bold">Room Quantity</label>
                    <input type="number" class="form-control" id="room_quantity" name="room_quantity" value="<?= esc($accommodation['room_quantity']) ?>" placeholder="Enter room_quantity">
                  </div> -->
                <div class="mb-3 col-md-6">
                  <label for="bed_type" class="form-label fw-bold">Bed Type</label>
                  <select class="form-control" id="bed_type" name="bed_type" required>
                    <option value="">-- Select Bed Type --</option>
                    <?php
                    $bedTypes = ['Single', 'Double', 'Queen', 'King', 'Twin', 'Bunk Bed', 'Sofa Bed'];
                    foreach ($bedTypes as $type): ?>
                      <option value="<?= esc($type) ?>" <?= ($type == $accommodation['bed_type']) ? 'selected' : '' ?>>
                        <?= esc($type) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <!-- Room View -->
                <div class="mb-3 col-md-6">
                  <label for="room_view" class="form-label fw-bold">Room View</label>
                  <select class="form-control" id="room_view" name="room_view">
                    <option value="">-- Select Room View --</option>
                    <?php
                    $roomViews = ['Ocean View', 'City View', 'Garden View', 'Mountain View', 'Pool View', 'Courtyard View'];
                    foreach ($roomViews as $view): ?>
                      <option value="<?= esc($view) ?>" <?= ($view == $accommodation['room_view']) ? 'selected' : '' ?>>
                        <?= esc($view) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <!-- Checkboxes -->
                <div class="col-md-6"
                  style="display: flex; gap: 15px; align-items: center; margin-top: 1rem; margin-bottom: 1rem;">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="balcony" name="balcony"
                      <?= $accommodation['balcony'] ? 'checked' : '' ?>>
                    <label class="form-check-label fw-bold" for="balcony">Balcony</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="jacuzzi" name="jacuzzi"
                      <?= $accommodation['jacuzzi'] ? 'checked' : '' ?>>
                    <label class="form-check-label fw-bold" for="jacuzzi">Jacuzzi</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="has_lounge_area" name="has_lounge_area"
                      <?= $accommodation['has_lounge_area'] ? 'checked' : '' ?>>
                    <label class="form-check-label fw-bold" for="has_lounge_area">Lounge Area</label>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="amenities" class="form-label fw-bold">Amenities</label>
                  <textarea class="form-control" id="amenities" name="amenities" rows="3"
                    placeholder="Enter amenities"><?= esc($accommodation['amenities']) ?></textarea>
                </div>
                <!-- Image Upload -->
                <div class="mb-3">
                  <label for="image" class="form-label fw-bold">Images</label>
                  <input type="file" class="form-control" id="image" name="image[]" accept="image/*" multiple>
                  <!-- Show current images if they exist -->
                  <?php if (!empty($accommodation['image'])): ?>
                    <?php
                    $images = json_decode($accommodation['image'], true); // Decode JSON array of images
                    foreach ($images as $index => $image): ?>
                      <div class="existing-image" id="image-<?= $index ?>">
                        <img src="<?= esc($image) ?>" alt="Accommodation Image" style="max-width: 100px; margin-top: 10px;">
                        <button type="button" class="btn btn-danger btn-sm"
                          onclick="deleteImage(<?= $index ?>, '<?= esc($image) ?>', <?= esc($accommodation['id']) ?>)">Delete</button>
                        <input type="hidden" name="existing_images[]" value="<?= esc($image) ?>">
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                  function deleteImage(index, imagePath, accommodationId) {
                    const imageDiv = $('#image-' + index);
                    if (confirm('Are you sure you want to delete this image?')) {
                      $.ajax({
                        url: '<?= site_url("accommodation/delete_image") ?>',
                        type: 'POST',
                        data: JSON.stringify({
                          image_path: imagePath,
                          accommodation_id: accommodationId
                        }),
                        contentType: 'application/json',
                        dataType: 'json',
                        success: function (data) {
                          if (data.success) {
                            imageDiv.hide();
                            alert('Image deleted successfully.');
                          } else {
                            alert('Error deleting image: ' + data.message);
                          }
                        },
                        error: function (error) {
                          console.error('Error:', error);
                        }
                      });
                    }
                  }
                </script>
                <!-- Submit Button -->
                <div class="text-center">
                  <a href="<?= site_url('/Admin/View_AllRooms') ?>" class="btn btn-secondary"
                    style="font-weight: bold;">Back</a>
                  <i>
                    <button type="submit" class="btn btn-warning" style="font-weight: bold;">Update</button>
                  </i>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Include jQuery and Summernote JS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
      <!-- Initialize Summernote -->
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