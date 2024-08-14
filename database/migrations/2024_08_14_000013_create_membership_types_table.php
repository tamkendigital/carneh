<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipTypesTable extends Migration
{
    public function up()
    {
        Schema::create('membership_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('membership_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
