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
        Schema::create('necessary_expenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('amount', 15, 2);
            $table->foreignIdFor(\App\Models\Acount::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('necessary_expenses');
    }
};
