
export default {

	namespaced: true,

	state: {

		isLoggedIn: false,  // is the user logged in based on localStorage
		user: null,         // load user data from server

		rolecruds: null,    // load cruds based on users role

	},

	mutations: {
		setLoggedIn:  (state)  => { state.isLoggedIn = true  },
		setLoggedOut: (state)  => { state.isLoggedIn = false; localStorage.removeItem('token') },
		setUser: (state, user) => { state.user = user },
	},

	actions: {

	},

}
