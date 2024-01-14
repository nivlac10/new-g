<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\AdminTasksController;
use App\Http\Controllers\AdminPackagesController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminDepositsController;
use App\Http\Controllers\AdminWithdrawalsController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminBankController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AchievementController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route for the root URL ("/") to redirect to login
Route::get('/', function () {
    if (auth()->check()) {
        // User is logged in, redirect to the home page
        return redirect()->route('home');
    } else {
        // User is not logged in, redirect to the login page
        return redirect()->route('login');
    }
});

Auth::routes();

//Application
Route::get('/application', function () {
    if (auth()->check()) {
        // User is logged in, redirect to the home page
        return redirect()->route('home');
    } else {
        // User is not logged in, redirect to the login page
        return view('/auth/application'); 
    }
})->name('application');

Route::get('/step-2', function () {
    return view('/auth/step-2'); 
})->name('step-2');

Route::post('/success', function () {
    return view('/auth/success'); 
})->name('success');

Route::get('/success', function () {
    return view('/auth/success'); 
})->name('success');

//Dashboard


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('user.contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('user.contactSubmit');

Route::get('/contact/submit', function () {
    return view('user.contact'); // Replace 'contact_submit' with the actual view name
})->name('user.contactSubmit');

// Show the change password form
Route::get('/change-password', [App\Http\Controllers\ChangePasswordController::class,'showChangePasswordForm'])->name('change.password.form');

// Handle password change
Route::post('/change-password', [App\Http\Controllers\ChangePasswordController::class,'changePassword'])->name('change.password');

Route::get('/notifications/latest', [NotificationController::class,'latest'])->name('notifications.latest');

//Packages Related Controller
Route::get('/projects', [PackageController::class, 'index'])->middleware(['auth'])->name('package.index');
Route::get('/buy-package/{id}', [PackageController::class, 'buy'])->middleware(['auth'])->name('package.order');

//Tasks Related Controller
Route::get('/tasks', [TaskController::class, 'index'])->middleware(['auth'])->name('task.index');
Route::get('/special-tasks', [TaskController::class, 'specialTasks'])->middleware(['auth'])->name('special-tasks.index');

//Step 1
Route::get('/start/{id}', [TaskController::class, 'start'])->middleware(['auth'])->name('task.start');
//Step 2
Route::get('/confirm/{id}', [TaskController::class, 'confirm'])->middleware(['auth'])->name('task.confirm');
//Step 3
Route::get('/faq', [FAQController::class, 'index'])->name('user.faq');

Route::get('/review/{id}', [TaskController::class, 'pay'])->middleware(['auth'])->name('task.review');
Route::get('/review-page/{id}',[TaskController::class, 'review'])->middleware(['auth'])->name('task.reviewpage');
Route::get('/complete/{id}',[TaskController::class, 'completed'])->middleware(['auth'])->name('task.completed');
Route::get('/notifications', [NotificationController::class, 'index'])->middleware(['auth'])->name('notifications.index');
Route::get('/notifications/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->middleware(['auth'])->name('notifications.markAsRead');
Route::get('/achievements', [AchievementController::class, 'index'])->middleware(['auth']);
Route::get('/achievements/redeem/{id}', [AchievementController::class, 'redeem'])
    ->middleware(['auth'])
    ->name('achievements.redeem');
Route::post('/tasks/assignProject', [TaskController::class, 'assignProject'])->name('task.assignProject');

//Deposit
Route::get('/deposit', [DepositController::class, 'index'])->middleware(['auth'])->name('user.deposit');
//User submit deposit
Route::post('/deposit', [DepositController::class, 'deposit'])->middleware(['auth'])->name('user.deposit.submit');

//Transaction History
Route::get('/history', [TransactionController::class, 'index'])->middleware(['auth'])->name('user.history');
Route::get('/earnings', [TransactionController::class, 'earnings'])->middleware(['auth'])->name('user.earnings');
Route::post('/filter-earnings', [TransactionController::class,'filterEarnings'])->middleware(['auth'])->name('filter.earnings');


//Withdrawal
Route::get('/withdrawal', [WithdrawalController::class, 'index'])->middleware(['auth'])->name('user.withdraw');
//User submit deposit
Route::post('/withdrawal', [WithdrawalController::class, 'withdraw'])->middleware(['auth'])->name('user.withdraw.submit');


//Admin Function

//Approval Deposit
Route::post('/deposit/approve/{id}', [DepositController::class, 'approveDeposit'])->middleware(['auth'])->name('user.deposit.approve');

//Approval Withdrawal
Route::post('/withdrawal/approve/{id}', [WithdrawalController::class, 'approveWithdrawal'])->middleware(['auth'])->name('user.withdraw.approve');

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login.submit'); // Add 'as' attribute
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
});
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('tasks', [AdminTasksController::class, 'index'])->name('admin.tasks.index');
    Route::get('contact', [AdminContactController::class, 'index'])->name('admin.contact.index');
    Route::get('packages', [AdminPackagesController::class, 'index'])->name('admin.packages.index');
    Route::get('deposits', [AdminDepositsController::class, 'index'])->name('admin.deposits.index');
    Route::post('deposits/approve/{id}', [AdminDepositsController::class, 'approve'])->name('admin.deposits.approve');
    Route::get('withdrawals', [AdminWithdrawalsController::class, 'index'])->name('admin.withdrawals.index');
    Route::post('withdrawals/approve/{id}', [AdminWithdrawalsController::class, 'approve'])->name('admin.withdrawals.approve');
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/demo', [AdminUserController::class, 'demo'])->name('admin.users.demo');
    Route::get('/users/{id}/edit-balance', [AdminUserController::class, 'editBalance'])->name('admin.users.edit-balance');
    Route::put('/users/{id}/update-balance', [AdminUserController::class, 'updateBalance'])->name('admin.users.update-balance');
    Route::get('/transactions', [AdminTransactionController::class, 'index'])->name('admin.transactions.index');
    Route::post('/approve-user', [AdminUserController::class, 'approveUser'])->name('admin.approve.user');
    Route::post('/refresh-user', [AdminUserController::class, 'refreshUser'])->name('admin.refresh.user');
    Route::get('/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::get('/banks', [AdminBankController::class, 'index'])->name('admin.banks.index');
    Route::get('/banks/edit/{id}', [AdminBankController::class, 'edit'])->name('admin.banks.edit');
    Route::post('/banks/update/{id}', [AdminBankController::class, 'update'])->name('admin.banks.update');
    Route::get('/admin/users/send-notification/{id}', [AdminUserController::class,'sendNotificationForm'])->name('admin.users.send-notification-form');
    Route::post('/admin/users/send-notification/{id}', [AdminUserController::class,'sendNotification'])->name('admin.users.send-notification');
    Route::post('/deposits/reject/{id}', [AdminDepositsController::class, 'reject'])->name('admin.deposits.reject');
    Route::post('/withdrawals/reject/{id}', [AdminWithdrawalsController::class, 'reject'])->name('admin.withdrawals.reject');
    Route::post('/admin/replacement/user/{id}', [AdminUserController::class, 'replacementUser'])->name('admin.replacement.user');
    // Add routes for demo user creation here
    Route::get('/demo/create', [AdminUserController::class, 'showDemoUserCreationForm'])->name('admin.demo.create');
    Route::post('/demo/store', [AdminUserController::class, 'storeDemoUser'])->name('admin.demo.store');

    
});
