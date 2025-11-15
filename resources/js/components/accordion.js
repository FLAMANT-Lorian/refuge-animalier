(function () {
    const accordion = {
        articles: document.querySelectorAll('.accordion_selector'),
        init() {
            this.initCorrectClassesWithJS();
            this.addEventListeners();
        },

        addEventListeners() {
            this.articles.forEach((article) => {
                article.addEventListener('click', (e) => {

                    this.removeWrongClasses();
                    this.addCorrectClasses(e);
                });
            })
        },

        removeWrongClasses() {
            const wrongElement = document.querySelector('.accordion_selector.open');
            wrongElement.classList.remove('open');
            wrongElement.classList.add('close');
        },
        addCorrectClasses(e) {
            e.currentTarget.classList.remove('close');
            e.currentTarget.classList.add('open');
        },

        initCorrectClassesWithJS() {
            this.articles.forEach((article) => {
               article.classList.remove('open');
            });

            document.querySelector('.accordion_selector:first-of-type').classList.add('open');
        }
    };
    accordion.init();
})();
