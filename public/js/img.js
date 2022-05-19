let images = document.getElementsByClassName("imgInp");
for (element of images) {
    element.onchange = evt => {
        const [files] = evt.target.files;
        if (files) {
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



