<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'artwork_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    /** for test */
    public function trending()
    {
        $records = DB::table('favorites')->select('artwork_id', DB::raw('count(*) as total'))
            ->groupBy('artwork_id')
            ->get()->toArray();

        $maxFavorite = max(array_column($records,'total'));

        foreach ($records as $record){
            if($record->total==$maxFavorite)
                return ($record->artwork_id);
        }

    }
    /** for test */
    public function remove()
    {
        return $this->where('user_id', Auth::id())->delete();

    }


}
