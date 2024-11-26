<template>
    <div class="content-wrapper">
        <div class="menu-sub-header">

        </div>
        <div class="left-side">
            left
        </div>
        <div class="right-side">
            right
        </div>
    </div>
</template>
<style>
    .content-wrapper{
        display: flex;

        width: 100%;
        max-width: 1400px;
        align-self: center;

        background: white;
        min-height: calc(100vh - 80px);
        margin-top: 80px;

        box-shadow: 0 0 8px #0000002e;
        flex-wrap: wrap;
    }

    .menu-sub-header {
        height: 50px;
        border-bottom: 1px solid var(--color-border);
        width: 100%;
    }

    .content-wrapper .right-side,
    .content-wrapper .left-side {
        min-height: calc(100vh - 130px);
    }

    .content-wrapper .left-side {
        width: 320px;
    }
    .content-wrapper .right-side {
        width: calc(100% - 320px);
        border-left: 1px solid var(--color-border);
        background-color: #f8f8f8;
    }
</style>
