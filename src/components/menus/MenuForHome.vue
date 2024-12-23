<template>
    <div class="menu-header">
        <template v-for="item in items">
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

}
</script>

