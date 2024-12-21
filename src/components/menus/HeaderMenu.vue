<template>
    <component :is="currentmenu" />
</template>

<script>

import MenuForHome from './MenuForHome.vue'
import MenuForDocs from './MenuForDocs.vue'
import MenuForSite from './MenuForSite.vue'

export default {

    components :{
        MenuForHome, MenuForDocs, MenuForSite
    },

    computed: {
        currentmenu() {
            let path  = document.location.pathname.replace('/--/admin', '')
            let route = path.split('/')
            console.log(route)

            if (route[1] === 'documentation') return 'menu-for-docs'
            if (route[1] === 'website') return 'menu-for-site'

            if (route.lenth === 2) return 'menu-for-home'



            return 'menu-for-home'
        }
    }

}
</script>

