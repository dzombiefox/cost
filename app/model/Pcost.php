<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Pcost extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pcosts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'pcost_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sizeId','lineId', 'capacity','f_cboxPallet','f_directLabour', 'f_employeeBenefit', 'f_fuelExp', 'f_waterElectrict', 'f_packingExp', 'f_maintenanceExp', 'f_depreciationExp', 'f_otherExp', 'c_salary', 'c_employeeBenefit', 'c_carriageCharge', 'c_otherExp', 'c_mktOperational', 'c_salesIncentives','c_salesBonus', 'c_overHead','c_brokenDisc','c_salesCom','periodeId', 'year', 'userId'];

    
}
