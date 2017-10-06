<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Pasta extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pastas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'pasta_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pastaName', 'sizeId', 'colorId', 'options', 'weightWet', 'status','userId'];

    
}
