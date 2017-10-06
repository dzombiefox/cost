<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Ddrop extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ddrops';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'ddrop_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dropId', 'itemId', 'dvolume', 'category'];

    
}
