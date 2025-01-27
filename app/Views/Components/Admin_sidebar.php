<div class="sidebar close">
    <div class="logo-details">
        <i class='bx bx-menu'></i>
    </div>
    <ul class="nav-links">
        <li>
            <a href="<?= site_url('Admin/Dashbourd') ?>">
                <i class='bx bx-home-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="<?= site_url('Admin/Dashbourd') ?>">Dashboard</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= site_url('Admin/Booked_rooms') ?>">
                <i class='bx bx-calendar'></i>
                <span class="link_name">Booked</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="<?= site_url('Admin/Booked_rooms') ?>">Manage Booked</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= site_url('Admin/Payment_Info') ?>">
                <i class='bx bx-dollar-circle'></i> <!-- Updated icon -->
                <span class="link_name">Payment</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="<?= site_url('Admin/Payment_Info') ?>">Manage Payment</a></li>
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
                <li><a href="<?= site_url('Admin/Add_Room') ?>">Add Rooms</a></li>
                <li><a href="<?= site_url('Admin/View_AllRooms') ?>">View Rooms</a></li>
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
                <li><a href="<?= site_url('Admin/Contact_message') ?>">Contact Message</a></li>
                <li><a href="<?= site_url('Admin/Event_message') ?>">Event Message</a></li>
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
                <li><a href="<?= site_url('Admin/Staff_list') ?>">Manage Stafs</a></li>
                <li><a href="<?= site_url('Admin/User_list') ?>">Registered Client</a></li>
                <li><a href="<?= site_url('Admin/unregistered_clients') ?>">Unregisterd Client</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= site_url('Admin/Admin_profile') ?>">
                <i class='bx bx-cog'></i>
                <span class="link_name">Setting</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="<?= site_url('Admin/Admin_profile') ?>">Setting</a></li>
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
                Hotel Admin
            </span>
        </div>
        <!-- Greeting text aligned with profile photo -->
        <span style="font-weight: bold; color: #fff; font-size: 1.1rem; margin-left: 58rem;">
            <?= esc(strtoupper(session()->get('Role'))) ?>: <?= esc(session()->get('user_name')); ?>
        </span>
        <!-- Profile photo with link to user dashboard -->
        <a href="<?= site_url('Admin/Admin_profile'); ?>">
            <?php if (!empty($avatar)): ?>
                <img src="<?= base_url('uploads/' . esc(session()->get('avatar')) . '?t=' . time()); ?>" alt="profileImg"
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