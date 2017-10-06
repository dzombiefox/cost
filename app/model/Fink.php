<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Fink extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'finks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'fink_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['finishId', 'inkId'];

    
}
