let categorylen = 0;
$(function () {
    function reset() {
        $('.mv-left').removeClass('fixed-left');
        $('.card-panel').addClass('hiden');
    };
    $('#BtnCreateCategory').on('click', function () {
        reset();
        $(this).addClass('fixed-left');
        $('#CardCreateCategory').removeClass('hiden');
    });
    $('#BtnShowCategories').on('click', function () {
        reset();
        $(this).addClass('fixed-left');
        $('#CardShowCategory').removeClass('hiden');
        $.ajax({
            type: "get",
            url: "/categories",
            data: "data",
            dataType: "json",
            success: function (response) {
                if (categorylen < response.length){
                    categorylen = response.length;
                    htm = '';
                    response.forEach(category => {
                        if (category.updated_at != null){
                            category.created_at = new Date(category.updated_at).toLocaleDateString("en-US");
                        }else{
                            category.created_at = new Date(category.updated_at).toLocaleDateString("en-US");
                        }
                        htm += '<tr><th scope="row">'+category.id+'</th><td>'+category.name+'</td><td><a href="'+category.image+'" class="text-primary" target="_blank">Link</a></td><td>'+category.created_at+'</td></tr>';
                    });
                    $('#categorycontent').append(htm);
                }
            }
        });
    });
});