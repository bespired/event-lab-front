export default {

	namespaced: true,

	state: {
		wires:    [],
		boxes:    [],
		origins:  {},
		widths:   {},
		selected: [],
		hoovered: null,
		canvas:   null,
		boxMove:  false,
		pointermoved: 0,
		wireRedraw:   0,
	},

	getters: {
		ptrMoved:   (state) => state.pointermoved,
		wireRedraw: (state) => state.wireRedraw,
		getWires:   (state) => state.wires.join("\n") + state.bounding,
		getBoxes:   (state) => state.boxes,
		boxMove:    (state) => state.boxMove,
		selected:   (state) => state.selected,
	},

	mutations: {
		ptrMoved:  (state, boxes ) => {
			state.pointermoved++
			if ((window.pointer.down) && (window.pointer.moved)) {
				state.wireRedraw++
			}
		},
		setWires:  (state, wires ) => { state.wires    = wires  },
		setBound:  (state, rectb ) => { state.bounding = rectb  },
		setBoxes:  (state, boxes ) => { state.boxes    = boxes  },
		boxMove:   (state, setter) => { state.boxMove  = setter },
		hoovered:  (state, setter) => { state.hoovered = setter },

		addSelected: (state, handle) => {
			let selected = state.selected
			if (selected.indexOf(handle) === -1) {
				selected.push(handle); state.selected = selected
			}
		},
		delSelected: (state, handle) => {
			let selected = state.selected
			let idx = selected.indexOf(handle)
			if (idx > -1) { selected.splice(idx, 1); state.selected = selected }
		},

		clrOrigins: (state) => { state.origins = {} },
	},

	actions: {
		setOrigins(context) {
			context.state.canvas = document.getElementById('connect')
			context.state.origins = {}
			context.state.widths  = {}
			context.state.boxes.forEach( box => {
				let boxsize = document.getElementById(box.handle).getBoundingClientRect()
				context.state.origins[box.handle] = {x: box.x, y: box.y}
				context.state.widths[box.handle]  = {w: boxsize.width, h: boxsize.height }
			})
		},
		moveBoxes(context) {
			let org = context.state.origins
			let wid = context.state.widths
			let sel = context.state.selected
			let hov = context.state.hoovered
			let can = context.state.canvas.getBoundingClientRect()

			context.state.boxes.forEach( box => {
				let select = sel.indexOf(box.handle) !== -1
				if ((select) || (hov && box.handle === hov.handle)){
					box.x = Math.max(0, org[box.handle].x + window.pointer.distX)
					box.y = Math.max(0, org[box.handle].y + window.pointer.distY)
					box.x = Math.min(box.x, can.width - wid[box.handle].w)
				}
			})
		},
		selectBoxes(context) {
			let org = context.state.origins
			let sel = context.state.selected
			let ptx = window.pointer.downX
			let pty = window.pointer.downY

			context.state.boxes.forEach( box => {
				let boxsize = document.getElementById(box.handle).getBoundingClientRect()
				if ((ptx > boxsize.x) && (ptx < boxsize.x + boxsize.width)) {
					if ((pty > boxsize.y) && (pty < boxsize.y + boxsize.height)) {
						if (sel.indexOf(box.handle) === -1) {
							context.commit('addSelected', box.handle)
						} else {
							context.commit('delSelected', box.handle)
						}
					}
				}
			})
		}
	},

}
