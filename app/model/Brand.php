<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'brands';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'brand_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['brandName'];

    
}
