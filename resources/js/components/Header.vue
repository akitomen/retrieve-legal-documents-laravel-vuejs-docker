<template>
    <header class="header">
        <div class="default-container header-container">
            <div class="header-container__home">
                <router-link :to="{ name: 'list' }">Sonarworks</router-link>
            </div>
            <div class="header-container__menu">
                <router-link :to="{ name: 'statistics' }" exact-active-class="active">Statistics</router-link>
            </div>
            <div class="header-container__logo">
                <router-link :to="{ name: 'list' }" class="logo">
                    <img src="/img/logo.svg" alt="">
                </router-link>
            </div>
        </div>
    </header>
</template>
