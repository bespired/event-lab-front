<template>
    <div class="scroll-content">
        Mail Pixel<br><br>

        <step-wrap step="1" label="create">
            include pixel in mail
        </step-wrap>

        <step-wrap step="2" label="open">
            Pixel gets gif from tracker --
            `http://{domain}/--/tracker/{pixel-token}/pixel.gif`
        </step-wrap>

        <step-wrap step="3" label="store">
            find `tracker-token` in *track_tokens* --
            store event in *track_timeline* -- --

            `SELECT handle, profile, contact` --
            `FROM track_tokens` --
            `WHERE CONCAT(":", token_1, ":", token_2, ":", token_3, ":", token_4, ":" ... ) LIKE "%:#:%"` --
            where # is the token to search for

            store mail pixel {mail-id} {mail-subject} on timeline of profile
        </step-wrap>


    </div>
</template>
