<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
    ];
    // $2y$10$vAUDmkFQZqUdVmu./PtuGujgoybkTFHj4Q6v2x4W.Mj.jxe.R8dPK

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
}
