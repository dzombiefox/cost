<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Glaze extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'glazes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'glaze_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['glazeName', 'sizeId', 'colorId', 'weightWet', 'status','userId'];

    
}
