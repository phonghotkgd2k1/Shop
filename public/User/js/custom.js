$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('select#option_color').on(`change`, function (e) {
        e.preventDefault();
        const color = $(this).val();
        let urlBase = $(this).data('hreff');
        
        urlBase += `/${color}`;
        // urlBase += `/${color}/${gb}`;
        window.location.href = urlBase;
    });

    $('select#option_gb').on('change', function (e) {
        e.preventDefault();
        const color = $('select#option_color').val();
        const gb = $(this).val();
        let urlBase = $(this).data('hreff');
        
        urlBase += `/${color}/${gb}`;
        window.location.href = urlBase;
    });

    $('input#buy__quantity').on('change', function (e) {
        e.preventDefault();
        const inputQty = $(this);
        const qty = inputQty.val();
        if (qty <= 0) {
            toastr.error(`Sản phẩm ít nhất 1!`);
            inputQty.val(1);
        } else {
            const color = $('select#option_color').val();
            const gb = $('select#option_gb').val();
            const product = inputQty.data('idprd');

            let urlBase = inputQty.data('hreff');

            if (!color) {
                toastr.error(`Chọn màu!`);
                return false;
            }
            if (!gb) {
                toastr.error(`Chọn dung lượng!`);
                return false;
            }
            if (!product) {
                toastr.error(`Không tìm thấy sản phẩm!`);
                return false;
            }

            // let formData = new FormData();
            // formData.append('id_color', color);
            
            $.ajax({
                type: 'POST', // Method: POST, GET, PUT, ...
                url: urlBase, // URL goi AJAX
                data: {
                    id_color: color,
                    id_gb: gb,
                    id_product: product,
                    qtyInput: qty,
                },
                // processData: false,
                // contentType: false
            }).done((data) => {
                if (!data) {// !== undefine && != null && == true && != 0 
                    toastr.error(`Sản phẩm hết tồn kho!`);
                    inputQty.val(1);
                }
            }).fail((jqXHR, ex) => {
                let msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Không có kết nối mạng.</br> Kiểm tra lại.';
                } else if (jqXHR.status == 404) {
                    msg = 'Không tìm thấy trang [404].</br> Thử tải lại!';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (ex === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (ex === 'timeout') {
                    msg = 'Time out error.';
                } else if (ex === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                
                toastr.error(msg);
                console.log("System Error: " + ex);
            });
        }
    });

    $('form#add__toCart').submit(function (e) { 
        e.preventDefault();
        
        const formAddToCart = $(this);
        let url = formAddToCart.attr('action');
        // const method = formAddToCart.attr('method');
        const qtyProduct = $('input#buy__quantity').val();
        // console.log();
        url += `/${qtyProduct}`;

        window.location = url;
    });
});