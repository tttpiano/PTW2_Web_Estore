<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Import the Order model
use App\Models\OrderDetail; // Import the OrderDetail model

class CheckoutController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'Điện thoại OPPO Find N2 Flip', 'price' => 19990000, 'quantity' => 1],
            ['name' => 'Điện thoại Xiaomi Redmi Note 11 Pro', 'price' => 5390000, 'quantity' => 1],
        ];

        // Thêm trường 'total' vào mỗi sản phẩm trong mảng $products
        foreach ($products as &$product) {
            $product['total'] = $product['price'] * $product['quantity'];
        }

        $cartTotal = collect($products)->sum('total');

        return view('checkout', compact('products', 'cartTotal'));
    }

    public function proceed()
    {
        return redirect()->route('checkout.thankyou')->with('success', 'Đơn hàng của bạn đã được xác nhận!');
    }

    // Trong CheckoutController.php

public function thankyou()
{
    return view('thankyou'); // Đảm bảo rằng có một view có tên "thankyou"
}

    public function process(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'products' => 'required|array', // Thêm trường 'products' từ form
        ]);
    
        // Tiếp tục xử lý đơn hàng
    
        // Tạo đơn hàng
        $order = new Order;
        $order->name = $validatedData['name'];
        $order->address = $validatedData['address'];
        $order->phone = $validatedData['phone'];
        $order->save();
    
        // Lưu chi tiết đơn hàng từ dữ liệu form
        foreach ($validatedData['products'] as $product) {
            $orderDetail = new OrderDetail;
            $orderDetail->order_id = $order->id;
            $orderDetail->product_name = $product['name'];
            $orderDetail->price = $product['price'];
            $orderDetail->quantity = $product['quantity'];
            $orderDetail->total = $product['total'];
            $orderDetail->save();
        }
    
        // Tiếp tục xử lý và chuyển hướng người dùng
        // ...
    
        // Chuyển hướng đến trang cảm ơn
        return redirect()->route('checkout.thankyou')->with('success', 'Đơn hàng đã được xử lý thành công!');
    }
}
