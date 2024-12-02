<template>
    <div class="content-wrapper">
        <div class="menu-sub-header">
        </div>
        <div class="left-side">
            <template v-for="profile in profiles">
                <profile-box :profile="profile" />
            </template>
        </div>
        <div class="right-side">

        </div>
    </div>
</template>
<style>
</style>
<script>
export default {

    mounted() {
        this.$store.dispatch('main/loadProfiles')
    },

    computed: {
        profiles() {
            return this.$store.getters['main/getProfiles']
        }
    }

}
</script>