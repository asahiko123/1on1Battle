<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameToUsersIdToToQuestionIdOnReactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reaction', function (Blueprint $table) {
            
            $table->renameColumn('to_users_id','to_question_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reaction', function (Blueprint $table) {
            $table->renameColumn('to_question_id','to_users_id');
        });
    }
}
