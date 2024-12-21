<template>
    <div class="menu-header">
        <link-button label="Home" link="/" icon="home" />
        <link-button label="Website" link="/website" icon="globe" :class="isActive('/website')" />
        <span class="separator">|</span>
        <template v-for="item in items">
            <a :href="reallink(item.link)" :class="isActive(item.link)"
                @click.prevent.stop="handle">
                <prime-icon :name="item.icon" />
                {{ item.label }}
            </a>
        </template>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: [
                { link: "/website/urls" ,     icon: "compass",    label: "Urls"     },
                { link: "/website/pages" ,    icon: "pages",      label: "Pages"    },
                { link: "/website/assets" ,   icon: "imagesmode", label: "Assets"   },
                { link: "/website/settings" , icon: "cog",        label: "Settings" },
            ]
        }
    },

    methods: {
        isActive(when) {
            let path  = document.location.pathname.replace('/--/admin', '')
            return when === path ? 'focus' : ''
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

