$(function () {
    $('#validationerr div:first-child').addClass('hidden');
    $('#lupa').on('click', function () {
        $('#searchform').trigger('submit');
    });
    $('#edit').on('click', function () {
        
    });
    $('#delete').on('click', function () {
        
    });
    $('#sold').on('click', function () {
        $.ajax({
            type: "post",
            url: "/items/"+$('#seller').attr('id_item'),
            data: {'id': $('#seller').attr('id_item'),'state': 1,'_method': 'PUT','_token': $('#seller > input:nth-child(1)').val(),'op': 'st'},
            dataType: "json",
            success: function (response) {
                if (response.success == 1){
                    window.location = '/items';
                }
            }
        });
    });
    
});
function succes(){
    $('#inner-message').text($('#succont').text());
    $('#error').show().delay(5000).fadeOut(5000);
}