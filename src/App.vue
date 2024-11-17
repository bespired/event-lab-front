<template>

	<menu-header />

	<top-bar-loader view="LoginPanel" :visible="visible" @completed="visible=false"/>

	<black-out />

	<main-header @login="visible=true"/>

	<lazy-loader url="location"/>

</template>

<script>
import JWT  from "@/helpers/JWT.js"
import User from "@/helpers/User.js"
export default {

	beforeMount() {
		this.checkLogin()
	},

    data() {
        return {
            visible: false
        }
    },

    methods: {
    	checkLogin() {
    		// based on JWT timeout ...
    		if (JWT.notExpired()) {
    			this.$store.commit('main/setLoggedIn')
    			this.$store.dispatch('main/loadUser')
    		} else {
    			this.$store.commit('main/setLoggedOut')
    			this.$store.commit('main/setUser', null)
    		}
    	}
    }
}
</script>
