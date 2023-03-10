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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->text('picture')->nullable();
            $table->enum('role',['Admin','Doctor','Patient','Assistant','Staff']);
            $table->string('speciality')->nullable();
            $table->text('address')->nullable();
            $table->date('birth')->nullable();
            $table->string('sang')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('mutuelle')->nullable();
            $table->boolean('active')->default(true);
            $table->foreignId("user_id")->nullable()->constrained();
            
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
};
