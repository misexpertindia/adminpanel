<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetsTable extends Migration
{
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_1480498')->references('id')->on('asset_categories');
            $table->unsignedInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_1480502')->references('id')->on('asset_statuses');
            $table->unsignedInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_1480503')->references('id')->on('asset_locations');
            $table->unsignedInteger('assigned_to_id')->nullable();
            $table->foreign('assigned_to_id', 'assigned_to_fk_1480505')->references('id')->on('users');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_1483914')->references('id')->on('users');
            $table->unsignedInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_1483915')->references('id')->on('users');
        });
    }
}
