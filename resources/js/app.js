import './bootstrap';
import './nojs.js';

/* Import components script */
import './components/slider.js';
import './components/accordion.js';
import './components/copy_to_clipboard.js';
import Alpine from 'alpinejs'
// import './components/input-file-multiple.js';

if (document.body.classList.contains('login')) {

    window.Alpine = Alpine

    Alpine.start()
}
