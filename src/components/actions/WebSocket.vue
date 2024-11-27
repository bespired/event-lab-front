<template>
    <span :message-data="postmessage" :user="user" />
</template>

<script>
export default {
    name: 'WebSocket',

    data() {
        return {
            conn:    null,
            name:    null,
            contact: null,
        }
    },

    watch: {
        user(n, o) {
            if ((o === null) && (n !== null)) {
                this.name    = n.name
                this.contact = n.contact
                if (!this.conn) this.connect()
            }
        }
    },

    methods: {
        connect() {

            // Add credentials in the url
            // wss://eventlab.com:9001/[jwwt-token]

            const me    = this
            const token = localStorage.getItem('token')
            const conn  = new WebSocket(`wss://eventlab.com:9001/${token}`);

            conn.onopen = function(e) {
                me.conn = conn
                console.log("Connection established!");
            };

            conn.onmessage = function(e) {
                me.sendWsMessage(e.data);
            };

        },

        sendWsMessage(msg) {
            this.$store.commit('main/setWsMessage', JSON.parse(msg));
        },

    },

    computed: {

        user() {
            return this.$store.getters['main/getUser'];
        },

        postmessage() {
            let message = this.$store.getters['main/getPostMessage'];
            if ((this.conn) && (message)) {
                let msgtype = (message.substring(0,2) === '--') ? 'cmd' : 'msg'
                let msgtrim = (message.substring(0,2) === '--') ? message.substring(2) : message
                this.conn.send(JSON.stringify({
                    cmd: msgtype, name: this.name, contact: this.contact, val: msgtrim
                }))
            }
            return message
        },


    }
}
</script>


