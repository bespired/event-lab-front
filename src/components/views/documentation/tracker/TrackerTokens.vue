<template>
    <div class="scroll-content">
        Tracker tokens<br><br>

        <step-wrap step="1" label="pixel">
            pixel token `elxid` --
            `http://eventlab.com/--/tracker/{pixel-token}/pixel.gif` -- --

            *{storage-id}--{mail-id}*

        </step-wrap>

        <step-wrap step="2" label="return">
            landing token --
            - mail `elrid` --
            `http://domain.com/nice-page-for-you?elrid={return-token}` -- --

            *{storage-id}--{return-id}*
        </step-wrap>

        <step-wrap step="3" label="localStorage">
            prospect token --
            *{storage-id}* = *{project}{when}-L{datecode}-{crc}*
        </step-wrap>

        <step-wrap step="4" label="sessionStorage">
            session token --
            *{storage-id}*  = *{project}{when}-S{datecode}-{crc}*
        </step-wrap>


        <step-wrap step="5" label="mail">
            When a mail is clicked and lands on a page we need to consider --
            Is this the first time this profile lands on this page --
            If so, we can connect the visitor ID to this email --
            BUT-- what if someone sends this mail to a friend... --
            How is that different from someone opening the mail on a second device?
        </step-wrap>



    </div>
</template>
