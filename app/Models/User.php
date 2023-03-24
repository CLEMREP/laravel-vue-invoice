<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string $email
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property string $company_name
 * @property string $company_email
 * @property string $company_phone
 * @property string $company_siret
 * @property string $password
 * @property datetime $email_verified_at
 * @property string $remember_token
 * @property bool $admin
 * @property bool $company
 * @property int $address_id
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'admin',
        'company',
        'company_name',
        'company_email',
        'company_phone',
        'company_siret',
        'address_id',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
        'address_id' => 'integer',
    ];

    public function address() : BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function invoice() : HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
