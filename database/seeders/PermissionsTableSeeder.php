<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'association_access',
            ],
            [
                'id'    => 19,
                'title' => 'association_list_create',
            ],
            [
                'id'    => 20,
                'title' => 'association_list_edit',
            ],
            [
                'id'    => 21,
                'title' => 'association_list_show',
            ],
            [
                'id'    => 22,
                'title' => 'association_list_delete',
            ],
            [
                'id'    => 23,
                'title' => 'association_list_access',
            ],
            [
                'id'    => 24,
                'title' => 'association_type_create',
            ],
            [
                'id'    => 25,
                'title' => 'association_type_edit',
            ],
            [
                'id'    => 26,
                'title' => 'association_type_show',
            ],
            [
                'id'    => 27,
                'title' => 'association_type_delete',
            ],
            [
                'id'    => 28,
                'title' => 'association_type_access',
            ],
            [
                'id'    => 29,
                'title' => 'local_access',
            ],
            [
                'id'    => 30,
                'title' => 'region_create',
            ],
            [
                'id'    => 31,
                'title' => 'region_edit',
            ],
            [
                'id'    => 32,
                'title' => 'region_show',
            ],
            [
                'id'    => 33,
                'title' => 'region_delete',
            ],
            [
                'id'    => 34,
                'title' => 'region_access',
            ],
            [
                'id'    => 35,
                'title' => 'city_create',
            ],
            [
                'id'    => 36,
                'title' => 'city_edit',
            ],
            [
                'id'    => 37,
                'title' => 'city_show',
            ],
            [
                'id'    => 38,
                'title' => 'city_delete',
            ],
            [
                'id'    => 39,
                'title' => 'city_access',
            ],
            [
                'id'    => 40,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 41,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 42,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 43,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 44,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 45,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 46,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 47,
                'title' => 'card_create',
            ],
            [
                'id'    => 48,
                'title' => 'card_edit',
            ],
            [
                'id'    => 49,
                'title' => 'card_show',
            ],
            [
                'id'    => 50,
                'title' => 'card_delete',
            ],
            [
                'id'    => 51,
                'title' => 'card_access',
            ],
            [
                'id'    => 52,
                'title' => 'membership_access',
            ],
            [
                'id'    => 53,
                'title' => 'card_type_create',
            ],
            [
                'id'    => 54,
                'title' => 'card_type_edit',
            ],
            [
                'id'    => 55,
                'title' => 'card_type_show',
            ],
            [
                'id'    => 56,
                'title' => 'card_type_delete',
            ],
            [
                'id'    => 57,
                'title' => 'card_type_access',
            ],
            [
                'id'    => 58,
                'title' => 'membership_type_create',
            ],
            [
                'id'    => 59,
                'title' => 'membership_type_edit',
            ],
            [
                'id'    => 60,
                'title' => 'membership_type_show',
            ],
            [
                'id'    => 61,
                'title' => 'membership_type_delete',
            ],
            [
                'id'    => 62,
                'title' => 'membership_type_access',
            ],
            [
                'id'    => 63,
                'title' => 'membership_package_create',
            ],
            [
                'id'    => 64,
                'title' => 'membership_package_edit',
            ],
            [
                'id'    => 65,
                'title' => 'membership_package_show',
            ],
            [
                'id'    => 66,
                'title' => 'membership_package_delete',
            ],
            [
                'id'    => 67,
                'title' => 'membership_package_access',
            ],
            [
                'id'    => 68,
                'title' => 'identity_verification_create',
            ],
            [
                'id'    => 69,
                'title' => 'identity_verification_edit',
            ],
            [
                'id'    => 70,
                'title' => 'identity_verification_show',
            ],
            [
                'id'    => 71,
                'title' => 'identity_verification_delete',
            ],
            [
                'id'    => 72,
                'title' => 'identity_verification_access',
            ],
            [
                'id'    => 73,
                'title' => 'inquiry_create',
            ],
            [
                'id'    => 74,
                'title' => 'inquiry_edit',
            ],
            [
                'id'    => 75,
                'title' => 'inquiry_show',
            ],
            [
                'id'    => 76,
                'title' => 'inquiry_delete',
            ],
            [
                'id'    => 77,
                'title' => 'inquiry_access',
            ],
            [
                'id'    => 78,
                'title' => 'payment_create',
            ],
            [
                'id'    => 79,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 80,
                'title' => 'payment_show',
            ],
            [
                'id'    => 81,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 82,
                'title' => 'payment_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
