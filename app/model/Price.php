<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prices';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'price_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['motifId', 'sizeId', 'colorId', 'skw_1', 'skw_2', 'skw_3', 'skw_4', 'skw_5', 'periodeId', 'year', 'userId'];

    
}
