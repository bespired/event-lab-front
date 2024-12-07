<template>
    <div class="scroll-content">
        WebSocket <br>

        <step-wrap step="1" label="setup">
            Websocket as a component --
            In combi with store
        </step-wrap>

        <step-wrap step="2" label="watch">
            Websocket has a watch on the user --
            If a user is known the token must be in localstore --
            So a connection with Ratched can be made.
        </step-wrap>

        <step-wrap step="3" label="send">
            Any message send to the store is captured by the WebSocket component and send to Ratched.
        </step-wrap>

        <step-wrap step="4" label="receive">
            Any message reived by the WebSocket component is put into the store. --
            Any party that wants to do something with the message just needs to getter the store.
        </step-wrap>

        <step-wrap step="5" label="store">
            So no-one in frontend needs to deal with WebSocket but just with the store.
        </step-wrap>

    </div>
</template>
