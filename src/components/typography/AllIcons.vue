<template>
    <div class="icon-view">
    <template v-for="icon in icons">
        <div class="icon-panel">
            <prime-icon :name="icon.name" />
            {{ icon.label }}
        </div>
    </template>
    </div>
</template>

<script>

import Icons from "@/helpers/Icons.js"
export default {
    data() {
        return { icons: Icons }
    }
}

</script>

<style>
.icon-view {
    display: grid;
    grid-template-columns: repeat(auto-fill, 180px);
    justify-content: space-between;
    grid-gap: 20px;
    font-size: 14px;
}

.icon-panel {
    max-width: 180px;
    min-width: 180px;
}

    @media only screen and (max-width: 1440px) {
        .scroll-content {
            padding-left:  20px;
            padding-right: 20px;
        }
    }

</style>