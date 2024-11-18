<template>
    <a class="index-box" :href="link">
        <span><prime-icon :name="icon" v-if="icon" /></span>
        <span>
            <div>{{ label }}</div>
            <div>{{ description }}</div>
        </span>
    </a>
</template>

<script setup>
    defineProps({
        label: String,
        description: String,
        type:  String,
        link:  String,
        icon:  String,

    })
</script>

<style>

    a.index-box {
        box-sizing: border-box;
        display: flex;
        flex-wrap: wrap;

        min-height: 80px;
        width: 100%;
        max-width: 320px;

        background-color: white;
        border: 1px solid #34619b20;
        border-radius: 4px;
        line-height: 1.2;
        transition: box-shadow .7s;
        color: #34619b;
    }
    a.index-box .pi{
        font-size: 40px;
    }
    a.index-box span:nth-child(1){
        width: 60px;
        padding: 10px;
        align-self: center;
        text-align: center;
    }
    a.index-box span:nth-child(2){
        width: calc(100% - 80px);
        align-content: center;
        transition: background-color .7s;
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
    }
    a.index-box:hover span:nth-child(2){
        background-color: #34619b08;
    }
</style>
