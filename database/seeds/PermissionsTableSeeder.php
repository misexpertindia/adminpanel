<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'asset_management_access',
            ],
            [
                'id'    => '18',
                'title' => 'asset_category_create',
            ],
            [
                'id'    => '19',
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => '20',
                'title' => 'asset_category_show',
            ],
            [
                'id'    => '21',
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => '22',
                'title' => 'asset_category_access',
            ],
            [
                'id'    => '23',
                'title' => 'asset_location_create',
            ],
            [
                'id'    => '24',
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => '25',
                'title' => 'asset_location_show',
            ],
            [
                'id'    => '26',
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => '27',
                'title' => 'asset_location_access',
            ],
            [
                'id'    => '28',
                'title' => 'asset_status_create',
            ],
            [
                'id'    => '29',
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => '30',
                'title' => 'asset_status_show',
            ],
            [
                'id'    => '31',
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => '32',
                'title' => 'asset_status_access',
            ],
            [
                'id'    => '33',
                'title' => 'asset_create',
            ],
            [
                'id'    => '34',
                'title' => 'asset_edit',
            ],
            [
                'id'    => '35',
                'title' => 'asset_show',
            ],
            [
                'id'    => '36',
                'title' => 'asset_delete',
            ],
            [
                'id'    => '37',
                'title' => 'asset_access',
            ],
            [
                'id'    => '38',
                'title' => 'assets_history_access',
            ],
            [
                'id'    => '39',
                'title' => 'project_access',
            ],
            [
                'id'    => '40',
                'title' => 'manage_project_create',
            ],
            [
                'id'    => '41',
                'title' => 'manage_project_edit',
            ],
            [
                'id'    => '42',
                'title' => 'manage_project_show',
            ],
            [
                'id'    => '43',
                'title' => 'manage_project_delete',
            ],
            [
                'id'    => '44',
                'title' => 'manage_project_access',
            ],
            [
                'id'    => '45',
                'title' => 'module_create',
            ],
            [
                'id'    => '46',
                'title' => 'module_edit',
            ],
            [
                'id'    => '47',
                'title' => 'module_show',
            ],
            [
                'id'    => '48',
                'title' => 'module_delete',
            ],
            [
                'id'    => '49',
                'title' => 'module_access',
            ],
            [
                'id'    => '50',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '51',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '52',
                'title' => 'assethandover_create',
            ],
            [
                'id'    => '53',
                'title' => 'assethandover_edit',
            ],
            [
                'id'    => '54',
                'title' => 'assethandover_show',
            ],
            [
                'id'    => '55',
                'title' => 'assethandover_delete',
            ],
            [
                'id'    => '56',
                'title' => 'assethandover_access',
            ],
            [
                'id'    => '57',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
