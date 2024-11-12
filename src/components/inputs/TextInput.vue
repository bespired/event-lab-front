<template>
    <div class="text-input" :class="[{ hasFocus }, classname]">
        <div class="ws-label" v-if="label">{{ label }}</div>
        <div class="text-input-row">
            <input
                :type="localType"
                :disabled="isDisabled"
                :name="name"
                :placeholder="placeholder"
                :readonly="isReadonly"
                v-model.trim="model"
                spellcheck="false"
                @focus="hasFocus=true; emit('inFocus')"
                @blur ="hasFocus=false;"
            >
            <span class="unit" v-html="units" v-if="unit"/>
            <icon-eye v-if="type === 'password'"
                :strike="forceText" @click="forceText=!forceText"/>
        </div>
    </div>
</template>

<script setup>

    import { ref, computed } from 'vue'

    const props = defineProps({
        type:        { type: String, default: 'text' },
        name:        String,
        label:       String,
        unit:        String,
        isDisabled:  Boolean,
        isReadonly:  Boolean,
        placeholder: String,
    })

    const emit  = defineEmits(['inFocus'])
    const model = defineModel()

    const hasFocus  = ref(false)
    const forceText = ref(false)

    const localType = computed(() => {
        return forceText.value ? 'text' : props.type
    })
    const classname = computed(() => {
        let label = props.placeholder ?
            props.placeholder : props.label
        return label.toLowerCase()
    })
    // return { hasFocus, localType }

</script>
