<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Body extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bodys';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'body_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bodyName', 'choose', 'sizeId', 'status', 'weightPcs', 'userId'];

    
}
