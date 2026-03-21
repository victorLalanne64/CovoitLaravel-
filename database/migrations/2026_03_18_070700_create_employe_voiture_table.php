<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employe_voiture', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained('employes');
            $table->foreignId('voiture_id')->constrained('voitures');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employe_voiture');
    }
};
