<template>
    <div class="login-panel">
        <div class="event-lab-logo">
            <img src="/svg/route.svg">
            <div>EVENT LAB</div>
        </div>
        <div class="login-layout">
            <big-label  label="Sign In" />
            <text-input placeholder="Username" v-model="username" @inFocus="error=false"/>
            <text-input placeholder="Password" v-model="password" type="password" @inFocus="error=false"/>
            <!-- <text-input placeholder="TFA" v-model="tfa" /> -->
            <click-button label="Login" type="primary" @click="login()"/>
            <alert-bar    class="error" :label="msg" type="error" v-if="error"/>
            <click-button class="forgot" label="Forgot Password" type="link" />
        </div>
        <span class="top-right" @click="$emit('completed')">×</span>
    </div>
</template>

<script>
import User from "@/helpers/User.js"
export default {
    data() {
        return {
            username: 'joeri@bespired.nl',
            password: 'tracker4now',
            tfa: '123456',
            error: false,
            msg: 'Something went wrong',
        }
    },

    methods:{
        validate() {
            if (this.username.length < 4) {
                this.msg= 'Email is a bit short'
                this.error = true
                return false
            }
            if (this.password.length < 8) {
                this.msg= 'Password is a bit short'
                this.error = true
                return false
            }
            return true
        },

        success(json) {
            switch(json.message.area) {
            case "backend":
                let roles = json.message.role.split(';')
                roles.forEach( role => {
                    let project = (role.split(':')[0]).trim()
                    localStorage.setItem(`${project}:role`, (role.split(':')[1]).trim());
                    localStorage.setItem(`${project}:domain`, json.message.domains[project].domain);
                })
            }
            localStorage.setItem("contact", json.message.contact);
            localStorage.setItem("token", json.token);

            this.$store.commit('main/setLoggedIn')
            this.$store.commit('main/setUser', User.loadUser())
            // can I sign on into other domains with iframe?

            this.$emit('completed')
        },

        fail(json) {
            this.msg= json.message
            this.error = true
        },

        login() {
            if (!this.validate()) return

            let object = {
                username: this.username,
                password: this.password,
                tfa: this.tfa,
            }
            let headers = {
                "Content-Type": "application/json",
            }

            let url = "https://eventlab.com/--/profile/0/login/backend"
            fetch(url, {
                method: "POST",
                headers: headers,
                body: JSON.stringify(object),
            })
            .then(response=>response.json())
            .then(json=> {
                if (json.hasOwnProperty('success')) this.success(json)
                if (json.hasOwnProperty('error'))   this.fail(json)
            });


        }
    },

}
</script>

<style>
    .login-panel {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        user-select: none;
    }

    .event-lab-logo {
        img {
            max-height: 80px;
            margin-top: 27px;
        }
        margin-right: 20px;
        font-weight: 900;
    }

    .event-lab.header {
        min-height: 24px;
        background-color: green;
    }

    .login-layout {
        display: flex;
        flex-wrap: wrap;

       /* display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(6, 1fr);*/
        gap: 8px;
        max-width: 320px;
        margin-bottom: 24px;
    }
    .login-layout .error,
    .login-layout .username,
    .login-layout .password,
    .login-layout .big-label { width: 100% }

    .login-layout .forgot,
    .login-layout .primary,
    .login-layout .tfa       { width: calc(50% - 4px); }

    .top-right{
        position: absolute;
        top: 10px; right: 12px;
        width: 32px; height: 32px;
        border-radius: 5px;
        border:1px solid grey;
        cursor: pointer;
        align-self: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .top-right:hover{
        background-color: #dde5e8;
        color: #101010;
    }
</style>
