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
            $table->text('prescription');
            $table->text('report');
            $table->text('cnssSheet');
            $table->text('balanceSheet');
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
