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
            $table->string('user_name',50);
            $table->string('user_email',255);
            $table->string('password',255);
            $table->string('user_phone',20);
            $table->string('user_gender',7)->nullable();
            $table->string('user_address',100)->nullable();
            $table->string('user_city',20)->nullable();
            $table->string('user_country',20)->nullable();
            $table->string('user_zip_code',20)->nullable();
            $table->string('user_photo',255)->nullable();
            $table->string('user_role',1)->default('1');
            $table->tinyInteger('user_status')->default('1');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
