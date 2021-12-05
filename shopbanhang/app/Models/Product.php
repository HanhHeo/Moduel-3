<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "product";

    protected $fillable = [
        'id','name','price','image','status','category_id','sold','description'
    ];

    public function category(){
        
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        
        return $this->belongsToMany(Commnent::class);
    }

}
