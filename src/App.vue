<template>
	<vue-socket />
	<menu-header :key="updater" />
	<top-bar-loader view="LoginPanel" :visible="visible" @completed="visible=false"/>
	<black-out />
	<main-header @login="visible=true"/>
	<lazy-loader url="location" :key="updater" />
</template>

<script>
import JWT  from "@/helpers/JWT.js"
import User from "@/helpers/User.js"
export default {

	beforeMount() {
		this.checkLogin()
	},

	mounted() {
		// --
		let root = document.querySelector(':root')
		if (root.getAttribute('navigate-handler') === null) {
			window.navigation.addEventListener("navigate", (event) => {
				root.setAttribute('navigate-handler', true);
				this.updater++
			})
		}
	},

    data() {
        return {
            visible: false,
            updater: 0,
        }
    },

    methods: {
    	checkLogin() {
    		// based on JWT timeout ...
    		if (JWT.notExpired()) {
    			this.$store.commit('main/setLoggedIn')
    			this.$store.dispatch('main/loadUser')
    			// this.$store.commit('main/postWsMessage', '--login')
    		} else {
	   			this.$store.commit('main/setLoggedOut')
    			this.$store.commit('main/setUser', null)
    		}
    	}
    }
}
</script>
