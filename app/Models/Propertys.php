<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propertys extends Model
{
    protected $fillable = [
        'img',
        'name',
        'address',
        'rent',
        'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, 'property_id');
    }
    public function feedback()
    {
        return $this->hasMany(FeedBack::class, 'property_id');
    }
    public function complaint()
    {
        return $this->hasMany(Complaint::class, 'property_id');
    }
}

