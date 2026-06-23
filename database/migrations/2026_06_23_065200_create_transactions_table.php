<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('sender_id')->constrained('users');
    $table->foreignId('receiver_id')->constrained('users');
    $table->decimal('amount', 15, 2);
    $table->string('payment_method');
    $table->string('reference')->unique();
    $table->enum('status', ['pending', 'approved', 'flagged', 'blocked', 'failed'])->default('pending');
    $table->enum('failure_category', ['soft', 'hard', 'user', 'suspicious'])->nullable();
    $table->string('failure_reason')->nullable();
    $table->integer('retry_count')->default(0);
    $table->timestamp('next_retry_at')->nullable();
    $table->timestamp('resolved_at')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
