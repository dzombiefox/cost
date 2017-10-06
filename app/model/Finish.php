<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Finish extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'finishs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'finish_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['motifId', 'sizeId', 'colorId', 'opt', 'periodeId', 'year', 'bodyId', 'aluminaId', 'engobeId', 'glazeId', 'dropId','lineId', 'userId','codeRef'];

    
}
