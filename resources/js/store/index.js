import axios from "axios";

export default {
    state: {
        pages: [],
        page: null,
    },
    mutations: {
        ['SET_PAGES'] (state, pages) {
            state.pages = pages;
        },
        ['CLEAR_PAGES'] (state) {
            state.pages = [];
        },
        ['SET_PAGE'] (state, page) {
            state.page = page;
        },
        ['CLEAR_PAGE'] (state) {
            state.page = null;
        }
    },
    actions: {
        async fetchPages({ commit }, payload) {
            try {
                commit('CLEAR_PAGES');

                const response = await axios.get('/api/v1/pages', {
                    params: payload
                });

                commit('SET_PAGES', response.data.data);
            } catch (e) {
                console.log(e);
            }
        },
        async fetchPage({ commit }, slug) {
            try {
                commit('CLEAR_PAGE');

                const response = await axios.get(`/api/v1/pages/${slug}`);

                commit('SET_PAGE', response.data.data);
            } catch (e) {
                console.log(e);
            }
        },
        async addView({}, slug) {
            try {
                await axios.post(`/api/v1/pages/${slug}/add-view`);
            } catch (e) {
                console.log(e);
            }
        },
    },
    getters: {
        pages: state => state.pages,
        page: state => state.page
    }
}
