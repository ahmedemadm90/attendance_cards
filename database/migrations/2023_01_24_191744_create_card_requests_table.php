<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();
            $table->string('emp_image');
            $table->string('doc_image');
            $table->tinyInteger('admin_approve')->default(0);
            $table->tinyInteger('is_printed')->default(0);
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
        Schema::dropIfExists('card_requests');
    }
}
