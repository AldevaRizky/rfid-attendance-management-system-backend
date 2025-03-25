<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'nip', 'role', 'division_id', 'position_id', 
        'education_id', 'rfid_card_id', 'phone_number', 'gender', 'birth_date', 
        'birth_place', 'city', 'address', 'join_date', 'status', 'profile_picture', 
        'last_login_at'
    ];

    protected $hidden = ['password'];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function rfidCard()
    {
        return $this->belongsTo(RfidCard::class);
    }

    public function attendanceLogs()
    {
        return $this->hasMany(AttendanceLog::class);
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
