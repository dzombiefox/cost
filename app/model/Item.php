<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'item_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['itemCode', 'itemName', 'itemDesc', 'volume', 'color', 'userId'];

    
}
