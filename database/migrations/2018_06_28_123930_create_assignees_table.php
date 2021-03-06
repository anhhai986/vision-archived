<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*
         * We can easily determine sibling records with unifier indexes
         * parent_id is no longer required.
         *
         * @see Unifier 1, Unifier 2, Unifier 3
         */

        Schema::create('assignees', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('assigned_by');
            $table->uuid('user_id');     // Unifier I
            $table->uuid('task_id');     // Unifier II
            $table->dateTime('due')->nullable();
            $table->dateTime('defer')->nullable();
            $table->integer('difficulty')->nullable(); // -10 to 10
            $table->unsignedInteger('estimated_time')->nullable(); // minutes
            $table->boolean('blocker')->default(0);
            $table->dateTime('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /*
             * Indexes
             */
            $table->primary('id');
            $table->index('assigned_by');
            $table->index('user_id');     // Unifier 1
            $table->index('task_id');     // Unifier 2
            $table->index('due');
            $table->index('defer');
            $table->foreign('assigned_by')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('task_id')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignees');
    }
}
