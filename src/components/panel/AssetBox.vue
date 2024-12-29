<template>
    <div class="asset-box">
        {{ asset.label }}
    </div>
</template>
<script>
export default {
    props: {
        asset: { type: Object, default: null },
    },
}
</script>
