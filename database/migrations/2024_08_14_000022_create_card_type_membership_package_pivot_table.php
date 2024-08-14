<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardTypeMembershipPackagePivotTable extends Migration
{
    public function up()
    {
        Schema::create('card_type_membership_package', function (Blueprint $table) {
            $table->unsignedBigInteger('membership_package_id');
            $table->foreign('membership_package_id', 'membership_package_id_fk_10027121')->references('id')->on('membership_packages')->onDelete('cascade');
            $table->unsignedBigInteger('card_type_id');
            $table->foreign('card_type_id', 'card_type_id_fk_10027121')->references('id')->on('card_types')->onDelete('cascade');
        });
    }
}
