<template>
    <div class="main-header">
        <span><logo-svg /></span>
        <span>EVENT LAB</span>

        <span class="space" />
        <template v-if="isLoggedIn" >
            <click-button label="Settings" type="icon"    icon="cog"      @click=""/>
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

    function logout() {
        store.state.main.isLoggedIn = false
        localStorage.removeItem('token')
        // tell profile/redis ?
    }
</script>

<style>
    .main-header {
        display: flex;
        user-select: none;
        position: fixed;
        top:0; left:0; right:0; height: 52px;
        padding: 0 12px 0 10px;
        background-color: white;
        z-index: 15;
        box-shadow: 0 0 8px #0000002e;
    }
    .main-header span {
        align-self: center;
        padding: 0 2px;
    }

    .main-header span svg{
        max-height: 50px;
    }

    .main-header span.space{
        margin-left: auto;
    }
</style>
