export default {

	namespaced: true,

	state: {

		wires: [],
		boxes: [],
		pointermoved: 0,

	},

	getters: {
		ptrMoved: (state) => state.pointermoved,
		getWires: (state) => state.wires.join("\n"),
		getBoxes: (state) => state.boxes,
	},

	mutations: {
		ptrMoved: (state, boxes) => { state.pointermoved++ },
		setWires: (state, wires) => { state.wires = wires  },
		setBoxes: (state, boxes) => { state.boxes = boxes  },
	},

	actions: {

	},

}
