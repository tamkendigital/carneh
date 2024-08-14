<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociationListsTable extends Migration
{
    public function up()
    {
        Schema::create('association_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('association_name')->unique();
            $table->string('association_address');
            $table->string('website')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
