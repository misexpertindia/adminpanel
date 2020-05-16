<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetAssethandoverPivotTable extends Migration
{
    public function up()
    {
        Schema::create('asset_assethandover', function (Blueprint $table) {
            $table->unsignedInteger('assethandover_id');
            $table->foreign('assethandover_id', 'assethandover_id_fk_1483986')->references('id')->on('assethandovers')->onDelete('cascade');
            $table->unsignedInteger('asset_id');
            $table->foreign('asset_id', 'asset_id_fk_1483986')->references('id')->on('assets')->onDelete('cascade');
        });
    }
}
