$(function () {
    $('#validationerr div:first-child').hide();
    /**
     * Uncoment to enable domiain restriction
     */
    // $('#registerform').on('submit', function (e) {
    //     if (!$('#email').val().endsWith('@ginebro.cat')){
    //         e.preventDefault();
    //         if($('#validationerr').length > 0){
    //             $('#validationerr ul').prepend('<li>El correu ha de ser @ginebro.cat</li>');
    //         }else{
    //             $('#mailvalidation').show().html('<ul class="mt-3 list-disc list-inside text-sm text-red-600"><li>El correu ha de ser @ginebro.cat</li></ul>');
    //         }
    //     }
    // });
});