<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Froller extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'frollers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'froller_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['finishId', 'rollerId'];

    
}
