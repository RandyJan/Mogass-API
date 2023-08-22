<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class syncTrans extends Model
{
    use HasFactory;
    protected $table = "dbo.LoyaltyTrans";
    protected $fillable = [
        'BRANCHID',
        'ID',
        'TRANSID',
        'ITEMNO',
        'PRODUCTID',
        'LITERS',
        'AMOUNT',
        'UNITPOINT',
        'TOTALPOINTS',
        'UPLOADED',
    ];
    public $timestamps = false;
}
