<template>
    <div class="scroll-content">
        <div>Technical Documentation</div>
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
                { label: 'Calculation Lifecycle', icon:'book', link: '/documentation/lifecycle',      description: 'Rather technical' },
                { label: 'Tracker Lifecycle',     icon:'book', link: '/documentation/tracker',        description: 'For on website'   },
                { label: 'Tracker tokens',        icon:'book', link: '/documentation/tokens',         description: 'token knows'      },
                { label: 'Mailer pixel',          icon:'book', link: '/documentation/mail/pixel',     description: 'For mail open'    },
                { label: 'Mail clicked',          icon:'book', link: '/documentation/mail/clicked',   description: 'For mail clicked' },
                { label: 'Views Index',           icon:'align-justify', link: '/documentation/views', description: 'Visual stuff'     }
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

