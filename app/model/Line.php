<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'line';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'line_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lineName', 'userId'];

    
}
