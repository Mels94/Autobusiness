//delete category
$(document).on('click', '.delete', function () {
    let _id = $(this).attr('data-id');
    let del = $(this).closest('tr')[0];
    $.confirm({
        title: 'Warning',
        content: 'Do you really want to delete?',
        buttons: {
            OK: function () {
                $.ajax({
                    url: window.location.origin + '/admin/category/delete',
                    type: 'post',
                    dataType: 'json',
                    data: {id: _id},
                    success: function (data) {
                        //console.log(data);
                        if (data) {
                            let base_link = window.location.origin + '/admin/category/index';
                            let href = window.location.href;
                            if (base_link === href) {
                                del.remove();
                            } else {
                                window.location.href = window.location.origin + '/admin/category/index';
                            }
                        }
                    }
                })
            },
            cancel: function () {

            },
        },
    });
});


//delete product
$(document).on('click', '.delete_product', function () {
    let _id = $(this).attr('data-id');
    let del = $(this).closest('tr')[0];
    $.confirm({
        title: 'Warning',
        content: 'Do you really want to delete?',
        buttons: {
            OK: function () {
                $.ajax({
                    url: window.location.origin + '/admin/product/delete',
                    type: 'post',
                    dataType: 'json',
                    data: {id: _id},
                    success: function (data) {
                        if (data) {
                            console.log(data)
                            let base_link = window.location.origin + '/admin/product/index';
                            let href = window.location.href;
                            if (base_link === href) {
                                del.remove();
                            } else {
                                window.location.href = window.location.origin + '/admin/product/index';
                            }
                        }
                    }
                })
            },
            cancel: function () {

            },
        },
    });
});


//delete all category
$(document).on('click', '.remove_allCategory', function () {
    $.confirm({
        title: 'Warning',
        content: 'Do you really want to delete <h4>category table?<h4>',
        buttons: {
            OK: function () {
                $.ajax({
                    url: window.location.origin + '/admin/category/delete',
                    type: 'post',
                    dataType: 'json',
                    data: {drop: 'drop'},
                    success: function (data) {
                        if (data) {
                            $('.table_category')[0].children[1].remove();
                        }
                    }
                });
                $.alert('Successful!');
            },
            cancel: function () {

            },
        },
    });
});


//delete all product
$(document).on('click', '.remove_allProduct', function () {
    $.confirm({
        title: 'Warning',
        content: 'Do you really want to delete <h4>product table?<h4>',
        buttons: {
            OK: function () {
                $.ajax({
                    url: window.location.origin + '/admin/product/delete',
                    type: 'post',
                    dataType: 'json',
                    data: {drop: 'drop'},
                    success: function (data) {
                        if (data) {
                            $('.table_product')[0].children[1].remove();
                        }
                    }
                });
                $.alert('Successful!');
            },
            cancel: function () {

            },
        },
    });
});


//delete order
$(document).on('click', '.delete_order', function () {
    let _id = $(this).attr('data-id');
    let del = $(this).closest('tr')[0];
    $.confirm({
        title: 'Warning',
        content: 'Do you really want to delete?',
        buttons: {
            OK: function () {
                $.ajax({
                    url: window.location.origin + '/admin/order/delete',
                    type: 'post',
                    dataType: 'json',
                    data: {id: _id},
                    success: function (data) {
                        if (data){
                            let base_link = window.location.origin + '/admin/order/index';
                            let href = window.location.href;
                            if (base_link === href) {
                                del.remove();
                            } else {
                                window.location.href = window.location.origin + '/admin/order/index';
                            }
                        }
                    }
                })
            },
            cancel: function () {

            },
        },
    });
})


//delete contact
$(document).on('click', '.delete_contact', function () {
    let _id = $(this).attr('data-id');
    let del = $(this).closest('tr')[0];
    $.confirm({
        title: 'Warning',
        content: 'Do you really want to delete?',
        buttons: {
            OK: function () {
                $.ajax({
                    url: window.location.origin + '/admin/contact/delete',
                    type: 'post',
                    dataType: 'json',
                    data: {id: _id},
                    success: function (data) {
                        if (data){
                            del.remove();
                        }
                    }
                })
            },
            cancel: function () {

            },
        },
    });
})


window.onload = () => {
/*------------------is New Order-------------------*/
    $.ajax({
        url: window.location.origin + '/admin/order/isNew',
        type: 'post',
        dataType: 'json',
        data: {},
        success: function (data) {
            if (data == 0){
                $('.badge_order').remove();
            }else {
                $('.badge_order').text(data);
            }
        }
    })
/*------------------is New Contact----------------*/
    $.ajax({
        url: window.location.origin + '/admin/contact/isNew',
        type: 'post',
        dataType: 'json',
        data: {},
        success: function (data) {
            if (data == 0){
                $('.badge_contact').remove();
            }else {
                $('.badge_contact').text(data);
            }
        }
    })

}


$(document).ready(function () {
    //Pagination full Numbers
    $('#paginationFullNumbers').DataTable({
        "pagingType": "full_numbers"
    });


    /*-----------------add product field and delete product field----------------------*/
    $('.add_productField').on('click', function () {
        $(this).parent().prev().after(`
                    <div class="form-row">
                        <div class="form-group col-md-6 mt-4">
                            <input type="number" name="product_id[]" class="form-control" placeholder="Product ID*">
                        </div>
                        <div class="form-group col-md-6 mt-4">
                            <input type="number" name="count[]" class="form-control" placeholder="Count*">
                        </div>
                    </div>
                            `);
    })
    $('.delete_productField').on('click', function () {
        let count_formRow = $(this).parents('form').find('.form-row').length;
        if (count_formRow > 1){
            $(this).parents('form').find('.small_productError').remove();
            $(this).parent().prev().remove();
        }
    })


/*-----------------------------send Email-----------------------*/
    $('.send_mail').on('click', function () {
        let inputText = $(this).parent().prev().children().val();
        let _email = $(this).closest('tr')[0].children[2].innerText;
        let _id = $(this).attr('data-id');
        if (inputText.length > 0){
            let timerInterval
            Swal.fire({
                title: 'Send to mail...',
                html: 'I will send in <b></b> milliseconds',
                timer: 3000,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                        const content = Swal.getContent()
                        if (content) {
                            const b = content.querySelector('b')
                            if (b) {
                                b.textContent = Swal.getTimerLeft()
                            }
                        }
                    }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Successful!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            })
            $.ajax({
                url: window.location.origin + '/admin/contact/mail',
                type: 'post',
                dataType: 'json',
                data: {email: _email, answer: inputText}
            })
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'answer field is empty'
            })
        }
    })


    /*------------------------open isNew Order--------------------------*/
    $('.open_isNewOrder').on('click', function () {
        let _id = $(this).attr('data-id');
        let _this = $(this);
        let badge_order = $('.badge_order').text();
        badge_order -= 1;
        $.ajax({
            url: window.location.origin + '/admin/order/updateIsNew',
            type: 'post',
            dataType: 'json',
            data: {id: _id},
            success: function (data) {
                if (data){
                    _this.closest('tr').css({backgroundColor: ''});
                    if (badge_order == 0){
                        $('.badge_order').remove();
                    }else {
                        $('.badge_order').text(badge_order);
                    }
                }
            }
        })
    })



/*------------------------open isNew Contact--------------------------*/
    $('.open_isNewContact').on('click', function () {
        let _id = $(this).attr('data-id');
        let _this = $(this);
        let badge_contact = $('.badge_contact').text();
        badge_contact -= 1;
        $.ajax({
            url: window.location.origin + '/admin/contact/update',
            type: 'post',
            dataType: 'json',
            data: {id: _id},
            success: function (data) {
                if (data){
                    _this.closest('tr').css({backgroundColor: ''});
                    if (badge_contact == 0){
                        $('.badge_contact').remove();
                    }else {
                        $('.badge_contact').text(badge_contact);
                    }
                }
            }
        })
    })




});
