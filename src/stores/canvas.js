export default {

	namespaced: true,

	state: {

		wires: [],

	},

	getters: {
		getWires: (state) => state.wires.join("\n"),
	},

	mutations: {
		setWires: (state, wires) => { state.wires = wires },
	},

	actions: {

	},

}
