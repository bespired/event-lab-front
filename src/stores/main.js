import User    from "@/helpers/User.js"
import Profile from "@/helpers/Profile.js"
import Assets  from "@/helpers/Assets.js"

export default {

	namespaced: true,

	state: {

		isLoggedIn: false,  // is the user logged in based on localStorage.
		user: null,         // load user data from server.

		topPanel: 'LoginPanel',
		topVisible: false,

		rolecruds: null,    // load cruds based on users role.

		wsmessages: [],
		postmessage: null,

		profiles: [],
		assets: {},
		assetType: null,    // current asset type.
	},

	getters: {
		getWsMessages:  (state) => state.wsmessages,
		getPostMessage: (state) => state.postmessage,
		getUser:        (state) => state.user,

		getTopPanel:    (state) => state.topPanel,
		topVisible:     (state) => state.topVisible,

		getProfiles:    (state) => state.profiles,
		getAssets:      (state) => state.assets,
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

		setTopPanel:  (state, panel)  => { state.topPanel   = panel },
		topVisible:   (state, bool)   => { state.topVisible = bool },

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
		},

		loadProfiles(context) {
			Profile.loadProfiles(context.state)
		},

		loadAssets(context, assetType) {
			context.state.assetType = assetType.replace(/[s]$/gm, '');
			console.log('type -> ', context.state.assetType)
			// Assets.loadAssets(context.state)
		},

	},

}
