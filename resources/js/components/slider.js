(function () {
    const slider = {
        sliderButtons: document.querySelectorAll('.slider_btn_selector'),

        init() {
            this.addEventListeners();
        },

        addEventListeners() {
            this.sliderButtons.forEach((sliderButton) => {
                sliderButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.changeCurrentClass(e);
                    this.scrollToElement(e);
                });
            });
        },

        changeCurrentClass(e) {
            const currentSliderButton = document.querySelector('.slider_btn_selector.active');
            currentSliderButton.classList.remove('active');
            e.currentTarget.classList.add('active');
        },

        scrollToElement(e) {
            const targetElement = document.getElementById(e.currentTarget.dataset.target);
            targetElement.scrollIntoView({
                behavior: "smooth",
                block: "nearest",
                inline: "center"
            });
        }
    };
    if (document.querySelector('main').classList.contains('homepage')) {
        slider.init();
    }
})();
