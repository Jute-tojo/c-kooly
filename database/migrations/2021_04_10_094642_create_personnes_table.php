<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id')->constrained()->cascadeOnDelete();
            $table->foreignId('etablissement_id')->constrained()->cascadeOnDelete();

            $table->char('matricule', 10);
        });

        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id')->constrained()->cascadeOnDelete();
            $table->foreignId('etudiant_id')->constrained()->cascadeOnDelete();

            $table->string('profession')->nullable();
            $table->char('type',10)->default('Père');
        });

        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id')->constrained()->cascadeOnDelete();
            $table->foreignId('etablissement_id')->constrained()->cascadeOnDelete();

            $table->char('matricule', 10);
            $table->string('fonction');
            $table->date('dateEmbauche');
            $table->enum('status', ['on', 'off'])->default('on');
        });

        Schema::create('enseigne', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_id')->constrained()->cascadeOnDelete();
            $table->foreignId('matiere_id')->constrained()->cascadeOnDelete();
            $table->foreignId('salle_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
        Schema::dropIfExists('parents');
        Schema::dropIfExists('personnels');
        Schema::dropIfExists('enseigne');
    }
}
