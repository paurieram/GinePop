let images = document.getElementsByClassName("imgInp");
let imgcount = 0;
for (element of images) {
    element.onchange = evt => {
        var $fileUpload = $("input[type='file']");
        if (parseInt($fileUpload.get(0).files.length)>8){
            alert("Nomes pots pujar fins a 8 fitxers");
            return;
        }
        const [files] = evt.target.files;
        if (files) {
            imgcount++;
            let img = document.createElement('img');
            img.src = URL.createObjectURL(files);
            img.classList.add('w-50','h-50', 'd-inline-block', 'p-1');
            img.style.borderRadius = '10px';
            blah.appendChild(img);
            evt.target.style.visibility = 'hidden';
            evt.target.style.position = 'absolute';
            let nextSibling = evt.target.nextElementSibling;
            nextSibling.removeAttribute("style");
        }
    }
}
$(function () {
    $('#newitem').on('submit', function (e) {
        if($('#id_category option:selected').val() == '-'){
            e.preventDefault();
            $('#errorc').show().delay(2000).fadeOut(500);
        }
        if(imgcount == 0){
            e.preventDefault();
            $('#errori').show().delay(2000).fadeOut(500);
        }
    });
});