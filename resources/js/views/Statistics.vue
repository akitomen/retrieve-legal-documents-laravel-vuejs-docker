<template>
    <ul class="main-list" v-if="pages.length">
        <li class="main-list__item main-list__item_small" v-for="(page, key) in pages">
            <router-link :to="{ name: 'page', 'params': { 'slug': page.slug } }" class="main-list__link">
                {{ key+1 }}. {{ page.title }} <b>({{ __('interface.numberOfViews') }}: {{ page.views }}) </b>
            </router-link>
        </li>
    </ul>
    <Loader v-else></Loader>
</template>
<script>
import { mapActions, mapGetters } from 'vuex';

export default {
    computed: {
        ...mapGetters(['pages']),
    },
    methods: {
        ...mapActions(['fetchPages']),
    },
    async mounted() {
        await this.fetchPages({
            sort: 'views'
        });
    }
}
</script>

