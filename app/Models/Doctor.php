<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
use HasFactory, Notifiable;

protected $guarded = [];

public function setPasswordAttribute($value)
{
$this->attributes['password'] = Hash::make($value);
}

public function scopeIsActive($query)
{
return $query->where('is_active',1);
}
}





//namespace App\Models;
//
//
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Hash;
//
//class Doctor extends Authenticatable
//{
//    use HasFactory;
//
//    protected $guarded = [];
//
//    public function setPasswordAttribute($value) {
//        $this->attributes['password'] = Hash::make($value);
//    }
//
//    public function scopeIsActive($query) {
//        return $query->whereColumn('is_active', 1);
//    }
//}
