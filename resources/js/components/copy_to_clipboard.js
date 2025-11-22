(function () {
    const copyToClipboard = {
        shareButtonElement: document.querySelector('.share_button'),
        shareMessageElement: document.querySelector('.share_message'),
        currentUrl: document.URL,
        timerId: null,
        maxTime: 3,

        init() {
            this.remainingTime = this.maxTime;

            this.addEventListeners();
        },

        addEventListeners() {
            this.shareButtonElement.addEventListener('click', async evt => {
                evt.preventDefault();

                await navigator.clipboard.writeText(this.currentUrl).then(() => {
                    this.showMessage();
                });
            });
        },

        showMessage() {
            this.startTimer();
            console.log('Copier !');
            this.shareMessageElement.classList.remove('opacity-0');
            this.shareMessageElement.classList.add('opacity-100');
        },

        startTimer() {
            this.timerId = setInterval(() => {
                this.updateTimer();
            }, 1000);
        },

        updateTimer() {
            this.remainingTime--;
            if (this.remainingTime === 0) {
                clearInterval(this.timerId);
                this.shareMessageElement.classList.remove('opacity-100');
            this.shareMessageElement.classList.add('opacity-0');
                this.remainingTime = this.maxTime;
            }
        }


    };

    if (document.querySelector('main').classList.contains('animal_detail')) {
        copyToClipboard.init();
    }
})();
