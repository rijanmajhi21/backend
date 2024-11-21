<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GetCustomerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GetBookingController;
use App\Http\Controllers\DeleteCustomerController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\GetTourController;
use App\Http\Controllers\GetTourIdController;
use App\Http\Controllers\GetCustomerIdController;
use App\Http\Controllers\ViewCustomerController;
use App\Http\Controllers\ViewBookingController;
use App\Http\Controllers\ViewTourController;
use App\Http\Controllers\ContactUsController;

Route::prefix('api')->group(function () {
    // Example endpoint
    Route::get('/example', 'ExampleController@index');
});
Route::post('/register', [UserController::class, 'register']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Login
Route::post('/login', [AuthController::class, 'login']);

// Store Custoemr
Route::post('/store-customer', [CustomerController::class, 'store']);

// Retrieve Customer
Route::get('/get-customers', [GetCustomerController::class, 'getCustomers']);

// Store Booking
Route::post('/submit-booking', [BookingController::class, 'storeBooking']);

// Retrieve Bookings
Route::get('/get-bookings', [GetBookingController::class, 'getBookings']);

// Deleting Customer
Route::delete('/customers/{customerId}', [DeleteCustomerController::class, 'deleteCustomer']);

// Storing and retriving Customer Info
Route::get('/customers/{cus_id}', [CustomerInfoController::class, 'getCustomer']);
Route::get('/bookings/{cus_id}', [CustomerInfoController::class, 'getBooking']);

// Storing Tour data
Route::post('/store-tour', [TourController::class, 'store'])->name('tours.store');

// Storing and retrieving Tour_ID in dropdown
Route::get('/get-tours', [GetTourController::class, 'getTours'])->name('tours.getTours');
Route::get('/tour_ids', [GetTourIdController::class, 'getTourIds']);

// Search
Route::get('/tours', [GetTourController::class, 'searchTours']);
Route::get('/customers', [GetCustomerController::class, 'searchCustomers']);
Route::get('/bookings', [GetBookingController::class, 'searchBookings']);


Route::get('/customer_ids', [GetCustomerIdController::class, 'getCustomerIds']);

Route::get('/get-customer-name/{customerId}', [CustomerInfoController::class, 'getCustomerInfo']);
Route::get('/get-tour-info/{tourId}', [CustomerInfoController::class, 'getTourInfo']);

// Fetching total customers, bookings and tours in dashboard
Route::get('/get-total-customers', [CustomerController::class, 'getTotalCustomers']);
Route::get('/get-total-bookings', [BookingController::class, 'getTotalBookings']);
Route::get('/get-total-tours', [TourController::class, 'getTotalTours']);

//Fetching data in customerInformationView
Route::get('/customersview/{customerId}', [ViewCustomerController::class, 'viewCustomer']);
Route::get('/bookingsview/{customerId}', [ViewBookingController::class, 'viewBookings']);
Route::get('/toursview/{tour_id}', [ViewTourController::class, 'viewTour']);

//Update Customers
Route::put('customers/{id}', [CustomerController::class, 'update']);

//Contactus information
Route::post('/contact-us', [ContactUsController::class, 'contactus_store']);

















