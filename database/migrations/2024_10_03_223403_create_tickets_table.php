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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->integer('number_of_tickets');
            $table->string('ticket_type',30);
            $table->boolean('backstage_access')->nullable();
            $table->boolean('complimentary_drinks')->nullable();
            $table->string('seat_preference',30)->nullable();
            $table->string('group_name',30)->nullable();
            $table->text('special_requests')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
