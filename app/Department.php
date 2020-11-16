<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_name', 'department_email', 'department_phone',
    ];

    // for foreign key constraint
    public function employee(){
        return $this->hasMany('App\Employee');
    }
}
