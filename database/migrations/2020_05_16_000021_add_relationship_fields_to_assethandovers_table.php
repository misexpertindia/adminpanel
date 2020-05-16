<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssethandoversTable extends Migration
{
    public function up()
    {
        Schema::table('assethandovers', function (Blueprint $table) {
            $table->unsignedInteger('empid_id');
            $table->foreign('empid_id', 'empid_fk_1483985')->references('id')->on('users');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_1483992')->references('id')->on('users');
            $table->unsignedInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_1483993')->references('id')->on('users');
        });
    }
}
