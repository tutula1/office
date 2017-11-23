<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateJobsTable extends Migration {

        /**
        * Run the migrations.
        *
        * @return void
        */
        public function up()
        {
            Schema::create('jobs', function(Blueprint $table)
                {
                    $table->increments('id');
                    $table->integer('user_id')->unsigned();
                    $table->integer('project_id')->unsigned();
                    $table->string('name');
                    $table->string('description');
                    $table->integer('status')->unsigned()->default(1);
                    $table->timestamp('date_done');
                    $table->integer('no_date_done')->unsigned()->default(0);
                    $table->integer('urgent')->unsigned()->default(0);
                    $table->timestamps();

                    $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
                    $table->foreign('project_id')
                    ->references('id')
                    ->on('projects')
                    ->onDelete('cascade');
            });
        }

        /**
        * Reverse the migrations.
        *
        * @return void
        */
        public function down()
        {
            Schema::drop('jobs');
        }

    }
