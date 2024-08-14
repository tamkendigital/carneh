<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssociationListsTable extends Migration
{
    public function up()
    {
        Schema::table('association_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('association_type_id')->nullable();
            $table->foreign('association_type_id', 'association_type_fk_10027039')->references('id')->on('association_types');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_10027080')->references('id')->on('users');
        });
    }
}
