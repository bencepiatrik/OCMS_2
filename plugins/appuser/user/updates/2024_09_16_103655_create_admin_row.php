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
        Schema::table('appuser_users', function($table)
        {
            $table->boolean('is_admin')->default(false);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appuser_users'); // REVIEW - tu som si len všimol že ti nesedí dropIfExists, na dropnutie column je dropColumn, ale uprimne v down() môžeš vždy dropovať celý table
    }
};
