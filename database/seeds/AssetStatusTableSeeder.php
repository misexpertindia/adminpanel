<?php

use App\AssetStatus;
use Illuminate\Database\Seeder;

class AssetStatusTableSeeder extends Seeder
{
    public function run()
    {
        $assetStatuses = [
            [
                'id'         => '1',
                'name'       => 'Available',
                'created_at' => '2020-05-16 00:07:34',
                'updated_at' => '2020-05-16 00:07:34',
            ],
            [
                'id'         => '2',
                'name'       => 'Not Available',
                'created_at' => '2020-05-16 00:07:34',
                'updated_at' => '2020-05-16 00:07:34',
            ],
            [
                'id'         => '3',
                'name'       => 'Broken',
                'created_at' => '2020-05-16 00:07:34',
                'updated_at' => '2020-05-16 00:07:34',
            ],
            [
                'id'         => '4',
                'name'       => 'Out for Repair',
                'created_at' => '2020-05-16 00:07:34',
                'updated_at' => '2020-05-16 00:07:34',
            ],
        ];

        AssetStatus::insert($assetStatuses);
    }
}
