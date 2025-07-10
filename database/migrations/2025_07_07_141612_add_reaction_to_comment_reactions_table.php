<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comment_reactions', function (Blueprint $table) {
            $table->tinyInteger('reaction')->after('user_id'); // bisa -1 (dislike), 1 (like)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comment_reactions', function (Blueprint $table) {
            $table->dropColumn('reaction');
        });
    }
};
