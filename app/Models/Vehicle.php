<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $primaryKey = 'vId';
    protected $table = 'vehicle';

    protected $fillable = [
        'vModel',
        'vType',
        'vPlatenum',
        'vBrand',
        'vPrice',
        'vStatus',
        'isDeleted'
    ];

    public function vehicle()
    {
        return $this->belongsTo(vehicle::class);
    }
}
