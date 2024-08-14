<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardTypesTable extends Migration
{
    public function up()
    {
        Schema::create('card_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('card_type')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
