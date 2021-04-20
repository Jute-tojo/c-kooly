<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcolagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecolages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inscription_id')->constrained()->cascadeOnDelete();
            $table->foreignId('annee_scolaire_id')->constrained()->cascadeOnDelete();

            $table->char('mois', 10);
            $table->float('montant', 8, 3);
            $table->char('paiement', 20)->default('espèce');
        });

        Schema::create('tarifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inscription_id')->constrained()->cascadeOnDelete();
            $table->foreignId('personnel_id')->constrained()->cascadeOnDelete();

            $table->string('type');
            $table->float('montant', 8, 3);
            $table->char('paiement', 20)->default('espèce');
            $table->smallInteger('mois');
            $table->smallInteger('jour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ecolages');
        Schema::dropIfExists('tarifs');
    }
}
