<template>
    <div class="scroll-content">
        Mail Clicked <br>

        <step-wrap step="1" label="setup">
            add `return-token` in url
            name could be *elrt* ( eventlab return token )
        </step-wrap>

        <step-wrap step="2" label="send">
            *elrt* in url is send to -/tracker for handling
        </step-wrap>

        <step-wrap step="3" label="handle">
            *elrt* the `return-token` consists of `profile-token--handle-token` -- --

            - the event is tracked on timeline. --
            - handle starts return automation journey. -- --

            `SELECT handle, profile, contact` --
            `FROM track_tokens` --
            `WHERE CONCAT(":", token_1, ":", token_2, ":", token_3, ":", token_4, ":" ... ) LIKE "%:#:%"` --
            --
            store `mail` `clicked` `{mail-id}` `{mail-subject}` on timeline of `profile`

        </step-wrap>


    </div>
</template>
