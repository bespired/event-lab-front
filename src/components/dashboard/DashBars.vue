<template>
    <span class="dashboard-bar">
        <template v-for="bar in bars">
            <span class="bar-dash" :style="normal(bar)" :title="bar" >&nbsp;</span>
        </template>
    </span>
</template>

<script setup>
    import { computed } from 'vue'

    const props = defineProps({
        bars: Array,
    })

    const max = computed(() => {
        return Math.max(...props.bars)
    })

    const normal = (val) => {
        return 'height:' + (100 * (val / max.value)) + '%';
    }

</script>

<style>
    .dashboard-bar {
        display: flex;
        flex-direction: row;
        align-items: self-end;
    }
    .bar-dash {
        width: 8px;
        border-radius: 2px;
        display: inline-flex;
        margin-right: 2px;
    }

    .dashboard-panel.blue .bar-dash {
        background-color: #a7c8f2;
    }
    .dashboard-panel.blue .bar-dash:last-of-type{
        background-color: #397be8;
    }

    .dashboard-panel.violet .bar-dash {
        background-color: #fbcfe8;
    }
    .dashboard-panel.violet .bar-dash:last-of-type{
        background-color: #ec4899;
    }

</style>
