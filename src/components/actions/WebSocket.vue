<script>
export default {
    name: 'WebSocket',

    mounted() {
        this.connect()
    },

    methods: {
        connect() {

            // maybe add credentials in the url
            // wss://eventlab.com:9001/[jwwt-token]

            let token = localStorage.getItem('token')

            const conn = new WebSocket(`wss://eventlab.com:9001/${token}`);

            conn.onopen = function(e) {
                console.log("Connection established!");

                conn.send(JSON.stringify({cmd:'msg', val:'Hello World!'}))

            };

            conn.onmessage = function(e) {

                console.log(e.data);

            };

        }

    }

}
</script>
<template />

