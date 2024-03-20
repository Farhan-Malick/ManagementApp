<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_name')->nullable();
            $table->string('platform')->nullable();
            $table->decimal('budget')->nullable();
            $table->decimal('advance_payment')->nullable();
            $table->string('assign_to')->nullable();
            $table->decimal('dev_amount')->nullable();
            $table->decimal('advance_payment_to_dev')->nullable();
            // $table->decimal('rem_pay_to_dev')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('deadline')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
