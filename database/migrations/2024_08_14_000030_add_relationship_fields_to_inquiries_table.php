<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInquiriesTable extends Migration
{
    public function up()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10027148')->references('id')->on('users');
            $table->unsignedBigInteger('association_id')->nullable();
            $table->foreign('association_id', 'association_fk_10027149')->references('id')->on('association_lists');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_10027154')->references('id')->on('users');
        });
    }
}
