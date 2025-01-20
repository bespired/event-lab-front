<template>
    <div class="content-wrapper forms">
        <div class="left-side">
            <div class="filter-header">
                <radio-row>
                    <radio-button label="layout" v-model="formDragMenu" value="layout" />
                    <radio-button label="fields" v-model="formDragMenu" value="fields" />
                    <radio-button label="design" v-model="formDragMenu" value="design" />
                </radio-row>
            </div>
            <div class="scroll-space">
                <component :is="`sidebar-${formDragMenu}`" />
            </div>
        </div>
        <div class="main-side">
            <div class="filter-header"></div>
            <div class="scroll-space">

            </div>
        </div>
        <div class="right-side">
            <div class="filter-header"></div>
            <!-- <menu-for-forms /> -->
        </div>
    </div>
</template>

<style>
    .select-boxes {
        display: flex;
        height: 32px;
        background-color: aliceblue;
    }
</style>

<script>

import SidebarLayout from "@/packages/formbuilder/SidebarLayout.vue"
import SidebarFields from "@/packages/formbuilder/SidebarFields.vue"
import SidebarDesign from "@/packages/formbuilder/SidebarDesign.vue"

export default {

    components: {
        SidebarLayout, SidebarFields, SidebarDesign
    },

    data() {
        return {
            formDragMenu: 'layout',

            spreads: [
                { id: '12--12--12',      bones: [['12'],['12'],['12']] },
                { id: '6-6--6-6--12-12', bones: [['6-6'],['6-6'],['12','12']] },
            ]
        }
    },

    mounted() {
        this.$store.dispatch('builder/loadFormBuilder')
    },

    computed: {
        // assets() {
        //     return this.$store.getters['main/getAssets']
        // },

        // assetType() {
        //     let path  = document.location.pathname.replace('/--/admin', '')
        //     let parts = path.split('/')
        //     let type  = parts.at(-1);
        //     return type
        // },

    },

    methods: {
        // uploader() {
        //     this.$store.commit('main/setTopPanel', 'UploadPanel')
        //     this.$store.commit('main/topVisible', true)
        // }
    }

}
</script>