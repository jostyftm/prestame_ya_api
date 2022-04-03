<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('payment_type_id');
            $table->unsignedBigInteger('loan_id');
            $table->double('amount');
            $table->timestamp('paid_at');
            $table->timestamps();

            $table->foreign('payment_type_id')->references('id')
            ->on('payments')->cascadeOnDelete();
            
            $table->foreign('loan_id')->references('id')
            ->on('loans')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
