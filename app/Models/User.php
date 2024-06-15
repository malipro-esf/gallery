<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable  implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mobile',
        'confirmation_code',
        'confirmation_status',
        'type',
        'email',
        'password',
        'email_verified_at'
    ];
    // $2y$10$vAUDmkFQZqUdVmu./PtuGujgoybkTFHj4Q6v2x4W.Mj.jxe.R8dPK --> password
    // ruXxeDc9EbcT2BB4u3CSEvN65jV3g8NxGVDPLppbakkZi0xuz9PObSkAZPiQ --> remember token

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
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    /** for test */
    public function addAddress()
    {
        if($this->address()->count()>=2)
            throw new \Exception('Add address exception');

        $address = Address::create([
            'user_id' => $this->id,
            'city_id' => rand(1,100),
            'address' => 'test Address',
            'phone' => '+989132026815',
            'postal_code' => '84198587362',
            'national_code' => '1142351831'
        ]);
    }

    /** for test */
    public function hasAddress()
    {
        return $this->address()->count();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
