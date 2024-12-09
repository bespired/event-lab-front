<template>
    <a class="index-box" :href="reallink(link)" @click.prevent.stop="handle">
        <span><prime-icon :name="icon" v-if="icon" /></span>
        <span>
            <div>{{ label }}</div>
            <div>{{ description }}</div>
        </span>
    </a>
</template>

<script>
export default {
    props: {
        link:   { type: String, default: null },
        label:  { type: String, default: '#' },
        type:   { type: String, default: null },
        icon:   { type: String, default: null },
        description: { type: String, default: null },
    },

    methods: {
        handle(evt) {
            history.pushState({}, null, this.reallink(this.link));
        },
        reallink(link) {
            if (import.meta.env.MODE === 'development') return link

            let origin = document.location.origin
            link = link.startsWith('/') ? link.substr(1) : link;
            let url = `${origin}/--/admin/${link}`
            return url
        }
    }

}
</script>

<style>

    a.index-box {
        box-sizing: border-box;
        display: flex;
        flex-wrap: wrap;

        min-height: 80px;
        width: 100%;
        max-width: calc(25% - 6px);

        background-color: white;
        border: 1px solid #34619b20;
        border-radius: 4px;
        line-height: 1.2;
        transition: box-shadow .5s, background-color .5s;
        color: #34619b;
    }

    @media only screen and (max-width: 1420px) {
        .scroll-content {
            padding-left:  20px;
            padding-right: 20px;
        }
    }

    @media only screen and (max-width: 990px) {
        a.index-box { max-width: calc(33% - 6px); }
    }
    @media only screen and (max-width: 800px) {
        a.index-box { max-width: calc(50% - 6px); }
    }

    a.index-box .icon {
        font-size: 32px;
    }
    a.index-box span:nth-child(1){
        width: 40px;
        padding: 10px;
        align-self: center;
        text-align: center;
        background-color: aliceblue;
        margin: auto 0 auto 10px;
        border-radius: 8px;
        transition: background-color .5s;
    }
    a.index-box span:nth-child(2){
        width: calc(100% - 80px);
        align-content: center;
        transition: background-color .5s;
    }
    a.index-box span:nth-child(2) div{
        width: 100%;
    }
    a.index-box span:nth-child(2) div:nth-child(1){
        padding: 0 10px 2px 12px;
    }
    a.index-box span:nth-child(2) div:nth-child(2){
        padding: 2px 10px 0 12px;
        font-size: 11px;
        font-weight: 400;
        color: black;
    }
    a.index-box:hover {
        box-shadow: #00377b73 0 0 8px;
        background-color: #34619b08;
    }
    a.index-box:hover span:nth-child(1){
        background-color: #f1f4f5;
    }

</style>
