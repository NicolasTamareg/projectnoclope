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
            $table->string('is_admin')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            // $table->unsignedBigInteger('stipe_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
//$client_stripe_id=$customer['id']
      //$client_stripe_secret=$intent['client_secret']
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
};
