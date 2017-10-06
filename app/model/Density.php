<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Density extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'densitys';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['densityName'];

    
}
