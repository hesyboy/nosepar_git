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
            $table->string('code')->unique();
            $table->string('email')->unique();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('mobile_verified_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verified_code')->nullable();
            $table->timestamp('complete_info_at')->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('description')->nullable();
            $table->string('title')->nullable();
            $table->string('profile_image')->default('/assets/images/default.jpg');
            $table->string('cover_image')->default('/assets/images/default.jpg');
            $table->string('mobile')->nullable()->unique();

            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('kaggle')->nullable();

            $table->string('contact_way')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('score')->default(0);
            $table->tinyInteger('receive_event')->default(1);
            $table->tinyInteger('receive_team_request')->default(1);
            $table->tinyInteger('user_type')->default(0)->comment('0=>personal,1=>company');
            $table->tinyInteger('account_type')->default(0)->comment('0=>user,1=>admin');
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
