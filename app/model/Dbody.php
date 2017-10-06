<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Dbody extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dbodys';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'dbody_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bodyId', 'itemId', 'dvolume','h2O', 'category'];

    
}
