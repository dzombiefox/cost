<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'motifs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'motif_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['motifCode', 'motifName', 'typeId', 'brandId', 'optionId'];

    
}
