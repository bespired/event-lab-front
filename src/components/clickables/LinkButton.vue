<template>
    <a :href="url"  :class="[isActive, type]" class="link-button">
        <prime-icon :name="icon" v-if="icon" />
        {{ label }}
    </a>
</template>


<script>
export default {
    props: {
        url:    { type: String, default: '#' },
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
    }

}
</script>
