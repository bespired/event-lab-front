<template>
    <div class="content-wrapper assets">
        <div class="left-side">
            <div class="filter-header">
            </div>
            <menu-for-assets />
        </div>
        <div class="main-side">
            <div class="filter-header"></div>
            <div class="scroll-space">
                <div class="grid-view" :class="assetType">
                <template v-for="asset in assets" :key="asset.id">
                    <asset-box :asset="asset" />
                </template>
                </div>
            </div>
        </div>
    </div>
</template>

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