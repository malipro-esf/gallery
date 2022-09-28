<?php

namespace Eloquent;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_maximum_address()
    {
//        $address = factory(Address::class, 1)->create();
        $user = User::create([
            'name' => 'user'.rand(1000,99999),
            'mobile' => rand(12345678,1234756789),
            'confirmation_code'=> rand(10000,99999),
            'type' => 'user',
            'confirmation_status' => '1',
            'email' => rand(1,10000).'@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $address = Address::create([
            'user_id' => $user->id,
            'city_id' => rand(1,100),
            'address' => 'test Address',
            'phone' => '+989132026815',
            'postal_code' => '84198587362',
            'national_code' => '1142351831'
        ]);

        $user->addAddress();

        $this->assertEquals(2, $user->hasAddress());

        $user->addAddress();
    }



}
