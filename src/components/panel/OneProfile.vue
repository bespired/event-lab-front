<template>
    <div>
        <div class="filter-header">
            <span class="top-right" @click="$emit('completed')">×</span>
        </div>

        {{ profile }}

    </div>

</template>
<script>
export default {
    props: {
        handle: { type: Object, default: null },
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
