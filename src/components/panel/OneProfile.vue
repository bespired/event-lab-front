<template>
    <div>
        {{ profile }}
    </div>
</template>
<script>
export default {
    props: {
        handle: { type: String, default: null },
    },

    mounted() {
        this.$store.dispatch('main/loadProfile', this.handle)
    },

    computed: {
        profile() {
            return this.$store.getters['main/getOneProfile']
        },
    },

}
</script>
