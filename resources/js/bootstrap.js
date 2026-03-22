import axios from 'axios';
window.axios = axios;

import Alpine from 'alpinejs';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Alpine = Alpine;
Alpine.start();
