require('../bootstrap');

window.Vue = require('vue');

Vue.use(require('vue-moment'));

import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales';

Vue.use(VueInternationalization);

const lang = document.documentElement.lang.substr(0, 2);
// or however you determine your current app locale

const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});

import { ValidationProvider } from 'vee-validate';

import { extend } from 'vee-validate';
import { required, email, min, length, image } from 'vee-validate/dist/rules';

import { configure } from 'vee-validate';

configure({
  classes: {
    valid: 'is-success', // one class
    invalid: 'is-danger' // multiple classes
  }
});


// Add the required rule
extend('required', required);

// Add the email rule
extend('email', email);
extend('min', min);

extend('length', length);

// Add the image rule
extend('image', image);

extend('cedula', {
    validate: function(ced) {
    let [suma, mul, index] = [0, 1, ced.length];
        while (index--) {
        let num = ced[index] * mul;
        suma += num - (num > 9) * 9;
        mul = 1 << index % 2;
        }

        if ((suma % 10 === 0) && (suma > 0) && (ced.length == 10)) {
            return true
        } else {
            return false
        }
    }
});

// Register vee-validate globally
Vue.component('ValidationProvider', ValidationProvider);


/**
 * Automatically register Vue components
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const app = new Vue({
    el: '#app',
    i18n,
});

