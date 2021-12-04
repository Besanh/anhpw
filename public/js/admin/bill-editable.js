$(document).ready(function () {
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.placement = 'bottom';
    $.fn.editable.defaults.ajaxOptions = { dataType: 'json' };
    all_editable();
})
function all_editable() {
    editTable();
    editableStatus();
}

function editTable() {
    $('a.bill-editable, a.bill-select-editable').editable({
        success: function (response, newValue) {
            $('.editable-modal').length > 0 ? $('.editable-modal').remove() : '';
            $('body').append(response.view_file)
            $('.editable-modal').modal('show');
            setTimeout(function () {
                $('.editable-modal').modal('hide');
            }, 3000);

        }
    });
}

function editableStatus() {
    $('a.bill-select-status-editable').editable({
        success: function (response, newValue) {
            $('.editable-modal').length > 0 ? $('.editable-modal').remove() : '';
            $('body').append(response.view_file)
            $('.editable-modal').modal('show');
            setTimeout(function () {
                $('.editable-modal').modal('hide');
                window.location = window.location
            }, 3000);

        }
    });
}