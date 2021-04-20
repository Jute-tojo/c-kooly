<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_id')->constrained()->cascadeOnDelete();

            $table->float('montant', 8, 3);
            $table->char('paiement', 20)->default('espèce');
            $table->date('datePaiement');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('actifPassifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etablissement_id')->constrained()->cascadeOnDelete();

            $table->float('montant', 8, 3);
            $table->char('paiement', 20)->default('espèce');
            $table->enum('type', ['Actif', 'Passif'])->default('Actif');
            $table->string('motif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaires');
        Schema::dropIfExists('actifPassifs');
    }
}
