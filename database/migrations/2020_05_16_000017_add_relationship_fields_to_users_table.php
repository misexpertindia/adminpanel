<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_1481358')->references('id')->on('users');
            $table->unsignedInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_1481359')->references('id')->on('users');
        });
    }
}
