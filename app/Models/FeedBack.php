<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $fillable = [
        'feedback',
        'property_id',
        'customer_id', 
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
