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
            $table->date('date');
            $table->dateTime('hour');
            $table->text('prescription');
            $table->string('disease');
            $table->string('motif');
            $table->enum('state', ["Annuler", "Valider", "Terminer"]);
            $table->foreignId('patient_id')->constrained("users");
            $table->foreignId('assistant_id')->nullable()->constrained("users");
            $table->foreignId('doctor_id')->constrained("users");
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
