<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('modele');
            $table->integer('nb_places');
            $table->foreignId('employe_id')->constrained('employes');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};