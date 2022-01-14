<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foreignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // students
        Schema::table('students', function (Blueprint $table){

            $table->foreign('wilaya_id')
                    ->references('id')
                    ->on('wilayas')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('parent_id')
                    ->references('id')
                    ->on('parents')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('level_id')
                    ->references('id')
                    ->on('levels')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('specialization_id')
                    ->references('id')
                    ->on('specializations')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('room_id')
                    ->references('id')
                    ->on('rooms')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                 
        });


        // rooms
        Schema::table('rooms', function (Blueprint $table){

    
                $table->foreign('level_id')
                        ->references('id')
                        ->on('levels')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
    
                $table->foreign('specialization_id')
                        ->references('id')
                        ->on('specializations')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
                     
        });


        // teachers
        Schema::table('teachers', function (Blueprint $table){

                $table->foreign('wilaya_id')
                        ->references('id')
                        ->on('wilayas')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
    
                $table->foreign('material_id')
                        ->references('id')
                        ->on('materials')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
                     
        });


        // teacher_room
        Schema::table('teacher_room', function (Blueprint $table){

                $table->foreign('teacher_id')
                        ->references('id')
                        ->on('teachers')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
    
                $table->foreign('room_id')
                        ->references('id')
                        ->on('rooms')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
                     
        });

        // absences
        Schema::table('absences', function (Blueprint $table){

                $table->foreign('student_id')
                        ->references('id')
                        ->on('students')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
                     
        });

        // schools
        Schema::table('schools', function (Blueprint $table){

                $table->foreign('wilaya_id')
                        ->references('id')
                        ->on('wilayas')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');

                $table->foreign('dairas_id')
                        ->references('id')
                        ->on('dairas')
                        ->onUpdate('cascade')
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
        //
    }
}
