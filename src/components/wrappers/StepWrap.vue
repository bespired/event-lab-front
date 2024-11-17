<template>
    <span style="display: none;" ref="this_slot" :key="rand">
        <slot />
    </span>
    <div class="step">
        <div class="step-label">{{ label }}</div>
        <div v-html="html" />
    </div>
</template>
<script>
export default {

    props: {
        label: { type: String, default: null },
        step: { type: String, default: null },
    },

    mounted() {
        let text = this.$refs.this_slot.textContent
        let html = ''
        let trix = true
        let tick = true
        let qout = true

        const letter = text.split('');
        letter.forEach(l => {
            switch (l) {
                case '"':
                    html += qout ? '"<span class="db-quot">' : '</span>"'
                    qout = !qout
                    break;
                case '`':
                    html += tick ? '<span class="db-table">' : '</span>'
                    tick = !tick
                    break;
                case '*':
                    html += trix ? '<span class="db-column">' : '</span>'
                    trix = !trix
                    break;
                default:
                    html += l
            }
        })

        html = html.replaceAll('--', '<br \>')

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
.step {
    font-weight: 400;
    line-height: 1.8;
    padding: 0 20px;
    background-color: white;
    border: 1px solid #ededed;
    border-radius: 6px;
    margin-top: 10px;
    margin-bottom: 10px;
}

.step-label {
    background-color: white;
    transform: translateY(-15px);
    display: inline-block;
    padding: 0 10px;
    border-radius: 8px;
    border: 1px solid #ededed;
    font-size: 10px;
}
.step-label  ~ div {
    transform: translateY(-8px);
}

.step .db-column,
.step .db-table {
    font-family: monospace;
    background-color: #ededed;
    padding: 0px 4px;
    font-weight: 400;
    font-size: 0.8em;
    display: inline-block;
    line-height: 1.4;
    color: #000074;
    transform: translateY(-1px);
}

.step .db-column {
    font-style: italic;
    color: #007400;
}

.step .db-quot {
    font-family: monospace;
    font-size: 0.95em;
    color: #d10000;
}
</style>