<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Drop extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'drops';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'drop_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dropName', 'sizeId', 'weightWet','colorId', 'status'];

    
}
