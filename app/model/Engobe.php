<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Engobe extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'engobes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'engobe_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['engobeName', 'sizeId','colorId', 'weightWet', 'status', 'userId'];

    
}
