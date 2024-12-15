<template>
    <span style="display: none;" ref="this_slot" :key="rand">
        <slot />
    </span>
    <div class="console">
        <window-head />
        <div class="content" v-html="html" />
    </div>

</template>
<script>
export default {

    props: {
        label: { type: String, default: null },
        step: { type: String, default: null },
    },

    mounted() {
        let html = this.$refs.this_slot.textContent

        html = html.replaceAll(' --', '<br \>')
        html = html.replaceAll('{/}', '</span>')
        html = html.replaceAll('{g}', '<span class="c-green">')
        html = html.replaceAll('{t}', '<span class="c-turqu">')
        html = html.replaceAll('{z}', '<span class="c-black">')

        this.html = html
    },
    data() {
        return {
            rand: `key-${Math.random()}`,
            html: null
        }
    }
}
</script>
<style>

.console{
    margin: 12px;
    box-shadow: 0 0 0 8px;
    max-width: 880px;
    font-size: 11px;
    border-radius: 12px;
    box-shadow: 0 0 8px 0px rgba(0, 0, 0, 0.3);
}
.console .content{
    font-family: monospace;
    font-weight: 400;
    font-size: 11px;
    line-height: 15px;
    color: #AAA;
    padding: 8px 8px 16px;
    background-color: white;
    border: 1px solid #ededed;
    border-radius: 0 0 12px 12px;
    max-width: 80em;
}

.console .c-green { color: green; }
.console .c-black { color: black; }
.console .c-turqu { color: #3DBDC9; }



</style>
