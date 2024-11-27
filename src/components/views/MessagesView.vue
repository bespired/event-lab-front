<template>
    <div class="content-wrapper">
        <div class="menu-sub-header">

        </div>
        <div class="left-side">
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
        min-height: calc(100vh - 80px);
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

    .content-wrapper .left-side {
        width: 320px;
    }
    .content-wrapper .right-side {
        width: calc(100% - 320px);
        border-left: 1px solid var(--color-border);
        background-color: #f8f8f8;
        padding: 1em;
        overflow: auto;
        max-height: calc(100vh - 200px);
    }

    .content-wrapper .right-side .cmd {
        display: flex;
    }

    .content-wrapper .right-side .name {
        color: #b2b2b2;
    }

    .content-wrapper .right-side .cmd .value {
        margin-left: 4px;
    }

    .content-wrapper .right-side .isMe {
        justify-content: flex-end;
    }
    .content-wrapper .right-side .msg,
    .content-wrapper .right-side .cmd {
        margin-bottom: .3em;
    }
</style>
