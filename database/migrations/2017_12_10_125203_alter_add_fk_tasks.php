<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddFkTasks extends Migration
{
    const TABLE_NAME = 'tasks';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable(self::TABLE_NAME)) {
            Schema::table(self::TABLE_NAME, function (Blueprint $table) {
                $table->foreign('project_id')
                    ->references('id')
                    ->on('projects')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            });
            Schema::table(self::TABLE_NAME, function (Blueprint $table) {
                $table->foreign('status_id')
                    ->references('id')
                    ->on('statuses')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->dropForeign('tasks_project_id_foreign');
            $table->dropForeign('tasks_status_id_foreign');
        });
    }
}
