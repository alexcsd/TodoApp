<?php
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// use Jenssegers\Mongodb\Schema\Blueprint;
// // use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $connection = 'mongodb';

    public function up()
    {
        Schema::connection($this->connection)
        ->table('todos', function (Blueprint $collection) 
        {
            $collection->index('name');
        });
        // Schema::create('todos', function($collection)
        // {
        //     $collection->index('name');

        //     $collection->unique('email');
        // });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)
        ->table('todos', function (Blueprint $collection) 
        {
            $collection->drop();
        });
        // Schema::drop('todos');
    }
}
