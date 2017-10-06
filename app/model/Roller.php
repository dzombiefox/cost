<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Roller extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rollers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'roller_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rollerCode', 'rollerName', 'subCode', 'status', 'motif', 'lifeTime', 'price', 'printing'];

    
}
