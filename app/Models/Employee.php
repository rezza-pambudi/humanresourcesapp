<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fullname',
        'email',
        'phone_number',
        'address',
        'birth_date',
        'hire_date',
        'departement_id',
        'role_id',
        'status',
        'salary',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'departement_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
