<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'complaint_id',
        'worker_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
    public function complaint()
    {
        return $this->belongsTo(Complaint::class, 'complaint_id');
    }
}
