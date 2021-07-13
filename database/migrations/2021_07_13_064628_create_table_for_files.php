<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableForFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });

        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('folder_id')->nullable();
            $table->timestamps();
        });


        DB::table('folders')->insert(['name'=>'New Folder']);
        DB::table('folders')->insert(['name'=>'New Folder2']);
        DB::table('folders')->insert(['name'=>'New Folder3','parent_id'=>1]);

        DB::table('files')->insert(['name'=>'abc.txt','folder_id'=>1]);
        DB::table('files')->insert(['name'=>'adef.txt','folder_id'=>2]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
        Schema::dropIfExists('folders');
    }
}
