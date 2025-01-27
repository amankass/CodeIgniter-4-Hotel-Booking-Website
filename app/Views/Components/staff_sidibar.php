<div class="sidebar close">
  <div class="logo-details">
    <i class='bx bx-menu'></i>
  </div>
  <ul class="nav-links">
    <li>
      <a href="<?= site_url('/staff') ?>">
        <i class='bx bx-home-alt'></i>
        <span class="link_name">Dashboard</span>
      </a>
      <ul class="sub-menu blank">
        <li><a class="link_name" href="<?= site_url('/staff') ?>">Dashboard</a></li>
      </ul>
    </li>
    <li>
      <a href="<?= site_url('staff/staff_booked') ?>">
        <i class='bx bx-calendar'></i>
        <span class="link_name">Booked</span>
      </a>
      <ul class="sub-menu blank">
        <li><a class="link_name" href="<?= site_url('staff/staff_booked') ?>">Manage Booked</a></li>
      </ul>
    </li>
    <li>
      <a href="<?= site_url('staff/Payment_info') ?>">
        <i class='bx bx-dollar-circle'></i> <!-- Updated icon -->
        <span class="link_name">Payment</span>
      </a>
      <ul class="sub-menu blank">
        <li><a class="link_name" href="<?= site_url('staff/Payment_info') ?>">Manage Payment</a></li>
      </ul>
    </li>

    <li>
      <div class="iocn-link">
        <a href="#">
          <i class='bx bx-bed'></i>
          <span class="link_name">Rooms</span>
        </a>
        <i class='bx bxs-chevron-down arrow'></i>
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="#">Manage Rooms</a></li>
        <li><a href="<?= site_url('staff/staff_addacom') ?>">Add Rooms</a></li>
        <li><a href="<?= site_url('staff/staff_viewaccom') ?>">View Rooms</a></li>
      </ul>
    </li>
    <li>
      <div class="iocn-link">
        <a href="#">
          <i class="bx bx-message-check"></i>
          <span class="link_name">Message</span>
        </a>
        <i class='bx bxs-chevron-down arrow'></i>
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="#">Manage Message</a></li>
        <li><a href="<?= site_url('staff/staff_Contact_message') ?>">Contact Message</a></li>
        <li><a href="<?= site_url('staff/staff_event_message') ?>">Event Message</a></li>
      </ul>
    </li>
    <li>
      <div class="iocn-link">
        <a href="#">
          <i class="bi bi-person-badge"></i>
          <span class="link_name">User</span>
        </a>
        <i class='bx bxs-chevron-down arrow'></i>
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="#">Manage User</a></li>
        <li><a href="<?= site_url('staff/staff_userlist') ?>">Registered Client</a></li>
        <li><a href="<?= site_url('staff/staff_unregistered_clientList') ?>">Unregisterd Client</a></li>
      </ul>
    </li>
    <li>
      <a href="<?= site_url('Staff/staff_Profile') ?>">
        <i class='bx bx-cog'></i>
        <span class="link_name">Setting</span>
      </a>
      <ul class="sub-menu blank">
        <li><a class="link_name" href="<?= site_url('Staff/staff_Profile') ?>">Setting</a></li>
      </ul>
    </li>
    <li>
      <div class="profile-details">
        <a href="<?= site_url('auth/logout'); ?>" class="btn ">
          <i class='bx bx-log-out'></i>
          <span class="link_name">LogOut</span>
        </a>
      </div>
    </li>
  </ul>
</div>
<section class="home-section">
  <div class="home-content fixed-top"
    style="display: flex; align-items: center; justify-content: space-between; padding: 0 1rem;">
    <div style="display: flex; align-items: center;">
      <span class="logo_name"
        style="font-weight: bold; color: #fff; font-size: 1.2rem; text-transform: uppercase; margin-right: auto;">
        Hotel Staffs
      </span>
    </div>
    <!-- Greeting text aligned with profile photo -->
    <span style="font-weight: bold; color: #fff; font-size: 1.1rem; margin-left: 58rem;">
      <?= esc(strtoupper(session()->get('Role'))) ?>: <?= esc(session()->get('user_name')); ?>
    </span>
    <!-- Profile photo with link to user dashboard -->
    <a href="<?= site_url('Staff/staff_Profile'); ?>">
      <?php if (!empty($avatar)): ?>
        <img src="<?= base_url('uploads/' . esc(session()->get('avatar'))); ?>" alt="profileImg"
          class="me-4 rounded-circle" style="width: 50px; height: 50px;">
      <?php else: ?>
        <img src="<?= base_url('uploads/' . esc(session()->get('avatar'))); ?>" alt="profileImg"
          class="me-4 rounded-circle" style="width: 50px; height: 50px;">
      <?php endif; ?>
    </a>
  </div>
</section>
<script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e) => {
      let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
      arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");
  });
</script>