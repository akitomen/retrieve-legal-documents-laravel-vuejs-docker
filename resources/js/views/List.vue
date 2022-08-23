<template>
    <ul class="main-list" v-if="pages.length">
        <li class="main-list__item" v-for="page in pages">
            <router-link :to="{ name: 'page', 'params': { 'slug': page.slug } }" class="main-list__link">
                {{ page.title }}
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
        await this.fetchPages();
    }
}
</script>
