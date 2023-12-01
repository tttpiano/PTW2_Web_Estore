<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // Các trường trong bảng order_details
    protected $fillable = ['order_id', 'product_name', 'price', 'quantity', 'total'];

    // Mối quan hệ với bảng orders
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Các phương thức khác nếu cần
}
