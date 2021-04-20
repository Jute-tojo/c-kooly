<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperAdminTable extends Migration
{
    //SUPER ADMIN TABLE
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituts', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description')->nullable();
            $table->string('logo');
        });

        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institut_id')->constrained()->cascadeOnDelete();

            $table->string('nom');
        });

        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->char('type',30);
            $table->char('nom', 20);
        });

        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institut_id')->constrained()->cascadeOnDelete()->nullable();

            $table->string('nom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituts');
        Schema::dropIfExists('etablissements');
        Schema::dropIfExists('classes');
        Schema::dropIfExists('matieres');
    }
}
