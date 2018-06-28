<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
// use Jenssegers\Mongodb\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Todo extends Eloquent
{
    // protected $table = 'todos';
    protected $connection = 'mongodb';
    protected $collection = 'todos';
    protected $primaryKey = '_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'details'
    ];
}
