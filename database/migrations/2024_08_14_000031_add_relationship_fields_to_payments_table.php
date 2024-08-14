<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10027164')->references('id')->on('users');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id', 'package_fk_10027165')->references('id')->on('membership_packages');
            $table->unsignedBigInteger('payment_amount_id')->nullable();
            $table->foreign('payment_amount_id', 'payment_amount_fk_10027166')->references('id')->on('membership_packages');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_10027174')->references('id')->on('users');
        });
    }
}
