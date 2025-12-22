(function () {
    const animalSelect = {
        select: document.querySelector('.animals_select'),
        inputNumber: document.querySelector('.animals_number'),

        init() {
            this.inputNumber.disabled = true;
            this.select.addEventListener('change', e => {
                this.handleSelect();
            });
        },

        handleSelect() {
            if (this.select.value === 'yes') {
                this.inputNumber.disabled = false;
            } else if (this.select.value === 'no') {
                this.inputNumber.disabled = true;
            }
        }
    };
    if (document.querySelector('main').classList.contains('volunteer-create') ||
        document.querySelector('main').classList.contains('volunteer-show')
    ) {
        animalSelect.init();
    }
})();
