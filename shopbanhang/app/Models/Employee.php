<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'employee';
    protected $fillable = [
        'id', 'name', 'address', 'email', 'password'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}
