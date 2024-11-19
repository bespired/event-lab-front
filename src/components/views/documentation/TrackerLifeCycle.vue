<template>
    <div class="scroll-content">
        Tracker Life Cycle <br>

        <step-wrap step="1" label="load">
            include `start.js`
        </step-wrap>

        <step-wrap step="2" label="first">
            is this first visit? --
            Or do we have a token stored in sessionStorage?
        </step-wrap>

        <step-wrap step="3" label="send">
            is there an `elrid` in the url? --
            add it to the payload -- --
            if first then send fingerprint --
            -   else if sessionStorage send sessionStorage --
            -   else send localStorage for a session token --
            send data to server --
            - store eventlab-token in localStorage --
            - store eventlab-session in sessionStorage --
            I guess both to update the expire date.
        </step-wrap>

        <step-wrap step="4" label="layer">
            Create event layer --
        </step-wrap>

        <step-wrap step="5" label="send">
            Send basics to server --
            User agent, screen size, device type, --
        </step-wrap>

        <step-wrap step="6" label="send">
            Send events from event layer to server --
        </step-wrap>
    </div>
</template>
