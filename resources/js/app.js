/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import WordsComponent from './components/WordsComponent.vue';
import PreviousSearchComponent from './components/PrevousSearche.vue';



let vm = new Vue({
    el: '#app',
    components: {
        'words-component': WordsComponent,
        'previous-search-component': PreviousSearchComponent
    }
});

