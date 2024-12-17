const Wires = {

    inout(boxes, from, dest) {

        let idx = `line-${from}-${dest}`

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

        let xlap = boxes[from].rx < boxes[dest].rx + boxes[dest].width
        let ylap = boxes[from].ry < boxes[dest].ry + boxes[dest].height

        if (ylap && (rltb === 'T')) rltb = rl
        if (xlap && (rltb === 'L')) rltb = tb

        switch (rltb){
            case 'R':
                r = boxes[from].rx + boxes[from].width
                l = boxes[dest].rx
                return { idx, sx: r, sy: scy, ex: l, ey: ecy, rltb}
            case 'L':
                r = boxes[dest].rx + boxes[dest].width
                l = boxes[from].rx
                return { idx, sx: l, sy: scy, ex: r, ey: ecy, rltb}
            case 'T':
                t = boxes[from].ry
                b = boxes[dest].ry + boxes[from].height
                return { idx, sx: scx, sy: t, ex: ecx, ey: b, rltb}
            case 'B':
                t = boxes[dest].ry
                b = boxes[from].ry + boxes[from].height
                return { idx, sx: scx, sy: b, ex: ecx, ey: t, rltb}
        }

    },

    wire(points) {

        let dsx = Math.abs(points.ex - points.sx) / 2
        let dsy = Math.abs(points.ey - points.sy) / 2

        let xoffs = {L: -dsx, R: dsx, T: 0, B: 0}
        let yoffs = {L: 0, R: 0, T: -dsy, B: dsy}

        let hsx = points.sx + xoffs[points.rltb]
        let hsy = points.sy + yoffs[points.rltb]
        let hex = points.ex - xoffs[points.rltb]
        let hey = points.ey - yoffs[points.rltb]

        let m = `M ${points.sx} ${points.sy}`
        let c = `C ${hsx} ${hsy}, ${hex} ${hey}, ${points.ex} ${points.ey}`

        return `<path d='${m} ${c}' class='line'/>`

        // return `<line x1="${points.sx}" y1="${points.sy}" x2="${points.ex}" y2="${points.ey}" id="${points.idx}" class="line" />`
    },

    bounding(points, base) {

        if (!base) return

        let sx = points.sx - base.x
        let sy = points.sy - base.y
        let xw = (points.ex - points.sx)
        let yh = (points.ey - points.sy)

        if (xw < 0) { sx += xw; xw =- xw }
        if (yh < 0) { sy += yh; yh =- yh }

        return `<rect x="${sx}" y="${sy}" width="${xw}" height="${yh}" rx="5" class="bounding" />`

    }

    // draws.push("<path d='M 410 227 C 535 227, 535 147, 660 147' class='line' />")
    // draws.push(`<line x1="${p.sx}" y1="${p.sy}" x2="${p.ex}" y2="${p.ey}" id="line-${idx}" class="line" />`)

}

export default Wires;
