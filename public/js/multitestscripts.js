$(function () {
    $("#phone").mask("+7(999) 999-9999");
});

function addCallback() {
    var form_data = new FormData($('#callbackAddForm')[0]);
    $.ajax({
        url: '/add_callback',
        data: form_data,
        type: "POST",
        processData: false,
        contentType: false,
        success: function (response) {
            modalBox("#myModalBox", '#message', response['message']);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            modalBox("#myModalBox", '#message', 'Ошибка: ' + textStatus + '|' + errorThrown);
        }
    });
}

function editCallback() {
    var form_data = new FormData($('#callbackEditForm')[0]);
    $.ajax({
        url: '/edit_callback',
        data: form_data,
        type: "POST",
        processData: false,
        contentType: false,
        success: function (response) {
            modalBox("#myModalBox", '#message', response['message']);
            if (response['redirect'] === 1) {
                modalBoxRedirectOnHide("#myModalBox", "/callbacks");
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            modalBox("#myModalBox", '#message', 'Ошибка: ' + textStatus + '|' + errorThrown);
        }
    });
}

function deleteCallback(id) {
    $.ajax({
        url: "/delete_callback",
        data: {'id': id},
        cache: false,
        success: function (response) {
            modalBox("#myModalBox", '#message', response['message']);
            modalBoxRedirectOnHide("#myModalBox", "/callbacks");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            modalBox("#myModalBox", '#message', 'Ошибка: ' + textStatus + '|' + errorThrown);
        }
    });
}

function modalBox(box_id, text_id, value) {
    $(box_id).find(text_id).text(value);
    $(box_id).modal('show');
}

function modalBoxRedirectOnHide(box_id, url) {
    $(box_id).on('hide.bs.modal', function () {
        window.location = url;
    });
}
