<template>
    <template v-for="link in links">
        <link-button :label="link.label" :link="link.url" :icon="link.icon" />
    </template>
</template>


<script>
export default {

    computed: {
        links() {
            let parts = location.pathname.split('/')
            let links = []
            let url = ''
            parts.forEach(part =>{
                url = url + '/' + part
                url = url.replace('//', '/')
                links.push({ label: part, url: url, icon: 'angle-double-right'})
            })


            let l = links.length - 1
            links[l].icon = 'book'
            links[0] = { label: 'Home', url: '/', icon: 'home'}

            return links
        }
    }

}
</script>
