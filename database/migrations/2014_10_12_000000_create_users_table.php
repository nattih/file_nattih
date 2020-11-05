<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom')->nullable();
            $table->string('sexe')->nullable();
            $table->string('dat_naiss')->nullable();
            $table->string('residence')->nullable();
            $table->string('contact')->nullable();
            $table->bigInteger('departement_id')->unsigned()->nullable();
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');
            $table->bigInteger('poste_id')->unsigned()->nullable();
            $table->foreign('poste_id')->references('id')->on('postes')->onDelete('cascade');
            $table->string('debut_fonction')->nullable();
            $table->string('contrat')->nullable();
            $table->text('photo')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
