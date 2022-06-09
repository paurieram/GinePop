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

        /* 
        *  0 -> active
        *  1 -> disabled
        */
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
                            category.created_at = new Date(category.updated_at).toLocaleDateString("es-ES");
                        }else{
                            category.created_at = new Date(category.created_at).toLocaleDateString("es-ES");
                        }
                        htm += '<tr><th scope="row">'+category.id+'</th><td>'+category.name+'</td><td><a href="'+category.image+'" class="text-primary" target="_blank">Link</a></td><td>'+category.created_at+'</td><td>';  
                        htm += '<select class="customimput"><option value="0">activat</option><option value="1">desactivat</option></select></td><td><a value="'+category.id+'" class="btn btn-outline-secondary save-category-changes">Guardar</a></td></tr>';
                        
                    });
                    $('#categorycontent').append(htm);
                }
            }
        });
    });


    // ficar el stat k toca de default
    // 
    
    $('.save-category-changes').on('click', function () {
        // wasd
    });
});