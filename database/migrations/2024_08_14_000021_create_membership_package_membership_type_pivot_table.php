<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipPackageMembershipTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('membership_package_membership_type', function (Blueprint $table) {
            $table->unsignedBigInteger('membership_package_id');
            $table->foreign('membership_package_id', 'membership_package_id_fk_10027120')->references('id')->on('membership_packages')->onDelete('cascade');
            $table->unsignedBigInteger('membership_type_id');
            $table->foreign('membership_type_id', 'membership_type_id_fk_10027120')->references('id')->on('membership_types')->onDelete('cascade');
        });
    }
}
