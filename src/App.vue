<template>
	<menu-header />
	<top-bar-loader view="LoginPanel" :visible="visible" @completed="visible=false"/>
	<black-out />
	<main-header @login="visible=true"/>
</template>

<script>
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
    		this.$store.commit('main/setLoggedIn')
    	}
    }
}
</script>
