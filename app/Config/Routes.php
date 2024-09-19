<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// Add these routes for your Auth controller
$routes->get('auth', 'Auth::index'); // Route for the Login page
$routes->get('auth/register', 'Auth::register'); // Route for the Registration page
$routes->post('auth/registerUser', 'Auth::registerUser'); // Route for Registration
$routes->post('auth/loginUser', 'Auth::loginUser'); // Route for User Login
$routes->get('/dashboard', 'Auth::dashboard'); // Route for Users Profile Dashbourd
$routes->get('/auth/logout', 'Auth::logout'); // Route for User Logout
$routes->post('/auth/upload', 'Auth::upload'); // Route for image upload
$routes->get('/auth/verify', 'Auth::verify'); // Route for OTP verification page
// $routes->get('/auth/blog', 'Auth::blog'); Route for blog page (optional, can be removed)
$routes->get('/auth/blogform', 'Auth::blogform'); // Route for blog form (optional, can be removed)
$routes->post('/auth/verifyOtp', 'Auth::verifyOtp'); // Route for OTP verification form submission

// Add these routes for the Blog functionality
$routes->group('blog', function($routes) {
    $routes->get('/', 'BlogController::index'); // Route to view all blog posts
    $routes->get('create', 'BlogController::create'); // Route to create a new blog post
    $routes->post('store', 'BlogController::store'); // Route to store a new blog post
    $routes->get('edit/(:num)', 'BlogController::edit/$1'); // Route to edit a blog post
    $routes->post('update/(:num)', 'BlogController::update/$1'); // Route to update a blog post
    $routes->post('delete/(:num)', 'BlogController::delete/$1'); // Route to delete a blog post
    $routes->get('view/(:num)', 'BlogController::view/$1'); 
    $routes->delete('delete/(:num)', 'BlogController::delete/$1'); // Route to delete a blog post
    $routes->post('like/(:num)', 'BlogController::likePost/$1'); // Route for Like Post
$routes->post('comment/(:num)', 'BlogController::commentPost/$1'); // Route for Comment
});