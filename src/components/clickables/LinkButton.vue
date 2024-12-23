<template>
    <a :href="reallink(link)"
        ref="link"
        :class="[isActive, type]"
        class="link-button"
        @click.prevent.stop="handle">
        <prime-icon :name="icon" v-if="icon" />
        {{ label }}
    </a>
</template>

<script>
export default {
    props: {
        link:   { type: String, default: '#' },
        label:  { type: String, default: null },
        type:   { type: String, default: null },
        icon:   { type: String, default: null },
        active: { type: String, default: null },
    },

    mounted() {
        let bb = getComputedStyle(this.$refs.link)
        this.$refs.link.style['max-width']= bb.width
        this.$refs.link.style['width']= bb.width
    },

    computed: {
        isActive() {
            const regex = new RegExp(`${this.active}`);
            return document.location.href.match(regex) ? 'focus' : ''
        }
    },

    methods: {
        handle(evt) {
            let href = evt.target.href
            history.pushState({}, null, href);
        },

        reallink(link) {
            if (import.meta.env.MODE === 'development') return link

            let origin = document.location.origin
            link = link.startsWith('/') ? link.substr(1) : link;
            let url = `${origin}/--/admin/${link}`
            return url
        }
    }

}
</script>
