<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// Add these routes for your Auth controller
$routes->get('auth', 'Auth::index'); // Route for the Login page
$routes->get('/contact', 'Home::contact');
$routes->get('/sample', 'Home::sample');
$routes->get('/accommodations', 'Accommodation::index');
$routes->post('/auth/update', 'Auth::update');
$routes->post('/Admin/admin_profile_update', 'Admin::admin_profile_update');


$routes->get('/gallary', 'Home::gallary');
$routes->get('/payment', 'Home::payment');
$routes->get('/service', 'Home::service');
$routes->get('/edit_profile', 'Home::edit_profile');
$routes->post('Home/markAsSeen', 'Home::markAsSeen');
$routes->post('Home/markAsSeen2', 'Home::markAsSeen2');
$routes->post('Home/markAsSeen3', 'Home::markAsSeen3');
$routes->post('Home/markAsSeen4', 'Home::markAsSeen4');
$routes->post('Home/submit', 'Home::submit');


$routes->get('Service/event', 'Home::event');
$routes->get('Service/restourant', 'Home::restourant');
$routes->get('auth/register', 'Auth::register'); // Route for the Registration page
$routes->post('auth/registerUser', 'Auth::registerUser'); // Route for Registration
$routes->get('auth/Password_resete', 'Auth::Password_resete'); // Route for Registration
$routes->post('auth/loginUser', 'Auth::loginUser'); // Route for User Login
$routes->get('/dashboard', 'Auth::dashboard'); // Route for Users Profile Dashbourd
$routes->get('/auth/logout', 'Auth::logout'); // Route for User Logout
$routes->post('/auth/upload', 'Auth::upload'); // Route for image upload
$routes->post('/auth/cover_upload', 'Auth::cover_upload'); // Route for image upload
$routes->get('/auth/verify', 'Auth::verify'); // Route for OTP verification page
// $routes->get('/auth/blog', 'Auth::blog'); Route for blog page (optional, can be removed)
$routes->get('/auth/blogform', 'Auth::blogform'); // Route for blog form (optional, can be removed)
$routes->post('/auth/verifyOtp', 'Auth::verifyOtp'); // Route for OTP verification form submission
$routes->post('/auth/forgotPassword', 'Auth::forgotPassword'); // Route for OTP verification form submission
$routes->post('/auth/resetPassword', 'Auth::resetPassword'); // Route for OTP verification form submission
$routes->get('auth/booking-history', 'Auth::getBookingHistory');

// Booking route
$routes->get('booking/confirmation', 'Bookings::confirmation');
$routes->get('bookings/form/(:num)', 'Bookings::form/$1');      // Load the booking form by accommodation ID
$routes->post('bookings/submit', 'Bookings::submit');            // Handle booking submission
$routes->post('bookings/Store_Payment', 'Bookings::Store_Payment');            // Handle booking submission
$routes->get('bookings/confirmation', 'Bookings::confirmation'); // Show booking confirmation
$routes->get('/bookings/checkin/(:num)', 'BookingController::checkIn/$1');
$routes->get('/bookings/checkout/(:num)', 'BookingController::checkOut/$1');
$routes->get('/bookings/edit_booking/(:num)', 'Bookings::edit_booking/$1');
$routes->post('/bookings/update_booking/(:num)', 'Bookings::update_booking/$1');
$routes->get('/bookings/delete_Booked/(:num)', 'Bookings::delete_Booked/$1');



$routes->get('Admin/dashbourd', 'Admin::index');
$routes->get('Admin/Dashbourd', 'Admin::Dashbourd');
$routes->get('Admin/User_list', 'Admin::User_list');
$routes->get('/Admin/unregistered_clients', 'Admin::unregistered_clients');
$routes->get('Admin/Staff_list', 'Admin::Staff_list');
$routes->get('Admin/Admin_profile', 'Admin::Admin_profile');
$routes->post('Admin/registerStaff', 'Admin::registerStaff');
$routes->get('/Admin/delete_Staff/(:num)', 'Admin::delete_Staff/$1');
$routes->post('Home/eventcontact', 'Home::eventcontact');
$routes->post('Home/contact', 'Home::contact_message');
$routes->get('accommodation/search', 'Accommodation::search');



$routes->get('/Admin/edit_profile', 'Admin::edit_profile');
$routes->post('/Admin/admin_upload', 'Admin::admin_upload');
$routes->post('/admin/Admin_cover_upload', 'Admin::admin_cover_upload'); 
$routes->get('/Admin/edit_staff/(:num)', 'Admin::edit_staff/$1');
$routes->post('/Admin/update_staff', 'Admin::update_staff');
$routes->get('Admin/Payment_Info', 'Admin::view_payment_message');
$routes->get('Admin/Booked_rooms', 'Admin::Booked_rooms');
$routes->get('Admin/Add_Room', 'Admin::Add_Room');
$routes->get('Admin/View_AllRooms', 'Admin::View_AllRooms');
$routes->get('Admin/chartdatas', 'Admin::chartdatas');
$routes->get('Admin/Event_message', 'Admin::vieweventmessage');
$routes->get('Admin/Contact_message', 'Admin::viewecontactmessage');
$routes->get('/Admin/delete_ContactMessage/(:num)', 'Admin::delete_ContactMessage/$1');
$routes->get('/Admin/delete_EventMessage/(:num)', 'Admin::delete_EventMessage/$1');
$routes->get('/Admin/delete_UnregisteredUser/(:num)', 'Admin::delete_UnregisteredUser/$1');
$routes->get('accommodation/create', 'accommodation::create'); // Route to create a new blog post
$routes->post('accommodation/store', 'accommodation::store'); // Route to store a new blog post
$routes->get('accommodation/edit/(:num)', 'Accommodation::edit/$1'); // Edit accommodation
$routes->post('accommodation/update/(:num)', 'Accommodation::update/$1'); // Update accommodation
$routes->post('accommodation/delete/(:num)', 'Accommodation::delete/$1'); // Delete accommodation
$routes->get('accommodation/type/(:any)', 'Accommodation::filterByType/$1'); // Filter accommodations by type
$routes->post('accommodation/delete_image', 'Accommodation::delete_image');



$routes->get('Staff/staff_Profile', 'StaffController::staff_Profile');
$routes->get('staff', 'StaffController::index');
$routes->get('staff/staff_booked', 'StaffController::booked');
$routes->get('staff/staff_addacom', 'StaffController::store');
$routes->get('staff/staff_viewaccom', 'StaffController::viewaccom');
$routes->post('staff/store', 'StaffController::store');
$routes->post('staff/update/(:num)', 'StaffController::update/$1');
$routes->get('staff/staff_update_accom/(:num)', 'StaffController::edit/$1');
$routes->get('staff/staff_userlist', 'StaffController::userlist');
$routes->get('staff/staff_unregistered_clientList', 'StaffController::unregistered_clients');
$routes->get('/Staff/delete_UnregisteredUser/(:num)', 'StaffController::delete_UnregisteredUser/$1');
$routes->get('staff/staff_event_message', 'StaffController::view_eventmessage');
$routes->get('staff/staff_Contact_message', 'StaffController::view_contactmessage');
$routes->get('staff/Payment_info', 'StaffController::view_payment_message');
$routes->get('/StaffController/delete_ContactMessage/(:num)', 'StaffController::delete_ContactMessage/$1');
$routes->get('/StaffController/delete_EventMessage/(:num)', 'StaffController::delete_EventMessage/$1');
$routes->post('/staff/Update_Booking/(:num)', 'StaffController::update_booking/$1');
$routes->get('/staff/edit_booking/(:num)', 'StaffController::edit_booking/$1');

$routes->post('/staff/staff_upload', 'StaffController::staff_upload');
$routes->post('/staff/staff_cover_upload', 'StaffController::staff_cover_upload'); 
$routes->post('/staff/staff_profile_update', 'StaffController::staff_profile_update');
$routes->post('/staff/update_password', 'StaffController::update_password');