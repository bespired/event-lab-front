<template>
    <div class="connect-wires" />
</template>
<script>

import Wires from '@/helpers/Wires.js'

export default {
    props: {
        nodes: { type: Object, default: null },
    },

    mounted() {
        this.drawWiresInCanvas()
    },

    methods: {
        drawWiresInCanvas() {
            // the canvas is a svg...
            let canvas = document.getElementById('connect')
            if (canvas === null) return;

            let base = canvas.getBoundingClientRect()
            let wires= []
            let draws= []
            let boxes= {}
            this.nodes.forEach((node)=>{
                if (node.hasOwnProperty('out')) {
                    wires.push({from: node.handle, dest: node.out})
                }
                boxes[node.handle] = document.getElementById(node.handle).getBoundingClientRect()
                boxes[node.handle].rx = boxes[node.handle].x - base.x
                boxes[node.handle].ry = boxes[node.handle].y - base.y
            })

            let p
            wires.forEach((wire, idx)=>{
                p = Wires.inout(boxes, wire.from, wire.dest)
                draws.push(`<line x1="${p.sx}" y1="${p.sy}" x2="${p.ex}" y2="${p.ey}" id="line-${idx}" class="line" />`)
            })

            this.$store.commit('canvas/setWires', draws)

            return 'okay'
        }
    }
}
</script>
