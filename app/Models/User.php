<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nip', // Added 'nip' to fillable
        'role', // Added 'role' to fillable
        'division_id',
        'position_id',
        'education_id',
        'rfid_card_id',
        'phone_number',
        'gender',
        'birth_date',
        'birth_place',
        'city',
        'address',
        'join_date',
        'status',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date' => 'date',
        'join_date' => 'date',
        'last_login_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Relationship with the Division model.
     */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    /**
     * Relationship with the Position model.
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * Relationship with the Education model.
     */
    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    /**
     * Relationship with the RfidCard model.
     */
    public function rfidCard()
    {
        return $this->belongsTo(RfidCard::class, 'rfid_card_id');
    }
}
