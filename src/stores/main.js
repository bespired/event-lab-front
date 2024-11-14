
export default {

	namespaced: true,

	state: {

		isLoggedIn: false,

	},

	mutations: {
		setLoggedIn:  (state) => { state.isLoggedIn = true  },
		setLoggedOut: (state) => { state.isLoggedIn = false },
	},

	actions: {

	},

}
