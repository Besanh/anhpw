$(document).ready(function () {
    filterCate();
});

/**
 * Filter brand page cate
 */
function filterCate() {
    var token = $('meta[name="csrf-token"]').attr('content');
    var uri = '';
    // $checkboxes = $('.filter-bid');
    // $checkboxes.change(function () {
    //     window.location.hash = 'bid=' + $checkboxes.filter(':checked').map(function () {
    //         return this.value;
    //     }).get().join(",");
    //     console.log(window.location.hash);
    // });
    // $checkboxes_capa = $('.filter-capa');
    // $checkboxes_capa.change(function () {
    //     window.location.hash = '&capa=' + $checkboxes_capa.filter(':checked').map(function () {
    //         return this.value;
    //     }).get().join(",");
    //     console.log(window.location.hash);
    // });
    // $(".filter-bid, .filter-capa").on('change', function (e) {
    //     let data_name = $(this).attr('data-name');
    //     uri += '&' + data_name + '=' + $('.filter-' + data_name).filter(':checked').map(function () {
    //         return this.value;
    //     }).get().join(",");
    //     if (uri.slice(0, 1) == '&') {
    //         uri.replace('&', '');
    //     }
    //     console.log(uri)
    //     let bid = $("input[name='bid[]']").serializeArray();
    //     let capa = $("input[name='capa[]']").serializeArray();
    //     let cate = $("input[name='cate']").val();
    //     $.ajax({
    //         type: 'GET',
    //         dataType: 'html',
    //         url: $('.list-brand').attr('data-href') + '#' + uri,
    //         data: {
    //             // _token: token,
    //             // bid: bid,
    //             // capa: capa,
    //             // cate: cate
    //         },
    //         beforeSend: function () {
    //             console.log($('.list-brand').attr('data-href') + '#' + uri);
    //         },
    //         'success': function (html) {console.log(html)
    //             $('.item-ajax').empty().html(html);
    //         }
    //     })
    //         .always(function (XHR, textStatus, errorThrown) {
    //             if (textStatus != 'success') {
    //                 console.log(XHR);
    //             }
    //         });
    //     return false;
    // });
    function getIds(checkboxName) {
        let checkBoxes = document.getElementsByName(checkboxName);
        let ids = Array.prototype.slice.call(checkBoxes)
            .filter(ch => ch.checked == true)
            .map(ch => ch.value);
        return ids;
    }

    function filterResults() {
        let cate = getIds("cate");

        let brandIds = getIds("bid");

        let capaIds = getIds("capa");

        let href = window.location.href;

        if (href.includes('?')) {
            href += '&';
        }
        else {
            href += '?';
        }

        if (brandIds.length) {
            href += 'filter[bid]=' + brandIds;
        }

        if (capaIds.length) {
            href += 'filter[capa]=' + capaIds;
        }
        // document.location.href = href;
        if ($.support.pjax) {
            $.pjax({ url: href, container: '#pjax-cate-container' })
        }
    }
    if ($("#filter").length > 0) {
        document.getElementById("filter").addEventListener("click", filterResults);
    }

}


function postFilterBrand() {
    var token = $('meta[name="csrf-token"]').attr('content');
    $(".filter-bid, .filter-capa").on('change', function (e) {
        e.preventDefault();
        // serializeArray
        let bid = $("input[name='bid[]']").serializeArray();
        let capa = $("input[name='capa[]']").serializeArray();
        let cate = $("input[name='cate']").val();

        $.ajax({
            type: 'GET',
            dataType: 'html',
            url: url,
            data: {
                _token: token,
                bid: bid,
                capa: capa,
                cate: cate
            },
            beforeSend: function () {
            },
            'success': function (html) {
                $('.item-ajax').empty().html(html);
            }
        })
            .always(function (XHR, textStatus, errorThrown) {
                if (textStatus != 'success') {
                    console.log(XHR);
                }
            });
        return false;
    });
}

function GetDataForm() {
    return form.serializeArray();
    return form.serialize().replace(/[^&]+=\.?(?:&|$)/g, '');
}