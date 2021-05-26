<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $foreignKey = 'vId';
    protected $primaryKey = 'tId';
    protected $table = 'transaction';

    protected $fillable = [
        'vPlatenum',
        'vDate',
        'vPrice'
    ];
    public function transaction()
    {
        return $this->hasMany(transaction::class);
    }
}
