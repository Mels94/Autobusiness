/*-------------------------------shopping-------------------------*/
window.onload = () => {
    if (!sessionStorage.getItem('products')) {
        sessionStorage.setItem('products', JSON.stringify([]));
    }
    let products = JSON.parse(sessionStorage.getItem('products'));
    $('.badge').text(products.length);

    $('.preloader').remove();
}


$(document).ready(function() {
    /*------------------add product------------------*/
    $(".shopping-cart").hide();
    $('.buy_now').on('click', function () {
        let _id = $(this).attr('data-id');
        let name = $('.car-details')[0].children[0].innerText;
        let value = $('.car-details')[0].children[1].innerText;
        let price = +value.substring(0,value.indexOf(' '));
        let path = $('#single-car .sp-slide img').attr('src');
        let quantity = $('.product-quantity .cart-plus-minus-box')[0].value;
        let productCount = +$('.cart-plus-minus').find('.inc').attr('data-id');
        if (!sessionStorage.getItem('products')) {
            sessionStorage.setItem('products', JSON.stringify([]));
        }
        let products = JSON.parse(sessionStorage.getItem('products'));
        let double = false;
        for (let i in products) {
            if (products[i].id == _id) {
                double = true;
                products[i].quantity = quantity;
            }
        }
        if (!double)
            products.push({'id': _id, 'name': name, 'price': price, 'path': path, 'quantity': quantity, 'count': productCount});
        $('.badge').text(products.length)
        sessionStorage.setItem('products', JSON.stringify(products));
    })


    /*------------------shopping modal------------------*/
    $('#cart').on("click", function () {
        if (!sessionStorage.getItem('products')) {
            sessionStorage.setItem('products', JSON.stringify([]));
        }
        let products = JSON.parse(sessionStorage.getItem('products'));
        $('.remove-item').remove();
        let total_modal = 0;
        $.each(products, function (i, item) {
            $('.shopping-cart-items').append(`<li class="clearfix remove-item">
                            <img class="append-img mt-1" src="${item.path}" alt="item1" width="80px" height="60px">
                            <div class="item_info">
                                <span class="item-name">${item.name}</span>
                                <span class="item-price">${item.price} $</span>
                                <span class="item-quantity">Quantity: ${item.quantity}</span>
                            </div>
                            <div class="remove_btn">
                                <button class="remove_button" data-id="${item.id}" title="Remove this item">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                        </li>`);
            total_modal += item.price * item.quantity;
            $('.main-color-text').text(total_modal + ' $');
/*            if (i === 2) {
                return false;
            }*/
            let cartItemsCount = $('.shopping-cart-items')[0].childElementCount;
            if (cartItemsCount == 1){
                $('.shopping-cart-items').css({height: '60px', overflow: ''});
            }else if (cartItemsCount == 2){
                $('.shopping-cart-items').css({height: '140px', overflow: ''});
            }else if (cartItemsCount == 3){
                $('.shopping-cart-items').css({height: '222px', overflow: ''});
            }else {
                $('.shopping-cart-items').css({height: '257px', overflow: 'scroll'});
            }

        })
        $('.remove_button').on('click', function () {
            let id = +$(this).attr('data-id');
            let _price = $(this).closest('li').find('.item-price').text();
            let price = +_price.substring(0, _price.indexOf(' '));
            let _qit = $(this).closest('li').find('.item-quantity').text();
            let qit = +_qit.substring(_qit.indexOf(' ') + 1);
            let totalSum = +$('.main-color-text').text().substring(0, $('.main-color-text').text().indexOf(' '));
            let changeTotal = totalSum - (price * qit);
            $('.main-color-text').text(changeTotal + ' $');
            $(this).closest('li').remove();
            let listToDelete = [id];
            for (let i = 0; i < products.length; i++) {
                let obj = products[i];
                if (listToDelete.indexOf(+obj.id) == 0) {
                    products.splice(i, 1);
                }
            }
            sessionStorage.setItem('products', JSON.stringify(products));
            $('.badge').text(products.length);
        })
        if ($(".main-color-text").text() == '0 $'){
            $(".shopping-cart-items").css({height: '0'})
        }
        $(".shopping-cart").toggle();
    });


    /*-----------------------shopping cart-------------------------*/
    let products = JSON.parse(sessionStorage.getItem('products'));
    let count = 0;
    $.each(products, function (i, item) {
        let total = item.price * item.quantity;


        $('.shopping-table').append(`<tr class="tr_cart">
                                <td class="product-thumbnail p-0"><a href="/site/single_car/${item.id}"><img src="${item.path}" alt="product img" width="130px" height="90px"></a></td>
                                <td class="product-name"><a href="/site/single_car/${item.id}">${item.name}</a></td>
                                <td class="product-price"  style="color: #777; font-weight: 700; font-size: 15px;" ><span class="amount">${item.price} </span>$</td>
                                <td class="product-quantity">
                                    <input type="button" class="minus" value="-">
                                    <input class="quantity_input" type="text" value="${item.quantity}" disabled>
                                    <input type="button" class="plus" value="+" data-id="${item.id}">
                                </td>
                                <td class="product-subtotal" data-id="${item.count}"><span class="counter">${total}</span> $</td>
                                <td class="product-remove"><a class="remove_button" data-id="${item.id}">X</a></td>
                            </tr>`);
        count += +total;
        $('.totals').text(count);

    })

    /*    $(document).on('keyup', '.quantity_input', function () {
            let role = 0;
            let fullCount = +$(this).parent().next().attr('data-id');
            let _id = $(this).next().attr('data-id');
            let change_qty = $(this).val();
            if (change_qty >= fullCount){
                $(this).val(fullCount);
            }
            for (let i in products){
                if (products[i].id == _id){
                    products[i].quantity = change_qty;
                }
            }
            sessionStorage.setItem('products', JSON.stringify(products));
            $.each($('.shopping-table tr'), function (i, item) {
                let newCount = $(item).find('.quantity_input').val() * $(item).find('.amount').text();
                $(item).find('.counter').text(newCount);
                role += newCount;
            });
            $('.totals').text(role);
        })*/

    $('.remove_button').on('click', function () {
        let id = +$(this).attr('data-id');
        let counter = $(this).closest('tr').find('.counter').text();
        let total = $('.totals').text();
        let totals  = (+total) - (+counter);
        $('.totals').text(totals);
        $(this).closest('tr').remove();
        let listDeleteCart = [id];
        for (let i = 0; i < products.length; i++) {
            let obj = products[i];
            if (listDeleteCart.indexOf(+obj.id) == 0) {
                products.splice(i, 1);
            }
        }
        sessionStorage.setItem('products', JSON.stringify(products));
        $('.badge').text(products.length);
    })



    /*--------plus-------*/
    for (let i in products){
        if (products[i].quantity == products[i].count){
           $($('.plus')[i]).attr('disabled', 'disabled');
        }
    }
    $('.plus').on('click', function () {
        let fullCount = +$(this).parent().next().attr('data-id');
        let _id = $(this).attr('data-id');
        let qty = +$(this).prev().val();
        qty += 1; let k = 0;
        $(this).prev().prev().removeAttr('disabled');
        $(this).prev().val(qty);
        let change_qty = $(this).prev().val();
        if (change_qty == fullCount){
            $(this).attr('disabled', 'disabled');
        }
        for (let i in products){
            if (products[i].id == _id){
                products[i].quantity = change_qty;
            }
        }
        sessionStorage.setItem('products', JSON.stringify(products));
        $.each($('.shopping-table tr'), function (i, item) {
            let newCount = $(item).find('.quantity_input').val() * $(item).find('.amount').text();
            $(item).find('.counter').text(newCount);
            k += newCount;
        });
        $('.totals').text(k);
    })


    /*--------minus-------*/
    for (let i in products){
        if (products[i].quantity <= 1){
            $($('.minus')[i]).attr('disabled', 'disabled');
        }
    }
    $('.minus').on('click', function () {
        let _id = $(this).next().next().attr('data-id');
        let qty = +$(this).next().val();
        qty -= 1; let k = 0;
        $(this).next().next().removeAttr('disabled');
        if (qty < 2){
            $(this).attr('disabled', 'disabled');
        }
        $(this).next().val(qty);
        let change_qty = $(this).next().val();
        for (let i in products){
            if (products[i].id == _id){
                products[i].quantity = change_qty;
            }
        }
        sessionStorage.setItem('products', JSON.stringify(products));
        $.each($('.shopping-table tr'), function (i, item) {
            let newCount = $(item).find('.quantity_input').val() * $(item).find('.amount').text();
            $(item).find('.counter').text(newCount);
            k += newCount;
        });
        $('.totals').text(k);
    })



    /*-----------------------single car-------------------------*/
    let c;
    let productCount = +$('.inc').attr('data-id');
    if (productCount > 1){
        c = 1;
        $('.cart-plus-minus-box').val(c);
    }else if (productCount == 1){
        c = 1;
        $('.cart-plus-minus-box').val(c);
        $('.inc').attr('disabled', 'disabled');
        $('.quantityDesc').after(`<div><i>${productCount} pieces are available</i></div>`);
    }else {
        c = 0;
        $('.cart-plus-minus-box').val(c);
        $('.inc').attr('disabled', 'disabled');
        $('.quantityDesc').after(`<div><i>There is no product</i></div>`);
        $('.buy_now').attr('disabled', 'disabled');
    }

    $('.inc').on('click', function () {
        c += 1;
        $('.dec').removeAttr('disabled');
        $('.cart-plus-minus-box').val(c);
        let plusVal = +$('.cart-plus-minus-box').val();
        if (plusVal == productCount){
            $('.inc').attr('disabled', 'disabled');
            $('.quantityDesc').after(`<div class="remove_quantityDesc"><i>${productCount} pieces are available</i></div>`);
        }
    });
    if (c == 1 || c == 0){
        $('.dec').attr('disabled', 'disabled');
    }
    $('.dec').on('click', function () {
        $('.remove_quantityDesc').remove();
        c -= 1;
        $('.inc').removeAttr('disabled');
        if (c < 2){
            $(this).attr('disabled', 'disabled');
        }
        $('.cart-plus-minus-box').val(c);
    })



    /*----------------------------------checkout----------------------------------------*/
    $('.buy-click-submit').on('click', function () {
        let form = $(this).parents('form').serializeArray();
        let data = new FormData();
        $.each(form, function (i, item) {
            data.append(item.name, item.value);
        })
        if (!sessionStorage.getItem('products')) {
            sessionStorage.setItem('products', JSON.stringify([]));
        }
        let products = JSON.parse(sessionStorage.getItem('products'));
        let productArr = [];
        $.each(products, function (i, item) {
            productArr.push({product_id: item.id, count: item.quantity});
        })
        data.append('products', JSON.stringify(productArr));
        data.append('submit', 'send');
        $.ajax({
            url: window.location.origin + '/site/checkout',
            type: 'post',
            dataType: 'json',
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                $('#formCheckout small').remove();
                if (data.success) {
                    sessionStorage.removeItem('products');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 4000
                    });
                    setTimeout(function () {
                        window.location.href = window.location.origin;
                    }, 4000);
                } else {
                    $.each(data.message, function (i, item) {
                        $('#formCheckout input[name=' + i + ']').parent().append(`<small class="form-text text-muted">${item}</small>`)
                    })
                }


            }
        })
    })


    /*----------------------------search select product---------------------------*/
    $('select[name=brand]').change(function () {
        let brand_id = $(this).val();
        $('.remove_option').remove();
        $.ajax({
            url: window.location.origin + '/site/product',
            type: 'post',
            dataType: 'json',
            data: {id: brand_id},
            success: function (data) {
                $.each(data, function (i, item) {
                    $('select[name=mark]').append(`<option class="remove_option" value="${item.name}">${item.name}</option>`);
                })
            }
        })
    })


    /*------------------------site-header cssmenu li subItems overflow--------------------*/
    $('.site-header #cssmenu li').hover(function () {
        let elemCount = $('.site-header #cssmenu li .subItems')[0].childElementCount;
        if (elemCount > 7){
            $('.site-header #cssmenu li .subItems').css({height: '260px', overflow: 'scroll'});
        }else {
            $('.site-header #cssmenu li .subItems').css({overflow: ''});
        }

    })



    /*--------------------checkout modal && checkout cart------------------------------*/
    $('.checkout, .checkout_modal').on('click', function () {
        let products = JSON.parse(sessionStorage.getItem('products'));
        let productIDCountArr = [];
        $.each(products, function (i, item) {
            productIDCountArr.push({product_id: item.id, count: item.quantity});
        })
        $.ajax({
            url: window.location.origin + '/site/cart',
            type: 'post',
            dataType: 'json',
            data: {productIDCountArr},
            success: function (data) {
                if (!data.success){
                    $.each(data.products, function (i, item) {
                        if (item.count > 1){
                            Swal.fire('There are ' + item.count + ' ' + item.cat_name + ' ' + item.name);
                        }else {
                            Swal.fire('There is ' + item.count + ' ' + item.cat_name + ' ' + item.name);
                        }
                    })
                }else {
                    let tr_length = $('.shopping-table').find('.tr_cart').length;
                    let li_length = $('.shopping-cart-items').find('.clearfix').length;
                    if (tr_length > 0 || li_length > 0){
                        window.location.href = window.location.origin + '/site/checkout';
                    }
                }
            }
        })
    })


    /*-------------------------delete user account---------------------------------------*/
    $('.delete_account').on('click', function () {
        let val_input = $(this).parents('form').find('.modal-body').children().val();
        let _this_input = $(this).parents('form').find('.modal-body').children();
        $.ajax({
            url: window.location.origin + '/user/delete',
            type: 'post',
            dataType: 'json',
            data: {password:val_input},
            success: function (data) {
                if (data.success){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    setTimeout(function () {
                        window.location.href = window.location.origin;
                    }, 3000);
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message.password
                    })
                    _this_input.val('');
                }
            }
        })
    })


    /*---------------------------------Contact--------------------------------*/
    $('.contact_send').on('click', function () {
        let form = $(this).parents('form').serializeArray();
        let dataForm = new FormData();
        $.each(form, function (i, item) {
            dataForm.append(item.name, item.value);
        })
        dataForm.append('submit', 'send');
        $.ajax({
            url: window.location.origin + '/site/contact',
            type: 'post',
            dataType: 'json',
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.success){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $('#contact_form input, #contact_form textarea').val('')
                }else {
                    $.each(data.message, function (i, item) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: item
                        })
                    })
                }
            }
        })
    })


/*----------------credit cart text------------------*/
    $('.creditCardText').keyup(function() {
        let foo = $(this).val().split("-").join("");
        if (foo.length > 0) {
            foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
        }
        $(this).val(foo);
    });
    $('.upper').keyup(function() {
        this.value = this.value.toUpperCase();
    });




});





