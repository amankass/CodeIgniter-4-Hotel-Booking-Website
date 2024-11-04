<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/src/download.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
     <!-- Bootstrap JS Bundle -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <title>Booking SignUp</title>
    <style>
    body {
        background-color: #f8f9fa;
        padding-top: 70px;
    }
/* Upper Header Styling */
.upper-header {
            background-color: #800000;
            color: #f8f9fa;
            padding: 5px 0;
            position: fixed;
            top: 0;
            width: 100%;
            height: 60px;
            z-index: 1030; /* Above the main navbar */
            transition: background-color 0.3s ease;
        }
      
        .upper-header .navbar-text {
            color: #f8f9fa;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .upper-header .nav-link {
            color: #f8f9fa;
            transition: color 0.3s ease;
        }

        .upper-header .nav-link:hover {
            color: #FFA500; /* Same hover color as main navbar */
            text-decoration: none;
        }

        /* Main Navbar Styling */
        .main-navbar {
            background-color: #800000;
            color: #FFD700;
            padding: 10px 0;
            position: fixed;
            top: 55px; /* Height of the upper header */
            width: 100%;
            z-index: 1020;
            transition: opacity 0.3s ease;
        }

        .main-navbar .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: white;
            transition: color 0.3s ease;
        }

        .main-navbar .navbar-brand:hover {
            color: #FFA500;
            text-decoration: none;
        }

        .main-navbar .nav-link {
            color: #ffffff;
            font-weight: 500;
            margin-right: 15px; /* Added gap between nav links */
            transition: color 0.3s ease;
        }

        .main-navbar .nav-link:hover {
            color: #FFA500;
            text-decoration: none;
        }

        /* Book Now Button Styling */
        .book-btn {
        /* border: 2px solid transparent; No border initially */
        transition: border-color 0.3s ease; /* Smooth transition */
        background: url(klematis.jpg) repeat;
        border: 2px solid white;
        width: 150px;
        color: #f0f4f8;
       font-weight: bold;
    }

    .book-btn:hover {
        border-color: white; /* Blue border on hover */
        background-color: #FFA500;
    }

        /* Carousel Styling (If any) */
        .carousel-item img {
            height: 750px;
            object-fit: cover;
        }

        /* Dropdown Menu Styling */
        .dropdown-menu {
            background-color: #800000;
            border: none;
        }
      
        .dropdown-item {
            color: #ffffff;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dropdown-item:hover {
        background-color: transparent;
        color: #FFA500;
        border: none;
        }
        .main-navbar .nav-link.dropdown-toggle:hover,
.main-navbar .nav-link.dropdown-toggle:focus {
    border: none;          /* Removes any border */
    outline: none;         /* Removes the outline */
    box-shadow: none;      /* Removes any box-shadow */
}
        /* Adjustments for Responsive Upper Header */
        @media (max-width: 768px) {
            .upper-header .navbar-text {
                font-size: 12px;
            }
            .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0; /* Adjusts the dropdown position */
    }

    .nav-item.dropdown .dropdown-toggle::after {
        transform: rotate(-180deg);
    }
            .upper-header .ms-auto {
                flex-direction: column;
                align-items: flex-start;
            }
            .upper-header i{
                font-size: 9px;
            }
            .main-navbar {
                top: 55px; /* Adjust if upper header height changes on small screens */
            }

            .main-navbar .nav-link {
                margin-right: 0; /* Remove right margin on small screens */
                margin-bottom: 10px; /* Add bottom margin for spacing */
            }

            .navbar-nav {
                gap: 10px; /* Add gap between nav items in collapsed menu */
            }
}

    .carousel-item img {
    height: 750px; /* Adjust height as needed */
    object-fit: cover; /* Ensures images cover the area without distortion */
}

    .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

    .registration-container {
        width: 650px;
        margin-top: 5%;
        padding: 30px;
        border-radius: 8px;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .btn-info {
        transition: border-color 0.3s ease; /* Smooth transition */
        background: #800000;
        border: 2px solid white;
        width: 150px;
        color: #f0f4f8;
        font-weight: bold;
    }

    .btn-info:hover {
        border-color: #800000; /* Blue border on hover */
        background-color: #FFA500;
    }
.text-start{
    margin-top: -20px;
}
    </style>
</head>

<body>
  <!-- Upper Header -->
  <nav class="navbar upper-header">
    <div class="container">
        <div class="d-flex w-100 justify-content-end">
            <!-- Location Info -->
            <span class="navbar-text me-3 d-flex align-items-center">
                <i class="fas fa-map-marker-alt me-1"></i> Addis Ababa, Ethiopia
            </span>
            <!-- Email Info -->
            <span class="navbar-text me-3 d-flex align-items-center">
                <i class="fas fa-envelope me-1"></i> 
                <a href="mailto:info@ayahotel.com" class="nav-link p-0">info@ayahotel.com</a>
            </span>
            <!-- Profile and Logout for Logged-in Users -->
            <?php if (session()->get('logged_in')): ?>
                <span class="navbar-text d-flex align-items-center">
                    <i class="fas fa-user-alt me-1"></i>
                    <a href="<?= site_url('/dashboard'); ?>" class="nav-link p-0 me-2">Profile</a>
                    <a href="<?= site_url('auth/logout'); ?>" class="nav-link p-0">Logout</a>
                </span>
            <?php else: ?>
            <!-- Login | SignUp for Guests -->
            <span class="navbar-text d-flex align-items-center">
                <i class="fas fa-user-alt me-1"></i> 
                <a href="<?= site_url('auth/'); ?>" class="nav-link p-0">Login | SignUp</a>
            </span>
            <?php endif; ?>
        </div>
    </div>
</nav>

    <!-- Main Navbar -->
    <nav class="navbar main-navbar navbar-expand-lg navbar-dark">
        <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbarNav"
                aria-controls="mainNavbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/">HOTEL</a>
            <div class="collapse navbar-collapse" id="mainNavbarNav">
                <ul class="navbar-nav mx-auto gap-4">
                    <li class="nav-item">
                        <a class="nav-link" href="/">HOME</a>
                    </li>
                    <!-- Accommodation with Dropdown -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('/accommodations') ?>" id="accommodationDropdown">
                            ACCOMMODATION
                        </a>
                        <!-- <ul class="dropdown-menu" aria-labelledby="accommodationDropdown">
                            <li><a class="dropdown-item" href="<?= site_url('accommodation/type/Standard Room') ?>">Standard Room</a></li>
                            <hr style="color: #f0f4f8; margin-top:2px; margin-bottom: 0px">
                            <li><a class="dropdown-item" href="<?= site_url('accommodation/type/Premium Room') ?>">Premium Room</a></li>
                            <hr style="color: #f0f4f8; margin-top:2px; margin-bottom: 0px">
                            <li><a class="dropdown-item" href="<?= site_url('accommodation/type/Family Room') ?>">Family Room</a></li>
                            <hr style="color: #f0f4f8; margin-top:2px; margin-bottom: 0px">
                            <li><a class="dropdown-item" href="<?= site_url('accommodation/type/Executive Room') ?>">Executive Room</a></li>
                            <hr style="color: #f0f4f8; margin-top:2px; margin-bottom: 0px">
                            <li><a class="dropdown-item" href="<?= site_url('accommodation/type/Presidential Room') ?>">Presidential Room</a></li>
                            <hr style="color: #f0f4f8; margin-top:2px; margin-bottom: 0px">
                            <li><a class="dropdown-item" href="/accommodations">All Accommodation</a></li>
                        </ul> -->
                    </li>
                    <!-- Services with Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            SERVICES
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item"   href="<?= site_url('Service/restourant') ?>">Restaurant and Bar</a></li>
                            <hr style="color: #f0f4f8; margin-top:2px; margin-bottom: 0px">
                            <li><a class="dropdown-item"  href="<?= site_url('Service/event') ?>">Events</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gallary">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">CONTACT</a>
                    </li>
                </ul>
            </div>
            <!-- Book Now Button -->
            <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-warning book-btn">BOOK NOW</a>
            </div>
        </div>
    </nav>
<script>    
// Dropdown on Hover for Desktop
const dropdownElements = document.querySelectorAll('.nav-item.dropdown');
dropdownElements.forEach(function (dropdown) {
    // Check if the device is desktop
    if (window.innerWidth > 768) {
        // Initialize Bootstrap dropdown
        const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
        const bsDropdown = new bootstrap.Dropdown(dropdownToggle);
        // Show dropdown on mouseenter
        dropdown.addEventListener('mouseenter', function () {
            bsDropdown.show();
        });
        // Hide dropdown on mouseleave
        dropdown.addEventListener('mouseleave', function () {
            bsDropdown.hide();
        });
    }
});
// Optional: Update dropdown behavior on window resize
window.addEventListener('resize', function () {
    dropdownElements.forEach(function (dropdown) {
        const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
        const bsDropdown = bootstrap.Dropdown.getInstance(dropdownToggle);
        if (window.innerWidth > 768) {
            if (!bsDropdown) {
                // Initialize if not already
                new bootstrap.Dropdown(dropdownToggle);
            }
            // Show dropdown on mouseenter
            dropdown.addEventListener('mouseenter', function () {
                bsDropdown.show();
            });
            // Hide dropdown on mouseleave
            dropdown.addEventListener('mouseleave', function () {
                bsDropdown.hide();
            });
        } else {
            if (bsDropdown) {
                bsDropdown.dispose();
            }
        }
    });
});

        AOS.init();
        // Handle Scroll Opacity for Main Navbar
        const mainNavbar = document.querySelector('.main-navbar');
        window.addEventListener('scroll', () => {
            let scrollPosition = window.scrollY;
            if (scrollPosition > 100) {
                mainNavbar.style.opacity = '0.8';
            } else {
                mainNavbar.style.opacity = '1';
            }
        });
    </script>


    <div class="row justify-content-center">
        <div class="col-md-6 registration-container">
            <h4 class="text-center">Sign Up</h4>
            <hr>
            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('fail')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('fail'); ?>
            </div>
            <?php endif; ?>
<form action="<?= base_url('auth/registerUser') ?>" method="post" class="mb-3 row g-3">
                <?= csrf_field(); ?>
                <!-- Title -->
            <!-- <div class="form-group mb-3 col-md-6">
                <label for="title">Title</label>
                <select class="form-select" name="title" id="title" required>
                    <option value="">Choose...</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Miss">Miss</option>
                    <option value="Mrs.">Mrs.</option>
                </select>
                <span class="text-danger text-sm">
                    <?= isset($validation) ? display_form_errors($validation, 'title') : '' ?>
                </span>
            </div> -->
                <div class="form-group mb-3 col-md-6">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'name') : '' ?>
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
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password"
                        required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'password') : '' ?>
                    </span>
                </div>
                <!-- <div class="form-group mb-3 col-md-4">
                    <label for="date">Enter Your Birthday</label>
                    <input type="date" class="form-control" name="date" placeholder="Enter Your birthday" required>
                    <span class="text-danger text-sm">
                    <?= isset($validation) ? display_form_errors($validation, 'date') : '' ?>
                    </span>
                </div> -->
                 <!-- Nationality Dropdown -->
                 <!-- <div class="form-group mb-3 col-md-6">
                    <label for="nationality">Nationality</label>
                    <select class="form-select" name="nationality" required>
                        <option value="">Please select one</option>
                        <option value='afghan'>Afghan</option>
	<option value='albanian'>Albanian</option>
	<option value='algerian'>Algerian</option>
	<option value='american'>American</option>
	<option value='andorran'>Andorran</option>
	<option value='angolan'>Angolan</option>
	<option value='anguillan'>Anguillan</option>
	<option value='citizen-of-antigua-and-barbuda'>Citizen of Antigua and Barbuda</option>
	<option value='argentine'>Argentine</option>
	<option value='armenianaustralian'>ArmenianAustralian</option>
	<option value='austrian'>Austrian</option>
	<option value='azerbaijani'>Azerbaijani</option>
	<option value='bahamian'>Bahamian</option>
	<option value='bahraini'>Bahraini</option>
	<option value='bangladeshi'>Bangladeshi</option>
	<option value='barbadian'>Barbadian</option>
	<option value='belarusian'>Belarusian</option>
	<option value='belgian'>Belgian</option>
	<option value='belizean'>Belizean</option>
	<option value='beninese'>Beninese</option>
	<option value='bermudian'>Bermudian</option>
	<option value='bhutanese'>Bhutanese</option>
	<option value='bolivian'>Bolivian</option>
	<option value='citizen-of-bosnia-and-herzegovina'>Citizen of Bosnia and Herzegovina</option>
	<option value='botswanan'>Botswanan</option>
	<option value='brazilian'>Brazilian</option>
	<option value='british'>British</option>
	<option value='british-virgin-islander'>British Virgin Islander</option>
	<option value='bruneian'>Bruneian</option>
	<option value='bulgarian'>Bulgarian</option>
	<option value='burkinan'>Burkinan</option>
	<option value='burmese'>Burmese</option>
	<option value='burundian'>Burundian</option>
	<option value='cambodian'>Cambodian</option>
	<option value='cameroonian'>Cameroonian</option>
	<option value='canadian'>Canadian</option>
	<option value='cape-verdean'>Cape Verdean</option>
	<option value='cayman-islander'>Cayman Islander</option>
	<option value='central-african'>Central African</option>
	<option value='chadian'>Chadian</option>
	<option value='chilean'>Chilean</option>
	<option value='chinese'>Chinese</option>
	<option value='colombian'>Colombian</option>
	<option value='comoran'>Comoran</option>
	<option value='congolese-(congo)'>Congolese (Congo)</option>
	<option value='congolese-(drc)'>Congolese (DRC)</option>
	<option value='cook-islander'>Cook Islander</option>
	<option value='costa-rican'>Costa Rican</option>
	<option value='croatian'>Croatian</option>
	<option value='cuban'>Cuban</option>
	<option value='cymraes'>Cymraes</option>
	<option value='cymro'>Cymro</option>
	<option value='cypriot'>Cypriot</option>
	<option value='czech'>Czech</option>
	<option value='danish'>Danish</option>
	<option value='djiboutian'>Djiboutian</option>
	<option value='dominican'>Dominican</option>
	<option value='citizen-of-the-dominican-republic'>Citizen of the Dominican Republic</option>
	<option value='dutch'>Dutch</option>
	<option value='east-timorese'>East Timorese</option>
	<option value='ecuadorean'>Ecuadorean</option>
	<option value='egyptian'>Egyptian</option>
	<option value='emirati'>Emirati</option>
	<option value='english'>English</option>
	<option value='equatorial-guinean'>Equatorial Guinean</option>
	<option value='eritrean'>Eritrean</option>
	<option value='estonian'>Estonian</option>
	<option value='ethiopian'>Ethiopian</option>
	<option value='faroese'>Faroese</option>
	<option value='fijian'>Fijian</option>
	<option value='filipino'>Filipino</option>
	<option value='finnish'>Finnish</option>
	<option value='french'>French</option>
	<option value='gabonese'>Gabonese</option>
	<option value='gambian'>Gambian</option>
	<option value='georgian'>Georgian</option>
	<option value='german'>German</option>
	<option value='ghanaian'>Ghanaian</option>
	<option value='gibraltarian'>Gibraltarian</option>
	<option value='greek'>Greek</option>
	<option value='greenlandic'>Greenlandic</option>
	<option value='grenadian'>Grenadian</option>
	<option value='guamanian'>Guamanian</option>
	<option value='guatemalan'>Guatemalan</option>
	<option value='citizen-of-guinea-bissau'>Citizen of Guinea-Bissau</option>
	<option value='guinean'>Guinean</option>
	<option value='guyanese'>Guyanese</option>
	<option value='haitian'>Haitian</option>
	<option value='honduran'>Honduran</option>
	<option value='hong-konger'>Hong Konger</option>
	<option value='hungarian'>Hungarian</option>
	<option value='icelandic'>Icelandic</option>
	<option value='indian'>Indian</option>
	<option value='indonesian'>Indonesian</option>
	<option value='iranian'>Iranian</option>
	<option value='iraqi'>Iraqi</option>
	<option value='irish'>Irish</option>
	<option value='israeli'>Israeli</option>
	<option value='italian'>Italian</option>
	<option value='ivorian'>Ivorian</option>
	<option value='jamaican'>Jamaican</option>
	<option value='japanese'>Japanese</option>
	<option value='jordanian'>Jordanian</option>
	<option value='kazakh'>Kazakh</option>
	<option value='kenyan'>Kenyan</option>
	<option value='kittitian'>Kittitian</option>
	<option value='citizen-of-kiribati'>Citizen of Kiribati</option>
	<option value='kosovan'>Kosovan</option>
	<option value='kuwaiti'>Kuwaiti</option>
	<option value='kyrgyz'>Kyrgyz</option>
	<option value='lao'>Lao</option>
	<option value='latvian'>Latvian</option>
	<option value='lebanese'>Lebanese</option>
	<option value='liberian'>Liberian</option>
	<option value='libyan'>Libyan</option>
	<option value='liechtenstein-citizen'>Liechtenstein citizen</option>
	<option value='lithuanian'>Lithuanian</option>
	<option value='luxembourger'>Luxembourger</option>
	<option value='macanese'>Macanese</option>
	<option value='macedonian'>Macedonian</option>
	<option value='malagasy'>Malagasy</option>
	<option value='malawian'>Malawian</option>
	<option value='malaysian'>Malaysian</option>
	<option value='maldivian'>Maldivian</option>
	<option value='malian'>Malian</option>
	<option value='maltese'>Maltese</option>
	<option value='marshallese'>Marshallese</option>
	<option value='martiniquais'>Martiniquais</option>
	<option value='mauritanian'>Mauritanian</option>
	<option value='mauritian'>Mauritian</option>
	<option value='mexican'>Mexican</option>
	<option value='micronesian'>Micronesian</option>
	<option value='moldovan'>Moldovan</option>
	<option value='monegasque'>Monegasque</option>
	<option value='mongolian'>Mongolian</option>
	<option value='montenegrin'>Montenegrin</option>
	<option value='montserratian'>Montserratian</option>
	<option value='moroccan'>Moroccan</option>
	<option value='mosotho'>Mosotho</option>
	<option value='mozambican'>Mozambican</option>
	<option value='namibian'>Namibian</option>
	<option value='nauruan'>Nauruan</option>
	<option value='nepalese'>Nepalese</option>
	<option value='new-zealander'>New Zealander</option>
	<option value='nicaraguan'>Nicaraguan</option>
	<option value='nigerian'>Nigerian</option>
	<option value='nigerien'>Nigerien</option>
	<option value='niuean'>Niuean</option>
	<option value='north-korean'>North Korean</option>
	<option value='northern-irish'>Northern Irish</option>
	<option value='norwegian'>Norwegian</option>
	<option value='omani'>Omani</option>
	<option value='pakistani'>Pakistani</option>
	<option value='palauan'>Palauan</option>
	<option value='palestinian'>Palestinian</option>
	<option value='panamanian'>Panamanian</option>
	<option value='papua-new-guinean'>Papua New Guinean</option>
	<option value='paraguayan'>Paraguayan</option>
	<option value='peruvian'>Peruvian</option>
	<option value='pitcairn-islander'>Pitcairn Islander</option>
	<option value='polish'>Polish</option>
	<option value='portuguese'>Portuguese</option>
	<option value='prydeinig'>Prydeinig</option>
	<option value='puerto-rican'>Puerto Rican</option>
	<option value='qatari'>Qatari</option>
	<option value='romanian'>Romanian</option>
	<option value='russian'>Russian</option>
	<option value='rwandan'>Rwandan</option>
	<option value='salvadorean'>Salvadorean</option>
	<option value='sammarinese'>Sammarinese</option>
	<option value='samoan'>Samoan</option>
	<option value='sao-tomean'>Sao Tomean</option>
	<option value='saudi-arabian'>Saudi Arabian</option>
	<option value='scottish'>Scottish</option>
	<option value='senegalese'>Senegalese</option>
	<option value='serbian'>Serbian</option>
	<option value='citizen-of-seychelles'>Citizen of Seychelles</option>
	<option value='sierra-leonean'>Sierra Leonean</option>
	<option value='singaporean'>Singaporean</option>
	<option value='slovak'>Slovak</option>
	<option value='slovenian'>Slovenian</option>
	<option value='solomon-islander'>Solomon Islander</option>
	<option value='somali'>Somali</option>
	<option value='south-african'>South African</option>
	<option value='south-korean'>South Korean</option>
	<option value='south-sudanese'>South Sudanese</option>
	<option value='spanish'>Spanish</option>
	<option value='sri-lankan'>Sri Lankan</option>
	<option value='st-helenian'>St Helenian</option>
	<option value='st-lucian'>St Lucian</option>
	<option value='stateless'>Stateless</option>
	<option value='sudanese'>Sudanese</option>
	<option value='surinamese'>Surinamese</option>
	<option value='swazi'>Swazi</option>
	<option value='swedish'>Swedish</option>
	<option value='swiss'>Swiss</option>
	<option value='syrian'>Syrian</option>
	<option value='taiwanese'>Taiwanese</option>
	<option value='tajik'>Tajik</option>
	<option value='tanzanian'>Tanzanian</option>
	<option value='thai'>Thai</option>
	<option value='togolese'>Togolese</option>
	<option value='tongan'>Tongan</option>
	<option value='trinidadian'>Trinidadian</option>
	<option value='tristanian'>Tristanian</option>
	<option value='tunisian'>Tunisian</option>
	<option value='turkish'>Turkish</option>
	<option value='turkmen'>Turkmen</option>
	<option value='turks-and-caicos-islander'>Turks and Caicos Islander</option>
	<option value='tuvaluan'>Tuvaluan</option>
	<option value='ugandan'>Ugandan</option>
	<option value='ukrainian'>Ukrainian</option>
	<option value='uruguayan'>Uruguayan</option>
	<option value='uzbek'>Uzbek</option>
	<option value='vatican-citizen'>Vatican citizen</option>
	<option value='citizen-of-vanuatu'>Citizen of Vanuatu</option>
	<option value='venezuelan'>Venezuelan</option>
	<option value='vietnamese'>Vietnamese</option>
	<option value='vincentian'>Vincentian</option>
	<option value='wallisian'>Wallisian</option>
	<option value='welsh'>Welsh</option>
	<option value='yemeni'>Yemeni</option>
	<option value='zambian'>Zambian</option>
	<option value='zimbabwean'>Zimbabwean</option>
                    </select>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'nationality') : '' ?>
                    </span>
                </div> -->

<!-- Country Dropdown -->
<!-- <div class="form-group mb-3 col-md-6">
                    <label for="country">Country</label>
                    <select class="form-select" autocomplete="country" id="country" name="country">
    <option value="">country</option>
    <option value="AF">Afghanistan</option>
    <option value="AX">Åland Islands</option>
    <option value="AL">Albania</option>
    <option value="DZ">Algeria</option>
    <option value="AS">American Samoa</option>
    <option value="AD">Andorra</option>
    <option value="AO">Angola</option>
    <option value="AI">Anguilla</option>
    <option value="AQ">Antarctica</option>
    <option value="AG">Antigua and Barbuda</option>
    <option value="AR">Argentina</option>
    <option value="AM">Armenia</option>
    <option value="AW">Aruba</option>
    <option value="AU">Australia</option>
    <option value="AT">Austria</option>
    <option value="AZ">Azerbaijan</option>
    <option value="BS">Bahamas</option>
    <option value="BH">Bahrain</option>
    <option value="BD">Bangladesh</option>
    <option value="BB">Barbados</option>
    <option value="BY">Belarus</option>
    <option value="BE">Belgium</option>
    <option value="BZ">Belize</option>
    <option value="BJ">Benin</option>
    <option value="BM">Bermuda</option>
    <option value="BT">Bhutan</option>
    <option value="BO">Bolivia (Plurinational State of)</option>
    <option value="BA">Bosnia and Herzegovina</option>
    <option value="BW">Botswana</option>
    <option value="BV">Bouvet Island</option>
    <option value="BR">Brazil</option>
    <option value="IO">British Indian Ocean Territory</option>
    <option value="BN">Brunei Darussalam</option>
    <option value="BG">Bulgaria</option>
    <option value="BF">Burkina Faso</option>
    <option value="BI">Burundi</option>
    <option value="CV">Cabo Verde</option>
    <option value="KH">Cambodia</option>
    <option value="CM">Cameroon</option>
    <option value="CA">Canada</option>
    <option value="BQ">Caribbean Netherlands</option>
    <option value="KY">Cayman Islands</option>
    <option value="CF">Central African Republic</option>
    <option value="TD">Chad</option>
    <option value="CL">Chile</option>
    <option value="CN">China</option>
    <option value="CX">Christmas Island</option>
    <option value="CC">Cocos (Keeling) Islands</option>
    <option value="CO">Colombia</option>
    <option value="KM">Comoros</option>
    <option value="CG">Congo</option>
    <option value="CD">Congo, Democratic Republic of the</option>
    <option value="CK">Cook Islands</option>
    <option value="CR">Costa Rica</option>
    <option value="HR">Croatia</option>
    <option value="CU">Cuba</option>
    <option value="CW">Curaçao</option>
    <option value="CY">Cyprus</option>
    <option value="CZ">Czech Republic</option>
    <option value="CI">Côte d'Ivoire</option>
    <option value="DK">Denmark</option>
    <option value="DJ">Djibouti</option>
    <option value="DM">Dominica</option>
    <option value="DO">Dominican Republic</option>
    <option value="EC">Ecuador</option>
    <option value="EG">Egypt</option>
    <option value="SV">El Salvador</option>
    <option value="GQ">Equatorial Guinea</option>
    <option value="ER">Eritrea</option>
    <option value="EE">Estonia</option>
    <option value="SZ">Eswatini (Swaziland)</option>
    <option value="ET">Ethiopia</option>
    <option value="FK">Falkland Islands (Malvinas)</option>
    <option value="FO">Faroe Islands</option>
    <option value="FJ">Fiji</option>
    <option value="FI">Finland</option>
    <option value="FR">France</option>
    <option value="GF">French Guiana</option>
    <option value="PF">French Polynesia</option>
    <option value="TF">French Southern Territories</option>
    <option value="GA">Gabon</option>
    <option value="GM">Gambia</option>
    <option value="GE">Georgia</option>
    <option value="DE">Germany</option>
    <option value="GH">Ghana</option>
    <option value="GI">Gibraltar</option>
    <option value="GR">Greece</option>
    <option value="GL">Greenland</option>
    <option value="GD">Grenada</option>
    <option value="GP">Guadeloupe</option>
    <option value="GU">Guam</option>
    <option value="GT">Guatemala</option>
    <option value="GG">Guernsey</option>
    <option value="GN">Guinea</option>
    <option value="GW">Guinea-Bissau</option>
    <option value="GY">Guyana</option>
    <option value="HT">Haiti</option>
    <option value="HM">Heard Island and Mcdonald Islands</option>
    <option value="HN">Honduras</option>
    <option value="HK">Hong Kong</option>
    <option value="HU">Hungary</option>
    <option value="IS">Iceland</option>
    <option value="IN">India</option>
    <option value="ID">Indonesia</option>
    <option value="IR">Iran</option>
    <option value="IQ">Iraq</option>
    <option value="IE">Ireland</option>
    <option value="IM">Isle of Man</option>
    <option value="IL">Israel</option>
    <option value="IT">Italy</option>
    <option value="JM">Jamaica</option>
    <option value="JP">Japan</option>
    <option value="JE">Jersey</option>
    <option value="JO">Jordan</option>
    <option value="KZ">Kazakhstan</option>
    <option value="KE">Kenya</option>
    <option value="KI">Kiribati</option>
    <option value="KP">Korea, North</option>
    <option value="KR">Korea, South</option>
    <option value="XK">Kosovo</option>
    <option value="KW">Kuwait</option>
    <option value="KG">Kyrgyzstan</option>
    <option value="LA">Lao People's Democratic Republic</option>
    <option value="LV">Latvia</option>
    <option value="LB">Lebanon</option>
    <option value="LS">Lesotho</option>
    <option value="LR">Liberia</option>
    <option value="LY">Libya</option>
    <option value="LI">Liechtenstein</option>
    <option value="LT">Lithuania</option>
    <option value="LU">Luxembourg</option>
    <option value="MO">Macao</option>
    <option value="MK">Macedonia North</option>
    <option value="MG">Madagascar</option>
    <option value="MW">Malawi</option>
    <option value="MY">Malaysia</option>
    <option value="MV">Maldives</option>
    <option value="ML">Mali</option>
    <option value="MT">Malta</option>
    <option value="MH">Marshall Islands</option>
    <option value="MQ">Martinique</option>
    <option value="MR">Mauritania</option>
    <option value="MU">Mauritius</option>
    <option value="YT">Mayotte</option>
    <option value="MX">Mexico</option>
    <option value="FM">Micronesia</option>
    <option value="MD">Moldova</option>
    <option value="MC">Monaco</option>
    <option value="MN">Mongolia</option>
    <option value="ME">Montenegro</option>
    <option value="MS">Montserrat</option>
    <option value="MA">Morocco</option>
    <option value="MZ">Mozambique</option>
    <option value="MM">Myanmar (Burma)</option>
    <option value="NA">Namibia</option>
    <option value="NR">Nauru</option>
    <option value="NP">Nepal</option>
    <option value="NL">Netherlands</option>
    <option value="AN">Netherlands Antilles</option>
    <option value="NC">New Caledonia</option>
    <option value="NZ">New Zealand</option>
    <option value="NI">Nicaragua</option>
    <option value="NE">Niger</option>
    <option value="NG">Nigeria</option>
    <option value="NU">Niue</option>
    <option value="NF">Norfolk Island</option>
    <option value="MP">Northern Mariana Islands</option>
    <option value="NO">Norway</option>
    <option value="OM">Oman</option>
    <option value="PK">Pakistan</option>
    <option value="PW">Palau</option>
    <option value="PS">Palestine</option>
    <option value="PA">Panama</option>
    <option value="PG">Papua New Guinea</option>
    <option value="PY">Paraguay</option>
    <option value="PE">Peru</option>
    <option value="PH">Philippines</option>
    <option value="PN">Pitcairn Islands</option>
    <option value="PL">Poland</option>
    <option value="PT">Portugal</option>
    <option value="PR">Puerto Rico</option>
    <option value="QA">Qatar</option>
    <option value="RE">Reunion</option>
    <option value="RO">Romania</option>
    <option value="RU">Russian Federation</option>
    <option value="RW">Rwanda</option>
    <option value="BL">Saint Barthelemy</option>
    <option value="SH">Saint Helena</option>
    <option value="KN">Saint Kitts and Nevis</option>
    <option value="LC">Saint Lucia</option>
    <option value="MF">Saint Martin</option>
    <option value="PM">Saint Pierre and Miquelon</option>
    <option value="VC">Saint Vincent and the Grenadines</option>
    <option value="WS">Samoa</option>
    <option value="SM">San Marino</option>
    <option value="ST">Sao Tome and Principe</option>
    <option value="SA">Saudi Arabia</option>
    <option value="SN">Senegal</option>
    <option value="RS">Serbia</option>
    <option value="CS">Serbia and Montenegro</option>
    <option value="SC">Seychelles</option>
    <option value="SL">Sierra Leone</option>
    <option value="SG">Singapore</option>
    <option value="SX">Sint Maarten</option>
    <option value="SK">Slovakia</option>
    <option value="SI">Slovenia</option>
    <option value="SB">Solomon Islands</option>
    <option value="SO">Somalia</option>
    <option value="ZA">South Africa</option>
    <option value="GS">South Georgia and the South Sandwich Islands</option>
    <option value="SS">South Sudan</option>
    <option value="ES">Spain</option>
    <option value="LK">Sri Lanka</option>
    <option value="SD">Sudan</option>
    <option value="SR">Suriname</option>
    <option value="SJ">Svalbard and Jan Mayen</option>
    <option value="SE">Sweden</option>
    <option value="CH">Switzerland</option>
    <option value="SY">Syria</option>
    <option value="TW">Taiwan</option>
    <option value="TJ">Tajikistan</option>
    <option value="TZ">Tanzania</option>
    <option value="TH">Thailand</option>
    <option value="TL">Timor-Leste</option>
    <option value="TG">Togo</option>
    <option value="TK">Tokelau</option>
    <option value="TO">Tonga</option>
    <option value="TT">Trinidad and Tobago</option>
    <option value="TN">Tunisia</option>
    <option value="TR">Turkey (Türkiye)</option>
    <option value="TM">Turkmenistan</option>
    <option value="TC">Turks and Caicos Islands</option>
    <option value="TV">Tuvalu</option>
    <option value="UM">U.S. Outlying Islands</option>
    <option value="UG">Uganda</option>
    <option value="UA">Ukraine</option>
    <option value="AE">United Arab Emirates</option>
    <option value="GB">United Kingdom</option>
    <option value="US">United States</option>
    <option value="UY">Uruguay</option>
    <option value="UZ">Uzbekistan</option>
    <option value="VU">Vanuatu</option>
    <option value="VA">Vatican City Holy See</option>
    <option value="VE">Venezuela</option>
    <option value="VN">Vietnam</option>
    <option value="VG">Virgin Islands, British</option>
    <option value="VI">Virgin Islands, U.S</option>
    <option value="WF">Wallis and Futuna</option>
    <option value="EH">Western Sahara</option>
    <option value="YE">Yemen</option>
    <option value="ZM">Zambia</option>
    <option value="ZW">Zimbabwe</option>
</select>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'nationality') : '' ?>
                    </span>
                </div> -->

                <!-- <div class="form-group mb-3 col-md-6">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="state" placeholder="Enter Your state" required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'state') : '' ?>
                    </span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="City">City</label>
                    <input type="text" class="form-control" name="City" placeholder="Enter Your City" required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'City') : '' ?>
                    </span>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="street">Street Address</label>
                    <input type="text" class="form-control" name="street" placeholder="Enter Your street Address" required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'street') : '' ?>
                    </span>
                </div> -->
                <!-- <div class="form-group mb-3 col-md-6">
                    <label for="zipcode">Postal/Zipcode</label>
                    <input type="text" class="form-control" name="zipcode" placeholder="Enter Your Postal/Zipcode" required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'zipcode') : '' ?>
                    </span>
                </div> -->
               
                <!-- <div class="form-group mb-3 col-md-6">
                    <label for="passwordConf">Confirm Password</label>
                    <input type="password" class="form-control" name="passwordConf" placeholder="Confirm Password"
                        required>
                    <span class="text-danger text-sm">
                        <?= isset($validation) ? display_form_errors($validation, 'passwordConf') : '' ?>
                    </span>
                </div> -->
                <div class="form-group mb-3 col-md-6">
                    <button type="submit" class="btn btn-info btn-block">Sign Up</button>
                </div>
            </form>
            <div class="text-start">
                <span>I already have an account:</span>
                <a href="<?= site_url('auth'); ?>"> Login </a>
            </div>
        </div>
    </div>
     <!-- <script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
 </script> -->
</body>
</html>