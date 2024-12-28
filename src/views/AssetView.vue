<template>
    <div class="content-wrapper assets">

        <div class="left-side">
            <menu-for-assets />
        </div>
        <div class="right-side">
            <click-button type="primary" label="upload" @click="uploader()" />
            <template v-for="asset in assets" :key="asset.id">
                <!-- <asset-box :asset="asset" /> -->
            </template>
        </div>
    </div>
</template>
<style>
</style>
<script>
export default {

    mounted() {
        const path  = document.location.pathname.replace('/--/admin', '')
        const parts = path.split('/')
        const type  = parts.at(-1);
        this.$store.dispatch('main/loadAssets', type)
    },

    computed: {
        assets() {
            return this.$store.getters['main/getAssets']
        }
    },

    methods: {
        uploader() {
            this.$store.commit('main/setTopPanel', 'UploadPanel')
            this.$store.commit('main/topVisible', true)
        }
    }

}
</script>