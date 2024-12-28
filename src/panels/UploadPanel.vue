<template>
    <div class="upload-panel">
        <div class="event-lab-logo">
            <img src="/svg/route.svg">
            <div>EVENT LAB</div>
        </div>
        <div class="upload-layout">
            <big-label  label="Upload" />
        </div>
        <span class="top-right" @click="$emit('completed')">×</span>
    </div>
</template>

<script>

export default {
    data() {
        return {
        }
    },

    methods:{

    },

}
</script>

<style>
    .upload-panel {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        user-select: none;
    }

    .event-lab-logo {
        img {
            max-height: 80px;
            margin-top: 27px;
        }
        margin-right: 20px;
        font-weight: 900;
    }

    .event-lab.header {
        min-height: 24px;
        background-color: green;
    }

    .upload-layout {
        display: flex;
        flex-wrap: wrap;

        gap: 8px;
        max-width: 320px;
        margin-bottom: 24px;
    }

    .top-right{
        position: absolute;
        top: 10px; right: 12px;
        width: 32px; height: 32px;
        border-radius: 5px;
        border:1px solid grey;
        cursor: pointer;
        align-self: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .top-right:hover{
        background-color: #dde5e8;
        color: #101010;
    }
</style>
