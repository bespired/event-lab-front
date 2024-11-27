import User from "@/helpers/User.js"

export default {

	namespaced: true,

	state: {

		isLoggedIn: false,  // is the user logged in based on localStorage
		user: null,         // load user data from server

		rolecruds: null,    // load cruds based on users role

		wsmessages: [],
		postmessage: null,

	},

	getters: {
		getWsMessages:  (state) => state.wsmessages,
		getPostMessage: (state) => state.postmessage,
		getUser:        (state) => state.user,
	},

	mutations: {
		setLoggedIn:  (state)  => {
			state.isLoggedIn = true
		},
		setLoggedOut: (state)  => {
			state.isLoggedIn = false;
			localStorage.removeItem('token')
		},
		setUser: (state, user) => { state.user = user },

		setWsMessage: (state, message) => {
			switch(message.cmd) {
				case 'msg': if (message.val) state.wsmessages.push(message)
				case 'cmd':
					if (message.val === 'login' ) state.wsmessages.push(message)
					if (message.val === 'logout') state.wsmessages.push(message)
					break;
			}
		},
		postWsMessage: (state, message) => { state.postmessage = message },
	},

	actions: {
		loadUser(context) {
			User.loadUser(context.state)
		}
	},

}
