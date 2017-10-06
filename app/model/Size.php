<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sizes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'size_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['size', 'quantity', 'refId', 'userId'];

    
}
