<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->char('titre', 50);
            $table->date('debut');
            $table->date('fin');
            $table->string('description');
        });

        Schema::create('participe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salle_id')->constrained()->cascadeOnDelete();
            $table->foreignId('examen_id')->constrained()->cascadeOnDelete();
        });

        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inscription_id')->constrained()->cascadeOnDelete();
            $table->foreignId('matiere_id')->constrained()->cascadeOnDelete();
            $table->foreignId('examen_id')->constrained()->cascadeOnDelete();

            $table->float('valeur', 3, 2);
            $table->char('coef', 2);
        });

        Schema::create('salle_examens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examen_id')->constrained()->cascadeOnDelete();

            $table->char('nom', 50);
            $table->smallInteger('nbrPersonTable')->default(0);
        });

        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salle_examen')->constrained()->cascadeOnDelete();

            $table->smallInteger('ligne')->default(0);
            $table->smallInteger('colonne')->default(0);
        });

        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->constrained()->cascadeOnDelete();
            $table->foreignId('inscription_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examens');
        Schema::dropIfExists('participe');
        Schema::dropIfExists('notes');
        Schema::dropIfExists('salle_examens');
        Schema::dropIfExists('tables');
        Schema::dropIfExists('places');
    }
}
