/**
 * Bind form data cart toi step payment
 */
function bindForm($this) {$(window).scrollTop(0)
    const url_fetch_province = document.getElementById('link-get-province-name').dataset.url;
    const url_fetch_district = document.getElementById('link-get-district-name').dataset.url;

    // Bill info
    const GENDER = new Array('Male', 'Female');
    var customers_fullname = document.getElementById('customers_fullname').value;   // require
    var customers_gender = document.getElementById('customers_gender').value;   // require
    var customers_email = document.getElementById('customers_email').value;   // require
    var customers_phone = document.getElementById('customers_phone').value;   // require
    var customers_province = document.getElementById('customers_province').value;   // require
    var customers_district = document.getElementById('customers_district').value;   // require
    var customers_zipcode = document.getElementById('customers_zipcode').value;
    var customers_address = document.getElementById('customers_address').value;   // require
    var customers_note = document.getElementById('customers_note').value;

    // Consignee info
    var consignee_fullname = document.getElementById('consignee_fullname').value;
    var consignee_email = document.getElementById('consignee_email').value;
    var consignee_phone = document.getElementById('consignee_phone').value;
    var consignee_address = document.getElementById('consignee_address').value;
    var consignee_note = document.getElementById('consignee_note').value;

    // Invoice info
    var invoice_company = document.getElementById('invoice_company').value;
    var invoice_taxcode = document.getElementById('invoice_taxcode').value;
    var invoice_email = document.getElementById('invoice_email').value;
    var invoice_phone = document.getElementById('invoice_phone').value;
    var invoice_address = document.getElementById('invoice_address').value;
    var invoice_note = document.getElementById('invoice_note').value;

    ///////////////////////////////// Bind data ////////////////////////////////////////
    document.getElementById("ship_detail_fullname").innerHTML = customers_fullname;
    document.getElementById("ship_detail_gender").innerHTML = GENDER[customers_gender] ? GENDER[customers_gender] : '';
    document.getElementById("ship_detail_email").innerHTML = customers_email;
    document.getElementById("ship_detail_phone").innerHTML = customers_phone;

    if (customers_province) {
        $.getJSON(url_fetch_province + '/' + customers_province, function (data) {
            document.getElementById("ship_detail_province").innerHTML = data.name
        })
    }
    if (customers_district) {
        $.getJSON(url_fetch_district + '/' + customers_district, function (data) {
            document.getElementById("ship_detail_district").innerHTML = data.name;
        })
    }

    document.getElementById("ship_detail_zipcode").innerHTML = customers_zipcode;
    document.getElementById("ship_detail_address").innerHTML = customers_address;
    document.getElementById("ship_detail_note").innerHTML = customers_note;

    // Ship to
    if (consignee_fullname) {
        document.getElementById("shipto_fullname").innerHTML = consignee_fullname;
        document.getElementById("shipto_email").innerHTML = consignee_email;
        document.getElementById("shipto_phone").innerHTML = consignee_phone;
        document.getElementById("shipto_address").innerHTML = consignee_address;
        document.getElementById("shipto_note").innerHTML = consignee_note;

        // Show ship to
        $('.shipto').hasClass('d-none') ? $('.shipto').removeClass('d-none') : '';
    }
    else {
        $('.shipto').addClass('d-none');
    }

    if (invoice_company) {
        document.getElementById("invoice_summary_company").innerHTML = invoice_company;
        document.getElementById("invoice_summary_taxcode").innerHTML = invoice_taxcode;
        document.getElementById("invoice_summary_email").innerHTML = invoice_email;
        document.getElementById("invoice_summary_phone").innerHTML = invoice_phone;
        document.getElementById("invoice_summary_address").innerHTML = invoice_address;
        document.getElementById("invoice_summary_note").innerHTML = invoice_note;
    }
    else {
        $('.invoice_summary').addClass('d-none');
    }

    
}

/**
 * Chon province => district
 */
function bindProToDist() {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('#customers_province').on('change', function () {
        $.ajax({
            url: $(this).attr('data-href') + '/' + $(this).val(),
            method: 'get',
            data: { _token: token },
            success: function (html) {
                $('#customers_district').html(html)
            }
        })
    })
}
bindProToDist();

/**
 * Chon gift card va so luong trong page gift-card
 */
function buyGiftCard() {
    var id = qty = null;
    $('.select-giftcard').on('click', function () {
        id = $(this).val();
        qty = $('.qty-giftcard').val();
        if (id != null && qty != null) {
            window.location.href = '/' + 'cart/add/' + id + '/' + qty;
        }
        else {
            $('.modal-body').text('Please choose gift card');
            $('div.modal-notify .modal').modal('show');
        }
    });
    $('.add-giftcard').on('click', function () {
        if (id != null && qty != null) {
            window.location.href = '/' + 'cart/add/' + id + '/' + qty;
        }
        else {
            $('.modal-body').text('Please choose gift card');
            $('div.modal-notify .modal').modal('show');
        }
    });
}
buyGiftCard();

/**
 * Page product detail
 * Chon capa
 */
function changeCapaProDetail() {
    var id = qty = null;
    $('.select-capa').on('click', function () {
        id = $(this).val();
        qty = $('.qty-cart').val();
        if (id != null && qty != null) {
            $('.add-cart').attr('href', '/' + 'cart/add/' + id + '/' + qty)
        }
        $.ajax({
            url: $(this).attr('data-url'),
            method: 'get',
            data: { _token: $('meta[name="csrf-token"]').attr('content') },
            success: function (json) {
                if (!json.message) {
                    $('.prices-detail-name').text(json.name_seo)
                    $('.prices-detail-price').text(new Intl.NumberFormat('vn-VN').format(json.price) + ' VND')
                    $('.prices-detail-barcode').text(json.barcode)
                    $(this).attr('checked', true)
                    $('.add-cart').attr('data-id', json.price_id)
                }
            }
        })
    });
    $('.js-change-qty').on('click', function () {
        id = $('.add-cart').attr('data-id');
        qty = $('.qty-cart').val()
        if (id != null && qty != null) {
            $('.add-cart').attr('href', '/' + 'cart/add/' + id + '/' + qty)
        }
    });
}
changeCapaProDetail();