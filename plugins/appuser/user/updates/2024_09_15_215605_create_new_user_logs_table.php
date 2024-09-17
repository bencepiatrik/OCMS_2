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
        Schema::create('appuser_user_logs', function (Blueprint $table) {
            $table->increments('id');
            /* REVIEW - Tu mám len taký recommendation
            môžeš použiť ->foreignIdFor(User::class), je to spôsob ktorý je čistejší a nebudeš to musieť definovať ručne ako to robíš nižšie */
            $table->unsignedInteger('user_id');
            $table->string('action');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('appuser_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_user_logs'); // REVIEW - tu som si len všimol že ti nesedí 'new_user_logs'
    }
};
