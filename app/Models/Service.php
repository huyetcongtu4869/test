<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';


    protected $fillable = [
        'product_id',
        'price',
        'status',
        'start_date',
        'end_date',
        'object',
        'start_point',
        'end_point',
        'distance',
        'description'
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getStatus()
    {
        if ($this->status == 0) {
            $status_title = 'Hủy';
        } elseif ($this->status == 1) {
            $status_title = 'Kích hoạt';
        } else {
            $status_title = "";
        }
        return $status_title;
    }   

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

    public function getDate()
    {
       if ($this->start_date && $this->end_date) {
        $start_date = Carbon::parse($this->start_date)->format('d/m/Y');
        $end_date = Carbon::parse($this->end_date)->format('d/m/Y');
      
        $date_range=$start_date.' - '.$end_date;
       }
       else{
        $date_range='';
       }
       return $date_range;
    }
}
