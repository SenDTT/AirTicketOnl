<table class="table table-bordered table-hover table-secondary">
    <thead>
    <tr>
        <th>#</th>
        <th>Chuyến bay</th>
        <th>Loại vé</th>
        <th>Giá vé</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @foreach($carts as $item)
        <?php
        $flight = \App\Flight::findFlight($item->attributes->flight_id);
        ?>
        <tr>
            <td>#</td>
            <td>{{ $flight->name }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ format_currency($item->price) }} VNĐ</td>
            <td>
                <input data-id="{{ $item->id }}" class="js-update form-control" value="{{ $item->quantity }}" type="number" min="1" max="5">
            </td>
            <td>{{ format_currency($item->quantity*$item->price) }} VNĐ</td>
            <td class="text-center">
                <button data-id="{{ $item->id }}" class="btn btn-sm btn-danger js-remove"><i class="fa fa-remove"> </i> Xóa</button>
            </td>
        </tr>
    @endforeach
    </tbody>
    @if(!Cart::isEmpty())
        <tfoot>
        <tr>
            <td colspan="2">Tổng tiền:</td>
            <td colspan="5">{{ format_currency(Cart::getTotal()) }} VNĐ</td>
        </tr>
        </tfoot>
    @else
        <tfoot>
        <tr>
            <td class="text-center" colspan="99">Không có vé</td>
        </tr>
        </tfoot>
    @endif
</table>