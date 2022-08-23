<template>
    <div class="page" v-if="page">
        <h1>{{ page.title}} </h1>
        <div class="s-content" v-html="page.content"></div>
        <div class="page-btn">
            <router-link :to="{ name: 'list' }" class="page-btn__home">Back to list</router-link>
        </div>
    </div>
    <Loader v-else></Loader>
</template>
<script>
import { mapActions, mapGetters } from 'vuex';

export default {
    computed: {
        ...mapGetters(['page']),
    },
    methods: {
        ...mapActions(['fetchPage', 'addView']),
    },
    async mounted() {
        const slug = this.$route.params.slug;

        await this.fetchPage(slug);

        await this.addView(slug);
    }
}
</script>
