<template>
    <div class="main-header" >
        <span><logo-svg /></span>
        <span>EVENT LAB</span>

        <span class="role" v-if="user">
            <prime-icon name="asterisk" />{{ user.role }}
        </span>

        <span class="space" />
        <template v-if="isLoggedIn" >
            <link-button label="Settings" type="header" icon="cog" />
            <link-button label="Documentation" type="header" icon="book"  url="/documentation" />

            <span class="user" v-if="user">
                <prime-icon name="user" />{{ user.name }}
            </span>

            <click-button label="Logout"   type="primary" icon="sign-out" @click="logout()"/>
        </template>
        <template v-if="!isLoggedIn" >
            <click-button  label="Login" type="primary" icon="sign-in" @click="$emit('login')"/>
        </template>
    </div>

</template>

<script setup>
    import { computed } from 'vue'
    import { useStore } from 'vuex'

    const store = useStore()

    const isLoggedIn = computed(() => {
        return store.state.main.isLoggedIn
    })

    const user = computed(() => {
        return store.state.main.user
    })

    function logout() {
        store.state.main.postmessage = '--logout'
        store.state.main.isLoggedIn = false
        store.state.main.user = null
        localStorage.removeItem('token')
    }

</script>

<style>
    .main-header {
        display: flex;
        user-select: none;
        position: fixed;
        top:0; left:0; right:0; height: 40px;
        padding: 0 12px 0 10px;
        background-color: white;
        z-index: 15;
        box-shadow: 0 0 8px #0000002e;
        align-items: center;
    }
    .main-header .role .pi,
    .main-header .user .pi {
        font-size: .8em;
        opacity: 0.4;
        margin: 0 4px 0 8px;
        font-weight: 100;
    }
    .main-header .role,
    .main-header .user{
        font-weight: 100;
    }

    .main-header span {
        align-self: center;
        padding: 0 2px;
    }

    .main-header span svg{
        max-height: 46px;
    }

    .main-header span.space{
        margin-left: auto;
    }
    .main-header span.space ~ span{
        margin-right: 8px;
    }

    .main-header .link-button {
        font-size: 11px;
        color: grey;
    }
    .main-header.link-button ~ .link-button {
        margin-left: 8px;
    }
</style>
