<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_campuses', function (Blueprint $table) {
            $table->id();
            $table->string('code',10)->unique();
            $table->string('name',100);
            $table->bigInteger('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('org_branches')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org_campuses');
    }
}
