$(function () {
    $.hid = function() {
        $(".register").hide();
        $(".login").hide();
        $(".forget").hide();
    }   
    $(".loginClk").on('click', function () { 
        $.hid();
        $(".login").show();
    });
    $(".registerClk").click(function () { 
        $.hid();
        $(".register").show();
    });
    $(".forgetClk").click(function () { 
        $.hid();
        $(".forget").show();
    });
});