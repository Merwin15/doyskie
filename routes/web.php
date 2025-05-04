<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Staff\StaffController;

// WELCOME PAGE
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// LOGIN FORM
Route::get('/login', function () {
    return view('login');
})->name('login');

// LOGIN
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// REGISTRATION FORM
Route::get('/register', function () {
    return view('register');
})->name('register');

// REGISTRATION
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register.submit');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); 
})->name('logout');

//DASHBOARD ROUTE

Route::get('/staff/dashboard', function () {
    return view('staff.staff_dashboard');
})->name('staff.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.admin_dashboard');
})->name('admin.dashboard');

// User dashboard with all books
Route::get('/user/dashboard', [BookController::class, 'index'])->name('user.dashboard');

//book.php ni
Route::get('/user/dashboard', function () {
    $books = include app_path('Data/books.php');
    return view('user.user_dashboard', compact('books'));
})->name('user.dashboard');

Route::get('/book/{book_id}', [BookController::class, 'show'])->name('book.details');
Route::post('/book/{book_id}/add-to-cart', [BookController::class, 'addToCart'])->name('book.addToCart');
Route::post('/book/{book_id}/toggle-bookmark', [BookController::class, 'toggleBookmark'])->name('book.toggleBookmark');
Route::get('/bookmarks', [BookController::class, 'showBookmarks'])->name('book.bookmarks');
Route::post('/bookmarks/remove/{book_id}', [BookController::class, 'removeBookmark'])->name('book.removeBookmark');


// View all bookmarks
Route::get('/bookmarks', [BookController::class, 'showBookmarks'])->name('book.bookmarks');
// Remove a bookmark
Route::post('/bookmarks/{book_id}/remove', [BookController::class, 'removeBookmark'])->name('book.removeBookmark');


// CART
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/remove', [CartController::class, 'removeBookFromCart'])->name('cart.remove');
Route::post('/book/{book_id}/add-to-cart', [BookController::class, 'addToCart'])->name('book.addToCart');

// CONTACT
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

//PROFILE
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

//CATEGORY
Route::get('/genre/{genre}', [GenreController::class, 'show'])->name('genre.show');
Route::get('/category/{genre}', [GenreController::class, 'show'])->name('genre.books');

//SEARCH
Route::get('/search', [SearchController::class, 'search'])->name('search.books');

//ADMIN
Route::get('/admin/total-books', [AdminController::class, 'showTotalBooks'])->name('total-books');

Route::prefix('admin')->name('admin.')->group(function() {
    // Route for admin dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // listing all total books
    Route::get('/total-books', [AdminController::class, 'showTotalBooks'])->name('total-books');
    
    // listing all books
    Route::get('/books', [AdminController::class, 'index'])->name('books.index');
    
    // Route for editing a book
    Route::get('/books/edit/{book_id}', [AdminController::class, 'editBook'])->name('books.edit');
    
    // updating a book
    Route::put('/books/update/{book_id}', [AdminController::class, 'updateBook'])->name('books.update');
    
    // deleting a book
    Route::delete('/books/delete/{book_id}', [AdminController::class, 'deleteBook'])->name('books.delete');

    Route::get('/books/create', [AdminController::class, 'createBook'])->name('books.create');
    Route::post('/books/store', [AdminController::class, 'storeBook'])->name('books.store');
});

Route::prefix('admin')->name('admin.')->group(function() {
    // Route for user management page
    Route::get('/manage-users', [AdminController::class, 'manageUsers'])->name('manage-users');
    
    // Routes for adding, editing, and deleting users
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users/store', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/edit/{user_id}', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/update/{user_id}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/delete/{user_id}', [AdminController::class, 'deleteUser'])->name('users.delete');
});

//STAFF
Route::get('/staff/requests/pending', function () {
    return view('staff.pending-requests');
})->name('staff.requests.pending');

Route::get('/staff/book-borrowing-overview', function () {
    return view('staff.book_borrowing_overview');
})->name('staff.book.borrowing.overview');
