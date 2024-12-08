<template>
    <div class="menu-header center" v-if="labmode">
        <template v-for="item in items">
            <a :href="reallink(item.link)" :class="isActive(item.link)"
                @click.prevent.stop="handle">
                <prime-icon :name="item.icon" />
                {{ item.label }}
            </a>
        </template>
    </div>
    <div class="menu-header lefter" v-if="docmode">
        <crum-path />
    </div>
</template>

<script>
export default {
    data() {

        let path = document.location.pathname.replace('/--/admin', '')

        return {
            labmode: path.substr(0,14) !== '/documentation',
            docmode: path.substr(0,14) === '/documentation',

            items: [
                {link: "dashboard" , icon: "qrcode"    , label: "Dashboard"  },
                {link: "visitors"  , icon: "user"      , label: "Visitors"   },
                {link: "contacts"  , icon: "user"      , label: "Contacts"   },
                {link: "group"     , icon: "users"     , label: "Groups"     },
                {link: "automation", icon: "microchip" , label: "Automation" },
                {link: "mail"      , icon: "send"      , label: "Mail"       },
                {link: "website"   , icon: "globe"     , label: "Website"    },
            ]

        }
    },

    methods: {
        isActive(when) {
            const regex = new RegExp(`${when}`);
            return document.location.href.match(regex) ? 'focus' : ''
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

