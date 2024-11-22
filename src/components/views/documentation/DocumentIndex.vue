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
                { label: 'Calculation Lifecycle', icon:'book', link: '/documentation/lifecycle',        description: 'Rather technical' },

                { label: 'Mail Index',    icon:'align-justify', link: '/documentation/mail',    description: 'Mail stuff'     },
                { label: 'Tracker Index', icon:'align-justify', link: '/documentation/tracker', description: 'Tracker stuff'  },
                { label: 'Views Index',   icon:'align-justify', link: '/documentation/views',   description: 'Visual stuff'   },
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

