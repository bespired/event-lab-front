<template>
    <div class="asset-box">
        <div class="thumb" :class="asset.mimetype" >
            <img loading="lazy" class="img" :src="url" />
        </div>
        <div class="info">
            <div class="lbl">{{ asset.label }}</div>
            <div class="url">{{ asset.url }}</div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        asset: { type: Object, default: null },
    },

    computed: {
        url() {
            let host  = location.hostname
            let proto = location.protocol
            let where = this.asset.cmne === 'ASFF' ? this.asset.url.replace('woff', 'png') : this.asset.url
            return `${proto}//${host}${where}`
        }
    }
}
</script>
