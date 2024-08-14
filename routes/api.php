<?php

use App\Http\Controllers\Api\V1\Admin\AssociationListApiController;
use App\Http\Controllers\Api\V1\Admin\AssociationTypeApiController;
use App\Http\Controllers\Api\V1\Admin\CardApiController;
use App\Http\Controllers\Api\V1\Admin\CardTypeApiController;
use App\Http\Controllers\Api\V1\Admin\CityApiController;
use App\Http\Controllers\Api\V1\Admin\IdentityVerificationApiController;
use App\Http\Controllers\Api\V1\Admin\InquiryApiController;
use App\Http\Controllers\Api\V1\Admin\MembershipPackageApiController;
use App\Http\Controllers\Api\V1\Admin\MembershipTypeApiController;
use App\Http\Controllers\Api\V1\Admin\PaymentApiController;
use App\Http\Controllers\Api\V1\Admin\RegionApiController;
use App\Http\Controllers\Api\V1\Admin\UserAlertApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', UserApiController::class);

    // Association List
    Route::post('association-lists/media', [AssociationListApiController::class, 'storeMedia'])->name('association_lists.store_media');
    Route::apiResource('association-lists', AssociationListApiController::class);

    // Association Type
    Route::apiResource('association-types', AssociationTypeApiController::class);

    // Region
    Route::apiResource('regions', RegionApiController::class);

    // City
    Route::apiResource('cities', CityApiController::class);

    // User Alert
    Route::apiResource('user-alerts', UserAlertApiController::class);

    // Cards
    Route::apiResource('cards', CardApiController::class);

    // Card Type
    Route::apiResource('card-types', CardTypeApiController::class);

    // Membership Type
    Route::apiResource('membership-types', MembershipTypeApiController::class);

    // Membership Packages
    Route::apiResource('membership-packages', MembershipPackageApiController::class);

    // Identity Verification
    Route::apiResource('identity-verifications', IdentityVerificationApiController::class);

    // Inquiries
    Route::apiResource('inquiries', InquiryApiController::class);

    // Payments
    Route::apiResource('payments', PaymentApiController::class);
});
