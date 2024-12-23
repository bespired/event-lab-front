<template>
    <div class="content-wrapper assets">

        <div class="left-side">
            <menu-for-assets />
        </div>
        <div class="right-side">
            ...
        </div>
    </div>
</template>
<style>
</style>
<script>
export default {

    mounted() {
        // this.$store.dispatch('main/loadProfiles')
    },

    computed: {
        // profiles() {
        //     return this.$store.getters['main/getProfiles']
        // }
    }

}
</script>