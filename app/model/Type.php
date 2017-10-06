<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'types';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'type_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['typeName', 'densityId', 'user_id'];

    
}
