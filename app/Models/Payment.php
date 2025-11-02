<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'property_id',
        'amount',
        'transaction_id',  
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function property()
    {
        return $this->belongsTo(Propertys::class, 'property_id');
    }
}
