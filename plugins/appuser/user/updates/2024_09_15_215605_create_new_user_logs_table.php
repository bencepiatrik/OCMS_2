<?php

use AppUser\User\Models\Users;
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
            // RESPONSE - Asi takto
            $table->foreignIdFor(Users::class)->constrained('appuser_users')->onDelete('cascade');

            $table->unsignedInteger('user_id');
            $table->string('action');
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
        Schema::dropIfExists('appuser_user_logs'); // REVIEW - tu som si len všimol že ti nesedí 'new_user_logs'
        // RESPONSE - Migrácie som časom spravil znova a nechceli fungovať, tak som ich premenoval, ale zabudol som na down()
    }
};
