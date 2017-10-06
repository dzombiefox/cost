<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Alumina extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'aluminas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'alumina_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['aluminaName', 'sizeId', 'status', 'weightPcs', 'userId'];

    
}
