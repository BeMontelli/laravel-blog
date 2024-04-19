import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function(){

    const imageareas = document.querySelectorAll('.image-area');
    if(imageareas) {
        imageareas.forEach(imagearea => {
            const img = imagearea.querySelector('img');
            const indic = imagearea.querySelector('.indic span');
            const input = imagearea.querySelector('input');
            if(input && indic && img) {
                input.addEventListener('change', (e) => {
                    const [file] = input.files;
                    if (file) {
                        img.src = URL.createObjectURL(file)
                        indic.textContent = file.name;
                    }
                })
            }
        });
    }

});
