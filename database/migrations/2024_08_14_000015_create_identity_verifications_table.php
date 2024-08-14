<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentityVerificationsTable extends Migration
{
    public function up()
    {
        Schema::create('identity_verifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('verificationcode')->nullable();
            $table->integer('national_n_opassport')->nullable();
            $table->string('verification_status')->nullable();
            $table->date('verification_date');
            $table->string('verified_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
