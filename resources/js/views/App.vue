<template>
    <div id="main">
        <Header></Header>
        <main class="main">
            <div class="default-container main-container">
                <router-view></router-view>
            </div>
        </main>
        <Footer></Footer>
    </div>
</template>
<script>
import Header from '../components/Header';
import Footer from '../components/Footer';

export default {
    components: {
        Header,
        Footer,
    }
}
</script>
