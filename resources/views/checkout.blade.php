<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        form {
            width: 80%;
            margin: 20px auto;
        }

        h2 {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        button {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        .cart {
            width: 80%;
            margin: 20px auto;
        }

        .product {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .product span {
            flex: 1;
            text-align: center;
        }

        .actions {
            width: 80%;
            margin: 20px auto;
            text-align: center;
        }

        .cart-total {
            margin-top: 10px;
        }

        #cartTotal {
            font-weight: bold;
            font-size: 18px;
            color: green;
        }
    </style>
</head>
<body>
    <form action="{{route('checkout.process') }}" method="POST">
        @csrf
        <h2>Thông Tin Giao Hàng</h2>

        <label for="name">Họ và Tên:</label>
        <input type="text" name="name" required>

        <label for="address">Địa Chỉ:</label>
        <textarea name="address" rows="3" required></textarea>

        <label for="phone">Số Điện Thoại:</label>
        <input type="tel" name="phone" required>

        <!-- Thêm các trường khác nếu cần -->

        <h2>Thông Tin Đơn Hàng</h2>
        
        <!-- Hiển thị danh sách sản phẩm và tổng cộng giỏ hàng -->
        <div class="cart">
            @foreach($products as $product)
                <div class="product">
                    <span class="name">{{ $product['name'] }}</span>
                    <span class="price">{{ $product['price'] }}</span>
                    <span class="quantity">{{ $product['quantity'] }}</span>
                    <span class="total">{{ $product['total'] }}</span>
                </div>
            @endforeach
        </div>

        <div class="actions">
            <button id="applyCoupon">APPLY COUPON</button>
            <div class="cart-total">
                <span>Total</span>
                <span id="cartTotal">{{ $cartTotal }}</span>
            </div>
            <a href="{{ route('thankyou') }}"><button type="button">Xác Nhận Đơn Hàng</button></a>

        </div>
    </form>
</body>
</html>
