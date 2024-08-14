<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipPackagesTable extends Migration
{
    public function up()
    {
        Schema::create('membership_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('package_name')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->longText('description');
            $table->float('duration')->nullable();
            $table->boolean('is_renewable')->default(0)->nullable();
            $table->string('is_active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
