<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Dengobe extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dengobes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'dengobe_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['engobeId', 'itemId', 'dvolume', 'category'];

    
}
