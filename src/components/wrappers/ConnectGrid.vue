<template>
    <div class="connect-grid">
        <svg id="connect" v-html="wires" />
        <slot />
        <debug-info />
    </div>
</template>

<script>

import Wires from '@/helpers/Wires.js'

export default {

    watch: {
        update(i, o) {

            // move boxes modes ...
            if (this.boxmove) {
                if  (this.pointer.tick) this.$store.dispatch('canvas/setOrigins')
                if  (this.pointer.done) this.$store.commit('canvas/clrOrigins')

                if ((this.pointer.down) && (this.pointer.moved)) {

                    let grabModus = this.grabModus

                    if (!grabModus) {
                        grabModus = (this.hoovered) ? 'moveBoxes' : 'selectBound'
                        this.$store.commit('canvas/grabModus', grabModus)
                    }

                    if ('moveBoxes' === this.grabModus) {
                        this.$store.dispatch('canvas/moveBoxes')
                    }

                }
                // maybe only on not hover select some bounding-box mode?
                if ((this.pointer.done) && (!this.pointer.moved)) {
                    if (this.hoovered) {
                        this.$store.dispatch('canvas/selectBoxes')
                    } else {
                        this.$store.commit('canvas/clrBoxSelect')
                    }
                }

                // reset the grabModus, if it was selectBound, select boxes
                if ((this.pointer.done) && (this.grabModus)) {
                    if ('selectBound' === this.grabModus) {
                        this.$store.dispatch('canvas/selectBoundBoxes')
                    }
                    this.$store.commit('canvas/grabModus', null)
                }

            }
        }
    },

    computed:{
        pointer()   { return window.pointer },
        wires()     { return this.$store.getters['canvas/getWires']  },
        boxmove()   { return this.$store.getters['canvas/boxMove']   },
        update()    { return this.$store.getters['canvas/ptrMoved']  },
        grabModus() { return this.$store.getters['canvas/grabModus'] },
        hoovered()  { return this.$store.getters['canvas/hoovered']  },
    },
}
</script>

<style>
    /* GRID */

    .connect-grid {
        display: flex;
        width: 100%;
        min-height: calc(100vh - 120px);
/*        background-color: #ffe;*/
        font-size: 14px;
    }

    .connect-grid svg {
        width: 100%;
        min-height: calc(100vh - 120px);
    }
    .connect-grid svg .line {
        stroke: #777;
        stroke-width: 1;
        fill: transparent;
    }
    .connect-grid svg .bounding {
        stroke: blue;
        stroke-width: 1;
        fill: transparent;
    }

    /* BOXES */

    .connect-box {
        position: absolute;
        padding: 2px 8px;
        background-color: white;
        border: 1px solid var(--color-border);
        border-radius: 4px;
        min-width: 64px;
        min-height: 32px;
        user-select: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .connect-box:hover {
        border: 1px solid var(--color-hover);
        cursor: grab;
    }
</style>
