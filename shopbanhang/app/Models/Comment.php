<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'id','com_name','com_email','com_content','com_product'
    ];
    public function product(){
        return $this->hasMany(Product::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
