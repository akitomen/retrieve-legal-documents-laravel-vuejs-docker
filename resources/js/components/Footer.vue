<template>
    <footer class="footer">
        <div class="default-container footer-container">
            <span class="copyright">
                © {{ currentYear }} Sonarworks Inc. All rights reserved.
            </span>
        </div>
    </footer>
</template>
<script>
export default {
    data() {
        return {
            currentYear: new Date().getFullYear(),
        };
    }
};
</script>
