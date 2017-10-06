<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CostItem extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'costItems';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'costItem_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['itemId', 'periodeId', 'itemPrice', 'year', 'userId'];

    
}
