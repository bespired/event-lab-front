<template>
    <div class="main-header">
        <span><logo-svg /></span>
        <span>EVENT LAB</span>

        <span class="space" />
        <click-button class="forgot" label="Login" type="link" @click="$emit('login')"/>
    </div>
</template>

<script>
export default {
    data() {
        return {
        }
    },
}
</script>

<style>
.main-header {
    display: flex;
    user-select: none;
    position: fixed;
    top:0; left:0; right:0; height: 52px;
    padding: 0 20px 0 10px;
    background-color: white;
    z-index: 2;
    box-shadow: 0 0 8px #0000002e;
}
.main-header span {
    align-self: center;
    padding: 0 2px;
}

.main-header span svg{
    max-height: 50px;
}

.main-header span.space{
    margin-left: auto;
}

</style>
