<template>
    <div class="radio-row">
        <slot />
    </div>
</template>
<style type="text/css">
    .radio-row {
        padding: 8px;
        width: 100%;
        display: flex;
        justify-content: space-evenly;
    }

    .radio-row .radio-button {
        width: 100%;
        border-radius: 0;
        font-size: 13px;
        border-left-width: 1px;
        border-left-style: solid;

    }
    .radio-row .radio-button:first-child {
        border-left-width: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .radio-row .radio-button:last-child {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

</style>