<template>
    <div class="menu-header">
        <link-button label="Home" link="/" icon="home" />
        <link-button label="Website" link="/website" icon="globe" :class="isActive('/website')" />
        <span class="separator">|</span>
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
                { link: "/website/urls" ,     icon: "compass",    label: "Urls"     },
                { link: "/website/pages" ,    icon: "article",    label: "Pages"    },
                { link: "/website/forms" ,    icon: "form",       label: "Forms"    },
                { link: "/website/assets" ,   icon: "imagesmode", label: "Assets"   },
                { link: "/website/settings" , icon: "cog",        label: "Settings" },

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
            return when === this.current.substr(0, when.length) ? 'focus' : ''
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

