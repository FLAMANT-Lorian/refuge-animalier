import './bootstrap';
import './nojs.js';

/* Import components script */
import './components/slider.js';
import './components/accordion.js';
import './components/copy_to_clipboard.js';
import './components/select_children.js'
import './components/select_animals.js'
import './components/flash-message.js'
import Alpine from 'alpinejs';

if (document.body.classList.contains('login')) {

    window.Alpine = Alpine

    Alpine.start()
}
