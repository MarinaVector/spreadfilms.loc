import Vue from 'vue';
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        count: 0,
        paragraphs: [],
        something: 123,
    },
    getters: {

    },
    mutations: {
        updateParagraphs (state, paragraphs) {
            state.paragraphs = paragraphs;
        },
    },
    actions : {

    },
});
