$(document).ready(function () {
    function formatNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    var cart = {
        getCart: function (callback) {
            $.ajax({
                url: '/api/cart/get/',
                method: 'GET',
                dataType: 'json',
                success: function (response) {
                    callback(null, response); // Gọi callback với dữ liệu giỏ hàng
                },
                error: function (xhr, status, error) {
                    callback(error); // Gọi callback với lỗi
                }
            });
        },

        getCount: function (callback) {
            this.getCart(function (error, response) {
                if (error) {
                    callback(error);
                    return;
                }

                var count = Object.keys(response['cart']).length;
                callback(null, count);
            });
        },

        renderCartCount: function () {
            var self = this; // Lưu tham chiếu đến đối tượng cart
            this.getCount(function (error, count) {
                if (error) {
                    // console.log(error);
                    return;
                }
                $('.cart_count span').text(count);
            });
        },


        getTotal: function (callback) {
            this.getCart(function (error, response) {
                if (error) {
                    callback(error);
                    return;
                }

                var total = 0;
                for (var item in response['cart']) {
                    price = response['cart'][item]['product_details']['discount'] == 0 ? response['cart'][item]['product_details']['price'] : response['cart'][item]['product_details']['discount'];
                    total += parseFloat(price) * response['cart'][item]['amount'];

                    // total = total * parseFloat(response['cart'][item][amount]);
                }
                callback(null, total);
            });
        },

        renderTotalCart: function () {
            var self = this; // Lưu tham chiếu đến đối tượng cart
            this.getTotal(function (error, total) {
                if (error) {
                    // console.log(error);
                    return;
                }
                var totalText = formatNumberWithCommas(total) + "<sup>đ</sup>";
                $('.cart_price').html(totalText);
                $('.order_total_amount').html(totalText);

            });
        },

        removeElement: function (e) {
            e.target.parentNode.parentNode.parentNode.parentNode.remove();
        },

        addToCart: function (product_id, csrfToken) {
            $.ajax({
                url: '/api/cart/add',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    product_id: product_id,
                },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    // Thực hiện các xử lý sau khi sản phẩm được thêm vào giỏ hàng thành công
                    cart.renderCartCount();
                    cart.renderTotalCart();

                    createToast('success', response['message']);

                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    // Xử lý lỗi nếu có
                }
            });
        },

        deleteToCart: function (product_id, csrfToken, e) {
            $.ajax({
                url: '/api/cart/delete',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    product_id: product_id,
                },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    // Thực hiện các xử lý sau khi sản phẩm được thêm vào giỏ hàng thành công
                    cart.renderCartCount();
                    cart.renderTotalCart();
                    cart.removeElement(e);
                    createToast('success', response['message']);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    // Xử lý lỗi nếu có
                }
            });
        },

        getInputVal: function (e) {
            const parentElement = $(e.target).parent();
            const amountInput = parentElement.find('input[name="amount"]');
            return amountInput.val() ?? null;
        },


        calculate: function (slug, val) {
            if (slug && slug == 'minus') {
                val = parseInt(val) - 1;
                return val ?? null;
            } else if (slug && slug == 'plus') {
                val = parseInt(val) + 1;
                return val ?? null;
            }
        },

        renderInputVal: function (e, val) {
            const parentElement = $(e.target).parent();
            const amountInput = parentElement.find('input[name="amount"]');
            amountInput.val(val);
            cart.updateAmountItem(e.target, val);
        },

        changeInputVal: function (e) {
            let val = $(e.target).val();
            if (val < 1) {
                val = 1;
                $(e.target).val(val);
            } else {
                cart.updateAmountItem(e.target, val);
            }

        },

        getIdItem: function (target) {
            return $(target.parentNode).attr('value');
        },

        updateAmountItem: function (target, val) {
            var product_id = this.getIdItem(target);
            var csrfToken = $(target.parentNode).attr('data-csrfToken');
            // console.log(product_id);
            // console.log(csrfToken);

            $.ajax({
                url: '/api/cart/update',
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    product_id: product_id,
                    amount: val,
                },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    // Thực hiện các xử lý sau khi sản phẩm được thêm vào giỏ hàng thành công
                    cart.renderCartCount();
                    cart.renderTotalCart();
                    cart.renderCartItemTotal(target, response);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    // Xử lý lỗi nếu có
                }
            });
        },

        renderCartItemTotal: function (target, response) {
            console.log($(target.parentNode.parentNode.parentNode).find('.cart_item_total .cart_item_text'), response);
            let cartItemTotal = $(target.parentNode.parentNode.parentNode).find('.cart_item_total .cart_item_text');
            // let valCartItemTotal = $(cartItemTotal).html();
            // console.log(valCartItemTotal);
            let price = response['cart']['product_details']['discount'] ? response['cart']['product_details']['discount'] : response['cart']['product_details']['price'];
            total = parseInt(response['cart']['amount']) * parseInt(price);
            var totalText = formatNumberWithCommas(total) + "<sup>đ</sup>";
            $(cartItemTotal).html(totalText);
        }
    };

    //Lắng nghe tag input thay đổi và thay đổi value
    $('.input[name="amount"]').change(function (e) {
        cart.changeInputVal(e);
    });


    //Xử lý nút button thay đổi value và render ra tag input
    $('.minus').click(function (e) {
        let valInput = cart.getInputVal(e);
        console.log(valInput);
        if (valInput <= 1) {
            return false;
        } else {
            let val = cart.calculate('minus', valInput);
            cart.renderInputVal(e, val);
        }


    });

    $('.plus').click(function (e) {
        let valInput = cart.getInputVal(e);
        let val = cart.calculate('plus', valInput);
        cart.renderInputVal(e, val);
    });

    $('.product_cart_button').on('click', function (e) {
        e.preventDefault(); // Hủy bỏ sự kiện mặc định

        var product_id = $(this).attr('data-product_id');
        var csrfToken = $(this).attr('data-csrfToken');
        console.log(e);
        if (product_id !== null && csrfToken !== null) {
            cart.addToCart(product_id, csrfToken);
        }
    });

    $('.cart_delete').click(function (e) {
        e.preventDefault();
        var product_id = $(this).attr('data-product_id');
        var csrfToken = $(this).attr('data-csrfToken');
        cart.deleteToCart(product_id, csrfToken, e);
    });

    cart.renderCartCount();
    cart.renderTotalCart();

});
