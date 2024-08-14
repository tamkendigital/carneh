<?php

use App\Http\Controllers\Admin\AssociationListController;
use App\Http\Controllers\Admin\AssociationTypeController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\CardTypeController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IdentityVerificationController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\MembershipPackageController;
use App\Http\Controllers\Admin\MembershipTypeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Association List
    Route::post('association-lists/media', [AssociationListController::class, 'storeMedia'])->name('association-lists.storeMedia');
    Route::resource('association-lists', AssociationListController::class, ['except' => ['store', 'update', 'destroy']]);

    // Association Type
    Route::resource('association-types', AssociationTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Region
    Route::resource('regions', RegionController::class, ['except' => ['store', 'update', 'destroy']]);

    // City
    Route::resource('cities', CityController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // User Alert
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);

    // Cards
    Route::resource('cards', CardController::class, ['except' => ['store', 'update', 'destroy']]);

    // Card Type
    Route::resource('card-types', CardTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Membership Type
    Route::resource('membership-types', MembershipTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Membership Packages
    Route::resource('membership-packages', MembershipPackageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Identity Verification
    Route::resource('identity-verifications', IdentityVerificationController::class, ['except' => ['store', 'update', 'destroy']]);

    // Inquiries
    Route::resource('inquiries', InquiryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Payments
    Route::resource('payments', PaymentController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
