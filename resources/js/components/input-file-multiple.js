const inputFileMultiple = document.querySelector('input[type="file"][multiple]');
const imagesContainer = document.getElementById('image_container');

let filesToSend = [];

displayImageMultiple();

deleteImage();

function deleteImage() {
    imagesContainer.addEventListener('click', e => {
        const cross = e.target.closest('.cross');

        const id = cross.getAttribute('data-id');

        filesToSend = filesToSend.filter(file => file.id !== id);

        imagesContainer.querySelector(`.upload_img[data-id="${id}"]`).remove();
    });
}

function displayImageMultiple() {

    inputFileMultiple.addEventListener('change', e => {

        [...e.currentTarget.files].forEach(file => {
            /* METTRE DANS LE TABLEAU POUR PRÉPARER LA REQUÊTE */
            file.id = Math.random().toString(16).slice(2);
            filesToSend.push(file);

            /* NOM ET TAILLE DE L’IMAGE */
            const fileName = file.name;
            const fileSize = (file.size / (1024 * 1024)).toFixed(2);

            const reader = new FileReader();
            reader.onload = (evt) => {

                imagesContainer.insertAdjacentHTML("afterbegin", `
                <div data-id="${file.id}" class="upload_img flex flex-row justify-between items-center px-2 py-1 rounded-lg border border-gray-200">

                    <!-- IMAGE -->
                    <div class="flex flex-row items-center gap-4">
                        <img alt="image"
                             class="w-12 h-12 rounded-sm"
                             src="${evt.target.result}">
                        <div class="flex flex-col gap-1">
                            <span>${fileName}</span>
                            <span class="font-bold">${fileSize} Mo</span>
                        </div>
                    </div>

                    <!-- CROIX -->
                    <button id="cross" class="cross hover:cursor-pointer" data-id="${file.id}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.7071 11.9889L18.0159 17.2978L17.3088 18.0049L12 12.696L6.69117 18.0049L5.98407 17.2978L11.2929 11.9889L5.99512 6.69116L6.70222 5.98406L12 11.2818L17.2978 5.98406L18.0049 6.69116L12.7071 11.9889Z" fill="currentColor"/>
                        </svg>
                    </button>

                </div>`)
            }
            reader.readAsDataURL(file);
        });
    });
}


