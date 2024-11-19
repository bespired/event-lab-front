<template>
    <div class="scroll-content">
        Tracker tokens<br><br>

        <step-wrap step="1" label="pixel">
            pixel token `elxid` --
            `http://eventlab.com/--/tracker/{pixel-token}/pixel.gif` -- --

            *{profile-id}--P{date-code}--{mail-id}*

        </step-wrap>

        <step-wrap step="2" label="return">
            landing token --
            - mail `elrid` --
            `http://domain.com/nice-page-for-you?elrid={return-token}` -- --

            *{profile-id}--R{date-code}--{return-id}*

        </step-wrap>

        <step-wrap step="2" label="localStorage">
            prospect token --
            *{profile-id}--L{date-code}*
        </step-wrap>

        <step-wrap step="2" label="sessionStorage">
            session token --
            *{profile-id}--S{date-code}*
        </step-wrap>


    </div>
</template>
