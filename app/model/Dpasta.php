<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Dpasta extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dpastas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'dpasta_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pastaId', 'itemId', 'dvolume'];

    
}
