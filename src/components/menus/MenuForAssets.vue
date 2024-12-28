<template>
    <div class="menu-side">
        <template v-for="item in menus">
            <link-button
                :link  = "item.link"
                :label = "item.label"
                :icon  = "item.icon"
                :active= "item.link"
            />
        </template>
    </div>
</template>

<script>
export default {
    data() {
        return {
            menus: [
                { link: "/website/assets/illustrations",  icon: "stacks",    label: "article illustrations" },
                { link: "/website/assets/pictures" ,      icon: "image",     label: "page images" },
                { link: "/website/assets/email-images" ,  icon: "envelope",  label: "email illustrations" },
                { link: "/website/assets/images" ,        icon: "image",     label: "website images" },
                { link: "/website/assets/icons" ,         icon: "bullseye",  label: "website icons" },
                { link: "/website/assets/logos" ,         icon: "crown",     label: "website logos" },
                { link: "/website/assets/links" ,         icon: "link",      label: "link images" },
                { link: "/website/assets/documents" ,     icon: "download",  label: "download documents" },
                { link: "/website/assets/font-file" ,     icon: "font",      label: "font files" },
                { link: "/website/assets/font-glyph" ,    icon: "font-icon", label: "font svgs" },
                { link: "/website/assets/script-file" ,   icon: "code-js",   label: "script files" },
                { link: "/website/assets/style-file" ,    icon: "code-css",  label: "style files" },
                { link: "/website/assets/private" ,       icon: "lock",      label: "private files" },
            ],
        }
    },

    computed: {
        current() {
            return document.location.pathname.replace('/--/admin', '')
        },
    },

    methods: {
        isActive(when) {
            return when === this.current ? 'focus' : ''
        },

        handle(evt) {
            let href = evt.target.href
            history.pushState({}, null, href);
        },

        reallink(link) {
            return link
        }

    }
}
</script>

