<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Dalumina extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daluminas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'dalumina_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['aluminaId', 'itemId', 'dvolume'];

    
}
