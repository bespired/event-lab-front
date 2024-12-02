<template>
    <div class="scroll-content">
        <div>Tracking</div>
        <br/>
        <div class="index-space">
            <template v-for="link in links">
                <index-box :link="link.link" :icon="link.icon" :label="link.label" :description="link.description"/>
            </template>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            links: [
                { label: 'Tracker Lifecycle',     icon:'book', link: '/documentation/tracker/cycle',   description: 'For on website'  },
                { label: 'Tracker events',        icon:'book', link: '/documentation/tracker/events',  description: 'what to track'   },
                { label: 'Tracker tokens',        icon:'book', link: '/documentation/tracker/tokens',  description: 'token knows'     },
                { label: 'Tracker UTM',           icon:'book', link: '/documentation/tracker/utm',     description: 'url included'    },
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
