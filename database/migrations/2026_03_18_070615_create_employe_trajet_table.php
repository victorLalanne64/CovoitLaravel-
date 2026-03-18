<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employe_trajet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained('employes');
            $table->foreignId('trajet_id')->constrained('trajets');
            $table->dateTime('date_inscription');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employe_trajet');
    }
};