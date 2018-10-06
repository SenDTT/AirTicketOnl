$(document).ready(function () {
    $(document).on('click', '.js-buy', function (e) {
        e.preventDefault();
        var that = $(this);
        var id = that.data('id');
        var number = that.parent().parent().find('.js-number').val();
        var name = that.data('name');
        var price = that.data('price');
        var flight_id = that.data('flight');

        NProgress.start();
        var url = '/cart/add-new-ticket';
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-Token': jQuery('meta[name="_token"]').attr('content')
            }
        });

        jQuery.ajax({
            type: 'GET',
            url: url,
            data: {"id": id, "number": number,'name':name,'price':price,'flight_id':flight_id},
            success: function (data) {
                NProgress.done();
                toastr.success('Thêm vào giỏ hàng thành công!', 'Thông báo')
            }
        });
    });


    $(document).on('click', '.js-remove', function (e) {
        e.preventDefault();
        var that = $(this);
        var id = that.data('id');

        NProgress.start();
        var url = '/cart/remove-ticket';
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-Token': jQuery('meta[name="_token"]').attr('content')
            }
        });

        jQuery.ajax({
            type: 'GET',
            url: url,
            data: {"id": id},
            success: function (data) {
                NProgress.done();
                toastr.success('Xóa vé thành công!', 'Thông báo');
                $('.js-content-cart').html(data.html)
                //location.reload();
            }
        });
    });
    $(document).on('change', '.js-update', function (e) {
        e.preventDefault();
        var that = $(this);
        var id = that.data('id');
        var number = that.val();

        NProgress.start();
        var url = '/cart/update-ticket';
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-Token': jQuery('meta[name="_token"]').attr('content')
            }
        });

        jQuery.ajax({
            type: 'GET',
            url: url,
            data: {"id": id,'number':number},
            success: function (data) {
                NProgress.done();
                toastr.success('Cập nhật thành công!', 'Thông báo');
                //location.reload();
                $('.js-content-cart').html(data.html)
            }
        });
    })
});