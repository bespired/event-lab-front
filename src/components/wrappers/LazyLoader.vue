<template>
    <component
        :is="localComponent"
        :key="localKey"
         v-if="loaded"
    />
</template>

<script>
import { shallowRef, defineAsyncComponent } from 'vue'
import Views from '@/helpers/Views.js'

export default {

    props: {
        url: { type: String, default: null },
    },

    mounted()
    {
        this.localComponent = shallowRef(defineAsyncComponent({
            loader: () => this.loader(),
            delay: 500
        }));
    },

    data() {
        // let views = Views

        return {
            localComponent: null,
            view: this.fromLocation()
        }
    },

    computed: {

        loader() {
            return () => import(/* @vite-ignore */`../views/${this.view}`)
        },

        localKey() {
            let t = new Date().getTime()
            return `load-${t}`
        },

        loaded() {
            return this.localComponent !== null
        },

    },

    methods: {
        fromLocation() {
            if (!Views[document.location.pathname]) return "HelloWorld.vue"
            return Views[document.location.pathname]
        }
    },

    unmounted() {
        this.localComponent = null
    }
}
</script>
