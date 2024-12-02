<template>
    <a :href="link" :class="[isActive, type]" class="link-button"
        @click.prevent.stop="handle">
        <prime-icon :name="icon" v-if="icon" />
        {{ label }}
    </a>
</template>


<script>
export default {
    props: {
        link:   { type: String, default: '#' },
        label:  { type: String, default: null },
        type:   { type: String, default: null },
        icon:   { type: String, default: null },
        active: { type: String, default: null },
    },

    computed: {
        isActive() {
            const regex = new RegExp(`${this.active}`);
            return document.location.href.match(regex) ? 'focus' : ''
        }
    },

    methods: {
        handle(evt) {
            console.log(this.link)
            history.pushState({}, null, this.link);
        }
    }

}
</script>
