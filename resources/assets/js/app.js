
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./foundation');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

//top mobile menu clicks
$('.custom-mobile-menu button.menu-icon').click(function(){$('.mobile-menu-content').toggleClass('active')});
// three small articles hover effects
$('.mid-section-2 .cell').hover(
    function() {
        $(this).find('.arrow-down-image-holder').animate({top: "+=15"}, "300");
        $(this).find('.colored-sub-header').animate({'font-size': "+=3"}, "300");
    },
    function() {
        $(this).find('.arrow-down-image-holder').animate({top: "-=15"}, "300");
        $(this).find('.colored-sub-header').animate({'font-size': "-=3"}, "300");
    }
);