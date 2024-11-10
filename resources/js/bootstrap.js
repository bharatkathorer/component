import axios from 'axios';
window.axios = axios;
import _ from 'lodash';

window._ = _;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
