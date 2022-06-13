let categorylen = 0;
let userlen = 0;
$(function () {
    function reset() {
        $('.mv-left').removeClass('fixed-left');
        $('.card-panel').addClass('hiden');
    };
/* 
 *  Show create category card
 */
    $('#BtnCreateCategory').on('click', function () {
        reset();
        $(this).addClass('fixed-left');
        $('#CardCreateCategory').removeClass('hiden');
    });
    $('#BtnCreateCategory').trigger('click');
/* 
 *  Show all users card
 */
    $('#BtnShowUsers').on('click', function () {
        reset();
        $(this).addClass('fixed-left');
        $('#CardShowUsers').removeClass('hiden');
        $.ajax({
            type: "get",
            url: "/usrs",
            data: "data", 
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (userlen < response.length){
                    userlen = response.length;
                    htm = '';
                    response.forEach(user => {
                        if (user.updated_at != null){
                            user.created_at = new Date(user.updated_at).toLocaleDateString("es-ES");
                        }else{
                            user.created_at = new Date(user.created_at).toLocaleDateString("es-ES");
                        }
                        htm += '<tr><th scope="row">'+user.id+'</th><td>'+user.name+' '+user.surname+'</td><td>'
                        +user.email+'</td><td>'+user.created_at+'</td><td><u title="instagram\nwatsap\naltres">Veure</u></td>';
                        user.instagram
                        user.whatsapp
                        user.o_contact
                        // if (user.state == 1){
                            // htm += '<select class="customimput" id="'+user.id+'"><option value="0">activat</option><option value="1" selected>desactivat</option></select></td><td></td></tr>';
                        // }else{
                        // }

                    });
                    $('#usercontent').append(htm);  
                }
            }
        });
    });
/* 
 *  Show all categories card
 */
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
                            category.created_at = new Date(category.updated_at).toLocaleDateString("es-ES");
                        }else{
                            category.created_at = new Date(category.created_at).toLocaleDateString("es-ES");
                        }
                        htm += '<tr><th scope="row">'+category.id+'</th><td>'+category.name+'</td><td><a href="'+category.image+'" class="text-primary" target="_blank">Link</a></td><td>'+category.created_at+'</td><td>';
                        if (category.state == 1){
                            htm += '<select class="customimput" id="s'+category.id+'"><option value="0">activat</option><option value="1" selected>desactivat</option></select></td><td><a id="'+category.id+'" class="btn btn-outline-secondary save-category-changes" data-bs-toggle="modal" data-bs-target="#ChangeCategory">Guardar</a></td></tr>';
                        }else{
                            htm += '<select class="customimput" id="s'+category.id+'"><option value="0" selected>activat</option><option value="1">desactivat</option></select></td><td><a id="'+category.id+'" class="btn btn-outline-secondary save-category-changes" data-bs-toggle="modal" data-bs-target="#ChangeCategory">Guardar</a></td></tr>';
                        }

                    });
                    $('#categorycontent').append(htm);
                    addcategoryevent();
                }
            }
        });
    });
/**
 * Update category update modal
 */
    function addcategoryevent(){
        $('.save-category-changes').on('click', function () {
            $('#formput').attr('action', '/categories/'+$(this).attr('id'));
            $('#putstate').val($('#s'+$(this).attr("id")+' option:selected').val());
            $('#putid').val($(this).attr('id'));
        });
    }
});