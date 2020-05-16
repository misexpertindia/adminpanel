<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssethandoversTable extends Migration
{
    public function up()
    {
        Schema::create('assethandovers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exitemailrec');
            $table->string('allassets');
            $table->date('addeactivationdate')->nullable();
            $table->date('itapprovaldate')->nullable();
            $table->longText('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
