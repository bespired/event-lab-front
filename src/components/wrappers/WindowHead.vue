<template>
    <div class="window-head">
        <span class="header-dot c-red" />
        <span class="header-dot c-orange" />
        <span class="header-dot c-green" />
        <span class="header-icon">
            <prime-icon name="folder-full" />
            <prime-icon name="docker" />
        </span>
        <span class="label">{{ label }}</span>
    </div>
</template>
<script>
export default {
    props: {
        label: { type: String, default: null },
    }
}
</script>
<style>
.window-head {
    display: flex;
    align-items: center;
    font-weight: 700;
    font-size: 11px;
    line-height: 15px;
    color: #AAA;
    padding: 4px;
    background-color: #EEE;
    border: 1px solid #ededed;
    border-radius: 12px 12px 0 0;
    width: 100%;
}

.window-head .header-icon {
    padding: 4px;
}

.window-head.docker-blue {
    background-color: #254FC6;
    color: white;
}

.window-head .icon-folder-full {
    display: inline-block;
}

.window-head .icon-docker {
    display: none;
}

.window-head.docker-blue .icon-folder-full {
    display: none
}

.window-head.docker-blue .icon-docker {
    display: inline-block;
}

.window-head.docker-blue {
    background-color: #254FC6;
    color: white;
}


.header-dot {
    display: inline-flex;
    width: 10px;
    height: 10px;
    border: 1px solid;
    border-radius: 50%;
    margin: 3px 4px 3px 3px;

}

.header-dot.c-green {
    background-color: #21c521;
    border-color: #21b021;
}

.header-dot.c-orange {
    background-color: #f7ac22;
    border-color: orange;
}

.header-dot.c-red {
    background-color: #f72c2c;
    border-color: red;
}
</style>