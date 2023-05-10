<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('en_name');
            $table->string('ar_name');
            $table->foreignId('vp_id')->constrained();
            $table->foreignId('area_id')->constrained();
            $table->string('position');
            $table->string('email');
            $table->string('company');
            $table->string('hc_classification');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
