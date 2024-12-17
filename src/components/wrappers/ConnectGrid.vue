<template>
    <div class="connect-grid">
        <svg id="connect" v-html="wires" />
        <slot />
        <div class="debug-info" :data-update="update">
            <div>{{ pointer.down  }}: {{ pointer.moved }}</div>
            <div>{{ pointer.tick  }}: {{ pointer.done  }}</div>
            <div>{{ pointer.pageX }}, {{ pointer.pageY }}</div>
            <div>{{ pointer.distX }}, {{ pointer.distY }}</div>
        </div>
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

                // maybe only on hover?
                if ((this.pointer.down) && (this.pointer.moved)) {
                    this.$store.dispatch('canvas/moveBoxes')
                }
                // maybe only on hover?
                if ((this.pointer.done) && (!this.pointer.moved)) {
                    this.$store.dispatch('canvas/selectBoxes')
                }

                // maybe only on not hover select some bounding-box mode?
                // if ((this.pointer.done) && (!this.pointer.moved)) {
                //     this.$store.dispatch('canvas/selectBoxes')
                // }

            }
        }
    },

    computed:{
        pointer() { return window.pointer },
        wires()   { return this.$store.getters['canvas/getWires']  },
        boxmove() { return this.$store.getters['canvas/boxMove']   },
        update()  { return this.$store.getters['canvas/ptrMoved']  },
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

    .connect-grid .debug-info {
        font-family: monospace;
        position: absolute;
        top: 100px; right: 0;
        background-color: white;
        color: black;
        padding: 8px;
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
