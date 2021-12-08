<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // protected $with = ['employees'];        //  everytime company is called all of its employees will be joined

    public function employees(){
        return $this->hasMany(Employee::class);
    }

}
