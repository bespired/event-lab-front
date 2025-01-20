<template>
    <div class="content-wrapper visitor">
        <div class="left-side">
            <div class="filter-header">
                <segment-info />
            </div>
            <div class="scroll-space">
            <template v-for="profile in profiles">
                <profile-box :profile="profile" />
            </template>
            </div>
        </div>
        <div class="right-side">
            <div class="filter-header">
                <template v-if="profile">
                    <event-svg :name="visitorType" />
                    <div>{{ profile.visitor.firstvistdate }}</div>

                </template>
                <span class="top-right" v-if="handle" @click="close()">×</span>
            </div>
            <div class="scroll-space">
                <one-profile :handle="handle" v-if="handle" />

            </div>
        </div>
    </div>
</template>
<style>
</style>
<script>
export default {

    mounted() {
        this.$store.dispatch('main/loadProfiles')
    },

    computed: {
        profiles() {
            return this.$store.getters['main/getProfiles']
        },
        profile() {
            return this.$store.getters['main/getOneProfile']
        },
        handle() {
            let current = document.location.pathname.split('/').at(-1)
            if (current === 'visitors' ) return null

            return current
        },
        visitorType() {
            if (!this.profile) return 'empty'
            const isContact = this.profile.visitor.is_contact === '1'
            return isContact ? 'contact' : 'visitor'
        }
    },
    methods: {
        close() {
            let development = (import.meta.env.MODE === 'development')
            let origin = document.location.origin
            let root = development ? '' : `${origin}/--/admin/`
            let href = `${root}/visitors`

            this.$store.dispatch('main/loadProfile', null)

            history.pushState({}, null, href);
        }
    }

}
</script>