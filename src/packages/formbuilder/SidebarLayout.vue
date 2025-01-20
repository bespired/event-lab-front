<template>
    <div class="layouts">
        <template v-for="spread in spreads" :key="spread.id" v-if="spreads">
            <div class="select-row" :id="spread.id">
                <div class="thumb thumb-desktop">
                    <div class="bar-row" v-for="(row) in spread.cast[0]" >
                        <div class="bar" :class="`responsive-${bar}`" v-for="(bar,idx) in splode(row)" />
                    </div>
                </div>
                <div class="thumb thumb-tablet">
                    <div class="bar-row" v-for="(row) in spread.cast[1]" >
                        <div class="bar" :class="`responsive-${bar}`" v-for="(bar,idx) in splode(row)" />
                    </div>
                </div>
                <div class="thumb thumb-phone">
                    <div class="bar-row" v-for="(row) in spread.cast[2]" >
                        <div class="bar" :class="`responsive-${bar}`" v-for="(bar,idx) in splode(row)" />
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>

<style>
    .layouts .select-row {
        display: flex;
        padding: 2px 4px;
    }
    .layouts .select-row:hover {
        cursor: pointer;
        background-color: rgba(146, 181, 54, 0.25)
    }
    .layouts .select-row:hover .bar{
        background-color:  #34619b;
        cursor: pointer;
    }

    .layouts .bar-row{
        display: flex;
        flex-wrap: nowrap;
        gap: 1px;
    }

    .layouts .thumb{
        background-color: #f8f8f8;
        border-radius: 8px;
        margin: 2px;
        padding: 2px;
        gap: 1px;
        display: flex;
        flex-direction: column;
        min-height: 32px;
    }

    .thumb-desktop {width: 45%;}
    .thumb-tablet  {width: 33%;}
    .thumb-phone   {width: 22%;}

    .bar {
        background-color: #86a8d4;
        height: 12px;
        border-radius: 4px;
    }

    .responsive-R { margin-left: auto }

    .responsive-12 {  width: 100% }
    .responsive-11 {  width: calc(100% / (12/11)) }
    .responsive-10 {  width: calc(100% / 1.2)     }
    .responsive-9  {  width: calc(100% * 0.75)    }
    .responsive-8  {  width: calc(100% / 1.5)     }
    .responsive-7  {  width: calc(100% / (12/7) ) }
    .responsive-6  {  width: 50%  }
    .responsive-5  {  width: calc(100% / 2.4) }
    .responsive-4  {  width: calc(100% / 3.0) }
    .responsive-3  {  width: 25% }
    .responsive-2  {  width: calc(100% / 6.0) }
    .responsive-1  {  width: 10% }
    .responsive-0  {  width: 0 }


</style>

<script>
export default {

    data() {
        return {
        }
    },

    methods: {
        splode(data) {
            return data.split('-')
        }
    },

    computed: {
        spreads() {
            return this.$store.getters['builder/getLayouts']
        },
    },

}
</script>
