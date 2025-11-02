<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'userroll',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function propertys()
    {
        return $this->hasMany(Propertys::class, 'user_id');
    }
    public function complaint()
    {
        return $this->hasMany(Complaint::class, 'customer_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, 'customer_id');
    }
    public function feedback()
    {
        return $this->hasMany(FeedBack::class, 'customer_id');
    }
    public function work()
    {
        return $this->hasMany(Work::class, 'worker_id');
    }
}
