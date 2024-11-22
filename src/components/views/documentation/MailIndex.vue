<template>
    <div class="scroll-content">
        <div>Mail</div>
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
                { label: 'Mailer pixel', icon:'book', link: '/documentation/mail/pixel',       description: 'For mail open'    },
                { label: 'Mail clicked', icon:'book', link: '/documentation/mail/clicked',     description: 'For mail clicked' },
            ]
        }
    },
}
</script>

<style>
    .index-space {
        display: flex;
        gap:8px;
        flex-wrap: wrap;
    }
</style>
