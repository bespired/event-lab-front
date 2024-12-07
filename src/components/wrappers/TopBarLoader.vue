<template>
    <top-bar :inView="visible && loaded && !unload">
        <component
            :is="localComponent"
            :data-component="view"
            :payload="payload"
            :key="localKey"
            @completed="onload()"
            v-if="localComponent"
        />
    </top-bar>
</template>

<script>
import { shallowRef, defineAsyncComponent } from 'vue'
export default {

    props: {
        view:    { type: String,  default: null   },
        visible: { type: Boolean, default: false  },
        payload: { type: Object,  default: null  },
    },

    data() {
        return {
            localComponent: null,
            unload: false
        }
    },

    watch: {
        visible(i,o) {
            if (i) {
                this.localComponent = shallowRef(defineAsyncComponent({
                    loader: () => this.loader(),
                    delay: 500
                }));
            }
        }
    },

    computed: {

        loader() {
            return () => import( /* webpackChunkName: "view" */ `../views/${this.view}.vue`)
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
        onload() {
            this.unload = true
            setTimeout(()=>{
                this.localComponent = null
                this.unload = false
                this.$emit('completed')
            }, 700)
        }
    },

    unmounted() {
        this.localComponent = null
    }
}
</script>
