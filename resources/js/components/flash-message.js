(function () {
    const flashMessage = {
        flashMessageElt: document.querySelector('.flash-message'),

        init() {
            this.flashMessageElt.addEventListener('animationend', e => {
                e.currentTarget.remove();
            });
        }
    }
    if (flashMessage.flashMessageElt) {
        flashMessage.init();
    }
})();
