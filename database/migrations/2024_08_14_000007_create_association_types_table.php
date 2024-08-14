<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociationTypesTable extends Migration
{
    public function up()
    {
        Schema::create('association_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('association_type')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
