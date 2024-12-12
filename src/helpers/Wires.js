const Wires = {

    inout(boxes, from, dest) {
        let scx = boxes[from].rx + (boxes[from].width  / 2)
        let scy = boxes[from].ry + (boxes[from].height / 2)
        let ecx = boxes[dest].rx + (boxes[dest].width  / 2)
        let ecy = boxes[dest].ry + (boxes[dest].height / 2)

        let dsx = ecx - scx
        let dsy = ecy - scy

        let rl = dsx > 0 ? 'R' : 'L'
        let tb = dsy > 0 ? 'B' : 'T'

        let rltb = (Math.abs(dsx) > Math.abs(dsy)) ? rl : tb
        let r, l, t, b

        switch (rltb){
            case 'R':
                r = boxes[from].rx + boxes[from].width
                l = boxes[dest].rx
                return { sx: r, sy: scy, ex: l, ey: ecy }
            case 'L':
                r = boxes[dest].rx + boxes[dest].width
                l = boxes[from].rx
                return { sx: l, sy: scy, ex: r, ey: ecy }
            case 'T':
                t = boxes[from].ry
                b = boxes[dest].ry + boxes[from].height
                return { sx: scx, sy: t, ex: ecx, ey: b }
            case 'B':
                t = boxes[dest].ry
                b = boxes[from].ry + boxes[from].height
                return { sx: scx, sy: b, ex: ecx, ey: t }
        }

    }

}

export default Wires;
