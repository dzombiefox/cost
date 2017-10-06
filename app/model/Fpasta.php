<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Fpasta extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fpastas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'fpasta_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['finishId', 'pastaId'];

    
}
