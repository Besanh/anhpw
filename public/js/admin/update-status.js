$(document).ready(function () {
    $(document).ajaxSend(function () {
        $("#overlay").fadeIn(300);
    });

    // Update status index
    function ajaxUpdateStatus() {
        $('a.update-status').on('click', function (e) {
            var id = $(this).children('.status').attr('data-id');

            e.preventDefault();
            $.ajax({
                url: $(this).attr('data-href'),
                type: 'GET',
                dataType: 'json',
                // data: {
                //     "_token": $('meta[name="csrf-token"]').attr('content')
                // },
                beforeSend: function () {
                    $('i.status-' + id).hide();
                    // Show image container
                    $(".loader-" + id).show();
                },
                success: function (data) {
                    var t = window.setTimeout(function () {
                        if (data.status == 1) {
                            $('i.status-' + id).removeClass().addClass('status status-' + id + ' fa fa-check text-success');
                        }
                        else {
                            $('i.status-' + id).removeClass().addClass('status status-' + id + ' fa fa-times text-danger');
                        }
                        $('.updated_at-' + id).html(moment(data.updated_at).format('Y-MM-DD H:m:s'));
                        clearTimeout(t);
                    }, 1000);
                },
                complete: function (data) {
                    $('i.status-' + id).show();
                    // Hide image container
                    $(".loader-" + id).hide();
                }
            }).always(function (XHR, textStatus, errorThrown) {
                if (textStatus != 'success') {
                    console.log(XHR); alert(XHR.responseText);
                }
            });
        });
    }

    ajaxUpdateStatus();

});