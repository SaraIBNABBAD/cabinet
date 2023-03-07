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
        Schema::create('dossiermedicals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('prescription')->nullable();
            $table->text('report')->nullable();
            $table->text('cnssSheet')->nullable();
            $table->text('balanceSheet')->nullable();
            // $table->string('name');
            // $table->string('email');
            $table->foreignId('doc_id')->constrained('users');
            $table->foreignId('patnt_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossiermedicals');
    }
};
