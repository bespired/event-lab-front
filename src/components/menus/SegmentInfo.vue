<template>
    <div class="segment-info">
        <event-svg :name="dspmain" />
        {{ dspmain }}
        <div class="right">
            <icon-button icon="info-circle" type="primary" />
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dspmain:   this.main(),
            dspdetail: this.detail(),
        }
    },

    computed: {
        current() {

        },
    },

    methods: {
        path() {
            return document.location.pathname.replace('/--/admin', '')
        },

        main() {
            const parts = this.path().split('/')
            return parts[1]
        },

        detail() {
            return null
        },
    }
}

// visitor         https://eventlab.com/visitors
// visitor detail  https://eventlab.com/visitors/ay09bb-prof-jPomvpC34

// contact         https://eventlab.com/contacts
// contact detail  https://eventlab.com/contacts/ay09bb-prof-jPomvpC34

// segment index   https://eventlab.com/segments
// segment         https://eventlab.com/segments/name-of-segment
// segment detail  https://eventlab.com/segments/name-of-segment/ay09bb-prof-jPomvpC34

</script>

<style>
    .segment-info {
        width: 100%;
        height: 60px;
        display: flex;
        align-items: center;
    }
    .segment-info .right {
        display: flex;
        margin-left: auto;
        padding-right: 8px;
    }
</style>
