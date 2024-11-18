<template>
    <div class="scroll-content">
        <div>View Prototypes</div>
        <br/>
        <div class="index-space">
            <template v-for="link in links">
                <index-box :href="link.link" :icon="link.icon" :label="link.label" :description="link.description"/>
            </template>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            links: [
                { label: 'Dashboard Prototype', icon:'book', link: '/documentation/views/dashboard'}
            ]
        }
    },
}
</script>

<style>
    .index-space {
        display: flex;
        gap:8px;
    }
</style>
