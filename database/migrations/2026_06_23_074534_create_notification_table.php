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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('type', ['retry_success', 'fraud_alert', 'insufficient_funds', 'admin_alert']);
            $table->enum('channel', ['email', 'sms', 'in_app']);
            $table->timestamp('read_at')->nullable();
            $table->enum('status',['sent','failed']);
            $table->foreignId('transaction_id')->constrained('transactions');
            $table->string('response_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
