<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Các trường trong bảng orders
    protected $fillable = ['name', 'address', 'phone'];

    // Mối quan hệ với bảng order_details
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // Các phương thức khác nếu cần
}
