<template>
	<vue-socket />
	<menu-header :key="updater" />
	<top-bar-loader view="LoginPanel" :visible="visible" @completed="visible=false"/>
	<black-out   :key="updater" />
	<main-header @login="visible=true"/>
	<lazy-loader :key="updater" />
</template>

<script>
import JWT  from "@/helpers/JWT.js"
import User from "@/helpers/User.js"
export default {

	beforeMount() {
		this.checkUrl()
		this.checkLogin()
	},

	mounted() {
		// --
		let root = document.querySelector(':root')
		if (root.getAttribute('navigate-handler') === null) {
			// prevent live reload from vue development
			root.setAttribute('navigate-handler', true);

			window.navigation.addEventListener("navigate", (event) => {
				this.updater++
			});
		}

		if (root.getAttribute('mouse-handler') === null) {
			// prevent live reload from vue development
			root.setAttribute('mouse-handler', true);

			window.addEventListener("mousedown", (event) => {
				window.pointer.down  = true;
				window.pointer.tick  = true;
				window.pointer.done  = false;
				window.pointer.downX = event.pageX;
				window.pointer.downY = event.pageY;
				window.pointer.moved = false;
				this.$store.commit('canvas/ptrMoved');
			});
			window.addEventListener("mouseup", (event) => {
				window.pointer.down = false;
				window.pointer.tick = false;
				window.pointer.done = true;
				window.pointer.upX  = event.pageX;
				window.pointer.upY  = event.pageY;
				this.$store.commit('canvas/ptrMoved');
			});
			window.addEventListener("mousemove", (event) => {
				let diffX = event.pageX - window.pointer.downX
				let diffY = event.pageY - window.pointer.downY

				window.pointer.moved = (Math.abs(diffX) > 4) || (Math.abs(diffY) > 4)
				window.pointer.tick  = false;
				window.pointer.done  = false;

				window.pointer.pageX = event.pageX
				window.pointer.pageY = event.pageY
				window.pointer.distX = diffX
				window.pointer.distY = diffY
				this.$store.commit('canvas/ptrMoved')
			});
		}

	},

    data() {
    	window.pointer = {
    		down: false, moved: false,
    		tick: false, done: false,
    		pageX:0, pageY:0, downX:0, downY:0,
    		distX:0, distY:0, upX:0, upY:0,
    	}
        return {
            visible: false,
            updater: 0,
        }
    },

    methods: {

    	checkUrl() {
    		if (import.meta.env.MODE === 'development') return

    		// when on production the url should start with
    		// https://domain/--/admin/
    		let chunks = document.location.pathname.split('/')
    		if (chunks.length > 3) return;

    		let parts = document.location.href.split('/')
    		document.location = `${parts[0]}//${parts[2]}/--/admin/`
    	},

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
