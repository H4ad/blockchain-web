<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockchainUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blockchain_users', function (Blueprint $table) {
            $table->string('participant_class');
            $table->string('participant_type');
            $table->integer('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('participant_id')->unique();
            $table->decimal('wallet', 8, 2)->default(0);
            $table->text('description');
            $table->timestamps();
            $table->primary(['user_id', 'participant_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blockchain_users');
    }
}
