<template>
    <div class="content-wrapper">
        <div class="menu-sub-header">

        </div>
        <div class="left-side">
            <textarea class="full-area" v-model="message" />
            <click-button type="primary" label="send" @click="send()" />
        </div>
        <div class="right-side">
            <template v-for="message in messages"  >
                <div :class="setClass(message)" >
                    <div class="name" > {{ message.name }}</div>
                    <div class="value"> {{ message.val }}</div>
                </div>
            </template>
        </div>
    </div>
</template>


<script>
export default {

    data() {
        return {
            message: ''
        }
    },

    computed:{
        messages() {
            return  this.$store.getters['main/getWsMessages']
        },
        user() {
            return this.$store.getters['main/getUser']
        }
    },

    methods:{
        setClass(message) {
            let classname =  message.cmd + ' '
            if ((this.user) && (message.contact === this.user.contact)) classname += 'isMe'

            return classname
        },

        send() {
            // strip --
            this.$store.commit('main/postWsMessage', this.message)
            this.message = ''
        }
    }
}

</script>

<style>
    .content-wrapper{
        display: flex;

        width: 100%;
        max-width: 1400px;
        align-self: center;

        background: white;
        min-height: calc(100vh - 680px);
        max-height: calc(100vh - 680px);

        overflow: hidden;

        margin-top: 80px;

        box-shadow: 0 0 8px #0000002e;
        flex-wrap: wrap;
    }

    .menu-sub-header {
        height: 50px;
        border-bottom: 1px solid var(--color-border);
        width: 100%;
    }

    .content-wrapper .right-side,
    .content-wrapper .left-side {
        min-height: calc(100vh - 130px);
    }

    .full-area {
        max-width: calc(100% - 2px - 2em);
        min-width: calc(100% - 2px - 2em);
        border: 1px solid var(--color-border);
        border-radius: 4px;
        padding: 1em;
    }

    .content-wrapper .left-side {
        width: 320px;
        padding: 20px;
        background-color: #f0f0f0;
    }
    .content-wrapper .right-side {
        width: calc(100% - 380px);
        border-left: 1px solid var(--color-border);
        background-color: #f8f8f8;
        padding: 1em;
        overflow: auto;
        max-height: calc(100vh - 200px);
    }

    .content-wrapper .right-side > div:last-child {
        scroll-snap-align: start;
    }

    .content-wrapper .right-side .cmd {
        display: flex;
    }

    .content-wrapper .right-side .cmd .name {
        font-size: 16px;
    }

    .content-wrapper .right-side .name {
        color: #3e833f;
        font-size: 12px;
    }

    .content-wrapper .right-side .cmd .value {
        margin-left: 4px;
    }

    .content-wrapper .right-side {
        justify-content: flex-end;
    }
    .content-wrapper .right-side .isMe {
        justify-content: flex-start;
    }
    .content-wrapper .right-side .msg,
    .content-wrapper .right-side .cmd {
        margin-bottom: .3em;
        display: flex;
    }

    .content-wrapper .right-side .msg {
        flex-wrap: wrap;
        flex-direction: column;
    }
</style>
