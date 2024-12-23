<template>
    <component
        :is="localComponent"
        :key="localKey"
         v-if="loaded"
    />
</template>

<script>
import { shallowRef, defineAsyncComponent } from 'vue'
import Routes from '@/Routes.js'

export default {

    mounted()
    {
        if (this.loader !== undefined) {
            this.localComponent = shallowRef(defineAsyncComponent({
                loader: () => this.loader(),
                delay: 500
            }));
        }
    },

    data() {
        return {
            localComponent: null,
            view: this.fromLocation()
        }
    },

    computed: {
        localKey() {
            let t = new Date().getTime()
            return `load-${t}`
        },

        loaded() {
            return this.localComponent !== null
        },

        loader() {
            let splits = this.view.split('/')
            let part = splits[0]
            let view = splits[1]

            switch(part) {
            case 'views':
                return () => import(`../../views/${view}.vue`)
            case 'docs':
                return () => import(`../../docs/${view}.vue`)
            }

        },

    },

    methods: {
        fromLocation() {
            let path = document.location.pathname.replace('/--/admin','')
            if (Routes[path] !== undefined) return Routes[path]

            let astrix = Object.keys(Routes).filter(r => r.indexOf('*') > 0)
            let view   = "views/HelloWorld"

            astrix.forEach(a => {
                // '/website/assets/logos'.match('/website/assets/*')
                let hit = path.match(a)
                if (hit) view = Routes[astrix]
            })

            return view
        },

    },

    unmounted() {
        this.localComponent = null
    }
}
</script>
