<template>
    <div class="dashboard-grid" >
        <slot />
    </div>
</template>

<script setup>

</script>

<style>
    .dashboard-grid {
        display: flex;
        gap: 10px;
    }
    .dashboard-panel {
        background-color: white;
        border: 1px solid #ededed;
        border-radius: 8px;
        width: 20%;
        padding: 12px 16px;
        overflow: hidden;
    }

    .dashboard-panel > div {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: space-between;
    }

    .dashboard-panel .dashboard-differ {
        justify-content: flex-start;
    }
</style>