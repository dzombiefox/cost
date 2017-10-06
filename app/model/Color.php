<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'colors';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'color_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['colorName','colorCode', 'user_id'];

    
}
