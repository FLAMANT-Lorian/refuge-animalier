import './bootstrap';
import './nojs.js';

/* Import components script */
import './components/slider.js';
import './components/accordion.js';
import './components/copy_to_clipboard.js';
// import './components/input-file-multiple.js';

import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()
