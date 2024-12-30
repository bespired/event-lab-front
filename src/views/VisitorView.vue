<template>
    <div class="content-wrapper visitor">
        <div class="left-side">
            <template v-for="profile in profiles">
                <profile-box :profile="profile" />
            </template>
        </div>
        <div class="right-side">
            <one-profile :handle="handle" v-if="handle" />
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
        },

        handle() {
            let current = document.location.pathname.split('/').at(-1)
            if (current === 'visitors' ) return null

            return current
        }
    }

}
</script>