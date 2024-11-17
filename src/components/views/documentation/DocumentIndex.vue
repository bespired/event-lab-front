<template>
    <div class="scroll-content">
        <div>Technical Documentation</div>
        <template v-for="link in links">
            <a class="link" :href="link.link">{{ link.label}} </a><br />
        </template>
    </div>
</template>

<script>
export default {
    data() {
        return {
            links: [
                { label: 'Calculation Lifecycle', link: '/documentation/lifecycle'},
                { label: 'Dashboard Prototype', link: '/documentation/dashboard'}
            ]
        }
    },
}
</script>


<style>

</style>
