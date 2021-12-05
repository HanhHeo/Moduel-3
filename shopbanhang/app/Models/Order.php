<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'orders';
    protected $fillable = [
        'id','user_id','code','status','total'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order_details(){
        return $this->hasMany(Orderdetail::class);
    }
}
