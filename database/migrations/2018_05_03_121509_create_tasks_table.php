<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('project_id')->nullable();
            $table->string('name', 100);
            $table->text('body');
            $table->boolean('starred')->default(0); // 0: False 1: True
            $table->boolean('flagged')->default(0); // 0: False 1: True
            $table->unsignedInteger('order')->default(1);
            $table->uuid('completed_by')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /**
             * Indexes
             */
            $table->primary('id');
            $table->index('project_id')->foreign('project_id')->references('id')->on('projects');
            $table->index('starred');
            $table->index('flagged');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}