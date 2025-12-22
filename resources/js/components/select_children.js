(function () {
    const childrenSelect = {
        select: document.querySelector('.children_select'), inputNumber: document.querySelector('.children_number'),

        init() {
            this.inputNumber.disabled = true;
            this.select.addEventListener('change', e => {
                this.handleSelect(e);
            });
        },

        handleSelect(event) {
            if (event.currentTarget.value === 'yes') {
                this.inputNumber.disabled = false;
            } else if (this.select.value === 'no') {
                this.inputNumber.disabled = true;
            }
        }
    };
    if (document.querySelector('main').classList.contains('adoption-requests-create') ||
        document.querySelector('main').classList.contains('adoption-requests-edit')
    ) {
        childrenSelect.init();
    }
})();
