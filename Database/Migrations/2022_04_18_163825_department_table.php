<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_departments', function (Blueprint $table) {
            $table->id();
            $table->string('code',10)->unique();
            $table->string('name',100);
            $table->bigInteger('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('id')->on('org_faculties')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org_departments');
    }
}
