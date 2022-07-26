<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded =[];

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function OrderItems(){
        return $this->hasMany(OrderItems::class);
    }

    public function products(){
        //order is database table name
        return $this->belongsToMany(Product::class,'order_items');
    }
}
