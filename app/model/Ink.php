<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Ink extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'ink_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['inkName', 'sizeId', 'colorId', 'status', 'status', 'userId'];

    
}
