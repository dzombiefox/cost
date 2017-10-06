<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Dink extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dinks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'dink_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['inkId', 'itemId', 'dvolume'];

    
}
