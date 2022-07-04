$(function () {
    $('#validationerr div:first-child').addClass('hidden');
    $('#lupa').on('click', function () {
        $('#searchform').trigger('submit');
    });
    $('#delete').on('click', function () {
        $.ajax({
            type: "post",
            url: "/items/"+$('#seller').attr('id_item'),
            data: {'id': $('#seller').attr('id_item'),'state': 4,'_method': 'PUT','_token': $('#seller > input:nth-child(1)').val(),'op': 'rq'},
            dataType: "json",
            success: function (response) {
                if (response.success == 1){
                    window.location = '/items';
                }
            }
        });
    });
    $('#sold').on('click', function () {
        $.ajax({
            type: "post",
            url: "/items/"+$('#seller').attr('id_item'),
            data: {'id': $('#seller').attr('id_item'),'state': 1,'_method': 'PUT','_token': $('#seller > input:nth-child(1)').val(),'op': 'rq'},
            dataType: "json",
            success: function (response) {
                if (response.success == 1){
                    window.location = '/items';
                }
            }
        });
    });
    $('#editprofile').on('click', function () {
        if ($('#descriptionm').text() != "No s'ha proporcionat informació"){
            $('#descriptionf').text($('#descriptionm').text());
        }
        $('#descriptionm').hide();
        if ($('#instagramm').text() != '---'){
            $('#instagramf').val($('#instagramm').text());
        }
        $('#instagramm').hide();
        if ($('#whatsappm').text() != '---'){
            $('#whatsappf').val($('#whatsappm').text());
        }
        $('#whatsappm').hide();
        if ($('#o_contactm').text() != '---'){
            $('#o_contactf').val($('#o_contactm').text());
        }
        $('#o_contactm').hide();
        $('.edit-mini').removeClass('hidden');
        $('.edit-mini').removeClass('hiden');
        $('#editprofile').hide();
    });
    $('#cancelprofile').on('click', function () {
        $('.edit-mini').addClass('hidden');
        $('.edit-mini').addClass('hiden');
        $('#editprofile').show();
        $('#o_contactm').show();
        $('#descriptionm').show();
        $('#whatsappm').show();
        $('#instagramm').show();
    });
    $('#mini-avatar-input').on('change', function () {
        $('#mini-avatar').attr('src', URL.createObjectURL(this.files[0]));
    });
});