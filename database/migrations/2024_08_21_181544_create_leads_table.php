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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->unsignedBigInteger('number');
            $table->string('email');
            $table->text('message');
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('status_id')->default(1);
            $table->index('status_id', 'lead_status_idx');
            $table->foreign('status_id', 'lead_status_fk')->on('statuses')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
