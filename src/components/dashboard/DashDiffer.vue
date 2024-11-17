<template>
    <div class="dashboard-differ">
        <prime-icon :name="arrow" />
        <span >
            {{ amount }}%
        </span>
        <span>
             {{ direction }} {{ label }}
        </span>
    </div>
</template>

<script setup>
    import { ref, computed } from 'vue'

    const props = defineProps({
        amount: Number,
        label:  String,
    })

    const arrow = computed(() => {
        let arrow = (props.amount === 0) ? 'arrow-left' : 'arrow-up'
        return props.amount < 0 ? 'arrow-down' : arrow
    })

    const direction = computed(() => {
        return props.amount < 0 ? 'decrease' : 'increase'
    })

    const absolute = computed(() => {
        return Math.absolute(props.amount)
    })

</script>

<style>
    .dashboard-differ {
        display: flex;
        align-items: center;
    }
    .dashboard-differ > span {
        font-size: 13px;
        margin-left: 4px;
    }
    .dashboard-differ > span ~ span {
        font-size: 11px;
        white-space: nowrap;
    }
    .dashboard-label {
        font-size: 0.9em;
    }
    .dashboard-differ .pi {
        font-size: 0.5em;
    }
</style>