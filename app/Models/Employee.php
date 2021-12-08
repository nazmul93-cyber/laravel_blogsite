<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function logins(){
        return $this->hasMany(Login::Class);
    }

    public function scopeWithLastLoginAt($query) {
        $query->addSelect(['last_login_at' => Login::select('created_at')
                            ->whereColumn('employee_id','employees.id')
                            ->latest()
                            ->take(1)
        ])->withCasts(['last_login_at' => 'datetime']);
    }

    public function lastLogin() {
        return $this->belongsTo(Login::class);
    }
    public function scopeWithLastLogin($query) {
        $query->addSelect(['last_login_id' => Login::select('id')
            ->whereColumn('employee_id','employees.id')
            ->latest()
            ->take(1)
        ])->with('lastLogin');
    }

    public function scopeSearch($query, string $terms = null )
    {
        collect(explode(' ', $terms))->filter()->each(function($query) use ($terms){
            $term = '%'.$term.'%';
            $query->where(function ($query) use ($term){
                $query->where('name', 'like', $term)
                    ->orWhere('email', 'like', $term)
                    ->orWhereHas('company', function($query) use ($term) {
                        $query->where('name', 'like', $term);
                    });
            });

        });
    }

}
