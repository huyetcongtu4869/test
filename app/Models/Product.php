<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name_product',
        'type'
    ];
    
    public function getType()
    {
        if ($this->type == "car_rental") {
            $type_title = 'Thuê xe du lịch';
        } elseif ($this->type == "restaurant") {
            $type_title = 'Nhà hàng';
        } else {
            $type_title = "";
        }
        return $type_title;
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'product_id');
    }
}
