<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
</head>
<body>
<div style="font-family:Verdana, Geneva, sans-serif; color:#666; font-size:15px;">
    <p style="color:#06C; font-size: 18px;">Xin chào {{ $name }}!</p>
    <p>Cám ơn bạn đã đặt vé tại website của chúng tôi tại {{ env('APP_URL') }} </p>
    <p>Dưới đây là thông tin chi tiết về đơn hàng của bạn: </p>
    <p>Các sản phẩm đã đặt mua:</p>
    <table width="100%" border="1" style="border-collapse:collapse;">
        <tr>
            <td width="20px" height="30px" valign="middle" align="center">Stt</td>
            <td width="150px" height="30px" valign="middle" align="center">Tên sản phẩm</td>
            <td width="150px" height="30px" valign="middle" align="center">Giá</td>
            <td width="50px" height="30px" valign="middle" align="center">Số lượng</td>
            <td width="150px" height="30px" valign="middle" align="center">Thành tiền</td>
        </tr>
        <?php $stt = 0; ?>
        @foreach($cart as $item)
            <?php $stt = $stt + 1  ?>
            <tr>
                <td>{{ $stt }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ format_currency($item->price) }} VND</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ format_currency($item->price*$item->quantity) }} VND</td>
            </tr>
        @endforeach
        <tr>
            <td height="30" colspan="4" align="right"><strong>Tổng giá:</strong></td>
            <td height="30" align="center"><strong>{{ format_currency(Cart::getTotal()) }} VND</strong></td>
        </tr>
    </table>
    <p style="color:#06C; font-size:16px;"><strong>Tổng giá trị đơn hàng:</strong> {{ format_currency(Cart::getTotal()) }} VND
    </p>
    <p style="color:#06C; font-size:16px;"><strong>Thông tin người thanh toán:</strong></p>
    <ul>
        <li><strong>Họ và Tên: </strong>{{ $name }}</li>
        <li><strong>Điện thoại:</strong> {{ $phone }}</li>
        <li><strong>Email: </strong>{{ $email }}</li>
        <li><strong>Message: </strong>
            <p>{{ $requirement }}</p></li>
    </ul>
    <p style="color:#06C; font-weight:bold;">Khi thanh toán, bạn nhớ ghi rõ và TÊN của mình để tránh nhầm lẫn.</p>
    <p>====================================</p>
</div>
</body>
</html>