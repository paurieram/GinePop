let categorylen = 0;
let userlen = 0;
let categorydata = {};
let usrupdate = 0;
let itemlen = 0;
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
            dataType: "json",
            success: function (response) {
                if (userlen < response.data.length){
                    userlen = response.data.length;
                    htm = '';
                    response.data.forEach(user => {
                        if (user.updated_at != null){
                            user.created_at = new Date(user.updated_at).toLocaleDateString("es-ES");
                        }else{
                            user.created_at = new Date(user.created_at).toLocaleDateString("es-ES");
                        }
                        if (user.instagram == null){
                            user.instagram = '-';
                        }
                        if (user.whatsapp == null){
                            user.whatsapp = '-';
                        }
                        if (user.o_contact == null){
                            user.o_contact = '-';
                        }
                        htm += '<tr><th scope="row">'+user.id+'</th><td>'+user.name+' '+user.surname+'</td><td>'
                        +user.email+'</td><td>'+user.created_at
                        +'</td><td><u class="UserInfoLink ptr" data-bs-toggle="modal" data-bs-target="#UserInfo" inst="'
                        +user.instagram+'" what="'+user.whatsapp+'" opt="'+user.o_contact+'" nam="'+user.name+'">Veure</u></td>';
                        if (user.id != 1 && user.id != response.user){
                            if (user.state == 0){
                                htm += '<td><select class="customimput auto-user-save" id="'+user.id+'"><option value="0" selected>activat</option><option value="2">banned</option><option value="3">admin</option></select></td></tr>';
                            }else if(user.state == 1){
                                // htm += '<td><select class="customimput auto-user-save" id="'+user.id+'"><option value="0">activat</option><option value="2">banned</option><option value="3">admin</option></select></td></tr>';
                            }else if(user.state == 2){
                                htm += '<td><select class="customimput auto-user-save" id="'+user.id+'"><option value="0">activat</option><option value="2" selected>banned</option><option value="3">admin</option></select></td></tr>';
                            }else if(user.state == 3){
                                htm += '<td><select class="customimput auto-user-save" id="'+user.id+'"><option value="0">activat</option><option value="2">banned</option><option value="3" selected>admin</option></select></td></tr>';
                            }else if(user.state == 4){
                                htm += '<td><select class="customimput auto-user-save" id="'+user.id+'"><option value="0">activat</option><option value="2">banned</option><option value="3">admin</option><option value="4" selected>desactivat</option></select></td></tr>';
                            }
                        }else{
                            htm += '<td>No editable</td></tr>';
                        }
                    });
                    $('#usercontent').append(htm); 
                    $('.UserInfoLink').on('click', function () {
                        $('#UserInfoLabel').text('Contacte del usuari: '+$(this).attr('nam')+'');
                        $('#UserInfoContent').html('<div>Instagram: '+$(this).attr('inst')+'</div><br><div>Whatsapp: '+$(this).attr('what')+'</div><br><div>Opcional: '+$(this).attr('opt')+'</div>');
                    }); 
                    saveUsersEvent();
                }
            }
        });
    });   
/*
 *  Save users
 */
function saveUsersEvent() {
    $('.auto-user-save').on('change', function () {
        usrupdate = $(this).attr('id');
        $('#modal-body').text('show');
        $('#ChangeUser').modal('show');
    });
}
$('.send-user-changes').on('click', function () {
    $.ajax({
        type: "put",
        url: "/user/"+usrupdate,
        data: {'id': usrupdate, 'state': $('#'+usrupdate+' option:selected').val(),'op': 'st', '_method': 'PUT', '_token': $('#CardCreateCategory > div:nth-child(1) > form:nth-child(2) > input:nth-child(1)').val()},
        dataType: "json",
        success: function (response) {
            $('#inner-message').text('Usuari actualitzat correctament!');
            $('#error').show().fadeOut(10000);
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
            url: "/allcategories",
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
                    /**
                     * Create category update event
                     */
                    $('.save-category-changes').on('click', function () {
                        categorydata = {'_method': 'PUT','_token': $('#ChangeCategory > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > input:nth-child(2)').val(), 'id': $(this).attr('id'), 'state': $('#s'+$(this).attr("id")+' option:selected').val()};
                    });
                    /**
                     * Create category save event
                     */
                    $('.send-category-changes').on('click', function () {
                        /*
                         *  Send data to db
                         */
                        $.ajax({
                            type: "post",
                            url: "/categories/"+categorydata.id,
                            data: categorydata,
                            dataType: "text",
                            success: function () {
                                categorydata = {};
                                $('#error').show().fadeOut(10000);
                                $('#inner-message').text('Categoria actualitzada correctament!');
                            }
                        });
                    });
                }
            }
        });
    });
    /* 
    *  Show all items card
    */
    $('#BtnShowItems').on('click', function () {
        reset();
        $(this).addClass('fixed-left');
        $('#CardShowItems').removeClass('hiden');
        $.ajax({
            type: "get",
            url: "/allitems",
            dataType: "json",
            success: function (response) {
                if (itemlen < response.length){
        //             itemlen = response.length;
        //             htm = '';
        //             response.forEach(category => {
        //                 if (category.updated_at != null){
        //                     category.created_at = new Date(category.updated_at).toLocaleDateString("es-ES");
        //                 }else{
        //                     category.created_at = new Date(category.created_at).toLocaleDateString("es-ES");
        //                 }
        //                 htm += '<tr><th scope="row">'+category.id+'</th><td>'+category.name+'</td><td><a href="'+category.image+'" class="text-primary" target="_blank">Link</a></td><td>'+category.created_at+'</td><td>';
        //                 if (category.state == 1){
        //                     htm += '<select class="customimput" id="s'+category.id+'"><option value="0">activat</option><option value="1" selected>desactivat</option></select></td><td><a id="'+category.id+'" class="btn btn-outline-secondary save-category-changes" data-bs-toggle="modal" data-bs-target="#ChangeCategory">Guardar</a></td></tr>';
        //                 }else{
        //                     htm += '<select class="customimput" id="s'+category.id+'"><option value="0" selected>activat</option><option value="1">desactivat</option></select></td><td><a id="'+category.id+'" class="btn btn-outline-secondary save-category-changes" data-bs-toggle="modal" data-bs-target="#ChangeCategory">Guardar</a></td></tr>';
        //                 }
        //             });
        //             $('#categorycontent').append(htm);
        //             /**
        //              * Create category update event
        //              */
        //             $('.save-category-changes').on('click', function () {
        //                 categorydata = {'_method': 'PUT','_token': $('#ChangeCategory > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > input:nth-child(2)').val(), 'id': $(this).attr('id'), 'state': $('#s'+$(this).attr("id")+' option:selected').val()};
        //             });
        //             /** */
        //              * Create category save event
        //              */
        //             $('.send-category-changes').on('click', function () {
        //                 /**
        //                  *  Send data to db
        //                  */
        //                 $.ajax({
        //                     type: "post",
        //                     url: "/categories/"+categorydata.id,
        //                     data: categorydata,
        //                     dataType: "text",
        //                     success: function () {
        //                         categorydata = {};
        //                         $('#error').show().fadeOut(10000);
        //                         $('#inner-message').text('Categoria actualitzada correctament!');
        //                     }
        //                 });
        //             });
                }
            }
        });
    });
    /*
     * Charts
     */
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawPieChart);
    function drawPieChart() {
        let arr = [];
        $.ajax({
            type: "get",
            url: "/categories",
            dataType: "json",
            success: function (response) {
                arr[0] = ['Categoria', 'Clicks'];
                response.forEach(category => {
                    arr.push([category.name, parseInt(category.views)]);
                });
                var data = google.visualization.arrayToDataTable(arr);
                var options = {title: '','width':900,'height':400, pieSliceTextStyle: {color: 'black'},
                pieSliceText: 'label',};
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        });
    }
    // google.charts.load('current', {'packages':['bar']});
    // google.charts.setOnLoadCallback(drawBarChart);
    // function drawBarChart() {
    //     let arr = [];
    //     $.ajax({
    //         type: "get",
    //         url: "/clicks",
    //         dataType: "json",
    //         success: function (response) {
    //             // arr[0] = ['', '',''];
    //             console.log(response);
    //             // var data = google.visualization.arrayToDataTable([
    //             //   ['', '',''],
    //             //   ['2014', 1000,1020],
    //             //   ['2015', 1170 ,''],
    //             //   ['2016', 660,''],
    //             //   ['2017', 1030,'']
    //             // ]);
    //             // var options = {chart: {title: '',},'width':900,'height':400,bars: 'horizontal',vAxis: {textPosition: 'none', title: ''},legend: {position: 'none'},
    //             // };
    //             // var chart = new google.charts.Bar(document.getElementById('barchart_material'));
    //             // chart.draw(data, google.charts.Bar.convertOptions(options));
    //         }
    //     });
    // }
    /* 
     *  Show create category card
     */
    $('#BtnStats').on('click', function () {
        reset();
        $(this).addClass('fixed-left');
        $('#CardStats').removeClass('hiden');
    });
});