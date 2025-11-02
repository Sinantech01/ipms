<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'complaint',   
        'property_id',
        'customer_id', 
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function property()
    {
        return $this->belongsTo(Propertys::class, 'property_id');
    }
    public function work()
    {
        return $this->hasMany(Work::class, 'complaint_id');
    }
}
