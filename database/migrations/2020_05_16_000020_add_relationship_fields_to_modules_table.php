<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToModulesTable extends Migration
{
    public function up()
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->unsignedInteger('projectid_id');
            $table->foreign('projectid_id', 'projectid_fk_1480587')->references('id')->on('manage_projects');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_1480588')->references('id')->on('users');
            $table->unsignedInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_1480589')->references('id')->on('users');
        });
    }
}
