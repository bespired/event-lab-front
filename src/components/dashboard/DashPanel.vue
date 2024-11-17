<template>
    <div class="dashboard-panel" :class="data.theme">

        <div>
            <dash-label  :label="data.label" />
            <dash-link   :link ="data.link" />
        </div>
        <div>
            <dash-number :label="data.number" />
            <dash-bars   :bars ="data.bars" />
        </div>
        <dash-differ :amount="data.differ" :label="data.note" />

        <!-- {{ data }} -->
    </div>
</template>

<script setup>
    defineProps({
        data: Object,
    })
</script>
