<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'education',
        'work',
        'employer',
        'about_me',
        'country',
        'state',
        'city',
        'height',
        'speaks',
        'cast',
        'smoking',
        'drinks',
        'food',
        'marray_age',
        'dressing',
        'user_id',
        'status',
        'slug',
        'address',
    ];
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id')->select('id','name');
    }
   
}
