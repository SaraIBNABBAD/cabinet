<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('time');
            // $table->time('hour');
            $table->string('name');
            $table->string('phone');
            $table->string('doctor');
            $table->text('prescription');
            $table->string('disease');
            $table->string('motif');
            $table->enum('state', ["Annuler", "Valider", "Terminer"]);
            $table->foreignId('patient_id')->nullable()->constrained("users");
            $table->foreignId('doctor_id')->nullable()->constrained("users");
            $table->foreignId('createdBy_id')->nullable()->constrained("users");
            $table->foreignId('dossiermedical_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rendezvous');
    }
};
