<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'formulas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'formula_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dataId', 'sizeId', 'statusId', 'value', 'userId'];

    
}
