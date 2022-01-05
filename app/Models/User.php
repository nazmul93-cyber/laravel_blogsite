<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = ['name','username','email','password'];

    public function posts(){
        return $this->hasMany(Post::class);
    }
    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
     protected $hidden = [
         'password',
         'remember_token',
     ];

    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
     protected $casts = [
         'email_verified_at' => 'datetime',
     ];


     // mutator to bcrypt password
     public function setPasswordAttribute($password)
     {
         $this->attributes['password'] = bcrypt($password);
     }

     // accessor to uppercase username
     public function getUsernameAttribute($username) {
         return ucwords($username);
     }
}
