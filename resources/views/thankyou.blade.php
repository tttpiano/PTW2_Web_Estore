<!-- resources/views/checkout/thankyou.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Cảm ơn bạn đã mua hàng!</h1>
    <p>{{ session('success') }}</p>
    <a href="{{route('home')}}" >
        Tiếp Tục Mua Sắm
    </a>
</body>
</html>
