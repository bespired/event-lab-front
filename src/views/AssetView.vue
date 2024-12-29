<template>
    <div class="content-wrapper assets">

        <div class="left-side">
            <menu-for-assets />
        </div>
        <div class="right-side">
            <click-button type="primary" label="upload" @click="uploader()" />
            {{ this.assetType }}
            <template v-for="asset in assets" :key="asset.id">
                <asset-box :asset="asset" />
            </template>
        </div>
    </div>
</template>
<style>
</style>
<script>
export default {

    mounted() {
        this.$store.dispatch('main/loadAssets', this.assetType)
    },

    computed: {
        assets() {
            return this.$store.getters['main/getAssets']
        },

        assetType() {
            let path  = document.location.pathname.replace('/--/admin', '')
            let parts = path.split('/')
            let type  = parts.at(-1);
            return type
        },

    },

    methods: {
        uploader() {
            this.$store.commit('main/setTopPanel', 'UploadPanel')
            this.$store.commit('main/topVisible', true)
        }
    }

}
</script>